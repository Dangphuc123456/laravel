
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm </title>
    <link rel="stylesheet" href="{{ asset('css/Detail.css') }}">
    <link rel="icon" href="https://scontent.fhan15-1.fna.fbcdn.net/v/t1.15752-9/355148494_801249674717913_8717127358049488144_n.png?_nc_cat=102&ccb=1-7&_nc_sid=ae9488&_nc_ohc=NBQp50miZfcAX-lYbvp&_nc_ht=scontent.fhan15-1.fna&oh=03_AdR2VKZBWQFrqkvptH-2r3ehneCKLdf9p0QoUm-b3NJWqg&oe=64C3F1F5">
      
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
  <!--menu-->
    <div class="thumbnails-container">
        <!-- hien thi thong bao -->
                @if(session('success'))
                <div id="alertBox" class="alertBox">
                    <div class="alertContent">
                        <span>{{ session('success') }}</span>
                        <button onclick="closeAlert()">OK</button>
                    </div>
                </div>
            @endif
      <!--Danh mục-->
    <div class="menu-horizontal">
        <ul>
            @foreach($lsp as $l)
            <li><a href="{{ route('danhMuc', ['CatID' => $l->CatID]) }}">{{$l->CatName}}</a></li>
            @endforeach
        </ul>
    </div>
    <h1 style="color: white; background-color: #0088FF; margin-left: 0px; margin-right: 0px;text-align: center;">Chi tiết sản phẩm</h1>
      <form action="{{ route('addToCart', ['id' => $sp->ProID]) }}" method="POST">
            @csrf
            <div class="product-details-container">
                <div class="product-image-container">
                    <img style="width:500px" class="product-image" src="{{ URL::to('anh/' . $sp->ProImage) }}" alt="">
                </div>
                <div class="product-info-container">
                    <div>
                        <label style="font-size:20px ; margin-left: 80px;" for="productName">Tên sản phẩm:</label>
                        <input style="border: 0px; font-size:20px ;" id="productName" value="{{ $sp->ProName }}" readonly>
                    </div>
                    <div>
                        <label style="font-size:20px;margin-left: 80px; " for="contact">Hỗ trợ đặt mua:</label>
                        <input style="border: 0px; font-size:20px ;" id="contact" value="096xxxxx36" readonly>
                    </div>
                    <div>
                        <label style="font-size:20px ; margin-left: 80px; " for="promotion">Ưu đãi:</label>
                        <input style="border: 0px; font-size:20px ;width:200px" id="promotion" value="Freeship chi nhánh Hà Nội & HCM!" readonly>
                    </div>
                    <div>
                        <label style="font-size:20px ; margin-left: 80px;" for="productId">Mã sản phẩm:</label>
                        <input style="border: 0px; font-size:20px ;;"  id="productId" value="{{ $sp->ProID }}" readonly>
                    </div>
                    <div>
                        <label style="font-size:20px; margin-left: 80px; " for="price">Giá:</label>
                        <input style="border: 0px; font-size:20px " id="price" value="{{ number_format($sp->price) }}VND" readonly>
                    </div>
                    <div class="review-container" >
                        <p style="font-size:20px ; display:flex">Đánh Giá:</p>
                        <div class="rating" id="rating-container">
                            <span class="star" data-star="1">&#9733;</span>
                            <span class="star" data-star="2">&#9733;</span>
                            <span class="star" data-star="3">&#9733;</span>
                            <span class="star" data-star="4">&#9733;</span>
                            <span class="star" data-star="5">&#9733;</span>
                        </div>
                    </div>
                    @if(Auth::check())
                    <div class="quantity-container" style="margin-left: 78px;">
                        <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                        <input style="width:50px; text-align: center;" type="number" id="quantity-input" name="quantity" value="1" min="1">
                        <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                    </div>
                    
                        <button style="font-size:20px ; margin-left: 80px;" class="btn-add-to-cart" type="submit" data-product-id="{{ $sp->ProID }}">Thêm vào giỏ hàng</button>
                        @else
                            <span id="usernameDisplay" style="font-size:20px; margin-left: 80px;">Đăng nhập để mua hàng</span>
                        @endif
                      </div>
                </div>
            </div>
        </form>

        <!-- <button type="submit" class="add-to-cart-btn" onclick="addToCart()" style="margin-top: 0px;margin-left:30px;">Thêm vào giỏ hàng</button>   -->
        
        <!--ẢNH con-->
        <div class="image-container" >
            <img class="img" src="{{ asset('anh/' . $sp->MoreImage) }}" alt="">
             <img class="img" src="{{ asset('anh/' . $sp->MoreImage) }}" alt=""> 
          </div> 
        
          <h2 class="product-description" style="margin-top: 50px;">Mô tả sản phẩm:<p>{!! strip_tags($sp->ProDescription) !!}</p></h2>
      </div>
      <!-- đánh giá món -->
      
<h1 style="color: white; background-color: #0088FF; margin-left: 0px; margin-right: 0px;text-align: center;">Sản phẩm tương tự</h1>
 @foreach($similarProducts as $item)
    <div class="thumbnail">
        <a href="{{ route('detail',$item->ProID) }}" style="text-decoration: none;color: black;">
            @if($item->ProImage)
                <img style="width:210px; height:200px;" class="img_SP" src="{{ asset('anh/' . $item->ProImage) }}" alt="">
            @else
               
            @endif
            <div class="sale-off">
              <span class="discount-percentage">3%</span>
            </div>             
            <div class="product-info">
                <h3 style="padding-right: 60px;">{{$item->ProName}}</h3>
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
              <a href="{{ route('detail',$item->ProID) }}" style="text-decoration: none; padding-left:40px ;" ><button class="add-to-cart-btnn"  style="margin-top: 10px;margin-left:30px;color:black;">Xem chi tiết</button></a>
            </div>
        </a>
    </div>
@endforeach 
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

        
</html>