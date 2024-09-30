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
      
      const prevPage = document.createElement("li");
      prevPage.className = "page-item" + (currentPage === 1 ? " disabled" : "");
      prevPage.innerHTML = `<a class="page-link" href="#" aria-label="Previous" data-page="${currentPage - 1}">&laquo;</a>`;
      paginationElement.appendChild(prevPage);
  
      for (let i = 1; i <= totalPages; i++) {
        const pageItem = document.createElement("li");
        pageItem.className = "page-item" + (i === currentPage ? " active" : "");
        pageItem.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
        paginationElement.appendChild(pageItem);
      }
  
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


  document.getElementById('search-input').addEventListener('input', function () {
    const keyword = this.value.toLowerCase();
    const cards = document.querySelectorAll('.card-content');
    let hasMatch = false;

    cards.forEach(function (card) {
        const titleElement = card.querySelector('.card-title');
        const textElement = card.querySelector('.card-text');
        const originalTitle = titleElement.getAttribute('data-original-title') || titleElement.textContent;
        const originalText = textElement.getAttribute('data-original-text') || textElement.textContent;
        
        titleElement.setAttribute('data-original-title', originalTitle);
        textElement.setAttribute('data-original-text', originalText);

        const title = originalTitle.toLowerCase();
        const text = originalText.toLowerCase();

        if (keyword && (title.includes(keyword) || text.includes(keyword))) {
            card.parentElement.style.display = '';
            hasMatch = true;

            const regex = new RegExp(`(${keyword})`, 'gi');
            titleElement.innerHTML = originalTitle.replace(regex, `<mark>$1</mark>`);
            textElement.innerHTML = originalText.replace(regex, `<mark>$1</mark>`);
        } else if (!keyword) {
            card.parentElement.style.display = ''; 
            titleElement.innerHTML = originalTitle;
            textElement.innerHTML = originalText; 
            hasMatch = true;
        } else {
            card.parentElement.style.display = 'none'; 
        }
    });

    if (!hasMatch && keyword) {
        document.getElementById('no-result-message').style.display = 'block';
    } else {
        document.getElementById('no-result-message').style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function() {
  const planetCheckbox = document.getElementById('planet');
  const starsCheckbox = document.getElementById('stars');
  
  const articles = document.querySelectorAll('.card-content');

  function filterArticles() {
      articles.forEach(article => {
          const isPlanet = article.classList.contains('planet');
          const isStar = article.classList.contains('star');
          
          if (planetCheckbox.checked && isPlanet) {
              article.style.display = 'block';
          } else if (starsCheckbox.checked && isStar) {
              article.style.display = 'block';
          } else {
              article.style.display = 'none';
          }
      });
  }


  planetCheckbox.addEventListener('change', filterArticles);
  starsCheckbox.addEventListener('change', filterArticles);

  function filterArticles() {
    const anyCheckboxChecked = planetCheckbox.checked || starsCheckbox.checked;

    articles.forEach(article => {
        const isPlanet = article.classList.contains('planet');
        const isStar = article.classList.contains('star');

        if (!anyCheckboxChecked) {
            article.style.display = 'block';
        } else if (planetCheckbox.checked && isPlanet) {
            article.style.display = 'block';
        } else if (starsCheckbox.checked && isStar) {
            article.style.display = 'block';
        } else {
            article.style.display = 'none';
        }
    });
}
});