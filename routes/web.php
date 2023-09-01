<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function(){
    return view('welcome');
})->name('home');

Route::get('register', [UserController::class, 'register'])->name('user.register');
Route::post('user/postregister', [UserController::class, 'postRegister'])->name('user.postRegister');

Route::get('login', [UserController::class, 'login'])->name('user.login');
Route::post('user/login', [UserController::class, 'postLogin'])->name('user.postLogin');


Route::get('admin/register', [AdminUserController::class, 'register'])->name('admin.register');
Route::post('admin/register', [AdminUserController::class, 'postRegister'])->name('admin.postRegister');

Route::get('admin/login', [AdminUserController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminUserController::class, 'postLogin'])->name('admin.postLogin');


Route::get('list', [UserController::class, 'index'])->name('all.user.list');
