<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PlayLevelController;
use App\Http\Controllers\PlayModeController;
use App\Http\Controllers\PlayRoleController;
use App\Http\Controllers\SportCategoryController;
use App\Http\Middleware\CheckOwner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [FeedController::class, 'index'])->name('index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::resource('users', UserController::class)->only('edit', 'update')->middleware(['auth', CheckOwner::class]);    
Route::resource('users', UserController::class)->only('show');

Route::resource('feeds', FeedController::class)->middleware(['auth', CheckOwner::class]);
Route::resource('feeds', FeedController::class)->only('show');

Route::middleware(['auth', 'can:admin-access'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', SportCategoryController::class);
    Route::resource('play-levels', PlayLevelController::class);
    Route::resource('play-modes', PlayModeController::class);
    Route::resource('play-roles', PlayRoleController::class);
});