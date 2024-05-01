<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

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




Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/prosesregister', [AuthController::class, 'prosesregister'])->name('auth.prosesregister');
Route::post('/auth/proseslogin', [AuthController::class, 'proseslogin'])->name('auth.proseslogin');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/newtask', [TaskController::class, 'create'])->name('task.create');;
Route::post('/newtask', [TaskController::class, 'store'])->name('task.store');
Route::get('/edittask/{task}', [TaskController::class, 'show'])->name(('task.show'));
Route::put('/edittask/{task}/update', [TaskController::class, 'update'])->name('task.update');
Route::delete('/{task}', [TaskController::class, 'destroy'])->name('task.destroy');


Route::group(['middleware', 'admin'], function () {
    Route::get('/tasksadmin', [TaskController::class, 'indexadmin'])->name('tasks.indexadmin');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
