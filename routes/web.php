<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\User\UserController as UserUserController;
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


Route::name('auth.')->middleware('guest')->group(function() {
    // Login the user and Admin
    Route::get('/', [LoginController::class, 'getLogin'])->name('get-login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    //  Admin registration routes
    Route::get('/admin/register', [AdminRegisterController::class, 'getRegister'])->name('admin-register');
    Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('admin.register');

    // User registration routes
    Route::get('/user/register', [UserRegisterController::class, 'getRegister'])->name('user-register');
    Route::post('/user/register', [UserRegisterController::class,'register'])->name('user.register');
});

Route::get('logout', LogoutController::class)->middleware('auth')->name('auth.logout');
Route::name('dashboard.')->prefix('dashboard')->middleware('role:admin')->group(function () {
    Route::resource('users',UserController::class)->middleware('role:admin');
    Route::get('profile', ProfileController::class)->name('admin-profile')->middleware('role:admin');
});

Route::get('profile',UserUserController::class)->name('user.profile')->middleware('role:user');
