<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
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