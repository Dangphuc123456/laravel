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
    }, 3000); // Thông báo hiển thị trong 3 giây
//scorll cuộn trang
window.addEventListener('scroll', function () {
    var scrollToTopBtn = document.getElementById('scroll-to-top-btn');
    if (window.pageYOffset > 200) {//đủ 200px hiện nút và ngược lại là k hiện 
      scrollToTopBtn.style.display = 'block';
    } else {
      scrollToTopBtn.style.display = 'none';
    }
  });
  document.getElementById('scroll-to-top-btn').addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
