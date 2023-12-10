<?php

// use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
Route::controller(OrderController::class)->group(function(){
    Route::post('createOrder','insertOrder');
    Route::put('updateOrder','updateOrder');
    Route::delete('deleteOrder','deleteOrder');
});

Route::controller(ProductsController::class)->group(function(){
    Route::post('createProduct','insertProduct');
    Route::post('updateProduct','updateProduct');
    Route::post('deleteProduct','deleteProduct');
});

Route::get('/test',[TestController::class,'test']);