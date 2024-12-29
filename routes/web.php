<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
// Define the route for adding news
Route::get('/news/add', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/add', [NewsController::class, 'store'])->name('news.add');

// Update the route for deleting news
Route::delete('/news/delete/{id}', [NewsController::class, 'destroy'])->name('news.delete');
// Show login form (GET request)
Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('auth.login');

// Handle login submission (POST request)
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.submit');
