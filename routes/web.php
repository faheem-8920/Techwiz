<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return view('auth.login');
});



Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/addcategory', function () {
        return view('admin.Addcategory');
    });

    Route::post('/Addcategorylogic', [AdminController::class, 'Addcategorylogic']);

    Route::get('/allcategories', [AdminController::class, 'Allcategories']);

    Route::get('/editcategory/{id}', [AdminController::class, 'Editcategory']);

    Route::post('/updatecategory/{id}', [AdminController::class, 'Updatecategory']);

    Route::get('/deletecategory/{id}', [AdminController::class, 'Deletecategory']);


    Route::get('/allusers', [AdminController::class, 'Allusers']);

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

    Route::get('/deleteuserbudget/{id}', [AdminController::class, 'Deletebudget']);


    Route::get('/addannouncement', function () {
        return view('admin.Addannouncement');
    });

    Route::post('/addannouncementlogic', [AdminController::class, 'Addannouncementlogic']);

    Route::get('/allannouncements', [AdminController::class, 'Allannouncements']);

    Route::get('/deleteannouncement/{id}', [AdminController::class, 'Deleteannouncement']);

    Route::get('/editannouncement/{id}', [AdminController::class, 'Editannouncement']);

    Route::post('/updateannouncement/{id}', [AdminController::class, 'Updateannouncement']);

    Route::get('/deactivateannouncement/{id}', [AdminController::class, 'Deactivateannouncement']);

    Route::get('/activateannouncement/{id}', [AdminController::class, 'Activateannouncement']);

});




Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/userdashboard', [UserController::class, 'Userdashboardanalytics']);


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


    Route::get('/useraddbudget', [UserController::class, 'Addbudget']);

    Route::post('/useraddbudgetlogic', [UserController::class, 'Addbudgetlogic']);

    Route::get('/userallbudgets', [UserController::class, 'Allbudgets']);

    Route::get('/usereditbudget/{id}', [UserController::class, 'Editbudget']);

    Route::post('/userupdatebudget/{id}', [UserController::class, 'Updatebudget']);

    Route::get('/userdeletebudget/{id}', [UserController::class, 'Deletebudget']);


    Route::get('/userallannouncements', [UserController::class, 'Allannouncenments']);


    Route::get('/userreports', [UserController::class, 'Userreports']);

    Route::get('/userreportpdf', [UserController::class, 'Userreportpdf']);


    Route::get('/userinsights', [UserController::class, 'Userinsights']);


    Route::get(
        '/userallscheduledtransactions',
        [UserController::class, 'Allscheduledtransactions']
    );

    Route::get(
        '/useraddscheduledtransaction',
        [UserController::class, 'Addscheduledtransaction']
    );

    Route::post(
        '/useraddscheduledtransactionlogic',
        [UserController::class, 'Addscheduledtransactionlogic']
    );

    Route::get(
        '/usereditscheduledtransaction/{id}',
        [UserController::class, 'Editscheduledtransaction']
    );

    Route::post(
        '/userupdatescheduledtransaction/{id}',
        [UserController::class, 'Updatescheduledtransaction']
    );

    Route::get(
        '/userdeletescheduledtransaction/{id}',
        [UserController::class, 'Deletescheduledtransaction']
    );

    Route::get(
        '/usertogglescheduledtransaction/{id}',
        [UserController::class, 'Togglescheduledtransaction']
    );

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {

        if (auth()->user()->userrole == 'admin') {
            return redirect('/allcategories');
        }

        if (auth()->user()->userrole == 'student') {
            return redirect('/userdashboard');
        }

        return redirect('/login');

    })->name('dashboard');

});


