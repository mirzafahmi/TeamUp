<?php

namespace App\Http\Middleware;

use App\Services\BadgeService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBadges
{
    protected $badgeService;

    public function __construct(BadgeService $badgeService)
    {
        $this->badgeService = $badgeService;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user) {
            $this->badgeService->checkAndAssignBadges($user->id);
        }

        return $next($request);
    }
}
