<script>
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

	$('#login_otp_verify').hide();
	$('.otp_hide').hide();
    $('.resend_otp_hide').hide();
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
					$('.otp_hide').show();
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
			url: "<?= base_url('admin/login_otp_verify'); ?>",
			method: "post",
			data: {
				loginotp: loginotp,
				number: number,
				[csrfName]: csrfHash
			},
			dataType: 'json',
			success: function (response) {
				$('.csrf').val(response.token);
				if (response.otp == 'expired') {
                    $('.login_err').html( '<div class="alert alert-danger">OTP expired. Pls. try again.</div>');
                    $('.otp_hide').hide();
                    $('.resend_otp_hide').show();
                } else if (response.otp != 'error') {
					// alert(response.otp);
                    window.location.href="<?= base_url('admin') ?>";
					// window.open("<?= base_url('admin') ?>");
				} else {
					$('.login_err').html(
						'<div class="alert alert-danger">OTP is Incorrect</div>'
					);
				}

			},
			error: function () {
				// alert(response.message);
				alert('OTP is incorrect .Please try again');
			}
		})
	});

    $('#resend_otp').click(function () {
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

	document.getElementById('timer').innerHTML =
		05 + ":" + 00;
	startTimer();

	function startTimer() {
		var presentTime = document.getElementById('timer').innerHTML;
		var timeArray = presentTime.split(/[:]+/);
		var m = timeArray[0];
		var s = checkSecond((timeArray[1] - 1));
		if (s == 59) {
			m = m - 1
		}
		if (m < 0) {
			return
		}

		document.getElementById('timer').innerHTML =
			m + ":" + s;
		console.log(m)
		setTimeout(startTimer, 1000);

	}

	function checkSecond(sec) {
		if (sec < 10 && sec >= 0) {
			sec = "0" + sec
		}; // add zero in front of numbers < 10
		if (sec < 0) {
			sec = "59"
		};
		return sec;
	}

	setTimeout(function () {
		// alert('545');
		$('#set_otp').val('');
	}, 300000);

</script>

<script>
	//check customer already registered
	$(document).ready(function () {
		$('#contct_check').click(function () {
			let contact = $('#contact_login').val();
            let csrfName = $('.csrf').attr('name');
            let csrfHash = $('.csrf').val();
			$.ajax({
				url: "<?= base_url('admin/checkcontact') ?>",
				method: 'post',
				data: {
					contact: contact,
                    [csrfName] : csrfHash
				},
				dataType: 'json',
				success: function (response) {
                    $('.csrf').val(response.token);
					if (response.cid != "") {
						$('#email').val(response.email).attr('readonly', true);
						$('#name').val(response.cname).attr('readonly', true);
						$('#address').val(response.address).attr('readonly', true);
						$('#pincode').val(response.pincode).attr('readonly', true);
						$('#id').val(response.cid);
					}
				},
				error: function () {}
			});
		});
	});

</script>

