document.addEventListener("DOMContentLoaded", function() {

  const toggleButtons = document.querySelectorAll(".readMoreBtn");

  toggleButtons.forEach(function(button) {
      const eventID = button.id.split('_')[1];
      const bbBody = document.getElementById(`bbBody_${eventID}`);

      button.addEventListener("click", function() {
          // Trước khi mở sự kiện mới, đóng tất cả các sự kiện đang mở
          toggleButtons.forEach(function(otherButton) {
              const otherEventID = otherButton.id.split('_')[1];
              const otherBbBody = document.getElementById(`bbBody_${otherEventID}`);

              if (otherEventID !== eventID) {
                  otherBbBody.classList.add("d-none"); // Đóng các sự kiện khác
                  otherButton.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>'; // Đặt lại nút "Read More"
              }
          });

          // Toggle sự kiện hiện tại
          bbBody.classList.toggle("d-none");

          // Thay đổi nội dung nút dựa trên trạng thái của sự kiện
          if (bbBody.classList.contains("d-none")) {
              button.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
          } else {
              button.innerHTML = '<i class="fas fa-times"></i>';
          }
      });
  });
});