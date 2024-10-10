<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <link rel="stylesheet" href="{{ asset('css/thongtin.css') }}">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <!-- Chạy quảng cáo -->
    <marquee direction="left">Cảm ơn bạn đã đặt hàng tại BonBon Delicious Food - Chúng tôi rất mong sớm được phục vụ bạn lần tới!</marquee>

    @include('User.partials.header')
    @include('User.partials.menu')
    @include('User.partials.chat')

    <div class="order-details">
        <h1>Chi Tiết Đơn Hàng</h1>

        @if(session('order_success'))
        <div class="alert alert-success">
            {{ session('order_success') }}
        </div>
        @endif

        <div class="customer-info">
            <h2>Thông Tin Khách Hàng</h2>
            <p><strong>Tên khách hàng:</strong> {{ $customer->CusName }}</p>
            <p><strong>Email:</strong> {{ $customer->CusEmail }}</p>
            <p><strong>Địa chỉ:</strong> {{ $customer->CusAddress }}</p>
            <p><strong>Số điện thoại:</strong> {{ $customer->CusPhone }}</p>
        </div>
        <div class="order-products">
            <h2>Sản Phẩm Đã Đặt</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price']) }} VND</td>
                        <td>{{ number_format($item['price'] * $item['quantity']) }} VND</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-price">
                <p style="margin: 10px 0;"><strong>Tổng tiền:</strong> {{ number_format($totalPrice) }} VND</p>
            </div>
        </div>
        <div class="buttons">
            <a href="{{ route('home') }}"><button type="button">Về Trang Chủ</button></a>
        </div>
    </div>

    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="{{ asset('js/ChiTietDonHang.js') }}"></script>

</body>

</html>