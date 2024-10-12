const header = document.querySelector('.header');
const navbar = document.querySelector('.navbar-header');
let lastScrollTop = 0;

window.addEventListener('scroll', () => {
  const scrollPosition = window.scrollY; 
  const headerHeight = header.offsetHeight;
  if(lastScrollTop < headerHeight||scrollPosition < lastScrollTop){
    navbar.classList.remove('hidden');
  }else {
    navbar.classList.add('hidden')
  }
  lastScrollTop = scrollPosition;
});

document.addEventListener("DOMContentLoaded", () => {
    const readmoreButtons = document.querySelectorAll('.readmore');
    const detailsElements = document.querySelectorAll('.details');

    readmoreButtons.forEach(button => {
        button.addEventListener('click', () => {
            const detailsElement = button.parentElement.nextElementSibling; 

            detailsElements.forEach(detail => {
                if (detail !== detailsElement) {
                    detail.classList.remove('show');
                }
            });
            detailsElement.classList.toggle('show');
            if (detailsElement.classList.contains('show')) {
                detailsElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});

const shipButtons = document.querySelectorAll('.category button');
const stationButtons = document.querySelectorAll('.category2 button');
const ships = document.querySelectorAll('.ship');
const stations = document.querySelectorAll('.station');
function smoothScroll(targetElement) {
    const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - 100;
    window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
    });
}
function showShip(targetId) {
    ships.forEach(ship => {
        ship.classList.remove('show');
    });
    const targetElement = document.querySelector(targetId);
    if (targetElement) {
        targetElement.classList.add('show');
        smoothScroll(targetElement)
    }
}
shipButtons.forEach(button => {
    button.addEventListener('click', () => {
        shipButtons.forEach(btn => {
            btn.style.backgroundColor = '';
        });
        button.style.backgroundColor = '#90702f';
        const targetId = button.getAttribute('data-target');
        showShip(targetId);
    });
});
function showStation(targetId2) {
    stations.forEach(station => {
        station.classList.remove('show');
    });
    const targetElementS = document.querySelector(targetId2);
    if (targetElementS) {
        targetElementS.classList.add('show');
        smoothScroll(targetElementS)
    }
}
stationButtons.forEach(button => {
    button.addEventListener('click', () => {
        stationButtons.forEach(btn => {
            btn.style.backgroundColor = '';
        });
        button.style.backgroundColor = '#90702f';
        const targetId2 = button.getAttribute('data-target');
        showStation(targetId2);
    });
});
window.onload = function() {
    const spaceshipDataElement = document.getElementById('spaceship-data');
    const firstSpaceship = JSON.parse(spaceshipDataElement.getAttribute('data-spaceships'));
    const firstSpaceshipName = firstSpaceship[0];
    showShip('#'+ firstSpaceshipName);
    
    const stationDataElement = document.getElementById('station-data');
    const firstStation = JSON.parse(stationDataElement.getAttribute('data-stations'));
    const firstStationName = firstStation[0];
    showStation('#'+ firstStationName);
    shipButtons[0].style.backgroundColor = '#90702f';
    stationButtons[0].style.backgroundColor = '#90702f';
};

document.addEventListener('DOMContentLoaded', function() {
    const stationModal = document.getElementById('stationModal');
    const overlay = document.getElementById('overlay');

    stationModal.addEventListener('show.bs.modal', function (event) {
        overlay.style.display = 'block';
        const button = event.relatedTarget; 
        const title = button.getAttribute('data-bs-title');
        const content = button.getAttribute('data-bs-content'); 

        const modalTitle = stationModal.querySelector('.modal-title');
        const modalContent = stationModal.querySelector('#stationContent');

        modalTitle.textContent = title; 
        modalContent.textContent = content;
    });

    stationModal.addEventListener('hidden.bs.modal', function () {
        overlay.style.display = 'none';
    });
});