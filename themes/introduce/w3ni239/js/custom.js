$(document).ready(function () {
    if ($(".content-wrap").scrollTop() > 40 && $(window).width() >= 650) {
        $('#header').addClass('fixed-top-menu');
        $('.logo').addClass('fixed-top-logo');
        $('#open-button').addClass('fixed-btn-menu');
    }

    $(window).on("resize", function () {
        if ($(".content-wrap").scrollTop() > 40 && $(window).width() >= 650) {
            $('#header').addClass('fixed-top-menu');
            $('.logo').addClass('fixed-top-logo');
            $('#open-button').addClass('fixed-btn-menu');
        } else
        {
            $('#header').removeClass('fixed-top-menu');
            $('.logo').removeClass('fixed-top-logo');
            $('#open-button').removeClass('fixed-btn-menu');
        }
    });

    $(".content-wrap").on('scroll', function () {
        if ($(".content-wrap").scrollTop() > 40 && $(window).width() >= 650) {
            $('#header').addClass('fixed-top-menu');
            $('.logo').addClass('fixed-top-logo');
            $('#open-button').addClass('fixed-btn-menu');
        } else
        {
            $('#header').removeClass('fixed-top-menu');
            $('.logo').removeClass('fixed-top-logo');
            $('#open-button').removeClass('fixed-btn-menu');
        }
    });
});
