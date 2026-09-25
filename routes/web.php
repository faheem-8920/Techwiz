<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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
    return view('Addcategory');
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