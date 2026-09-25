<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Budget;
class AdminController extends Controller
{
    
public function Addcategorylogic(Request $request)
{

    $category=new Category();
    $category->user_id = auth()->id();
    $category->Name=$request->Name;
    $category->type=$request->type;
    $category->save();
    return redirect('/addcategory');



}

public function Allcategories()
{
    $categories = Category::all();
    return view('Allcategories', compact('categories'));


}

Public function Editcategory($id)
{
    $category = Category::findOrFail($id);
    return view('Editcategory', compact('category'));
}

Public function Updatecategory(Request $request, $id)
{
    $category = Category::findOrFail($id);
    $category->Name = $request->Name;
    $category->type = $request->type;
    $category->save();
    return redirect('/allcategories');
}


public function Deletecategory($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect('/allcategories');



}

public function Allusers(){

$users=User::all();

return view('Allusers',compact('users'));

}

public function Deleteuser($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect('/allusers');

}

public function Deactivateuser($id)
{
    $user = User::findOrFail($id);
    $user->Status = false;
    $user->save();
    return redirect('/allusers');


}


public function Activateuser($id)
{
    $user = User::findOrFail($id);
    $user->Status = true;
    $user->save();
    return redirect('/allusers');



}


public function Addtransaction()
{
    $categories = Category::all();
    return view('Addtransaction', compact('categories'));
}


public function Addtransactionlogic(Request $request)
{
    $transaction = new Transaction();
    $transaction->user_id = auth()->id();
    $transaction->category_id = $request->category_id;
    $transaction->Amount = $request->Amount;
    $transaction->Description = $request->Description;
    $transaction->Date = $request->Date;
    $transaction->save();

    return redirect('/addtransaction');




}

public function Alltransactions()
{
    $transactions = Transaction::all();
    return view('Alltransactions', compact('transactions'));

}

public function Edittransaction($id)
{
        $categories = Category::where('user_id', auth()->id())->get();

    $transaction = Transaction::findOrFail($id);
    return view('Edittransaction', compact('transaction', 'categories'));
}

public function Updatetransaction(Request $request, $id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->category_id = $request->category_id;
    $transaction->Amount = $request->Amount;
    $transaction->Description = $request->Description;
    $transaction->Date = $request->Date;
    $transaction->save();
    return redirect('/alltransactions');
}

public function Deletetransaction($id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->delete();
    return redirect('/alltransactions');


}

public function Allusersbudgets()
{
    $budgets = Budget::all();
    return view('Allusersbudgets', compact('budgets'));
}


public function Deletebudget($id)
{
    $budget = Budget::findOrFail($id);
    $budget->delete();
    return redirect('/allusersbudgets');

}

}