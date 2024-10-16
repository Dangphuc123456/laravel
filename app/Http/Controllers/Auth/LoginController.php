<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate user input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Get login credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();
        
            if ($user->role === 'employee') {
                return redirect()->route('admin.index')->with('success', 'Đăng nhập thành công với vai trò Admin.');
            } elseif ($user->role === 'customer') {
                return redirect()->intended('/')->with('success', 'Đăng nhập thành công với vai trò khách hàng.');
            }
        }
        
        // Nếu không có điều kiện nào được thoả mãn, bạn có thể bị chuyển hướng trở lại trang đăng nhập
        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
    }        

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function addToCart(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            // Người dùng đã đăng nhập, cho họ thêm sản phẩm vào giỏ hàng
            // Thực hiện logic thêm sản phẩm vào giỏ hàng ở đây
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
        } else {
            // Người dùng chưa đăng nhập, điều hướng đến trang đăng nhập với thông báo
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    }
}
