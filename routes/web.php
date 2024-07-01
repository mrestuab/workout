<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

// VIEWS
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/products', function () {
    return view('products');
});
//Route::get('/product/{id}', [ProductController::class, 'detail']);
Route::get('/products/{id}', [ProductController::class, 'detail'])->name('product.detail');


// VIEWS ADMIN
Route::get('/login-admin', function () {
    return view('admin.login');
});
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard');
});
Route::get('/olahraga-admin', function () {
    return view('admin.olahraga');
});
Route::get('/tutorial-admin', function () {
    return view('admin.tutorial');
});
Route::get('/banner-admin', function () {
    return view('admin.banner');
});
Route::get('/user-admin', function () {
    return view('admin.user');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('logout-admin', [AuthController::class, 'logout_admin']);
