document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById('toggleBtn');
    const bbBody = document.getElementById('bbBody');

    toggleBtn.addEventListener('click', function () {
      // Toggle the 'd-none' class to show/hide content
      bbBody.classList.toggle('d-none');

      // Change button text and icon based on visibility
      if (bbBody.classList.contains('d-none')) {
        toggleBtn.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>'; // Show Read More
      } else {
        toggleBtn.innerHTML = '<i class="fas fa-times"></i>'; // Show X
      }
    });
  });