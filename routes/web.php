<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventLocationController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\CheckBadges;
use App\Http\Middleware\CheckOwner;
use App\Http\Middleware\DeviceDetection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [FeedController::class, 'index'])->name('index')->middleware([DeviceDetection::class, CheckBadges::class]);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', CheckBadges::class])->name('profile');

Route::resource('users', UserController::class)->only('edit', 'update')->middleware(['auth', CheckOwner::class]);    
Route::resource('users', UserController::class)->only('show');

Route::resource('feeds', FeedController::class)->middleware(['auth', CheckOwner::class]);
Route::resource('feeds', FeedController::class)->only('show');

Route::resource('comments', CommentController::class)->only('store', 'update', 'destroy')->middleware('auth');

Route::resource('event-locations', EventLocationController::class)->only('show')->middleware('auth');

Route::get('/search', [SearchController::class, 'show'])->name('search.results')->middleware('auth');
Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index')->middleware('auth');

Route::get('/under-construction', function () {
    return view('components.under-constructions');
})->middleware('auth')->name('under-constructions');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/sports', function () {
        return view('components.under-constructions');
    })->middleware('auth')->name('sports.index');

    Route::get('/community', function () {
        return view('components.under-constructions');
    })->middleware('auth')->name('community.index');

    Route::get('/about', function () {
        return view('components.under-constructions');
    })->middleware('auth')->name('about.index');

    Route::get('/terms', function () {
        return view('components.under-constructions');
    })->middleware('auth')->name('terms.index');
});