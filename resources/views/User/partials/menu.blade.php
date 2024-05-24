<div class="main_menu">
      <ul>
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li><a href="{{route('sanPham')}}">Sản phẩm</a></li>
        <li><a href="{{route('gioiThieu')}}">Giới thiệu</a></li>
        <li><a href="{{route('tinTuc')}}">Tin tức</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
      </ul>
      <!---Tìm kiếm--->
        <!-- resources/views/products/search.blade.php -->

        <form action="{{ route('search') }}" method="GET" class="search-form">
        <input type="text" class="search-input" name="key"  placeholder="Tìm kiếm...">
        <button type="submit" class="search-button">Tìm</button>
        </form>
    </div>