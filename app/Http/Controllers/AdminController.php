<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

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




}