<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'postLogin']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::post('users/{user}/change-password', [UserController::class, 'changePassword']);
    Route::post('users', [UserController::class, 'store']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
    // Route::post('product', [ProductController::class, 'addProduct']);
    // Route::patch('product', [ProductController::class, 'updateProduct']);
    // Route::delete('product', [ProductController::class, 'deleteProduct']);
});
