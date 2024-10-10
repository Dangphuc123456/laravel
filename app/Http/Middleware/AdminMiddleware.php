<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::user()->role === 'employee') {
            return $next($request);
        }

        return redirect()->route('admin.loginForm')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
