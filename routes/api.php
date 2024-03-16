<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
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
Route::group(["prefix" => "user"], function () {
    Route::post('/resign', [UserController::class, 'Resign_account'])->middleware('checkdouble');; //để dữ liệu ở Body->form data
    Route::get('/detail', [UserController::class, 'Get_user']); // để dữ liệu tại param
    Route::put('/update', [UserController::class, 'Update_user']); // để dữ liệu tại Body->raw (dạng Json)
    Route::delete('/delete', [UserController::class, 'Delete_user']); // để dữ liệU tại param
});
Route::group(["prefix" => "product"], function () {
    Route::post('/resign', [ProductController::class, 'Resign_product']); //để dữ liệu ở Body->form data
    Route::get('/detail', [ProductController::class, 'Get_product_detail']); // để dữ liệu tại param
    Route::put('/update', [ProductController::class, 'Update_product_detail']); // để dữ liệu tại Body->raw (dạng Json)
    Route::delete('/delete', [ProductController::class, 'Delete_product']); // để dữ liệU tại param
});