<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="{{ asset('css/ThanhToan.css') }}">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
</head>
<body>
    <!-- Chạy quảng cáo -->
    <marquee direction="left">Chào mừng khách hàng đến với BonBon Delicious Food - Hân hạnh khi được phục vụ quý khách </marquee>

    @include('User.partials.header')
    @include('User.partials.menu')
    @include('User.partials.slide')
    <div class="customer">
        <h2>Thông tin thanh toán</h2>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="form-container">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" name="name" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Nhập email" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" name="address" placeholder="Nhập địa chỉ" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="form-group">
                    <label for="note">Ghi chú:</label>
                    <input type="text" id="note" name="note" placeholder="Nhập ghi chú">
                </div>
                <div class="form-group">
                    <label for="payment">Phương thức thanh toán:</label>
                    <select id="payment" name="payment" required>
                        <option disabled selected>Chọn phương thức thanh toán</option>
                        <option>Thanh toán khi nhận hàng</option>
                        <option>Thẻ tín dụng/Ghi nợ</option>
                    </select>
                </div>
            </div>

            <div class="order-container">
                @if(isset($cart) && !empty($cart))
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
                            @foreach($cart as $id => $item)
                                <tr>
                                    <td>
                                        <div class="product-info">
                                            @if(isset($item['image']))
                                                <img src="{{ URL::to('anh/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 100px;">
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ number_format($item['price']) }} VND</td>
                                    <td>{{ number_format($item['price'] * $item['quantity']) }} VND</td>
                                    <input type="hidden" name="products[{{ $id }}][id]" value="{{ $id }}">
                                    <input type="hidden" name="products[{{ $id }}][name]" value="{{ $item['name'] }}">
                                    <input type="hidden" name="products[{{ $id }}][quantity]" value="{{ $item['quantity'] }}">
                                    <input type="hidden" name="products[{{ $id }}][price]" value="{{ $item['price'] }}">
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p><strong>Tổng tiền:</strong> {{ number_format($totalPrice) }} VND</p>
                    <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                @else
                    <p>Không có sản phẩm trong giỏ hàng để thanh toán.</p>
                @endif
            </div>
            <div>
            <a href="{{ route('thongtin') }}"><button type="submit">Xác Nhận</button></a>
            </div>
        </form>
    </div>

    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="{{ asset('js/ThanhToan.js') }}"></script>     
    
</body>
</html>
