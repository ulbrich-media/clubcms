import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import Alpine from "alpinejs";

// configure Swiper to use modules
SwiperCore.use([Navigation, Pagination]);

new SwiperCore('.swiper-container.swiper-type-default', {
    spaceBetween: 0,
    slidesPerView: 'auto',

    pagination: {
        el: ".swiper-control-pagination",
        type: "fraction",
        renderFraction: function (currentClass, totalClass) {
            return '<span class="' + currentClass + ' text-accent font-bold"></span>' + ' <span>/</span> ' + '<span class="' + totalClass + '"></span>';
        },
    },
    navigation: {
        nextEl: '.swiper-control-next',
        prevEl: '.swiper-control-prev',
    },
});

new SwiperCore('.swiper-container.swiper-type-free', {
    slidesPerView: 'auto',
    freeMode: true,
    navigation: {
        nextEl: '.swiper-control-next',
        prevEl: '.swiper-control-prev',
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