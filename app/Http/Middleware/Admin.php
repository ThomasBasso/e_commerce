<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()){
            return  redirect()->route('login');
        }

        $userRole = Auth::user()->userType;

        if ($userRole=='admin') {
            return $next($request);
        }

        elseif ($userRole=='user') {
            return redirect()->route('catalog.index');
        }

        return redirect()->route('dashboard');

    }
}
