$(document).on('ready', function () {
    setTimeout(function () {
        $('body').addClass('loaded');
    }, 10);

    $('audio').audioPlayer();

    $(function () {
        animatecounters()
    });

    function animatecounters() {
        $(".timer").each(function (a) {
            var b = $(this);
            a = $.extend({}, a || {}, b.data("countToOptions") || {}), b.countTo(a)
        })
    }

    $(".timer").appear(), $(document.body).on("appear", ".timer", function () {
        $(this).hasClass("appear") || (animatecounters(), $(this).addClass("appear"))
    });

    $(window).scroll(function () {
        50 <= $(this).scrollTop() ? $("#return-to-top, #social-links").fadeIn(200) : $("#return-to-top").fadeOut(200)
    }), $("#return-to-top, #social-links").on("click", function () {
        $("body,html").animate({
            scrollTop: 0
        }, 500)
    });
});
