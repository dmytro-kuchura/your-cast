/**
 * This function generated some messages with Toastr
 *
 * @link https://github.com/CodeSeven/toastr
 * @param message
 * @param type
 * @param time
 */
function generate(message, type, time) {
    toastr.options = {
        'closeButton': false,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': 'toast-top-right',
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

/**
 * Form submit function
 * used module axios for send XMLHttpRequests
 * @link https://github.com/axios/axios
 */
$('.container').on('submit', '.contact-form', function (event) {
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
