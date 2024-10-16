<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if (str_contains(url()->current(), '/admin') || str_contains(url()->current(), '/Admin')) {

            return 'admin/login-show';
        }else{
            return '/login';
        }
    }
}
