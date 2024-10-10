<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Gioithieu.VN</title>
    <link rel="stylesheet" href="{{ asset('css/GioiThieu.css') }}">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Chạy quảng cáo-->
    <marquee direction="left" style="background:orange;border: 1px solid transparent;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">Chào mừng khách hàng đến với BonBon Deliciou Food - Hân hạnh khi được phục vụ quý khách </marquee>
    <!--Logo-diachi-giohang-->
</head>
<body>
    @include('User.partials.header')
    <!--menu-->
    @include('User.partials.menu')
    <!-- phần slideshow -->
    @include('User.partials.slide')

    @include('User.partials.chat')
    
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
            @foreach($gt as $item)
            <h1>Giới thiệu về Bếp Nhà Bon</h1>
                <p><strong>Bếp Nhà Bon:</strong>{{$item->content_1}}</p>
                <p>{{$item->content_2}}</p>
                <p>{{$item->content_3}}</p>
                <p>{{$item->content_4}}</p>
                <h2>Vì sao chọn Bếp Nhà Bon?</h2>
                <p><strong>Thực phẩm sạch:</strong>{{$item->content_6}}</p>
                <p><strong>Phục vụ tận tâm:</strong>{{$item->content_7}}</p>
                <p><strong>Giao hàng nhanh chóng:</strong>{{$item->content_8}}</p>
                <p><strong>Thực đơn đa dạng:</strong>{{$item->content_9}}</p>
                <p><strong>Ưu đãi hấp dẫn:</strong>{{$item->content_10}}</p>
                @if(isset($item->image))
                <img style="margin: 0;margin-top: 0;" src="anh/{{$item->image}}" width="300px" height="205px" alt=""/>
                @else
                    <!-- Xử lý nếu không có ảnh -->
                @endif
            </div>
            @endforeach
        </div>
        
    </div>

    @include('User.partials.footer')
    @include('User.partials.scroll')
    
    <script src="{{ asset('js/gioithieu.js') }}"></script>
</body>
</html>
