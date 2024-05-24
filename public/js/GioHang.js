//Script slideshow 
        // Lấy tất cả các phần tử có class "slide" và lưu vào biến slides
                  const slides = document.querySelectorAll('.slide');
                  let currentSlide = 0;//Khởi tạo biến currentSlide

                  function showSlide(index) {
                  slides.forEach((slide) => {
                      slide.classList.remove('active');
                  });
                  slides[index].classList.add('active');
                  }
                  //  hàm nextSlide để chuyển đến slide tiếp theo
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


                    



    // Xử lý sự kiện khi click nút xóa sản phẩm
    function removeFromCart(index) {
    // Sử dụng hàm confirm để hiển thị hộp thoại xác nhận
    var isConfirmed = confirm("Bạn chắc chắn muốn xóa?");

    // Nếu người dùng chọn OK trong hộp thoại xác nhận, thực hiện xóa
    if (isConfirmed) {
        cartItems.splice(index, 1);
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        location.reload(); // Tải lại trang để cập nhật giỏ hàng
    }
}
    // cuộn tròn 
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



      document.addEventListener('DOMContentLoaded', function() {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const increaseButtons = document.querySelectorAll('.btn-quantity[data-action="increase"]');
        const decreaseButtons = document.querySelectorAll('.btn-quantity[data-action="decrease"]');
    
        // Add event listeners to increase buttons
        increaseButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const id = button.dataset.id;
                const input = document.getElementById('quantity-input-' + id);
                input.value = parseInt(input.value) + 1;
                updateQuantity(id, input.value);
            });
        });
    
        // Add event listeners to decrease buttons
        decreaseButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const id = button.dataset.id;
                const input = document.getElementById('quantity-input-' + id);
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                    updateQuantity(id, input.value);
                }
            });
        });
    });
    
    function updateQuantity(id, quantity) {
        // Send an AJAX request to update the quantity in the backend
        axios.post('/update-cart', {
            id: id,
            quantity: quantity
        })
        .then(function(response) {
            // Handle success, if needed
        })
        .catch(function(error) {
            console.error('Error updating quantity:', error);
        });
    }
    