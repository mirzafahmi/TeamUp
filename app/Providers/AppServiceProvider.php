<?php

namespace App\Providers;

use App\Http\Controllers\BadgeController;
use App\Models\Comment;
use App\Models\Feed;
use App\Models\User;
use App\Services\BadgeService;
use Filament\Facades\Filament;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BadgeService::class, function ($app) {
            return new BadgeService(new BadgeController());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        Request::setTrustedProxies(['0.0.0.0/0'], Request::HEADER_X_FORWARDED_AWS_ELB);

        Filament::registerNavigationGroups([
            'Feed Settings',
            'Play Settings',
            'Sport Settings',
            'User Settings',
        ]);

        Gate::define('admin-access', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('feed-owner', function (User $user, Feed $feed) {
            return $user->id == $feed->user_id;
        });

        Gate::define('profile-owner', function (User $authUser, User $targetUser) {
            return $authUser->id == $targetUser->id;
        });

        Gate::define('comment-owner', function (User $user, Comment $comment) {
            return $user->id == $comment->user_id;
        });
        
        Paginator::useBootstrapFive();
    }
}
