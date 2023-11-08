<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\Auth\MeController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;

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

Route::post('/auth/register', [RegisterController::class, 'action'])->name('register');

Route::post('/auth/login', [LoginController::class, 'action'])->name('login');


Route::group(['middleware' => 'jwt.verify', 'prefix' => 'auth'], function () {
    Route::get('/me', [MeController::class, 'action'])->name('me');
    Route::post('/logout', [LogoutController::class, 'action'])->name('logout');
    Route::get('/users', [UserController::class, 'action']);
});
