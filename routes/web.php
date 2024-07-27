<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PlayLevelController;
use App\Http\Controllers\PlayModeController;
use App\Http\Controllers\SportCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('user', UserController::class)->only('show');



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');


Route::resource('feeds', FeedController::class)->only(['store'])->middleware('auth');

Route::middleware(['auth', 'can:admin-access'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', SportCategoryController::class);
    Route::resource('play-levels', PlayLevelController::class);
    Route::resource('play-modes', PlayModeController::class);
});