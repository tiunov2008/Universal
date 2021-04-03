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
menuToggle.on('click', function(event){
    event.preventDefault();
    $('.header-nav').slideToggle(200);
})

let footerForm = $('.footer-form');
console.log(footerForm);
footerForm.on('submit', function (event){
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('action', 'footer_form')
    $.ajax({
        type: "POST",
        url: adminAjax.url,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response){
            console.log('Ответ:' + response);
        }
    });
});

