<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
], function(){
    Route::post('login-admin', [AuthController::class, 'login'])-> name('login');
    Route::post('register', [AuthController::class, 'register'])-> name('register');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('logout-admin', [AuthController::class, 'logout']);
    Route::get('users', [UserController::class, 'getUserData']);
});

Route::group([
    'middleware' => 'api',
], function(){
    Route::resources([
       'categories' => CategoryController::class,
       'sliders' => SliderController::class,
       'products' => ProductController::class,
       'banner' => BannerController::class,
    ]);

    Route::post('login', [AuthController::class, 'login']);
});


