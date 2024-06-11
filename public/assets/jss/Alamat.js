const firstEventContainer = document.querySelector('.event-container:first-child');
const eventImages = firstEventContainer.querySelectorAll('.image-container img');
const carouselSlides = firstEventContainer.querySelectorAll('.carousel-slide');
const prevButton = firstEventContainer.querySelector('.prev-button');
const nextButton = firstEventContainer.querySelector('.next-button');

let currentIndex = 0;

function showEvent(index) {
    eventImages.forEach((image, i) => {
        image.style.display = i === index ? 'block' : 'none';
    });

    carouselSlides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
    });
}

function nextEvent() {
    currentIndex = (currentIndex + 1) % eventImages.length;
    showEvent(currentIndex);
}

function prevEvent() {
    currentIndex = (currentIndex - 1 + eventImages.length) % eventImages.length;
    showEvent(currentIndex);
}

// Initial display
showEvent(currentIndex);

// Event listeners
prevButton.addEventListener('click', prevEvent);
nextButton.addEventListener('click', nextEvent);
