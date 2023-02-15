<?php

use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\AttendanceController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("auth.login");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(DashboardController::class)->middleware('auth')->group(function(){
    Route::get('/admin-dashboard','index')->name('admin.dashboard');
    Route::get('/admin-logout','destroy')->name('admin.logout');
});

Route::controller(AdminProfileController::class)->middleware('auth')->group(function(){
    Route::get('/admin-profile','create')->name('admin.profile');
    Route::post('/update-profile/{id}','update')->name('admin.update');
    Route::get('/edit-password','createPass')->name('admin.password');
    Route::post('/update-password','updatePass')->name('update.password');
    Route::post('/create-employee','createEmployee')->name('create.employee');
});

Route::controller(EmployeeController::class)->middleware('auth','role:Admin')->group(function(){

    // employee lists
    Route::get('/create-employee','createEmployee')->name('create.employee');
    Route::get('/employee-lists','employeeLists')->name('employee.lists');
    Route::get('/edit-employee-data/{id}','editEmployee')->name('employee.edit');
    Route::post('/update-employee-data/{id}','updateEmployee')->name('employee.update');
    Route::get('/employee-status/{id}','statusEmployee')->name('employee.status');
    Route::get('/employee-delete/{id}','deleteEmployee')->name('employee.delete');

    // empployee deatails
    Route::get('/employee-details','employeeDeatils')->name('employee.details');
    Route::post('/employee-details-edit/{id}','employeeDeatilsEdit')->name('employee.details.edit');
    Route::get('/create-employee-details','createDetails')->name('create.employee.details');
    Route::post('/store-employee-details','store')->name('store-employee-details');
    Route::get('/employe-details-update/{id}', 'employeUpdate')->name('employe-details-update');
    Route::post('/employe-details-delete/{id}', 'employeDelete')->name('employee.detail.delete');

    // employee contact
    Route::get('/create-contact','createContact')->name('create.contact');
    Route::post('/store-contact-data','storeContact')->name('store-employee-contact');
    Route::get('/contact-lists','ContactLists')->name('employee-contact-lists');
    Route::get('/employee-contact-edit/{id}','ContactEdit')->name('employe-contact-edit');
    Route::post('/update-contact-data/{id}','updateContact')->name('update-employee-contact');
    Route::post('/contact-delete/{id}','deleteContact')->name('employee.contact.delete');

    // search 

    Route::get('/search-employee', 'searchEmployyee')->name('search.employee');

});

Route::controller(AttendanceController::class)->middleware('auth')->group(function(){
    Route::get('/add-attendance', 'addAttendance')->name('add.attendance');
    Route::get('/store-attendance', 'storeAttendance')->name('store.attendance');
    Route::get('/store-out-time-attendance', 'storeOutTimeAttendance')->name('store.outTime.attendance');
    Route::get('/attendance-lists', 'attendanceLists')->name('attendance.lists');
    Route::get('/attend-lists', 'attendLists')->name('atten.lists');
});
Route::controller(AuthController::class)->group(function(){
    Route::get('/sign-in','login')->name('admin.login');
    Route::get('/sign-up','register')->name('admin.register');
    Route::get('/google/login','googleLogin' )->name('Google.login');
    Route::get('/google/redricet','googleRedricet')->name('Google.redricet');
});

require __DIR__.'/auth.php';
