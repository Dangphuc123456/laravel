<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trangchu.VN</title>
    <link rel="stylesheet" href="{{ asset('css/GioiThieu.css') }}">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
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
   

    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
            @foreach($gt as $item)
                <h4 class="mb-3">{{$item->topic}}</h4>
                <p>{{$item->content_1}}</p>
                <p>{{$item->content_2}}</p>
                <p>{{$item->content_3}}</p>
                <p>{{$item->content_4}}</p>
                <p>{{$item->content_5}}</p>
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
