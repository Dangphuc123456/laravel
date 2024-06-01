<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="{{ asset('css/Giohang.css') }}">
    <link rel="icon" href="https://scontent.fhan15-1.fna.fbcdn.net/v/t1.15752-9/355148494_801249674717913_8717127358049488144_n.png?_nc_cat=102&ccb=1-7&_nc_sid=ae9488&_nc_ohc=NBQp50miZfcAX-lYbvp&_nc_ht=scontent.fhan15-1.fna&oh=03_AdR2VKZBWQFrqkvptH-2r3ehneCKLdf9p0QoUm-b3NJWqg&oe=64C3F1F5">
</head>
<body>
    <!-- Chạy quảng cáo -->
    <marquee direction="left" style="background:orange;border: 1px solid transparent;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">Chào mừng khách hàng đến với Bếp Nhà Bon - Hân hạnh khi được chăm sóc phục vụ quý khách</marquee>
    
    <!-- Logo-diachi-giohang -->
    @include('User.partials.header')
    @include('User.partials.menu')
    @include('User.partials.slide')

    <!-- Cart Content -->
    <div class="ttmuahang" >
        <i class="fa-brands fa-bitcoin" style="color: white;background: rgb(252, 155, 51);padding:px;"></i>
        <button class="blink"><a href="{{URL::to('/SanPham')}}" class="blink" >
        <svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path fill="currentColor" d="M8 4v4H4l8 8 8-8h-4V4z"/>
        </svg>
        <h4>Tiếp tục mua hàng</h4></a></button>
    </div>
    <div class="cart-container">
        <h1 style="color: white; background-color: #0088FF; text-align: center;">Giỏ hàng của bạn</h1>
        
        @if(session('cart'))
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
                                    <img src="{{ URL::to('anh/' . $details['image']) }}" alt="{{ $details['name'] }}" style="width: 100px;">
                                    <span>{{ $details['name'] }}</span>
                                </div>
                            </td>
                            <td>{{ number_format($details['price']) }} VND</td>
                            <td>
                               <input type="number" name="quantity[{{ $id }}]" value="{{ $details['quantity'] }}" min="1" class="quantity-input">
                               <button class="btn-update-quantity" data-id="{{ $id }}">Cập nhật</button>
                            </td>
                            <td id="total-price-{{ $id }}">{{ number_format($details['price'] * $details['quantity']) }} VND</td>
                            <td>
                                <form action="{{ route('removeFromCart', $id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn-remove">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="cart-summary">
                <h3>Tổng thanh toán</h3>
                <p id="cart-total">{{ number_format($total) }} VND</p>
            </div>
        @else
            <h4 style="text-align: center;">Giỏ hàng của bạn đang trống.</h4>
        @endif
    </div>

    <a href="{{ route('thanhToan') }}"><button
    id="checkoutBtn" style="margin-top: 60px;margin-left: 650px;margin-bottom: 20px;height:40px;width: 200px;">Checkout</button></a>

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
