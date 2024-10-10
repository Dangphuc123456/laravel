<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức.VN</title>
    <link rel="stylesheet" href="{{ asset('css/ChiTietTin.css') }}">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            <div class="contai1">
                <h1>{{ $tinTuc->title }}</h1>
                <p>Ngày:{{ $tinTuc->updated_at }}</p>
                <hr style="border: none; border-top: 2px dashed #999999;  height: 1px; margin: 20px 0;">
                <p>{!! strip_tags($tinTuc->content_1) !!}</p>
                <img style="width:800px;height:400px" src="{{ asset('anh/' . $tinTuc->image_1) }}" alt="Image">
                @if(!empty($tinTuc->content_2))
                <p>{!! strip_tags($tinTuc->content_2) !!}</p>
                @endif
                <img style="width:800px;height:400px" src="{{ asset('anh/' . $tinTuc->image_2) }}" alt="Image">
                @if(!empty($tinTuc->content_3))
                <p>{!! strip_tags($tinTuc->content_3) !!}</p>
                @endif
                <img style="width:800px;height:400px" src="{{ asset('anh/' . $tinTuc->image_3) }}" alt="Image">
                @if(!empty($tinTuc->content_4))
                <p>{!! strip_tags($tinTuc->content_4) !!}</p>
                @endif
                <img style="width:800px;height:400px" src="{{ asset('anh/' . $tinTuc->image_4) }}" alt="Image">
                @if(!empty($tinTuc->content_5))
                <p>{!! strip_tags($tinTuc->content_5) !!}</p>
                @endif
                @if(!empty($tinTuc->content_6))
                <p>{!! strip_tags($tinTuc->content_6) !!}</p>
                @endif
                @if(!empty($tinTuc->content_7))
                <p>{!! strip_tags($tinTuc->content_7) !!}</p>
                @endif
                @if(!empty($tinTuc->content_8))
                <p>{!! strip_tags($tinTuc->content_8) !!}</p>
                @endif
                <p>Tác giả:{{ $tinTuc->author }}</p>
            </div>
        </div>
        <div class=""></div>
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
    <script src="{{ asset('js/Main.js') }}"></script>
</body>

</html>