<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\User\ProductModels;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Odetail;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    public function gioHang()
    {
        // Lấy dữ liệu giỏ hàng từ phiên
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('User.gioHang', compact('cart', 'total'));
        // Chuyển dữ liệu giỏ hàng đến chế độ xem để kết xuất
    }
    public function addToCart(Request $request, $id)
{
    // Bước 1: Lấy thông tin SP từ cơ sở dữ liệu
    $sp = ProductModels::find($id);

    // Bước 2: Xác thực nếu SP tồn tại và có sẵn
    if (!$sp) {
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
    }

    // Ở đây bạn có thể thêm xác thực bổ sung nếu cần, ví dụ, kiểm tra xem SP có trong kho

    // Bước 3: Xác định giá sản phẩm dựa trên giảm giá nếu có
    $price = $sp->Discount > 0 ? $sp->DiscountedPrice : $sp->price;

    // Bước 4: Lấy số lượng từ request
    $quantity = $request->input('quantity', 1); // Mặc định là 1 nếu không có số lượng

    // Bước 5: Thêm SP vào phiên giỏ hàng
    $cart = session()->get('cart');

    // Nếu giỏ hàng trống, thì đây là sản phẩm đầu tiên
    if (!$cart) {
        $cart = [
            $id => [
                "name" => $sp->ProName,
                "quantity" => $quantity, // Sử dụng số lượng từ input
                "price" => $price, // Sử dụng giá đã giảm nếu có
                "image" => $sp->ProImage
            ]
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    // Nếu SP đã ở trong giỏ hàng, hãy tăng số lượng
    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += $quantity; // Tăng số lượng bằng giá trị từ input
        $cart[$id]['price'] = $price; // Đảm bảo giá được cập nhật nếu có giảm giá
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm và số lượng đã được thêm vào giỏ hàng.');
    }

    // Nếu SP không có trong giỏ hàng, hãy thêm nó vào giỏ hàng
    $cart[$id] = [
        "name" => $sp->ProName,
        "quantity" => $quantity, // Sử dụng số lượng từ input
        "price" => $price, // Sử dụng giá đã giảm nếu có
        "image" => $sp->ProImage
    ];
    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
}



    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
        if (!isset($cart[$id])) {
            return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
        }

        // Cập nhật số lượng trong session
        $cart[$id]['quantity'] = $request->input('quantity');
        session()->put('cart', $cart);

        // Tính toán giá mới cho sản phẩm
        $newTotalPrice = $cart[$id]['quantity'] * $cart[$id]['price'];

        // Tính toán tổng giỏ hàng mới
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }

        // Trả về số lượng và tổng giá mới
        return response()->json(['quantity' => $cart[$id]['quantity'], 'total' => $newTotalPrice, 'cartTotal' => $cartTotal]);
    }


    public function showCart()
    {
        // Lấy dữ liệu giỏ hàng từ phiên
        $cart = session()->get('cart');

        // Nếu giỏ hàng trống, trả về chế độ xem với giỏ hàng rỗng
        if (!$cart) {
            return view('cart')->with('cart', []);
        }

        // Lấy các chi tiết sản phẩm cho từng mặt hàng trong giỏ hàng
        $cartWithData = [];
        foreach ($cart as $id => $item) {
            $sp = ProductModels::find($id);
            if ($sp) {
                // Thu thập tất cả thông tin sản phẩm cần thiết
                $spInfo = [
                    'ProID' => $sp->ProID,
                    'ProName' => $sp->ProName,
                    'ProDescription' => $sp->ProDescription,
                    'ProImage' => $sp->ProImage,
                    'price' => $sp->price,
                    'Discount' => $sp->Discount,
                    'DiscountedPrice' => $sp->DiscountedPrice,
                    'quantity' => $item['quantity'],
                    'total' => $item['quantity'] * ($sp->Discount > 0 ? $sp->DiscountedPrice : $sp->price),
                ];

                // Thêm thông tin sản phẩm vào giỏ hàng với mảng dữ liệu
                $cartWithData[] = $spInfo;
            }
        }

        // Chuyển dữ liệu giỏ hàng đến chế độ xem để kết xuất
        return view('cart')->with('cart', $cartWithData);
    }

    public function getCartCount()
    {
        // Assuming you are using a session or authenticated user to store cart information
        $count = 0;

        // Check if the cart session exists and count the number of items
        if (session()->has('cart')) {
            $count = array_sum(array_column(session('cart'), 'quantity')); // Assuming 'quantity' holds the number of each product
        }

        return response()->json(['count' => $count]);
    }


    public function removeFromCart($id)
    {
        // Nhận cart từ phiên
        $cart = session()->get('cart');

        // Kiểm tra xem mặt hàng có tồn tại trong giỏ hàng không
        if (isset($cart[$id])) {
            // Xóa vật phẩm khỏi giỏ hàng
            unset($cart[$id]);

            // Cập nhật phiên giỏ hàng với giỏ hàng đã sửa đổi
            session()->put('cart', $cart);

            // Tùy chọn, bạn có thể trả lại phản hồi hoặc chuyển hướng đến trang giỏ hàng
            return redirect()->route('gioHang')->with('success', '.');
        }

        // Nếu mặt hàng không tồn tại trong giỏ hàng, hãy trả về với thông báo lỗi hoặc chuyển hướng đến trang giỏ hàng
        return redirect()->route('gioHang')->with('error', '.');
    }


    public function thanhToan()
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart');

        // Nếu giỏ hàng không tồn tại hoặc trống, chuyển hướng trở lại trang giỏ hàng
        if (!$cart || empty($cart)) {
            return redirect()->route('gioHang')->with('error', 'Giỏ hàng của bạn trống.');
        }

        // Tính tổng tiền từ giỏ hàng
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Truyền dữ liệu giỏ hàng và tổng tiền vào view và hiển thị trang thanh toán
        return view('User.thanhToan', compact('cart', 'totalPrice'));
    }
    public function store(Request $request)
    {
        // Truy xuất người dùng được xác thực
        $user = Auth::user();

        // Kiểm tra xem người dùng có được xác thực không
        if ($user) {
            // Tạo một thể hiện mới của mô hình khách hàng
            $customer = new Customer();

            // gán giá trị từ yêu cầu
            $customer->CusName = $request->name;
            $customer->CusEmail = $request->email;
            $customer->CusAddress = $request->address;
            $customer->CusPhone = $request->phone;

            // liên kết tên người dùng từ người dùng được xác thực
            $customer->UserName = $user->username; // Giả sử trường tên người dùng trong bảng người dùng

            // Lưu dữ liệu khách hàng
            $customer->save();

            // Nhận DateTime hiện tại
            $currentDateTime = Carbon::now()->toDateTimeString();


            // Lưu các mặt hàng xe đẩy vào bảng giỏ hàng
            $cartItems = $request->input('products', []);
            foreach ($cartItems as $id => $details) {
                $cartData = [
                    'CusID' => $customer->CusID,
                    'ProID' => $details['id'],
                    'Quantity' => $details['quantity'],
                    'Price' => $details['price'],
                    'Status' => 1, // hoặc 0 tùy thuộc vào trạng thái đặt hàng
                    'created_at' => $currentDateTime,
                    'updated_at' => $currentDateTime,
                    'ProName' => $details['name'], // Giả sử tên sản phẩm cần được lưu
                ];
                Cart::create($cartData);
            }

            $order = new OrderModel();
            $order->CusID = $customer->CusID;
            $order->Name = $request->input('name');
            $order->OrderDate = date('Y-m-d');
            $order->Status = 'Đang chờ xử lý';
            $order->Address = $request->input('address');
            $order->Phone = $request->input('phone');
            $order->MoneyTotal = $request->input('totalPrice'); // Cần kiểm tra xem totalPrice có truyền từ view không
            $order->Email = $request->input('email');
            $order->Payment = $request->input('payment');
            $order->Note = $request->input('note');
            $order->save();

            // Lưu chi tiết đơn hàng vào bảng orderdetail
            // Lấy OrdID của đơn hàng mới tạo
            $order = $order->OrdID;

            // Lưu chi tiết đơn hàng vào bảng orderdetail
            $cartItems = $request->input('products', []);

            foreach ($cartItems as $id => $details) {
                $orderDetail = new Odetail();
                $orderDetail->OrdID = $order;
                $orderDetail->ProID = $details['id'];
                $orderDetail->Quantity = $details['quantity'];
                $orderDetail->Price = $details['price'];
                // Lưu thêm ảnh và tên sản phẩm
                $orderDetail->ProImage = isset($details['image']) ? $details['image'] : null;
                $orderDetail->ProName = isset($details['name']) ? $details['name'] : null;
                $orderDetail->save();
            }

            // Xóa phiên giỏ hàng sau khi thanh toán
            session()->forget('cart');

            $cart = $cartItems;
            $totalPrice = $request->input('totalPrice');
            return view('User.thongtin', compact('customer', 'cart', 'totalPrice', 'order'));
            // Chuyển hướng hoặc trả lời trả lời khi cần
        } else {
        }
    }
    public function thongtin($OrdID)
    {
        return view('User.thongtin',);
    }

    public function showConfirmation($OrdID)
    {
        $order = OrderModel::findOrFail($OrdID);
        // Hiển thị view với thông tin đơn hàng và trạng thái xác nhận
        return view('User.thongtin', compact('order'));
    }
}
