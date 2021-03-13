const swiper = new Swiper('.swiper-container', {
    loop: true,
    // If we need pagination
    autoplay: {
        delay:5000,  
    },
    pagination: {
        el: '.swiper-pagination',
    },
});