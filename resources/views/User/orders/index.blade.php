<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
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

    <h1 style="text-align:center">Lịch sử mua</h1>
    <h3 style="text-align:center">Khách hàng: {{ auth()->user()->username }}</h3>
    <div class="Confirmed">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tình trạng</th>
                    <th>Tổng tiền </th>
                    <th>Chi tiết đơn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->OrdID }}</td>
                    <td>{{ $order->Name }}</td>
                    <td>{{ $order->OrderDate }}</td>
                    <td>{{ $order->Status }}</td>
                    <td>{{ number_format($order->MoneyTotal, 0, ',', '.') }}VND</td>
                    <td> <a style="text-decoration:none;" href="{{ route('order.detail', ['ordID' => $order->OrdID]) }}" class="btn btn-primary">
                            Chi tiết đơn hàng
                        </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="{{ asset('js/Detail.js') }}"></script>
</body>

</html>