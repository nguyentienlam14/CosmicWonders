document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".card-content");
  const itemsPerPage = 6;
  const totalPages = Math.ceil(cards.length / itemsPerPage);
  const paginationElement = document.querySelector("#pagination .pagination");

  function showPage(page) {
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    cards.forEach((card, index) => {
      card.style.display = index >= start && index < end ? "block" : "none";
    });

    renderPagination(page);
  }

  function renderPagination(currentPage) {
    paginationElement.innerHTML = "";

    // Previous button
    const prevPage = document.createElement("li");
    prevPage.className = "page-item" + (currentPage === 1 ? " disabled" : "");
    prevPage.innerHTML = `<a class="page-link" href="#" aria-label="Previous" data-page="${currentPage - 1}">&laquo;</a>`;
    paginationElement.appendChild(prevPage);

    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
      const pageItem = document.createElement("li");
      pageItem.className = "page-item" + (i === currentPage ? " active" : "");
      pageItem.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
      paginationElement.appendChild(pageItem);
    }

    // Next button
    const nextPage = document.createElement("li");
    nextPage.className = "page-item" + (currentPage === totalPages ? " disabled" : "");
    nextPage.innerHTML = `<a class="page-link" href="#" aria-label="Next" data-page="${currentPage + 1}">&raquo;</a>`;
    paginationElement.appendChild(nextPage);
  }

  paginationElement.addEventListener("click", function (event) {
    event.preventDefault();
    if (event.target.dataset.page) {
      const page = parseInt(event.target.dataset.page);
      showPage(page);
    }
  });

  showPage(1);
});