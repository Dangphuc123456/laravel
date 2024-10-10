<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCustomer
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra nếu người dùng là khách hàng
        if (Auth::check() && Auth::user()->role === 'customer') {
            return $next($request);
        }

        // Nếu không phải khách hàng, chuyển hướng ra ngoài
        Auth::logout();
        return redirect()->route('login')->withErrors('Bạn phải là khách hàng để truy cập trang này.');
    }
}

