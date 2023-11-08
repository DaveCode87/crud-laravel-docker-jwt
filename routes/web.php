<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('/auth/login');
});

Route::get('/welcome', function () {
    return view('/welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users');


Route::get('/todos', [TodoListController::class, 'index'])->name('todos.index');
Route::get('/todos/create', [TodoListController::class, 'create'])->name('todos.create');
Route::post('/todos', [TodoListController::class, 'store'])->name('todos.store');
Route::get('/todos/{id}/edit', [TodoListController::class, 'edit'])->name('todos.edit');
Route::put('/todos/{id}', [TodoListController::class, 'update'])->name('todos.update');
Route::delete('/todos/{id}', [TodoListController::class, 'destroy'])->name('todos.destroy');
