jQuery(document).ready(function () {
    if ($(window).width() > 768) {
        $(document).on('scroll', function () {
            if ($(this).scrollTop() > 280) {
                $('.bg-menu').addClass('pf');
            } else {
                $('.bg-menu').removeClass('pf');
            }
        });
    }
});