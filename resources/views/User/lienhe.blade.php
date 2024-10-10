<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ.VN</title>
    <link rel="stylesheet" href="{{ asset('css/LienHe.css') }}">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
</head>

<body>
    @include('User.partials.header')
    <!--menu-->
    @include('User.partials.menu')

    @include('User.partials.chat')
    <div class="map-container">
        <h3 style="margin-left: 20px;">Địa điểm :Vinocean Park3-Nghĩa Trụ-Văn Giang-Hưng Yên</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.0004772469947!2d105.97163067486022!3d20.95249598067783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a59e19e52163%3A0x805749e82d3269d1!2sVinhomes%20Ocean%20Park%203!5e0!3m2!1svi!2s!4v1727662645554!5m2!1svi!2s" width="1000" height="450" style="border:0;margin-left:260px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="map-container">
        <h3 style="margin-left: 20px;">Địa điểm :165-Hai Bà Trưng-Hà Nội</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1738363428167!2d105.84605197486248!3d21.02572928062286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab94717d85f3%3A0x834b61553e4cd23f!2zMTY1IFAuIEhhaSBCw6AgVHLGsG5nLCBUcuG6p24gSMawbmcgxJDhuqFvLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1727662952916!5m2!1svi!2s" width="1000" height="450" style="border:0;margin-left:260px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="map-container">
        <h3 style="margin-left: 20px;">Địa điểm :Hẻm 166-Quận Tân Bình-TP.Hồ Chí Minh</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.769259616711!2d106.63820317462796!3d10.828962089323033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175297a7373561d%3A0x67b49e2c1513f479!2zSOG6u20gMTY2LzEsIFBoxrDhu51uZyAxNSwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1727663109800!5m2!1svi!2s" width="1000" height="450" style="border:0;margin-left:260px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="map-container">
        <h3 style="margin-left: 20px;">Địa điểm :06 Trần Hưng Đao-Phú Hòa-Thành Phố Huế</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3217.3484521581886!2d107.58467632781765!3d16.4707939578173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a1254bd6609f%3A0xc58b015a29b7caf4!2zMDYgVHLhuqduIEjGsG5nIMSQ4bqhbywgUCwgSHXhur8sIFRo4burYSBUaGnDqm4gSHXhur8sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1727663163418!5m2!1svi!2s" width="1000" height="450" style="border:0;margin-left:260px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    @include('User.partials.footer')
    @include('User.partials.scroll')
    <script src="{{ asset('js/LienHe.js') }}"></script>
</body>

</html>
<script>
    function initMap() {
        // Tạo bản đồ, mặc định hiển thị tại vị trí trung tâm
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 10.762622,
                lng: 106.660172
            }, // Tọa độ TP. Hồ Chí Minh
            zoom: 13
        });

        // Tạo trường tìm kiếm và liên kết với ô input
        var input = document.getElementById('search-input');
        var searchBox = new google.maps.places.SearchBox(input);

        // Đặt giới hạn hiển thị cho các kết quả từ Google Places
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];

        // Khi người dùng chọn một địa điểm trong tìm kiếm
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Xóa tất cả các marker cũ
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // Lấy thông tin từ các địa điểm được tìm thấy
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                // Tạo marker cho mỗi địa điểm tìm được
                var marker = new google.maps.Marker({
                    map: map,
                    title: place.name,
                    position: place.geometry.location
                });

                markers.push(marker);

                // Điều chỉnh bản đồ sao cho bao quanh địa điểm tìm được
                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

    // Gọi hàm khởi tạo bản đồ khi trang được tải
    google.maps.event.addDomListener(window, 'load', initMap);
</script>