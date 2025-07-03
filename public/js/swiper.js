var swiper = new Swiper(".onceSwiper", {
    spaceBetween: 30,
    slidesPerView: 1,
    freeMode: true,
    loop: true,
    watchSlidesProgress: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
