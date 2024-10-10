<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="{{ asset('css/Confirmed.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <marquee direction="left" style="background:orange;border: 1px solid transparent;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">
        Chào mừng khách hàng đến với Bếp Nhà Bon - Hân hạnh khi được chăm sóc phục vụ quý khách
    </marquee>
    @include('User.partials.header')
    @include('User.partials.menu')
    @include('User.partials.slide')
    <h2 style="text-align: center;">Chi tiết đơn hàng </h2>
    <ul>
        <li>Mã đơn hàng: {{ $order->OrdID }}</li>
        <li>Ngày đặt hàng: {{ $order->OrderDate }}</li>
        <li>Trạng thái: {{ $order->Status }}</li>
        <li>Địa chỉ giao hàng: {{ $order->Address }}</li>
        <li>Tổng tiền : {{ number_format($order->MoneyTotal, 0, ',', '.') }}VND</li>
    </ul>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>@if($detail->ProImage)
                    <img src="{{ asset('anh/' . $detail->ProImage) }}" alt="{{ $detail->ProName }}" style="width: 100px;height:100px">
                @endif</td>
                <td>{{$detail->ProName}}</td>
                <td>{{ $detail-> ProID }}</td>
                <td>{{ $detail->Quantity }}</td>
                <td>{{ number_format($detail->Price, 0, ',', '.') }} VND</td>
                <td>{{ number_format($detail->Quantity * $detail->Price, 0, ',', '.') }} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="{{ asset('js/Detail.js') }}"></script>
</body>

</html>