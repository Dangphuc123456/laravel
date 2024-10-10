<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Odetail;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrdersController extends Controller
{
    public function index()
    {
        // Lấy người dùng đang đăng nhập
        $user = Auth::user();

        if ($user) {
            // Lấy tất cả các đơn hàng của người dùng hiện tại từ CSDL
            $orders = OrderModel::whereHas('customer', function ($query) use ($user) {
                $query->where('username', $user->username);
            })->get();

            // Trả về view và truyền biến $orders vào view
            return view('User.orders.index', compact('orders'));
        } else {
            // Xử lý trường hợp người dùng không đăng nhập (nếu cần)
            // Ví dụ: điều hướng người dùng đến trang đăng nhập
            return redirect()->route('login');
        }
    }

    public function getOrderDetail($ordID)
    {
        // Lấy thông tin đơn hàng từ OrderModel
        $order = OrderModel::findOrFail($ordID);

        // Lấy danh sách các chi tiết đơn hàng từ orderdetail có cùng OrdID
        $orderDetails = Odetail::where('OrdID', $ordID)->get();
        

        // Trả về view và truyền các dữ liệu cần thiết
        return view('User.orders.detail', [
            'order' => $order,
            'orderDetails' => $orderDetails,
        ]);
    }
}
