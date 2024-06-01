<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <link rel="stylesheet" href="{{ asset('css/Detail.css') }}">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
   @include('User.partials.header')
   @include('User.partials.menu')
   @include('User.partials.slide')

    <h1>Lịch sử mua</h1>
    <h2>Khách hàng: {{ $customer->CusName }}</h2>

    @if ($carts->isEmpty())
        <p>Bạn chưa có đơn hàng nào.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm </th>
                    <th scope="col">Mã sản phẩm </th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->ProName }}</td>
                        <td> {{ $cart->ProID }}</td>
                        <td>{{ $cart->Quantity }}</td>
                        <td>{{ number_format($cart->Price) }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @include('User.partials.footer')
    @include('User.partials.scroll') 
    <script src="{{ asset('js/Detail.js') }}"></script>  
    
</body>
</html>
