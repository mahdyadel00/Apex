<?php

namespace App\Http\Middleware;

use App\Http\Resources\Api\v1\ErrorResource;
use Closure;
use Illuminate\Http\Request;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return ErrorResource|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->teacher?->is_approved || auth()->user()->user_type === 'admin') {
            return $next($request);
        }
        return ErrorResource::make(__('auth.not_approved'), 403);
    }
}
