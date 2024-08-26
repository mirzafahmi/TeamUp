<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->route('user');
        $feed = $request->route('feed');

        if ($user && auth()->user() != $user) {
            abort(403);
        }

        if ($feed && auth()->user()->id != $feed->user_id) {
            abort(403);
        }

        return $next($request);
    }
}
