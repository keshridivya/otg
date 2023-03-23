$(document).ready(function () {
    $('#spanotpnumber').hide();
    $('#spanverifyotpnumber').hide();
    $('#usernumber').keyup(function () {
        validatebookcontact1();
    });

    function validatebookcontact1() {
        let bookcontact = $('#usernumber').val();
        let booknumber = /^[0-9-+]+$/;

        if (bookcontact.length == '') {
            $('#spanotpnumber').show().css('color', 'red');
            $('.login_send_otp').attr('disabled', true);
            contact_error1 = false;
            return false;
        } else if (!booknumber.test(bookcontact)) {
            $('#spanotpnumber').show().css('color', 'red').html('** Enter Only number');
            $('.login_send_otp').attr('disabled', true);
            contact_error1 = false;
            return false;
        } else if (bookcontact.length != '10') {
            $('#spanotpnumber').show().css('color', 'red').html('** Enter Only 10 digit number');
            $('.login_send_otp').attr('disabled', true);
            contact_error1 = false;
            return false;
        } else {
            $('#spanotpnumber').hide();
            $('.login_send_otp').attr('disabled', false);

        }
    }
});

$('#login_btn').click(function () {
    let number = $('#usernumber').val();
    var csrfName = $('.csrf').attr('name');
    var csrfHash = $('.csrf').val();
    $.ajax({
        url: "<?= base_url('admin/loginotp'); ?>",
        method: "post",
        data: {
            number: number,
            [csrfName]: csrfHash
        },
        dataType: 'json',
        success: function (response) {
            $('.csrf').val(response.token);
            // $('#login_vrf_otp').val(response.otp);
            if (response.otp != 'error') {
                $('.login_err').html(
                    '<div class="alert alert-success">OTP is send on your mobile</div>'
                );
                $('.loginotpbox').show();
                $('.login_send_otp').hide();
                $('.login_verify_otp').show();
            } else {
                $('.login_err').html(
                    '<div class="alert alert-danger">This Number is incorrect</div>'
                );
            }
        },
        error: function () {
            alert('OTP not send .Please try again');
        }
    })
});

$('#login_otp_verify').click(function () {
    let loginotp = $('#loginotp').val();
    let number = $('#usernumber').val();
    var csrfName = $('.csrf').attr('name');
    var csrfHash = $('.csrf').val();
    $.ajax({
        url: "<?= base_url('admin/login-otp-verify'); ?>",
        method: "post",
        data: {
            loginotp: loginotp,
            number: number,
            [csrfName]: csrfHash
        },
        dataType: 'json',
        success: function (response) {
            $('.csrf').val(response.token);
            if (response.otp != 'error') {
                history.back();
            } else {
                $('.login_err').html(
                    '<div class="alert alert-danger">OTP is Incorrect</div>'
                );
            }
        },
        error: function () {
            alert('OTP not send .Please try again');
        }
    })

});
