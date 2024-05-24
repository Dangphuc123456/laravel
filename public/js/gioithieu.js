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
        