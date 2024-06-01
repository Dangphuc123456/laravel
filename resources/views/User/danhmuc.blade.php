<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Danhmuc.VN</title>
    <link rel="stylesheet" href="{{ asset('css/DanhMuc.css') }}">
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
    <div class="menu-horizontal">
        <ul>
            @foreach($lsp as $lsp)
            <li><a href="{{ route('danhMuc',['CatID'=>$lsp->CatID])}}">{{$lsp->CatName}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="banner">
        <h2 style="color: black;margin-left: 10px;margin-right: 10px;">Thông tin sản phẩm danh mục.</>
       <div class="slideshow-container">
            <div class="slide-group">
                @foreach($product as $item)
                        <div class="banner-sp">
                            <div class="thumbnail">
                                <a href="{{ route('detail',$item->ProID) }}">
                                    @if(isset($item->ProImage))
                                        <img style="width:230px; height:200px;margin-top: 15px" class="img_SP" src="{{ asset('anh/' . $item->ProImage) }}" alt="" >
                                    @else
                                       <!-- //Xử lý nếu không có ảnh  -->
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
    
    <script src="{{ asset('js/DanhMuc.js') }}"></script>
</body>
</html>
