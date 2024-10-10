
let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }

    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";

    setTimeout(showSlides, 3000); // Change image every 3 seconds
}
/* -------------scroll------------------ */
window.addEventListener('scroll', function() {
  var scrollToTopBtn = document.getElementById('scroll-to-top-btn');
  if (window.pageYOffset > 200) {//đủ 200px hiện nút và ngược lại là k hiện 
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



// Khởi tạo số lượng sản phẩm trong giỏ hàng
let cartCount = 0;

// Hàm để cập nhật số lượng sản phẩm trong giỏ hàng
function updateCartCount() {
    cartCount++;
    document.getElementById('cartCount').textContent = cartCount;
}

// Bắt sự kiện nhấn vào nút "Thêm vào giỏ hàng"
document.querySelector('.btn-add-to-cart').addEventListener('click', function(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định (nếu có)
    updateCartCount(); // Gọi hàm để cập nhật số lượng
});
document.querySelectorAll('.btn-add-to-cart').forEach(button => {
  button.addEventListener('click', function(event) {
      event.preventDefault();
      updateCartCount();
  });
});

