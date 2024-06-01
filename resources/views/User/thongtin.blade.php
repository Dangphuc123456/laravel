<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin</title>
    <link rel="stylesheet" href="{{ asset('css/thongtin.css') }}">
</head>
<body>
        <div class="container">
            <div class="header">
                <img src="{{ asset('anh/bon.jpg') }}" alt="Bếp Nhà Bon Logo">
                <h3>Bếp Nhà Bon</h3>
            </div>
            <p>165-Hai Bà Trung-Hà Nội</p>
            <h3>Hóa đơn thanh toán </h3>
            @if(isset($cart) && !empty($cart))
                <table>
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ $item['price'] }} VND</td>
                                <td>{{ $item['price'] * $item['quantity'] }} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p style="margin-bottom: 10px; margin-top: 10px;"><strong>Tổng tiền:</strong> {{ $totalPrice }} VND</p>
            @else
                <p>Không có sản phẩm trong giỏ hàng.</p>
            @endif
            <p>Chúc quý khách vui vẻ, hẹn gặp lại!</p>
        </div>
        <div class="container">
            <p><strong>Tên khách hàng:</strong> {{ $customer->CusName }}</p>
            <p><strong>Email:</strong> {{ $customer->CusEmail }}</p>
            <p><strong>Địa chỉ:</strong> {{ $customer->CusAddress }}</p>
            <p><strong>Số điện thoại:</strong> {{ $customer->CusPhone }}</p>
        </div>  
        <button id="cancelOrderBtn" style="margin-left: 668px;" type="button">Hủy đơn hàng</button>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#cancelOrderBtn").click(function(){
                // Implement cancel order functionality here
            });
        });
    </script>
</body>
</html>
