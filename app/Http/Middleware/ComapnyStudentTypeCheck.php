<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Api\v1\ErrorResource;
use Symfony\Component\HttpFoundation\Response;

class ComapnyStudentTypeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {


            if(Auth::guard('company')->user()->type  == 'student'){
                return $next($request);
            }
            abort(404);



    }
}
