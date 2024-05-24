<footer class="restaurant-footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h2>Về chúng tôi</h2>
            <p>Chúng tôi đam mê phục vụ các bữa ăn ngon được làm từ các nguyên liệu tươi nhất. Ghé thăm chúng tôi để trải nghiệm sự xuất sắc của ẩm thực.</p>
            <div class="contact">
                <span><i class="fas fa-map-marker-alt"></i>Địa chỉ: 
                <p>Chi nhánh 1:165-Hai Bà Trưng-Hà Nội</p>
                <p>Chi nhánh 2:vinocean park 3- Nghĩa trụ-Hưng Yên</p>
                <p>Chi nhánh 3:Quận Tân Bình-Hồ Chí Minh</p>
                <p>Chi nhánh 4:06 Trần Hưng Đạo, Phú Hòa, TP Huế</p></span>
                <span><i class="fas fa-phone"></i>Hotline: 0964505836</span>
                <span><i class="fas fa-envelope"></i>Email:dangphuc195@gmail.com</span>
            </div>
            <div class="social-media">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="footer-section links">
            <h2>Dường dẫn nhanh</h2>
            <ul>
            <li><a href="{{route('home')}}">Trang chủ</a></li>
            <li><a href="{{route('sanPham')}}">Sản phẩm</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="{{route('sanPham')}}">Tin tức</a></li>
            </ul>
        </div>
        <div class="footer-section contact-form">
            <h2>Liên hệ chúng tôi</h2>
            <form action="{{ route('contact.store') }}" method="POST">
            @csrf
                <input type="email" name="email" class="text-input contact-input" placeholder="Địa chỉ email của bạn">
                <textarea name="message" class="text-input contact-input" placeholder="Tin nhắn của bạn"></textarea>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
</footer>
