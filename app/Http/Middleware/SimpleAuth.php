<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SimpleAuth
{
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        if (!session('login_as')) {
            return redirect()->route('login');
        }

        if ($role && session('login_as') !== $role) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
