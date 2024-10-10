<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danhmuc.VN</title>
    <link rel="stylesheet" href="{{ asset('css/DanhMuc.css') }}">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
    <!-- Script slideshow -->
    @include('User.partials.chat')

    @include('User.partials.sale_policy')

    <div class="main-container" style="display: flex;">
        <!-- Menu Vertical bên trái -->
        <div class="menu-vertical">
            <h3>DANH MỤC SẢN PHẨM </h3>
            <ul>
                @foreach($lsp as $lsp)
                <li>
                    <a href="{{ route('danhMuc',['CatID'=>$lsp->CatID])}}">
                        <img class="" src="{{ asset('anh/ico-2.png') }}" style="width: 30px;float:left;margin-right:10px">{{$lsp->CatName}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Phần hiển thị sản phẩm bên phải -->
        <div class="product-display" style="width: 80%; padding: 20px;">
            <div class="banner">
                <div style="margin-top:35px">
                    <h1 style="color: white; background-color: #0088FF;">
                        <p style="margin-left: 15px;height:10px;margin-top:20px">{{ $loaisp->CatName }}</p>
                    </h1>
                </div>
                <div class="slide-group" style="display: flex; flex-wrap: wrap; gap: 20px;">

                    @foreach($product as $item)
                    <div class="banner-sp" style="width: 210px;">
                        <div class="thumbnail">
                            <a href="{{ route('detail',$item->ProID) }}">
                                @if(isset($item->ProImage))
                                <img style="width:210px; height:200px;margin-top: 15px" class="img_SP" src="{{ asset('anh/' . $item->ProImage) }}" alt="">
                                @else

                                @endif
                            </a>
                            <div class="sale-off">
                                @if($item->Discount > 0)
                                <span class="discount-percentage">{{ intval($item->Discount) }}%</span>
                                @endif
                            </div>
                            <div class="product-info" style="text-align: center;">
                                <h3>{{$item->ProName}}</h3>
                                <p class="price">
                                    Giá:
                                    @if($item->Discount > 0)
                                    <span class="discounted-price">{{ number_format($item->DiscountedPrice, 0, ',', '.') }} đ</span>
                                    <span class="original-price">{{ number_format($item->price, 0, ',', '.') }} đ</span>
                                    @else
                                    {{ number_format($item->price, 0, ',', '.') }} đ
                                    @endif
                                </p>
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
                                <a href="{{ route('detail',$item->ProID) }}" style="text-decoration: none;">
                                    <button class="add-to-cart-btn" onclick="addToCart()" style="margin-top: 10px; color:black;">Xem chi tiết</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="best">
        <h3 style="color: red;text-align:center">SẢN PHẨM BÁN CHẠY</h3>
        <div class="product-container">
            @foreach($bestSellingProducts as $product)
            <a href="{{ route('detail',$product->ProID) }}" style="text-decoration: none;">
                <div class="product-card">
                    <img src="{{ URL::to('anh/' . $product->ProImage) }}" alt="{{ $product->ProName }}" class="product-image">
                    <div class="product-details">
                        <h5 class="card-title">{{ $product->ProName }}</h5>
                        <p class="card-text"><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }}đ</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    @include('User.partials.footer')
    @include('User.partials.scroll')

    <script src="{{ asset('js/DanhMuc.js') }}"></script>
</body>

</html>