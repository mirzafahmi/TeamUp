<?php

namespace App\Providers;

use App\Models\Feed;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin-access', function (User $user) {
            return $user->is_admin == 1;
        });

        Gate::define('feed-owner', function (User $user, Feed $feed) {
            return $user->id == $feed->user_id;
        });

        Gate::define('profile-owner', function (User $authUser, User $targetUser) {
            return $authUser->id == $targetUser->id;
        });

        Paginator::useBootstrapFive();
    }
}
