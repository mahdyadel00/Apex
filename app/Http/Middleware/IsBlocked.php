<?php

namespace App\Http\Middleware;

use App\Http\Resources\Api\v1\ErrorResource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsBlocked
{
    public function handle(Request $request, Closure $next)
    {
            if (auth()->user()->is_blocked) {
                return ErrorResource::make(__('auth.blocked'), 403);
            }
            return $next($request);
    }
}
