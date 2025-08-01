<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedSimple
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('login_as') === 'pegawai') {
            return redirect()->route('admin.dashboard');
        }

        if (session('login_as') === 'mitra') {
            return redirect()->route('mitra.dashboard');
        }

        return $next($request);
    }
}
