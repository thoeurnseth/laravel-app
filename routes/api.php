<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::post('/login', [UserController::class,"login"]);
Route::post('/register', [UserController::class,"Register"]);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::post('/test', [UserController::class,"Test"]);
    // Route::post('/product_create',  [ProductController::class,"Product"]);
    // Route::post('/product_update',  [ProductController::class,"Product_Update"]);
    // Route::post('/product_delete',  [ProductController::class,"Product_Delete"]);
    // Route::post('/list_product',    [ProductController::class,"List_Product"]);
    // Route::post('/category_create', [CategoryController::class,"Category_create"]);
    // Route::post('/category_update', [CategoryController::class,"Category_Update"]);
    // Route::post('/category_delete', [CategoryController::class,"Category_Delete"]);
    // Route::post('/list_category',   [CategoryController::class,"List_Category"]);
});