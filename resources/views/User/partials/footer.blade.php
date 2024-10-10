<footer class="restaurant-footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h2>Về chúng tôi</h2>
            <p>Chúng tôi đam mê phục vụ các bữa ăn ngon được <br>làm từ các nguyên liệu tươi nhất.
             Ghé thăm chúng<br> tôi để trải nghiệm sự xuất sắc của ẩm thực 3 miền.<br>
             Giao hàng mọi nơi trong thời gian nhanh nhất, <br>
             nhận hàng nhanh chóng. Hình ảnh chụp thật 100% <br>đảm bảo sản phẩm đúng như hình đăng tải.
             <br> Liên hệ tư vấn nhanh chóng khi khách hàng đặt sản phẩm</p>
             <img src="{{ asset('anh/bon.jpg') }}" alt="Logo" id="Logo" style="width:116px;height:79px" >
        </div>
        <div class="footer-section links">
            <h2>Thông tin liên hệ </h2>
            <div class="contact">
                <span><i class="fas fa-map-marker-alt"></i>Địa chỉ:
                <a href="{{route('lienHe')}}" style="text-decoration:none;color:black">
                    <p><i class="fas fa-map-marker-alt"></i>Chi nhánh 1:165-Hai Bà Trưng-Hà Nội</p>
                    <p><i class="fas fa-map-marker-alt"></i>Chi nhánh 2:vinocean park 3- Nghĩa trụ-Hưng Yên</p>
                    <p><i class="fas fa-map-marker-alt"></i>Chi nhánh 3:Quận Tân Bình-TP.Hồ Chí Minh</p>
                    <p><i class="fas fa-map-marker-alt"></i>Chi nhánh 4:06 Trần Hưng Đạo, Phú Hòa, TP Huế</p>
                </a>
                    <p><i class="fas fa-phone"></i>Hotline: 0964505836</p>
                    <p><i class="fas fa-envelope"></i>Email:dangphuc195@gmail.com</p>
                </span>
            </div>
            <div class="social-media" style="margin-top:10px" >
                <a style="color:aliceblue" href="https://www.facebook.com/profile.php?id=100010380312096"><i class="fab fa-facebook"></i></a>
                <a style="color:aliceblue " href="#"><i class="fab fa-twitter"></i></a>
                <a style="color:aliceblue " href="#"><i class="fab fa-google"></i></a>
            </div>
        </div>
        <div class="footer-section contact-form">
            <h2>Liên hệ chúng tôi</h2>
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <input type="email" name="email" class="text-input contact-input" placeholder="Địa chỉ email của bạn" required>
                <textarea name="message" class="text-input contact-input" placeholder="Tin nhắn của bạn" required></textarea>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
        </div>

    </div>
</footer>