<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/home', function () {
    return view('home');
});
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{task}', [TaskController::class, 'show']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
Route::patch('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::get('/tasks/{task}', [TaskController::class, 'show'])
    ->middleware('auth');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
    ->middleware('auth');

Route::put('/tasks/{task}', [TaskController::class, 'update'])
    ->middleware('auth');


Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
    ->middleware('auth');
