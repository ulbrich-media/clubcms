import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import Alpine from "alpinejs";

// configure Swiper to use modules
SwiperCore.use([Navigation, Pagination]);

const swiper = new SwiperCore('.swiper-container', {
    spaceBetween: 0,
    slidesPerView: 'auto',

    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


Alpine.start();


document.getElementById("menu-burger").addEventListener('click', function () {
    if (document.body.classList.contains("active-menu")) {
        document.body.classList.remove("active-menu");
    }
    else {
        document.body.classList.add("active-menu")
    }
});
document.getElementById("menu-close").addEventListener('click', function () {
    document.body.classList.remove("active-menu");
});