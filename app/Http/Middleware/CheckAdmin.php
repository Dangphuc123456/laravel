<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra nếu người dùng là admin
        if (Auth::check() && Auth::user()->role === 'employee') {
            return $next($request);
        }

        // Nếu không phải admin, chuyển hướng ra ngoài
        Auth::logout();
        return redirect()->route('admin.login')->withErrors('Bạn phải là admin để truy cập trang này.');
    }
}

