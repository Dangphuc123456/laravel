<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trangchu.VN</title>
    <link rel="stylesheet" href="css/Trangchu.css">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Chạy quảng cáo-->
    <marquee direction="left" style="background:orange;border: 1px solid transparent;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">Chào mừng khách hàng đến với Bếp Nhà Bon - Hân hạnh khi được phục vụ quý khách </marquee>
    <!--Logo-diachi-giohang-->
</head>

<body>
    @include('User.partials.header')
    <!--menu-->
    @include('User.partials.menu')
    <!-- phần slideshow -->
    @include('User.partials.slide')

    <div class="menu-horizontal">
        <ul>
            @foreach($lsp as $lsp)
            <li><a href="{{ route('danhMuc',['CatID'=>$lsp->CatID])}}">{{$lsp->CatName}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- Script slideshow -->
    <div class="banner">
        <div style="margin-top:0%">
            <h1 style="color: white; background-color: #0088FF;">
                <p style="margin-left: 15px;">Món Khai Vị</p>
            </h1>
        </div>
        <div class="slideshow-container">
            <div class="slide-group">
                @php $count = 0; @endphp <!-- Khởi tạo biến đếm -->
                @foreach($sp as $item)
                @if($count < 10 && $item) <div class="banner-sp">
                    <div class="thumbnail">
                        <a href="{{ route('detail',$item->ProID) }}">
                            @if(isset($item->ProImage))
                            <img style="width:210px; height:200px;" class="img_SP" src="anh/{{$item->ProImage}}" alt="">
                            @else
                            <!-- Xử lý nếu không có ảnh -->
                            @endif
                        </a>
                        <div class="sale-off">
                            <span class="discount-percentage"></span>
                        </div>
                        <div class="product-info">
                            <h3>{{$item->ProName}}</h3>
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
                            <a href="{{ route('detail',$item->ProID) }}" style="text-decoration: none;"><button class="add-to-cart-btn" onclick="addToCart()" style="margin-top: 10px;margin-left:30px;color:black;">Xem chi tiết</button></a>
                        </div>
                    </div>
            </div>
            @php $count++; @endphp <!-- Tăng biến đếm sau mỗi sản phẩm được hiển thị -->
            @endif
            @endforeach
        </div>
    </div>
    </div>

    <!-- Chuyển sp -->
    <style>
        .product {
            width: 100%;
            height: 850px;
            border: 1px solid transparent;
           
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .banner-sp {
            width: 20%;
            /* Đặt kích thước cho mỗi sản phẩm */
            margin: 0px;
            /* Khoảng cách giữa các sản phẩm */
        }
    </style>

    <div class="product">
        <h1 style="color: white; background-color: #0088FF;">
            <p style="margin-left: 15px;">Món Chính</p>
        </h1>
        <div class="slide-group">
            <div class="product-container">
                @php $count = 0; @endphp <!-- Khởi tạo biến đếm -->
                @foreach($sp as $item)
                @if($loop->iteration > 15 && $loop->iteration <= 25 && $item) <div class="banner-sp">
                    <div class="thumbnail">
                        <a href="{{ route('detail',$item->ProID) }}">
                            @if(isset($item->ProImage))
                            <img style="width:210px; height:200px;" class="img_SP" src="anh/{{$item->ProImage}}" alt="">
                            @else
                            <!-- Xử lý nếu không có ảnh -->
                            @endif
                        </a>
                        <div class="sale-off">
                            <span class="discount-percentage"></span>
                        </div>
                        <div class="product-info">
                            <h3>{{$item->ProName}}</h3>
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
                            <a href="{{ route('detail',$item->ProID) }}" style="text-decoration: none;"><button class="add-to-cart-btn" onclick="addToCart()" style="margin-top: 10px; margin-left: 30px;color:black;">Xem chi tiết</button></a>
                        </div>
                    </div>
            </div>
            @php $count++; @endphp <!-- Tăng biến đếm sau mỗi sản phẩm được hiển thị -->
            @endif
            @endforeach
        </div>
        <div class="all" > 
            <a href="{{route('sanPham')}}"><button>All sản phẩm <i class="fas fa-angle-double-right"></i></button></a>   
        </div>
    </div>
    </div>
    <div class="content">
        <h1>Tin tức</h1>
        <div class="noidung">
            @php $count = 0; @endphp
            @foreach($tt as $tintuc)
            @if($count < 2 && $item) <div class="content1">
                <a href="{{ route('detailtinTuc', ['id' => $tintuc->id]) }}">
                    <div class="imgContent">
                        <img style="width:100%;height:300px;" src="anh/{{ $tintuc->image_1 }}" alt="">
                    </div>
                    <h3>{{ $tintuc->title }}</h3>
                    <h3>{!! strip_tags($tintuc->content_1) !!}</h3>
                    <i class="far fa-folder"></i>
                </a>
        </div>
        @php $count++; @endphp <!-- Tăng biến đếm sau mỗi sản phẩm được hiển thị -->
        @endif
        @endforeach
    </div>
    </div>


    @include('User.partials.footer')
    @include('User.partials.scroll')

    <script src="js/TrangChu.js"></script>
</body>

</html>