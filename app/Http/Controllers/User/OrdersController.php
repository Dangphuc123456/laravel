<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\OrderModel;
use App\Models\User\ProductModels;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::where('UserName', $user->username)->first();

        if ($customer) {
            // Lấy tất cả các sản phẩm của khách hàng dựa trên UserName
            $carts = Cart::whereHas('customer', function ($query) use ($user) {
                $query->where('UserName', $user->username);
            })->get();

            // Lấy ngày mua hàng từ bảng orders
            $orderDates = OrderModel::where('CusID', $customer->CusID)->pluck('OrderDate')->toArray();
        } else {
            $carts = collect(); // Empty collection
            $orderDates = [];
        }

        return view('User.orders.index', compact('carts', 'customer', 'orderDates'));
    }
}
