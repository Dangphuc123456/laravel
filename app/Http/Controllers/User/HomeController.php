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
    public function index(){
        $sp = ProductModels::all();
        $lsp = CategoryModels::all();
        $tt = TinTucModel::all();
        return view('User.home',compact('sp', 'lsp','tt'));
    }
    public function gioiThieu(){
        $gt = Gioithieu::all();
        return view('User.gioiThieu',compact('gt'));
    }


    public function tinTuc()
    {
        $tt = TinTucModel::all();
        return view('User.tinTuc', compact('tt'));
    }

    public function sanPham(){
        $sp = ProductModels::all();
        $sp = ProductModels::paginate(30);
        $lsp = CategoryModels::all();
        return view('User.sanPham',compact('sp', 'lsp'));
    }
    
    public function detail($ProID) {
        // Lấy thông tin sản phẩm
        $sp = DB::table('product')->where('ProID', $ProID)->first();
        $lsp = DB::table('category')->get();
        // Lấy thông tin các sản phẩm tương tự
        $similarProducts = DB::table('product')->where('CatID', $sp->CatID)->where('ProID', '!=', $ProID)->get();

        return view('User.detail', compact('sp','lsp', 'similarProducts'));
    }

    public function gioHang(Request $request) {
        $cart = $request->session()->get('Cart');
        return view('User.gioHang', compact('cart'));
    }

    
    public function thanhToan(){
        $sp = ProductModels::all();
        $lsp = CategoryModels::all();
        return view('User.thanhToan',compact('sp', 'lsp'));
    }
    
    
    public function showThankYouPage()
    {
        return view('User.Camon');
    }
    public function search(Request $request)
    {
        $product = ProductModels::where('ProName','like','%'.$request->key.'%')
                                  ->orwhere('Metatitle',$request->key)
                                  ->get();
        return view('User.search',compact('product'));                       
    }
    public function danhMuc($CatID){
        $lsp =CategoryModels::all();
        $loaisp = CategoryModels::where('CatID',$CatID)->first();
        $product = ProductModels::where('CatID', $loaisp->CatID)->get();
        return view('User.danhMuc',compact('product','lsp')); 
    }

    public function detailtinTuc($id)
    {
        // Tìm tin tức theo id
        $tinTuc = TinTuc::findOrFail($id);

        // Trả về view chi tiết tin tức với dữ liệu tin tức tìm được
        return view('User.chitiettintuc', compact('tinTuc'));
    }
    public function showContactForm()
    {
        $sp = ProductModels::all();
        $lsp = CategoryModels::all();
        $tt = TinTucModel::all();
        return view('User.contact',compact('sp', 'lsp','tt'));
    }
    public function storeContact(Request $request)
    {
        $emails = (array) $request->input('email');
        $messages = (array) $request->input('message');

        if (count($emails) !== count($messages)) {
            // Handle error if the number of emails does not match the number of messages
            return redirect()->back()->withErrors('Invalid data. Please make sure to fill in all fields.');
        }

        foreach ($emails as $index => $email) {
            $contact = new Contact();
            $contact->email = $email;
            $contact->message = $messages[$index];
            $contact->save();
        }

        return redirect()->route('contact.store');
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

}

