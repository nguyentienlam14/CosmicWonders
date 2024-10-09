document.addEventListener("DOMContentLoaded", function () {
    function setupToggle(toggleBtnId, bbBodyId, otherToggleBtnId, otherBbBodyId) {
      const toggleBtn = document.getElementById(toggleBtnId);
      const bbBody = document.getElementById(bbBodyId);
      const otherToggleBtn = document.getElementById(otherToggleBtnId);
      const otherBbBody = document.getElementById(otherBbBodyId);
  
      toggleBtn.addEventListener('click', function () {
        // Chuyển đổi class 'd-none' để hiển thị/ẩn nội dung
        bbBody.classList.toggle('d-none');
  
        // Đóng nội dung khác nếu nó đang mở
        if (!otherBbBody.classList.contains('d-none')) {
          otherBbBody.classList.add('d-none');
          otherToggleBtn.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
        }
  
        // Thay đổi văn bản và biểu tượng của nút dựa trên trạng thái hiển thị
        if (bbBody.classList.contains('d-none')) {
          toggleBtn.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>'; // Hiển thị Read More
        } else {
          toggleBtn.innerHTML = '<i class="fas fa-times"></i>'; // Hiển thị dấu X
        }
      });
    }
  
    // Thiết lập toggle cho cả hai nút và nội dung, và đảm bảo đóng bài viết khác
    setupToggle('toggleBtn', 'bbBody', 'toggleBtn2', 'bbBody2');
    setupToggle('toggleBtn2', 'bbBody2', 'toggleBtn', 'bbBody');
  });
  