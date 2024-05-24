<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
    <link rel="stylesheet" href="{{ asset('css/ChiTietTin.css') }}">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
</head>
<body>
   @include('User.partials.header')
    <!--menu-->
    @include('User.partials.menu')
    <!-- phần slideshow -->
    @include('User.partials.slide')

    <div class="contai1">
      <h1>{{ $tinTuc->title }}</h1>
        <p><p>{!! strip_tags($tinTuc->content_1) !!}</p>
            <img src="{{ asset('anh/' . $tinTuc->image_1) }}" alt="Image">
                @if(!empty($tinTuc->content_2))
                    <p>{!! strip_tags($tinTuc->content_2) !!}</p>
                @endif
                @if(!empty($tinTuc->content_3))
                    <p>{!! strip_tags($tinTuc->content_3) !!}</p>
                @endif
                @if(!empty($tinTuc->content_4))
                    <p>{!! strip_tags($tinTuc->content_4) !!}</p>
                @endif
                @if(!empty($tinTuc->content_5))
                    <p>{!! strip_tags($tinTuc->content_5) !!}</p>
                @endif
                <img src="{{ asset('anh/' . $tinTuc->image_2) }}" alt="Image">
      <p>Tác giả:{{ $tinTuc->author }}</p>
    </div>

    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="{{ asset('js/DanhMuc.js') }}"></script>
</body>
</html>
