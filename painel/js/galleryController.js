let carouselContainer = document.querySelector('#carouselContainer')
let galleryContainer = document.querySelector('#galleryContainer')
let typeGallery = document.querySelector('#typeGallery')

const galleryController = () => {
    if(typeGallery.value === "Carousel") { carouselContainer.classList.remove('d-none'); galleryContainer.classList.add('d-none'); }
    if(typeGallery.value === "Gallery") { galleryContainer.classList.remove('d-none'); carouselContainer.classList.add('d-none'); }
}