<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckOwnerMiddleware;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventLocationController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\CheckBadges;
use App\Http\Middleware\DeviceDetection;
use App\Http\Controllers\UserController;

Route::get('/', [FeedController::class, 'index'])->name('index')->middleware(['auth', 'verified', DeviceDetection::class, CheckBadges::class]);

Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', CheckBadges::class])->name('profile');

Route::resource('users', UserController::class)
    ->only(['edit', 'update', 'destroy'])
    ->middleware(['auth', CheckOwnerMiddleware::class]);    
Route::resource('users', UserController::class)->only('show');

Route::resource('feeds', FeedController::class)->middleware(['auth', CheckOwnerMiddleware::class]);
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

require __DIR__.'/auth.php';
