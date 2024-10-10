<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\TinTuc;
use App\Models\User\CategoryModels;
use App\Models\User\ProductModels;
use App\Models\User\TinTucModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Gioithieu;
use App\Models\OrderModel;
use App\Models\OrderCart;
use Termwind\Components\Raw;

class HomeController extends Controller
{
    public function index()
    {
        $sp = ProductModels::all();
        $lsp = CategoryModels::all();
        $tt = TinTucModel::all();
        $bestSellingProducts = ProductModels::orderBy('sold', 'desc')
            ->take(6)
            ->get();
        return view('User.home', compact('sp', 'lsp', 'tt', 'bestSellingProducts'));
    }
    public function gioiThieu()
    {
        $gt = Gioithieu::all();
        return view('User.gioiThieu', compact('gt'));
    }

    public function lienHe()
    {
        return view('User.lienHe');
    }
    public function tinTuc()
    {
        $tt = TinTucModel::all();
        $lsp = CategoryModels::all();
        $bestSellingProducts = ProductModels::orderBy('sold', 'desc')
            ->take(6)
            ->get();
        return view('User.tinTuc', compact('tt','lsp', 'bestSellingProducts'));
    }

    public function sanPham()
    {
        $sp = ProductModels::all();
        $sp = ProductModels::paginate(30);
        $lsp = CategoryModels::all();
        $bestSellingProducts = ProductModels::orderBy('sold', 'desc')
            ->take(6)
            ->get();
        return view('User.sanPham', compact('sp', 'lsp', 'bestSellingProducts'));
    }

    public function detail($ProID)
    {
        // Lấy thông tin sản phẩm
        $sp = DB::table('product')->where('ProID', $ProID)->first();
        $lsp = DB::table('category')->get();
        // Lấy thông tin các sản phẩm tương tự
        $similarProducts = DB::table('product')->where('CatID', $sp->CatID)->where('ProID', '!=', $ProID)->get();
        $bestSellingProducts = ProductModels::orderBy('sold', 'desc')
            ->take(6)
            ->get();
        return view('User.detail', compact('sp', 'lsp', 'similarProducts','bestSellingProducts'));
    }

    public function gioHang(Request $request)
    {
        // Lấy dữ liệu giỏ hàng từ session
        $cart = $request->session()->get('Cart');
        return view('User.gioHang', compact('cart'));
    }


    public function thanhToan()
    {
        $sp = ProductModels::all();
        $lsp = CategoryModels::all();
        return view('User.thanhToan', compact('sp', 'lsp'));
    }


    // public function showThankYouPage()
    // {
    //     return view('User.Camon');
    // }
    public function search(Request $request)
    {
        $key = $request->key;
        $product = ProductModels::where('ProName', 'like', '%' . $key . '%')
            ->orWhere('Metatitle', 'like', '%' . $key . '%');

        // Nếu giá trị tìm kiếm là một số, thêm điều kiện tìm kiếm theo giá
        if (is_numeric($key)) {
            $product = $product->orWhere('Price', $key)
                ->orWhere('ProID', $key);
        }

        $product = $product->get();
        $lsp = CategoryModels::all();
        $bestSellingProducts = ProductModels::orderBy('sold', 'desc')
        ->take(6)
        ->get();
        return view('User.search', compact('product','lsp','bestSellingProducts'));
    }

    public function danhMuc($CatID)
    {
        $lsp = CategoryModels::all();
        $loaisp = CategoryModels::where('CatID', $CatID)->first(); //Lấy thông tin danh mục hiện tại
        $product = ProductModels::where('CatID', $loaisp->CatID)->get(); //Lấy các sản phẩm thuộc danh mục hiện tại
        $bestSellingProducts = ProductModels::orderBy('sold', 'desc')
            ->take(6)
            ->get();
        return view('User.danhMuc', compact('product', 'lsp', 'loaisp','bestSellingProducts'));
    }

    public function detailtinTuc($id)
    {
        // Tìm tin tức theo id
        $tinTuc = TinTuc::findOrFail($id);
        $lsp = CategoryModels::all();
        $bestSellingProducts = ProductModels::orderBy('sold', 'desc')
            ->take(6)
            ->get();
        // Trả về view chi tiết tin tức với dữ liệu tin tức tìm được
        return view('User.chitiettintuc', compact('tinTuc', 'lsp','bestSellingProducts'));
    }
    public function showContactForm()
    {
        $sp = ProductModels::all();
        $lsp = CategoryModels::all();
        $tt = TinTucModel::all();
        return view('User.contact', compact('sp', 'lsp', 'tt'));
    }

    public function storeContact(Request $request)
    {
        // Xác thực yêu cầu
        $request->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Tạo một thể hiện liên hệ mới
        $contact = new Contact();
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();


        return redirect()->route('contact')->with('success', 'Tin nhắn của bạn đã được gửi thành công.');
    }

    public function showCustomerOrders($UserName)
    {
        // Lấy thông tin khách hàng dựa vào UserName
        $customer = Customer::where('UserName', $UserName)->first();

        if (!$customer) {
            return abort(404); // Trả về trang lỗi 404 nếu không tìm thấy khách hàng với UserName tương ứng
        }

        // Lấy danh sách các đơn hàng của khách hàng
        $orders = OrderModel::where('CusID', $customer->CusID)->get();

        // Duyệt qua từng đơn hàng và lấy thông tin chi tiết
        foreach ($orders as $order) {
            $order->details = OrderCart::where('OrdID', $order->OrdID)->with('cart')->get();
        }

        return view('orders', compact('customer', 'orders'));
    }
    public function bestSelling()
    {
        // Retrieve the top 6 products with the highest sold count
        $bestSellingProducts = ProductModels::orderBy('sold', 'desc')
            ->take(6)
            ->get();

        // Pass the products to the view
        return view('home', ['bestSellingProducts' => $bestSellingProducts]);
    }
}
