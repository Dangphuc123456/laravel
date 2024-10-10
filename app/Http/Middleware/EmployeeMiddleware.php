<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'employee') {
            return $next($request);
        }

        return redirect()->route('admin.login')->withErrors(['error' => 'Bạn không có quyền truy cập vào trang quản trị.']);
    }
}

