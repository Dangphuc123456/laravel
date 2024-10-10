<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm.VN </title>
    <link rel="stylesheet" href="{{ asset('css/Detail.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="https://scontent.fhan15-1.fna.fbcdn.net/v/t1.15752-9/355148494_801249674717913_8717127358049488144_n.png?_nc_cat=102&ccb=1-7&_nc_sid=ae9488&_nc_ohc=NBQp50miZfcAX-lYbvp&_nc_ht=scontent.fhan15-1.fna&oh=03_AdR2VKZBWQFrqkvptH-2r3ehneCKLdf9p0QoUm-b3NJWqg&oe=64C3F1F5">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!--Chạy quảng cáo-->
    <marquee direction="left" style="background:orange;border: 1px solid transparent;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">Chào mừng khách hàng đến với Bếp Nhà Bon - Hân hạnh khi được chăm sóc phục vụ quý khách </marquee>
    <!--Logo-diachi-giohang-->

</head>

<body>

        @include('User.partials.header')
        @include('User.partials.menu')
        @include('User.partials.slide')
        @include('User.partials.chat')
        @include('User.partials.sale_policy')
        <!--menu-->
        <div class="thumbnails-container">
            <!-- hien thi thong bao -->
            @if (session('success'))
            <div id="success-alert" class="alert-success-overlay">
                <div class="alert-success-box">
                    <div class="alert-success-icon">
                        &#10004; <!-- Dấu tích -->
                    </div>
                    <div class="alert-success-message">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif
            <!--Danh mục-->
            <div class="main-container">
                <!-- Danh mục sản phẩm -->
                <div class="menu-vertical">
                    <h3>DANH MỤC SẢN PHẨM </h3>
                    <ul>
                        @foreach($lsp as $l)
                        <li>
                            <a href="{{ route('danhMuc', ['CatID' => $l->CatID]) }}">
                                <img class="" src="{{ asset('anh/ico-2.png') }}" style="width: 30px;float:left;margin-right:10px">{{ $l->CatName }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Chi tiết sản phẩm -->
                <div class="product-details-container">
                    <h1 class="product-title">Chi tiết sản phẩm</h1>
                    <form action="{{ route('addToCart', ['id' => $sp->ProID]) }}" method="POST">
                        @csrf
                        <div class="product-content">
                            <div class="product-image-container">
                                <img class="product-image" src="{{ URL::to('anh/' . $sp->ProImage) }}" alt="" style="width:400px;height:400px;margin-left:150px">
                            </div>
                            <div id="image-zoom-overlay" class="overlay">
                                <span class="close-btn" id="close-btn">&times;</span>
                                <img id="zoomed-image" class="zoomed-image" src="" alt="">
                            </div>
                            <div class="product-info-container">
                                <div class="detail">
                                    <label style="margin-top: 50px;" for="productName">Tên sản phẩm:</label>
                                    <input style="margin-top: 50px; " id="productName" value="{{ $sp->ProName }}" readonly>
                                </div>
                                <div class="detail">
                                    <label for="contact">Hỗ trợ đặt mua:</label>
                                    <input id="contact" value="096xxxxx36" readonly>
                                </div>
                                <div class="detail">
                                    <label for="promotion">Ưu đãi:</label>
                                    <input style="width:300px" id="promotion" value="Miễn phi với đơn vận chuyển trên 500k" readonly>
                                </div>
                                <div class="detail">
                                    <label for="productId">Mã sản phẩm:</label>
                                    <input id="productId" value="{{ $sp->ProID }}" readonly>
                                </div>
                                <div class="detail">
                                    <label for="price">Giá:</label>
                                    @if($sp->Discount > 0)
                                    <p class="discounted-price">
                                        {{ number_format($sp->DiscountedPrice, 0, ',', '.') }} đ
                                    </p>
                                    <p class="original-price">
                                        (Gốc: {{ number_format($sp->price, 0, ',', '.') }} đ)
                                    </p>
                                    @else
                                    <p class="price">
                                        {{ number_format($sp->price, 0, ',', '.') }} đ
                                    </p>
                                    @endif

                                </div>

                                <div class="detail">
                                    <label for="quantity">Số lượng :</label>
                                    <input id="quantity" value="{{ $sp->quantity }}" readonly>
                                </div>
                                <div class="review-container">
                                    <p>Đánh Giá:</p>
                                    <div class="rating" id="rating-container">
                                        <span class="star" data-star="1">&#9733;</span>
                                        <span class="star" data-star="2">&#9733;</span>
                                        <span class="star" data-star="3">&#9733;</span>
                                        <span class="star" data-star="4">&#9733;</span>
                                        <span class="star" data-star="5">&#9733;</span>
                                    </div>
                                </div>
                                @if (Auth::check())
                                <div class="quantity-container">
                                    <button class="quantity-btn" type="button" onclick="decreaseQuantity()">-</button>
                                    <input type="number" id="quantity-input" name="quantity" value="1" min="1">
                                    <button class="quantity-btn" type="button" onclick="increaseQuantity()">+</button>
                                </div>
                                <form action="{{ route('addToCart', $sp->ProID) }}" method="POST" id="add-to-cart-form">
                                    @csrf
                                    <button class="btn-add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                                </form>
                                @else
                                <span id="usernameDisplay">Đăng nhập để mua hàng</span>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h2 class="product-description" style="margin-top: 50px;"><strong style="font-size:20px;margin-left:600px">Mô tả sản phẩm</strong>
                <p>{!! strip_tags($sp->ProDescription) !!}</p>
            </h2>
        </div>
        <!-- đánh giá món -->

        <div class="main-container" style="display: flex;">
            <!-- Menu Vertical bên trái -->
            <div class="best-sellers">
                <h3 style="color: red">SẢN PHẨM BÁN CHẠY</h3>
                <div class="product-container">
                    @foreach($bestSellingProducts as $product)
                    <a href="{{ route('detail',$product->ProID) }}" style="text-decoration: none;">
                        <div class="product-card">
                            <img src="{{ URL::to('anh/' . $product->ProImage) }}" alt="{{ $product->ProName }}" class="product-image" style="width: 100px;height:60;margin:0px">
                            <div class="product-details">
                                <h5 class="card-title">{{ $product->ProName }}</h5>
                                <p class="card-text"><strong>Gía:</strong> {{ number_format($product->price, 0, ',', '.') }}đ</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <!-- Phần hiển thị sản phẩm bên phải -->
            <div class="product-display" style="width: 80%; padding: 20px;">
                <div class="banner">
                    <div style="margin-top:35px">
                        <h1 style="color: white; background-color: #0088FF;">
                            <p style="text-align:center;height:10px;margin-top:20px">Sản phẩm tương tự</p>
                        </h1>
                    </div>
                    <div class="slide-group" style="display: flex; flex-wrap: wrap; gap: 20px;">
                        @php $count = 0; @endphp <!-- Khởi tạo biến đếm -->
                        @foreach($similarProducts as $item)
                        @if($count < 20 && $item)
                            <div class="banner-sp" style="width: 210px;">
                            <div class="thumbnail">
                                <a href="{{ route('detail',$item->ProID) }}">
                                    @if(isset($item->ProImage))
                                    <img style="width:210px; height:200px;" class="img_SP" src="{{ asset('anh/' . $item->ProImage) }}" alt="">
                                    @else
                                    <!-- Xử lý nếu không có ảnh -->
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
                                    <div>
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
                                        <button class="add-to-cart-btn" onclick="addToCart()" style=" color:black;width:200px">Xem chi tiết</button>
                                    </a>
                                </div>
                            </div>
                    </div>
                    @php $count++; @endphp <!-- Tăng biến đếm sau mỗi sản phẩm được hiển thị -->
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        </div>

        @include('User.partials.footer')
        @include('User.partials.scroll')
        </div>
        <script src="{{ asset('js/Detail.js') }}"></script>
        <script>
            function increaseQuantity() {
                var input = document.getElementById('quantity-input');
                input.value = parseInt(input.value) + 1;
            }

            function decreaseQuantity() {
                var input = document.getElementById('quantity-input');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }
        </script>


</body>

</html>