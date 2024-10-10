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

window.addEventListener('scroll', function () {
    var scrollToTopBtn = document.getElementById('scroll-to-top-btn');
    if (window.pageYOffset > 200) {
        scrollToTopBtn.style.display = 'block';
    } else {
        scrollToTopBtn.style.display = 'none';
    }
});

document.getElementById('scroll-to-top-btn').addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

//đăng xuất
/// Lắng nghe sự kiện click vào ảnh đăng nhập
document.getElementById("loginIcon").addEventListener("click", function () {
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
document.addEventListener("click", function (event) {
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


  document.addEventListener('DOMContentLoaded', () => {
    const productImage = document.querySelector('.product-image');
    const overlay = document.getElementById('image-zoom-overlay');
    const zoomedImage = document.getElementById('zoomed-image');
    const closeBtn = document.getElementById('close-btn');

    // Function to open the overlay with the zoomed image
    productImage.addEventListener('click', () => {
      overlay.style.display = 'flex'; // Show overlay
      zoomedImage.src = productImage.src; // Set zoomed image source
    });

    // Function to close the overlay
    closeBtn.addEventListener('click', () => {
      overlay.style.display = 'none'; // Hide overlay
    });

    // Optionally, close the overlay when clicking outside the image
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
        overlay.style.display = 'none'; // Hide overlay
      }
    });
  });

// thông báo khi thêm giỏ hàng
// hiển thị thông báo đặt bàn thành công
    // Chờ 3 giây và sau đó ẩn thông báo
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.animation = 'fadeOut 1s forwards';
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 1000); // Thời gian chờ để hoàn tất animation
        }
    }, 1500); // Thông báo hiển thị trong 3 giây
