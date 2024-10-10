<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng.VN</title>
    <link rel="stylesheet" href="{{ asset('css/Giohang.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
</head>

<body>
    <!-- Chạy quảng cáo -->
    <marquee direction="left" style="background:orange;border: 1px solid transparent;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">Chào mừng khách hàng đến với Bếp Nhà Bon - Hân hạnh khi được chăm sóc phục vụ quý khách</marquee>

    <!-- Logo-diachi-giohang -->
    @include('User.partials.header')

    @include('User.partials.menu')

    @include('User.partials.slide')

    @include('User.partials.chat')
    
    @include('User.partials.sale_policy')
    <!-- Cart Content -->
    <div class="cart-container">
        <h1 style="color: white; background-color: #0088FF; text-align: center;">Giỏ hàng</h1>

        @if(session('cart'))
        <div class="cart-content">
            <!-- Bảng giỏ hàng -->
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="{{ URL::to('anh/' . $details['image']) }}" alt="{{ $details['name'] }}" style="width: 100px; height: 60px;">
                                <span>{{ $details['name'] }}</span>
                            </div>
                        </td>
                        <td>
                            @if(isset($details['Discount']) && $details['Discount'] > 0)
                            <p class="discounted-price">
                                {{ number_format($details['DiscountedPrice'], 0, ',', '.') }} đ
                            </p>
                            <p class="original-price">
                                (Gốc: {{ number_format($details['price'], 0, ',', '.') }} đ)
                            </p>
                            @else
                            {{ number_format($details['price'], 0, ',', '.') }} đ
                            @endif
                        </td>
                        <td>
                            <input type="number" name="quantity[{{ $id }}]" value="{{ $details['quantity'] }}" min="1" class="quantity-input">
                            <button style="cursor: pointer;" class="btn-update-quantity" data-id="{{ $id }}">Cập nhật</button>
                        </td>
                        <td id="total-price-{{ $id }}">
                            @if(isset($details['Discount']) && $details['Discount'] > 0)
                            {{ number_format($details['DiscountedPrice'] * $details['quantity'], 0, ',', '.') }} đ
                            @else
                            {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }} đ
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('removeFromCart', $id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('POST')
                                <button style="cursor: pointer;" type="submit" class="btn-remove">Xóa</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            <!-- Tóm tắt giỏ hàng -->
            <div class="cart-summary">
                <h3>Thông Tin Giỏ Hàng</h3>
                <hr />
                <div class="summary-row">
                    <h3>Tổng tiền:(theo giảm giá nếu có)</h3>
                    <p id="cart-total">{{ number_format($total, 0, ',', '.') }} đ</p>
                </div>
                <hr />
            </div>
        </div>

        <div class="button-container">
            <div class="ttmuahang">
                <a href="{{URL::to('/SanPham')}}" class="blink">
                    <button style="cursor: pointer;" class="blink">
                        <span class="button-content">
                            <i class="fas fa-sign-out-alt fa-flip-horizontal"></i>
                            <h4>Tiếp tục mua hàng</h4>
                        </span>
                    </button>
                </a>
            </div>
            <a href="{{ route('thanhToan') }}">
                <button class="checkoutBtn" id="checkoutBtn">Tiến Hành Đặt Hàng</button>
            </a>
        </div>
        @else
        <h4 style="text-align: center;">Giỏ hàng của bạn đang trống.</h4>
        @endif
    </div>
    @include('User.partials.footer')
    @include('User.partials.scroll')

    <script src="{{ asset('js/GioHang.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-update-quantity').on('click', function(e) {
                e.preventDefault();

                var id = $(this).data('id');
                var quantity = $('input[name="quantity[' + id + ']"]').val();

                $.ajax({
                    type: 'POST',
                    url: '/cart/update/' + id,
                    data: {
                        _token: '{{ csrf_token() }}',
                        quantity: quantity
                    },
                    success: function(response) {
                        // Cập nhật số lượng sản phẩm và giá hiển thị trên giao diện
                        $('input[name="quantity[' + id + ']"]').val(response.quantity);
                        $('#total-price-' + id).text(response.total.toLocaleString() + ' VND');
                        // Cập nhật tổng giỏ hàng
                        $('#cart-total').text(response.cartTotal.toLocaleString() + ' VND');
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi nếu cần
                        alert('Cập nhật không thành công, vui lòng thử lại.');
                    }
                });
            });
        });
    </script>
</body>

</html>