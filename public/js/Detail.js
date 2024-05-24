const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

function showSlide(index) {
slides.forEach((slide) => {
    slide.classList.remove('active');
});
slides[index].classList.add('active');
}

function nextSlide() {
currentSlide++;
if (currentSlide === slides.length) {
    currentSlide = 0;
}
showSlide(currentSlide);
}

setInterval(nextSlide, 2000); // Thay đổi slide sau mỗi 2 giây

// Hiển thị slide đầu tiên khi tải trang
showSlide(currentSlide);


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

 window.addEventListener('scroll', function() {
    var scrollToTopBtn = document.getElementById('scroll-to-top-btn');
    if (window.pageYOffset > 200) {
      scrollToTopBtn.style.display = 'block';
    } else {
      scrollToTopBtn.style.display = 'none';
    }
  });

  document.getElementById('scroll-to-top-btn').addEventListener('click', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

   //đăng xuất
        /// Lắng nghe sự kiện click vào ảnh đăng nhập
        document.getElementById("loginIcon").addEventListener("click", function() {
            // Lấy phần tử dropdown-menu
            var dropdownMenu = document.getElementById("dropdownMenu");
  
            // Kiểm tra nếu dropdown-menu đã hiển thị thì ẩn đi, ngược lại thì hiển thị
            if (dropdownMenu.classList.contains("show")) {
                dropdownMenu.classList.remove("show");
            } else {
                dropdownMenu.classList.add("show");
            }
          });
  
          // Lắng nghe sự kiện click nơi khác trên trang để ẩn dropdown-menu
          document.addEventListener("click", function(event) {
            var dropdownMenu = document.getElementById("dropdownMenu");
            if (!event.target.matches("#loginIcon")) {
                dropdownMenu.classList.remove("show");
            }
          });
        //   thông báo
        function closeAlert() {
            var alertBox = document.getElementById('alertBox');
            alertBox.style.display = 'none';
        }
        