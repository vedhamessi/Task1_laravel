<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Register Routes
Route::get('/', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'customer_registration']);
Route::post('/emailCheck', [RegisterController::class, 'checkEmail']);

// Admin Dashboard Routes
Route::get('/login', [AdminController::class, 'index'])->name('login');
Route::post('/login_process', [AdminController::class, 'login_process']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/users', [AdminController::class, 'Users'])->name('users');
Route::get('/user/{id}', [AdminController::class, 'get_user_by_id']);
Route::post('/user/edit/{id}', [AdminController::class, 'edit_user_by_id']);
Route::get('/logout', [AdminController::class, 'logout']);