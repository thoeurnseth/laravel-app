<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;

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
    return view('dashboard');
});

// Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',            [DashboardController::class,'adminDashboard']);
    Route::get('/product',              [ProductController::class,  'product']);
    Route::get('/category',             [CategoryController::class, 'Category']);
    Route::get('/category',             [CategoryController::class, 'ListCategory']);
    Route::POST('/create-category',     [CategoryController::class, 'CreateCategory']);
    Route::POST('/update-category',     [CategoryController::class, 'UpdateCategory']);
    Route::POST('/delete-category',     [CategoryController::class, 'DeleteCategory']);

    Route::get('/orders',               [OrdersController::class,   'Orders']);
// });