<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức.VN</title>
    <link rel="stylesheet" href="css/tintuc.css">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!--Chạy quảng cáo-->
    <marquee direction="left" style="background:orange;border: 1px solid transparent;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">Chào mừng khách hàng đến với Bếp Nhà Bon - Hân hạnh khi được phục vụ quý khách </marquee>
</head>

<body>
    @include('User.partials.header')
    <!--menu-->
    @include('User.partials.menu')
    <!-- phần slideshow -->
    @include('User.partials.slide')

    @include('User.partials.chat')


    <div class="containers">
        <div class="box">
            <div class="noidung">
                @foreach($tt as $tintuc)
                <div class="content1" style="margin-bottom: 20px;"> <!-- Thêm margin cho khoảng cách giữa các tin -->
                    <a href="{{ route('detailtinTuc', ['id' => $tintuc->id]) }}" class="content-link">
                        <div class="imgContent" style="position: relative;"> <!-- Đảm bảo imgContent có position relative để overlay hoạt động -->
                            <img style="width:450px; height:250px;" src="anh/{{ $tintuc->image_1 }}" alt="">
                            <div class="date-overlay" style="position: absolute; bottom: 10px; left: 10px; background-color: rgba(255, 255, 255, 0.7); padding: 5px; border-radius: 5px;">
                                {{ \Carbon\Carbon::parse($tintuc->updated_at)->format('d/m') }}
                            </div>
                        </div>
                        <div class="textContent"> <!-- Thêm div cho nội dung -->
                            <h4>{{ $tintuc->title }}</h4>
                            <hr style="width:200px">
                            <p>{!! strip_tags($tintuc->content_1) !!}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="box_1">
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
        </div>
    </div>
    </div>


    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="{{ asset('js/DanhMuc.js') }}"></script>
</body>

</html>