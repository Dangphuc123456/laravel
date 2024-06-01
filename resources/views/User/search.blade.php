<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trangchu.VN</title>
    <link rel="stylesheet" href="css/Trangchu.css">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
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
    <!-- Script slideshow -->    
    <div class="banner">
        <h1 style="color: white;margin-left: 10px;margin-right: 10px;">Sản phẩm tìm kiếm</h1>
       <div class="slideshow-container">
            <div class="slide-group">
                @foreach($product as $item)
                        <div class="banner-sp">
                            <div class="thumbnail">
                                <a href="{{ route('detail',$item->ProID) }}">
                                    @if(isset($item->ProImage))
                                        <img style="width:210px; height:200px;" class="img_SP" src="anh/{{$item->ProImage}}" alt="" >
                                    @else
                                       Xử lý nếu không có ảnh 
                                    @endif
                                </a>
                                <div class="sale-off">
                                    <span class="discount-percentage"></span>
                                </div>
                                <div class="product-info">
                                    <h3 >{{$item->ProName}}</h3>
                                    <p class="price"> Gía:{{ number_format($item->price) }}VND</p>
                                    <div class="rating">
                                        <div class="stars">
                                            <input type="radio" id="star5" name="rating" value="5">
                                            <label for="star5"></label>
                                            <input type="radio" id="star4" name="rating" value="4">
                                            <label for="star4"></label>
                                            <input type="radio" id="star3" name="rating" value="3">
                                            <label for="star3"></label>
                                            <input type="radio" id="star2" name="rating" value="2">
                                            <label for="star2"></label>
                                            <input type="radio" id="star1" name="rating" value="1">
                                            <label for="star1"></label>
                                        </div>
                                    </div>
                                    <a href="{{ route('detail',$item->ProID) }}" style="text-decoration: none;" ><button class="add-to-cart-btn" onclick="addToCart()" style="margin-top: 10px;margin-left:30px;color:black;">Xem chi tiết</button></a>
                                </div>
                            </div>
                        </div> 
                @endforeach
            </div>
        </div> 
    </div> 
    @include('User.partials.footer')
    @include('User.partials.scroll')
    
    <script src="js/TrangChu.js"></script>
</body>
</html>
