<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('user.dashboard');
});

Route::get('/wallet', function () {
    return view('user.wallet');
});

Route::get('/transactions', function () {
    return view('user.transactions');
});

Route::get('/income', function () {
    return view('user.income');
});
Route::get('/expenses', function () {
    return view('user.expenses');
});

Route::get('/categories', function () {
    return view('user.categories');
});

Route::get('/reports', function () {
    return view('user.reports');
});

Route::get('/budget-goals', function () {
    return view('user.budget-goals');
});

Route::get('/saving-tips', function () {
    return view('user.saving-tips');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/settings', function () {
    return view('user.settings');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/addcategory', function () {
    return view('admin.Addcategory');
});

Route::post('/Addcategorylogic', [AdminController::class, 'Addcategorylogic']);

Route::get('/allcategories', [AdminController::class, 'Allcategories']);

Route::get('/editcategory/{id}', [AdminController::class, 'Editcategory']);

Route::post('/updatecategory/{id}', [AdminController::class, 'Updatecategory']);

Route::get('/deletecategory/{id}', [AdminController::class, 'Deletecategory']);

Route::get('/allusers',[AdminController::class,'Allusers']);

Route::get('/deactivateuser/{id}', [AdminController::class, 'Deactivateuser']);

Route::get('/activateuser/{id}', [AdminController::class, 'Activateuser']);

Route::get('/deleteuser/{id}', [AdminController::class, 'Deleteuser']);

Route::get('/addtransaction', [AdminController::class, 'Addtransaction']);

Route::post('/addtransactionlogic', [AdminController::class, 'Addtransactionlogic']);

Route::get('/alltransactions', [AdminController::class, 'Alltransactions']);

Route::get('/edittransaction/{id}', [AdminController::class, 'Edittransaction']);

Route::post('/updatetransaction/{id}', [AdminController::class, 'Updatetransaction']);

Route::get('/deletetransaction/{id}', [AdminController::class, 'Deletetransaction']);

Route::get('/allusersbudgets', [AdminController::class, 'Allusersbudgets']);

Route::get('deleteuserbudget/{id}', [AdminController::class, 'Deletebudget']);




Route::get('/useraddcategory', function () {
    return view('User.Addcategory');
});

Route::post('/useraddcategorylogic', [UserController::class, 'Addcategorylogic']);

Route::get('/userallcategories', [UserController::class, 'Allcategories']);

Route::get('/usereditcategory/{id}', [UserController::class, 'Editcategory']);

Route::post('/userupdatecategory/{id}', [UserController::class, 'Updatecategory']);

Route::get('/userdeletecategory/{id}', [UserController::class, 'Deletecategory']);


Route::get('/useraddtransaction', [UserController::class, 'Addtransaction']);

Route::post('/useraddtransactionlogic', [UserController::class, 'Addtransactionlogic']);

Route::get('/useralltransactions', [UserController::class, 'Alltransactions']);

Route::get('/useredittransaction/{id}', [UserController::class, 'Edittransaction']);

Route::post('/userupdatetransaction/{id}', [UserController::class, 'Updatetransaction']);

Route::get('/userdeletetransaction/{id}', [UserController::class, 'Deletetransaction']);

Route::get('/userdashboard', [UserController::class, 'Userdashboardanalytics']);

Route::get('/useraddbudget', [UserController::class, 'Addbudget']);

Route::post('/useraddbudgetlogic', [UserController::class, 'Addbudgetlogic']);

Route::get('/userallbudgets', [UserController::class, 'Allbudgets']);

Route::get('/usereditbudget/{id}', [UserController::class, 'Editbudget']);

Route::post('/userupdatebudget/{id}', [UserController::class, 'Updatebudget']);

Route::get('/userdeletebudget/{id}', [UserController::class, 'Deletebudget']);