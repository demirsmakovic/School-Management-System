<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\UserController;
use App\Models\FeeCategory;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


//User Controller
Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

});

//Profile Controller
Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/edit', [ProfileController::class, 'ProfileUpdate'])->name('profile.update');
    Route::get('/password/change', [ProfileController::class, 'PasswordChange'])->name('password.change');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');  
});

//Student Class Route
Route::prefix('setups')->group(function(){
    Route::get('/student_class/view_student', [StudentClassController::class, 'ViewStudent'])->name('view.student.class');
    Route::get('/student_class/add_class', [StudentClassController::class, 'ClassAdd'])->name('add.student.class');
    Route::post('/student_class/add_class', [StudentClassController::class, 'ClassStore'])->name('store.student.class');
    Route::get('/student_class/edit/{id}', [StudentClassController::class, 'ClassEdit'])->name('student.class.edit');
    Route::post('/student_class/update/{id}', [StudentClassController::class, 'ClassUpdate'])->name('student.class.update');
    Route::get('/student_class/delete/{id}', [StudentClassController::class, 'ClassDelete'])->name('student.class.delete');  
});

//Student Year Route
Route::prefix('setups')->group(function(){
    Route::get('/student_year/view_year', [StudentYearController::class, 'ViewStudentYear'])->name('view.student.year');
    Route::get('/student_year/add_year', [StudentYearController::class, 'StudentYearAdd'])->name('add.student.year');
    Route::post('/student_year/add_year', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');
    Route::get('/student_year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::post('/student_year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');
    Route::get('/student_year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');  
});

//Student Group Route
Route::prefix('setups')->group(function(){
    Route::get('/student_group/view_group', [StudentGroupController::class, 'ViewStudentGroup'])->name('view.student.group');
    Route::get('/student_group/add_group', [StudentGroupController::class, 'StudentGroupAdd'])->name('add.student.group');
    Route::post('/student_group/add_group', [StudentGroupController::class, 'StudentGroupStore'])->name('store.student.group');
    Route::get('/student_group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
    Route::post('/student_group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');
    Route::get('/student_group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');  
});

//Student Shift Route
Route::prefix('setups')->group(function(){
    Route::get('/student_shift/view_shift', [StudentShiftController::class, 'ViewStudentShift'])->name('view.student.shift');
    Route::get('/student_shift/add_shift', [StudentShiftController::class, 'StudentShiftAdd'])->name('add.student.shift');
    Route::post('/student_shift/add_shift', [StudentShiftController::class, 'StudentShiftStore'])->name('store.student.shift');
    Route::get('/student_shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
    Route::post('/student_shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');
    Route::get('/student_shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');  
});


//Fee Category Route
Route::prefix('setups')->group(function(){
    Route::get('/fee_category/view_fee_category', [FeeCategoryController::class, 'ViewFeeCategory'])->name('view.fee_category');
    Route::get('/fee_category/add_fee_category', [FeeCategoryController::class, 'FeeCategoryAdd'])->name('add.fee_category');
    Route::post('/fee_category/add_fee_category', [FeeCategoryController::class, 'FeeCategoryStore'])->name('store.fee_category');
    Route::get('/fee_category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee_category.edit');
    Route::post('/fee_category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('fee_category.update');
    Route::get('/fee_category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee_category.delete');  
});

//Fee Amount Route
Route::prefix('setups')->group(function(){
    Route::get('/fee_amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('view.fee.amount');
    Route::get('/fee_amount/add', [FeeAmountController::class, 'FeeAmountAdd'])->name('add.fee.amount');
    Route::post('/fee_amount/add', [FeeAmountController::class, 'FeeAmountStore'])->name('store.fee.amount');
    Route::get('/fee_amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee_amount.edit');
    Route::post('/fee_amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('fee_amount.update');
    Route::get('/fee_amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee_amount.details');
});