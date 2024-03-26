<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogsPdfController;
use App\Http\Controllers\SettingsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});
// Route::get('logs', [LogsPdfController::class, 'index']);

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
// roles endpoints
    Route::get('/roles', [RoleController::class, 'index']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    Route::put('/roles/{id}', [RoleController::class, 'update']);
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

// users endpoints
    Route::get('/users', [UserController::class,'index']);
    Route::post('/users', [UserController::class,'store']);
    Route::get('/users/{id}', [UserController::class,'showSingleUser']);
    Route::put('/users/{id}', [UserController::class,'update']);
    Route::delete('/users/{id}', [UserController::class,'destroy']);

//
    Route::put('/settings/{key}', [SettingsController::class, 'update']);
    Route::get('/settings/{key}', [SettingsController::class, 'get']);

});


// Route::post('/register', 'AuthController@register');

// Route::post('/login', 'AuthController@login');
