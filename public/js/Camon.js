// <!-- Đánh giá -->
    
        // Khởi tạo biến selectedStars để lưu trữ số sao đã chọn
        let selectedStars = 0;

        // Lặp qua tất cả các phần tử có class 'star' và thêm các sự kiện cho chúng
        document.querySelectorAll('.star').forEach(star => {
            // Sự kiện khi di chuột qua một ngôi sao
            star.addEventListener('mouseover', () => {
                // Hiển thị số sao tương ứng với ngôi sao đang được di chuột qua
                highlightStars(star.dataset.star);
            });

            // Sự kiện khi di chuột ra khỏi một ngôi sao
            star.addEventListener('mouseout', () => {
                // Hiển thị số sao đã chọn trước đó
                highlightStars(selectedStars);
            });

            // Sự kiện khi người dùng click vào một ngôi sao
            star.addEventListener('click', () => {
                // Lưu số sao đã chọn và hiển thị lại
                selectedStars = star.dataset.star;
                highlightStars(selectedStars);
            });
        });

        // Hàm để highlight các ngôi sao dựa trên số sao được chọn hoặc di chuột qua
        function highlightStars(starCount) {
            // Lặp qua tất cả các ngôi sao và thay đổi màu sắc tương ứng
            document.querySelectorAll('.star').forEach(star => {
                if (star.dataset.star <= starCount) {
                    star.style.color = '#ffd700'; // Màu vàng cho ngôi sao được highlight
                } else {
                    star.style.color = '#ccc'; // Màu xám cho ngôi sao không được highlight
                }
            });
        }

        // Hàm để xử lý khi người dùng gửi đánh giá
        function submitReview() {
            const reviewText = document.getElementById('review-text');
            if (selectedStars > 0) {
                reviewText.textContent = `Cảm ơn bạn đã đánh giá ${selectedStars} sao!`;
            } else {
                reviewText.textContent = 'Vui lòng chọn số sao trước khi gửi đánh giá.';
            }
        }
   