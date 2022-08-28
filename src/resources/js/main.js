$(document).on('ready', function () {
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 200) {
            $('#header-sticky').removeClass('sticky-menu');
        } else {
            $('#header-sticky').addClass('sticky-menu');
        }
    });

    $('.responsive').on('click', function (e) {
        $('#mobile-menu').slideToggle();
    });


    $('.main-menu li a').on('click', function () {
        if ($(window).width() < 1200) {
            $('#mobile-menu').slideUp();
        }
    });

    $(function () {
        $('a.smoth-scroll').on('click', function (event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 100
            }, 1000);
            event.preventDefault();
        });
    });

    $('.count').counterUp({
        delay: 100,
        time: 1000
    });

    if ($('.paroller').length) {
        $('.paroller').paroller();
    }

    if ($('#parallax').length) {
        new Parallax(document.getElementById('parallax'));
    }

    $('.s-single-services').on('mouseenter', function () {
        $(this).addClass('active').parent().siblings().find('.s-single-services').removeClass('active');
    })

    $.scrollUp({
        scrollName: 'scrollUp',
        topDistance: '300',
        topSpeed: 300,
        animation: 'fade',
        animationInSpeed: 200,
        animationOutSpeed: 200,
        scrollText: '<i class="fas fa-level-up-alt"></i>',
        activeOverlay: false,
    });

    $('.element').each(function () {
        $(this).typed({
            strings: $(this).attr('data-elements').split(','),
            typeSpeed: 100,
            backDelay: 3e3
        })
    });

    $('.button-group > button').on('click', function (event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });

    $('.pricing-tab-switcher').on('click', function () {
        $(this).toggleClass('active');

        $('.pricing-amount').toggleClass('change-subs-duration');
    });
});
