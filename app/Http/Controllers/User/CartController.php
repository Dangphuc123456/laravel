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
        // Retrieve the cart data from the session
        $cart = session()->get('cart', []);
        $total = 0;

        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('User.gioHang', compact('cart', 'total'));
        // Pass the cart data to the view for rendering
    }
    public function addToCart(Request $request, $id)
    {
        // Step 1: Retrieve the sp information from the database
        $sp = ProductModels::find($id);

        // Step 2: Validate if the sp exists and is available
        if (!$sp) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Here you can add additional validation if needed, for example, checking if the sp is in stock
        
        // Step 3: Add the sp to the cart session
        $cart = session()->get('cart');

        // If cart is empty, then this is the first sp
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $sp->ProName,
                    "quantity" => 1,
                    "price" => $sp->price,
                    "image" => $sp->ProImage
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
        }

        // If the sp is already in the cart, increase the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Sản phẩm và số lượng đã được thêm vào giỏ hàng .');
        }

        // If the sp is not in the cart, add it to the cart
        $cart[$id] = [
            "name" => $sp->ProName,
            "quantity" => 1,
            "price" => $sp->price,
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
        // Retrieve the cart data from the session
        $cart = session()->get('cart');

        // If cart is empty, return a message or handle it accordingly
        if (!$cart) {
            return view('cart')->with('cart', []);
        }

        // Retrieve the sp details for each item in the cart
        $cartWithData = [];
        foreach ($cart as $id => $item) {
            $sp = ProductModels::find($id);
            if ($sp) {
                // Collect all necessary sp information
                $spInfo = [
                    'ProID' => $sp->ProID,
                    'ProName' => $sp->ProName,
                    'ProDescription' => $sp->ProDescription,
                    'ProColor' => $sp->ProColor,
                    'Materials' => $sp->Materials,
                    'Size' => $sp->Size,
                    'ProImage' => $sp->ProImage,
                    'price' => $sp->price,
                    'quantity' => $item['quantity'],
                    'total' => $item['quantity'] * $sp->price,
                ];

                // Add sp information to the cartWithData array
                $cartWithData[] = $spInfo;
            }
        }

        // Pass the cart data to the view for rendering
        return view('cart')->with('cart', $cartWithData);
    }


    public function removeFromCart($id)
    {
        // Get the cart from the session
        $cart = session()->get('cart');

        // Check if the item exists in the cart
        if (isset($cart[$id])) {
            // Remove the item from the cart
            unset($cart[$id]);

            // Update the cart session with the modified cart
            session()->put('cart', $cart);

            // Optionally, you can return a response or redirect to the cart page
            return redirect()->route('gioHang')->with('success', 'Item removed from cart successfully.');
        }

        // If the item does not exist in the cart, return with an error message or redirect to the cart page
        return redirect()->route('gioHang')->with('error', 'Item not found in cart.');
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
            // Retrieve the authenticated user
            $user = Auth::user();

            // Check if the user is authenticated
            if ($user) {
                // Create a new instance of Customer model
                $customer = new Customer();

                // Assign values from the request
                $customer->CusName = $request->name;
                $customer->CusEmail = $request->email;
                $customer->CusAddress = $request->address;
                $customer->CusPhone = $request->phone;

                // Associate the username from the authenticated user
                $customer->UserName = $user->username; // Assuming the username field in the users table

                // Save the customer data
                $customer->save();

                // Get current datetime
                $currentDateTime = Carbon::now()->toDateTimeString();

               
                // Save cart items to Cart table
                $cartItems = $request->input('products', []);
                foreach ($cartItems as $id => $details) {
                    $cartData = [
                        'CusID' => $customer->CusID,
                        'ProID' => $details['id'],
                        'Quantity' => $details['quantity'],
                        'Price' => $details['price'],
                        'Status' => 1, // Or 0 depending on the order status
                        'created_at' => $currentDateTime,
                        'updated_at' => $currentDateTime,
                        'ProName' => $details['name'], // Assuming product name needs to be saved
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
                    $orderDetail->save();
                }

                // Clear the cart session after checkout
                session()->forget('cart');
                
                $cart = $cartItems;
                $totalPrice = $request->input('totalPrice');
                return view('User.thongtin', compact('customer', 'cart', 'totalPrice', 'order'));
                // Redirect or return response as needed
            } else {
                
            }
        }
        public function thongtin( $OrdID)
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
