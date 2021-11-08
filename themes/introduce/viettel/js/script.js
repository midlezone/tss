jQuery(document).ready(function () {
    if ($(window).width() > 768) {
        $(document).on('scroll', function () {
            if ($(this).scrollTop() > 280) {
                $('.bg-menu').addClass('pf');
				$('.timkiem').css("bottom","93px");
				$('.timkiem a').css("color","#fff !important");
            } else {
                $('.bg-menu').removeClass('pf');
				$('.timkiem').css("bottom","193px");
            }
        });
    }
});