<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/SanPham.css">
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
       
    <!-- <div class="thumbnails-container"> -->
      <!--Danh mục-->
      <div class="menu-horizontal">
        <ul>
            @foreach($lsp as $lsp)
            <li><a href="{{ route('danhMuc',['CatID'=>$lsp->CatID])}}">{{$lsp->CatName}}</a></li>
            @endforeach
        </ul>
      </div>
      <!--Sản phẩm-->
        <h1 style="text-align: center;margin: 0;padding: 0;margin-top: 20px;"></h1>
      <div class="thumbnails-container">
        @php $count = 0; @endphp <!-- Khởi tạo biến đếm -->
            @foreach($sp as $item)
        <div class="thumbnail">
            <a href="{{ route('detail',$item->ProID) }}" style="text-decoration: none;color: black;">
                @if(isset($item->ProImage))
                  <img style="width:210px; height:180px;" class="img_SP" src="anh/{{$item->ProImage}}" alt="">
                 @else
                    <!-- Xử lý nếu không có ảnh -->
                @endif
            <div class="sale-off">
              <span class="discount-percentage">3%</span>
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
              <a href="{{ route('detail',$item->ProID) }}" style="text-decoration: none;" ><button class="add-to-cart-btn" onclick="addToCart()" style="margin-top: 10px; margin-left: 30px;color:black;">Xem chi tiết</button></a>
            </div>
        </div>
        @php $count++; @endphp
        @endforeach
      </div>  
   <!-- Hiển thị phân trang -->
   <div class="pagination-container">
    @if ($sp->currentPage() > 1)
        <a href="{{ $sp->url($sp->currentPage() - 1) }}">
            <svg class="arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 3L5 10L15 17V3Z" fill="#007BFF"/>
            </svg>
        </a>
    @endif

    @for ($page = 1; $page <= $sp->lastPage(); $page++)
        @if ($page >= $sp->currentPage() - 1 && $page <= $sp->currentPage() + 1)
            <a href="{{ $sp->url($page) }}" class="{{ $page == $sp->currentPage() ? 'active' : '' }}">{{ $page }}</a>
        @endif
    @endfor

    @if ($sp->currentPage() < $sp->lastPage())
        <a href="{{ $sp->url($sp->currentPage() + 1) }}">
            <svg class="arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 3L15 10L5 17V3Z" fill="#007BFF"/>
            </svg>
        </a>
    @endif
</div>

    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="js/SanPham.js"></script>
</body>
</html>
