<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    public function index()
    {     
        $Carts = Cart::paginate(15);
        // Lấy danh sách các mã khách hàng duy nhất từ giỏ hàng
        $uniqueCustomerIDs = Cart::distinct()->pluck('CusID');

        // Khởi tạo một mảng để lưu trữ mục đại diện cho mỗi mã khách hàng
        $representativeItems = [];

        // Duyệt qua từng mã khách hàng duy nhất
        foreach ($uniqueCustomerIDs as $customerID) {
            // Lấy một mục đại diện từ giỏ hàng cho mỗi mã khách hàng
            $representativeItem = Cart::where('CusID', $customerID)->first();

            // Thêm mục đại diện này vào mảng
            $representativeItems[] = $representativeItem;
        }

        return view('admin.cart.index', compact('representativeItems','Carts'));
    }



    public function show(string $CartID)
    {
        $cart = Cart::where('CartID', $CartID)->first();

        if (!$cart) {
            return abort(404); // Trả về trang lỗi 404 nếu không tìm thấy giỏ hàng với CartID tương ứng
        }

        $CusID = $cart->CusID;
        $ProID = $cart->ProID;
        $Quantity = $cart->Quantity;
        $Price = $cart->Price;
        $Status = $cart->Status;
        $created_at = $cart->created_at;
        $updated_at = $cart->updated_at;
        $ProName = $cart->ProName;
        return view('admin.cart.detail', compact('cart', 'CartID', 'CusID', 'ProID', 'Quantity', 'Price', 'Status', 'created_at', 'updated_at','ProName',));
    } 
    public function showCustomerCartDetail($CusID)
    {
        // Lấy tất cả sản phẩm trong giỏ hàng của khách hàng có mã $CusID
        $customerCartItems = Cart::where('CusID', $CusID)->get();

        return view('admin.cart.detail', compact('customerCartItems'));
    }

}
