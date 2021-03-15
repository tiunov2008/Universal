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
let menuToggle = $('.header-menu-toggle');
console.log(menuToggle);
menuToggle.on('click', function(event){
    event.preventDefault();
    $('.header-nav').slideToggle(200);
})