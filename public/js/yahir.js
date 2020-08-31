function belipaket(id_packages, nama) {
    $("[name='package']").val(nama);
    $("[name='paket'] option:selected").val(id_packages).text(nama).change();
}


$(document).ready(function () {

    belipaket();
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }

    });

    // $('body').scrollspy({
    //     target: '#dotted-scrollspy'
    // });
});