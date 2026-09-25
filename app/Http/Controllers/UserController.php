<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Budget; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    

public function Addcategorylogic(Request $request)
{

    $category=new Category();
    $category->user_id = auth()->id();
    $category->Name=$request->Name;
    $category->type=$request->type;
    $category->save();
    return redirect('/useraddcategory');



}

public function Allcategories()
{
$admincategories = User::where('userrole', 'admin')->first();

    $categories = Category::where('user_id', auth()->id())
        ->orWhere('user_id', $admincategories->id)
        ->get();
        return view('User.Allcategories', compact('categories'));


}

Public function Editcategory($id)
{
    $category = Category::findOrFail($id);
    return view('User.Editcategory', compact('category'));
}

Public function Updatecategory(Request $request, $id)
{
    $category = Category::findOrFail($id);
    $category->Name = $request->Name;
    $category->type = $request->type;
    $category->save();
    return redirect('/userallcategories');
}


public function Deletecategory($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect('/userallcategories');



}



public function Addtransaction()
{
    $categories = Category::where('user_id', auth()->id())->get();
    return view('User.Addtransaction', compact('categories'));
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

    return redirect('/useraddtransaction');




}

public function Alltransactions()
{
    $transactions = Transaction::where('user_id', auth()->id())->get();
    return view('User.Alltransactions', compact('transactions'));

}

public function Edittransaction($id)
{
        $categories = Category::where('user_id', auth()->id())->get();

    $transaction = Transaction::findOrFail($id);
    return view('User.Edittransaction', compact('transaction', 'categories'));
}

public function Updatetransaction(Request $request, $id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->category_id = $request->category_id;
    $transaction->Amount = $request->Amount;
    $transaction->Description = $request->Description;
    $transaction->Date = $request->Date;
    $transaction->save();
    return redirect('/useralltransactions');
}

public function Deletetransaction($id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->delete();
    return redirect('/useralltransactions');


}

public function Userdashboardanalytics()
{
    $userId = auth()->id();

    $totalIncome = Transaction::where('user_id', $userId)
        ->whereHas('category', function ($query) {
            $query->where('type', 'income');
        })
        ->sum('Amount');

    $totalExpenses = Transaction::where('user_id', $userId)
        ->whereHas('category', function ($query) {
            $query->where('type', 'expense');
        })
        ->sum('Amount');

    $totalTransactions = Transaction::where('user_id', $userId)->count();

    return view('User.Dashboardanalytics', compact('totalIncome', 'totalExpenses', 'totalTransactions'));
}

 public function Addbudget(){

    $categories = Category::where('user_id', auth()->id())->get();

    return view('User.Addbudget', compact('categories'));


 }

 public function Addbudgetlogic(Request $request){

    $budget = new Budget();
    $budget->user_id = auth()->id();
    $budget->category_id = $request->category_id;
    $budget->LimitAmount = $request->LimitAmount;
    $budget->save();

    return redirect('/useraddbudget');

}


public function Allbudgets(){

    $budgets = Budget::where('user_id', auth()->id())->get();
    return view('User.Allbudgets', compact('budgets'));
}

public function Editbudget($id){

    $categories = Category::where('user_id', auth()->id())->get();

    $budget = Budget::findOrFail($id);
    return view('User.Editbudget', compact('budget', 'categories'));


}


public function Updatebudget(Request $request, $id){


 

    $budget = Budget::findOrFail($id);
    $budget->LimitAmount = $request->LimitAmount;
    $budget->save();
    return redirect('/userallbudgets');



}

public function Deletebudget($id){

    $budget = Budget::findOrFail($id);
    $budget->delete();
    return redirect('/userallbudgets');


}


}