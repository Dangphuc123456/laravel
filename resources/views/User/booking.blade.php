<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trangchu.VN</title>
    <link rel="stylesheet" href="css/Booking.css">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Chạy quảng cáo-->
    <marquee direction="left" style="background:orange;border: 1px solid transparent;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">Chào mừng khách hàng đến với Bếp Nhà Bon - Hân hạnh khi được phục vụ quý khách </marquee>
    <!--Logo-diachi-giohang-->
</head>

<body>
    @include('User.partials.header')
    <!--menu-->
    @include('User.partials.menu')

    @include('User.partials.chat')

    @include('User.partials.sale_policy')
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

    <div class="booking-container">
        <h1>Đặt Bàn</h1>
        <form action="{{ route('reservation.submit') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date">Ngày tháng:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="time">Giờ:</label>
                    <input type="time" id="time" name="time" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="guest_count">Số lượng khách:</label>
                    <input type="number" id="guest_count" name="guest_count" min="1" required>
                </div>
                <div class="form-group">
                    <label for="location">Địa điểm:</label>
                    <select id="location" name="location" required>
                        <option value="">Chọn địa điểm</option>
                        <option value="165-Hai Bà Trưng-Hà Nội">165-Hai Bà Trưng-Hà Nội</option>
                        <option value="Vinocean Park 3- Nghĩa Trụ-Hưng Yên">Vinocean Park 3- Nghĩa Trụ-Hưng Yên</option>
                        <option value="Quận Tân Bình-TP.Hồ Chí Minh">Quận Tân Bình-TP.Hồ Chí Minh</option>
                        <option value="06 Trần Hưng Đạo, Phú Hòa, TP Huế">06 Trần Hưng Đạo, Phú Hòa, TP Huế</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="submit-button">Đặt Bàn</button>
        </form>
    </div>
    @include('User.partials.footer')
    @include('User.partials.scroll')

    <script src="js/Booking.js"></script>

</body>

</html>