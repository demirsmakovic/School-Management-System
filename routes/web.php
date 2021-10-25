<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\UserController;
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
Route::prefix('setup')->group(function(){
    Route::get('/view_student', [StudentClassController::class, 'ViewStudent'])->name('view.student.class');
    Route::get('/add_class', [StudentClassController::class, 'ClassAdd'])->name('add.student.class');
    Route::post('/add_class', [StudentClassController::class, 'ClassStore'])->name('store.student.class');
    Route::get('/edit/{id}', [StudentClassController::class, 'ClassEdit'])->name('student.class.edit');
    Route::post('/update/{id}', [StudentClassController::class, 'ClassUpdate'])->name('student.class.update');
    Route::get('/delete/{id}', [StudentClassController::class, 'ClassDelete'])->name('student.class.delete');  
});
