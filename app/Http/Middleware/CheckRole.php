<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // Middleware để kiểm tra người dùng đã đăng nhập chưa
    public function handle($request, Closure $next)
{
    if (Auth::check()) {
        if (Auth::user()->role === 'employee') {
            return $next($request);
        } else {
            return redirect('/'); // Redirect về trang khách hàng
        }
    }

    return redirect('/login'); // Redirect đến trang đăng nhập nếu không có người dùng nào đăng nhập
}

}
