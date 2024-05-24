<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
    <link rel="stylesheet" href="css/tintuc.css">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
</head>
<body>
   @include('User.partials.header')
    <!--menu-->
    @include('User.partials.menu')
    <!-- phần slideshow -->
    @include('User.partials.slide')
<div class="content">
    <h1 >Tin tức</h1>
    <div class="noidung">
        @foreach($tt as $tintuc)
            <div class="content1">
                <a href="{{ route('detailtinTuc', ['id' => $tintuc->id]) }}">
                    <div class="imgContent">
                        <img style="width:50%;height:50%;" src="anh/{{ $tintuc->image_1 }}" alt="">
                    </div>
                    <h3>{{ $tintuc->title }}</h3>
                    <h3>{!! strip_tags($tintuc->content_1) !!}</h3>
                    <i class="far fa-folder"></i> 
                </a>
            </div>
        @endforeach
    </div>
</div>
    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="{{ asset('js/DanhMuc.js') }}"></script>
</body>
</html>
