<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Home Page
Route::get('/home', [HomeController::class, 'home']);

// Product Page
Route::prefix('category')->group(function(){
    Route::get('/food-beverage', [ProductController::class, 'foodbeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beauty']);
    Route::get('/home-care', [ProductController::class, 'homecare']);
    Route::get('/baby-kid', [ProductController::class, 'baby']);
});

// User Page
Route::get('/user/{id?}/{name?}', [UserController::class, 'user']);

// Sales Page
Route::get('/sales', [SaleController::class, 'sales']);
