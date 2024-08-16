function generate(message, type, time) {
    toastr.options = {
        'closeButton': false,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': 'toast-bottom-right',
        'preventDuplicates': true,
        'onclick': null,
        'showDuration': '300',
        'hideDuration': '1000',
        'timeOut': time || '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut'
    };

    toastr[type](message);
}

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

    $('.row').on('submit', '.contact-form', function (event) {
        event.preventDefault();

        let action = $(this).attr('action');
        let data = new FormData($(this)[0]);

        axios.post(action, data)
            .then(function (response) {
                let result = response.data;

                if (result.success === true) {
                    generate(result.message, 'success', 5000);
                    if (result.form === 'contacts') {
                        $('#name').val('');
                        $('#email').val('');
                        $('#message').val('');
                    }
                    if (result.form === 'subscribers') {
                        $('#email2').val('');
                    }
                } else {
                    generate(response.data.message, 'warning', 5000);
                }
            })
            .catch(function (error) {
                generate('Oops, something went wrong. Please, try again later!', 'error', 5000);
            });

        return false;
    });
});
