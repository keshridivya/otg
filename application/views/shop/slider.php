<script>
    //registration 

	$('.form_hide').hide();
	$('.login_verify_otp').hide();
	$('#spanotpnumber2').hide();
	$('.otp_hide').hide();
	$('#resend_otp').hide();

	$('#otp_btn').click(function () {
		let number = $('.reg_number').val();
		var csrfName = $('.csrf').attr('name');
		var csrfHash = $('.csrf').val();
		$.ajax({
			url: "<?= base_url('shop/otp'); ?>",
			method: "post",
			data: {
				number: number,
				[csrfName]: csrfHash
			},
			dataType: 'json',
			success: function (response) {
				$('.csrf').val(response.token);

				if (response.otp != 'error') {
					$('#otp_btn').css('display', 'none');
					$('.otp_hide').css('display', 'block');
					$('.err_msg').html(
						'<div class="alert alert-success">OTP is send on your mobile</div>'
					);
				} else {
					$('.err_msg').html(
						'<div class="alert alert-danger">Number already Registered</div>'
					);
				}
			},
			error: function () {
				alert('OTP not send .Please try again');
			}
		})
	});

	$('#resend_otp').click(function () {
		let number = $('.reg_number').val();
		var csrfName = $('.csrf').attr('name');
		var csrfHash = $('.csrf').val();
		$('#get_otp').val('');
		$.ajax({
			url: "<?= base_url('shop/otp'); ?>",
			method: "post",
			data: {
				number: number,
				[csrfName]: csrfHash
			},
			dataType: 'json',
			success: function (response) {
				$('.csrf').val(response.token);
				$('.err_msg').html(
					'<div class="alert alert-success">OTP is resend on your mobile</div>'
				);
				$('#otp_verify').show();
				$('.otp_hide').css('display', 'block');
				$('#timer3').css('display', 'none')

			},
			error: function () {
				alert('OTP not send .Please try again');
			}
		})
	});

	$('#otp_verify').click(function () {
		let get_otp = $('#get_otp').val();
		let mob_number = $('.reg_number').val();
		var csrfName = $('.csrf').attr('name');
		var csrfHash = $('.csrf').val();
		$.ajax({
			url: "<?= base_url('shop/resg_otp_verify'); ?>",
			method: "post",
			data: {
				get_otp: get_otp,
				[csrfName]: csrfHash
			},
			dataType: 'json',
			success: function (response) {
				$('.csrf').val(response.token);
				if (response.otp == 'expired') {
					$('.err_msg').html(
						'<div class="alert alert-danger">OTP expired. Pls. try again.</div>'
					);
					$('.otp_hide').hide();
					$('#resend_otp').show();
				} else if (response.otp != 'error') {
					$('.form_hide').css('display', 'block');
					$('.form_otp').css('display', 'none');
					$('#contact').val(mob_number);
				} else {
					$('.err_msg').html(
						'<div class="alert alert-danger">OTP is Incorrect</div>'
					);
				}
			},
			error: function () {
				alert('OTP is incorrect .Please try again');
			}
		})
	});


	//validate contact
	$('#otp_number').keyup(function () {
		validatecontact2();
	});

	function validatecontact2() {
		let contact2 = $('#otp_number').val();
		var pattern = /^[6,7,8,9][0-9]{0,9}$/;
		if (contact2.length == '') {
			$("#spanotpnumber2").show();
			userphoneError = false;
			return false;
		} else if (contact2.length != 10) {
			$("#spanotpnumber2").show();
			userphoneError = false;
			return false;
		} else if (!pattern.test(contact2)) {
			$("#spanotpnumber2").show().html('please enter correct mobile number starting with 6,7,8,9');
			userphoneError = false;
			return false;
		} else {
			$("#spanotpnumber2").hide();
			$('#otp_btn').attr('disabled', false);
		}
	}



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
	$(document).ready(function () {
		// Validate Username
		$("#spanname").hide();
		$("#spanemail").hide();
		$("#spancontact").hide();
		$("#spanaddress").hide();
		$('#spanpincode').hide();
		$('#spancity').hide();
		let usernameError = true;
		let useremailError = true;
		let userphoneError = true;
		let usertextError = true;
		let usercityError = true;
		let pin_error = true;
		$("#name").keyup(function () {
			validatename2();
		});

		function validatename2() {
			let usernameValue = $("#name").val();
			let text = /^[A-Za-z ]+$/;
			if (usernameValue.length == "") {
				$("#spanname").show();
				usernameError = false;
				return false;
			} else if (usernameValue.length < 3) {
				$("#spanname").show();
				$("#spanname").html("**length of username minimum 3 character");
				usernameError = false;
				return false;
			} else if (!text.test(usernameValue)) {
				$("#spanname").show().html("Enter Alphabets only").css("color", "red").focus();
				usernameError = false;
				return false;
			} else {
				$("#spanname").hide();
			}
		}

		// Validate Email
		$('#email').keyup(function () {
			validateEmail();
		});

		function validateEmail() {
			let useremail = $('#email').val();
			let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

			if (useremail.length == '') {
				$('#spanemail').show();
				useremailError = false;
				return false;
			} else if (!regex.test(useremail)) {
				$('#spanemail').show();
				useremailError = false;
				return false;
			} else {
				$('#spanemail').hide();
			}
		}

		//validate contact
		$('#contact').keyup(function () {
			validatecontact();
		});

		function validatecontact() {
			let contact = $('#contact').val();
			let filter = /^\d*(?:\.\d{1,2})?$/;
			var pattern = /^[6,7,8,9][0-9]{0,9}$/;
			if (contact.length == '') {
				$("#spancontact").show();
				userphoneError = false;
				return false;
			} else if (contact.length != 10) {
				$("#spancontact").show();
				userphoneError = false;
				return false;
			} else if (!pattern.test(contact)) {
				$("#spancontact").show().html('please enter correct mobile number starting with 6,7,8,9');
				userphoneError = false;
				return false;
			} else {
				$("#spancontact").hide();
			}
		}

		//message validation
		$('#address').keyup(function () {
			validatemessage();
		});

		function validatemessage() {
			let message = $('#address').val();
			if (message.length == '') {
				$("#spanaddress").show();
				usertextError = false;
				return false;
			} else {
				$("#spanaddress").hide();
			}
		}

		//city validation
		$('#city').keyup(function () {
			validatecity();
		});

		function validatecity() {
			let message = $('#city').val();
			if (message.length == '') {
				$("#spancity").show();
				usercityError = false;
				return false;
			} else {
				$("#spancity").hide();
			}
		}

		$('#pincode').keyup(function () {
			validatebookpin();
		});

		function validatebookpin() {
			let bookpin = $('#pincode').val();
			let zipRegex = /^\d{6}$/;
			if (bookpin.length == '') {
				$('#spanpincode').show().css('color', 'red');
				pin_error = false;
				return false;
			} else if (!zipRegex.test(bookpin)) {
				$('#spanpincode').show().css('color', 'red').html('** zipcode should only be 5 digits');
				pin_error = false;
				return false;
			} else {
				$('#spanpincode').hide();
			}
		}

		// Submit button
		$("#info_check").click(function () {
			usernameError = true;
			useremailError = true;
			userphoneError = true;
			usertextError = true;
			usercityError = true;
			pin_error = true;
			validatename2();
			validateEmail();
			validatecontact();
			validatemessage();
			validatebookpin();
			validatecity();
			if (usernameError == true && useremailError == true && userphoneError == true &&
				usertextError == true && pin_error == true && usercityError == true) {
				return true;

			} else {
				return false;
			}
		});
	});

</script>

<script>
	//login

    $('#spanotpnumber').hide();
	$('#usernumber').keyup(function () {
		validatecontact();
	});

	function validatecontact() {
		let contact = $('#usernumber').val();
		var pattern = /^[6,7,8,9][0-9]{0,9}$/;
		if (contact.length == '') {
			$("#spanotpnumber").show().css('color','red');
			userphoneError = false;
			return false;
		} else if (contact.length != 10) {
			$("#spanotpnumber").show().css('color','red');
			userphoneError = false;
			return false;
		} else if (!pattern.test(contact)) {
			$("#spanotpnumber").show().html('please enter correct mobile number starting with 6,7,8,9').css('color','red');
			userphoneError = false;
			return false;
		} else {
			$("#spanotpnumber").hide();
			$('.login_send_otp').attr('disabled', false);
		}
	}


    
	$('#login_btn').click(function () {
		let number = $('#usernumber').val();
		var csrfName = $('.csrf').attr('name');
		var csrfHash = $('.csrf').val();
		$.ajax({
			url: "<?= base_url('shop/regloginotp'); ?>",
			method: "post",
			data: {
				number: number,
				[csrfName]: csrfHash
			},
			dataType: 'json',
			success: function (response) {
				$('.csrf').val(response.token);
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
			url: "<?= base_url('shop/loginverify'); ?>",
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
					window.location.href="<?= base_url('shop') ?>"
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

</script>

<script>
	$(document).ready(function () {
		// Validate Username
		$("#spanexname").hide();
		$("#spanemailex").hide();
		$("#spancontactex").hide();
		$("#spanaddressex").hide();
		$('#spanpicodeex').hide();
		$("#spanorpeicex").hide();
		$("#spanwrrpriceex").hide();
		$("#spanserialnoex").hide();
		let usernameErrorex = true;
		let useremailErrorex = true;
		let userphoneErrorex = true;
		let usertextErrorex = true;
		let pinErrorex = true;
		let orpriceErrorex = true;
		let wrpriceex = true;
		let esrialErrorex = true;

			//message validation
		$('#exserialno').keyup(function () {
			validateserial();
		});

		function validateserial() {
			let message = $('#exserialno').val();
			if (message.length == '') {
				$("#spanserialnoex").show();
				esrialErrorex = false;
				return false;
			} else {
				$("#spanserialnoex").hide();
			}
		}


		$("#exname").keyup(function () {
			validatenameex();
		});

		function validatenameex() {
			let usernameValue = $("#exname").val();
			let text = /^[A-Za-z ]+$/;
			if (usernameValue.length == "") {
				$("#spanexname").show();
				usernameErrorex = false;
				return false;
			} else if (usernameValue.length < 3) {
				$("#spanexname").show();
				$("#spanexname").html("**length of username minimum 3 character");
				usernameErrorex = false;
				return false;
			} else if (!text.test(usernameValue)) {
				$("#spanexname").show().html("Enter Alphabets only").css("color", "red").focus();
				usernameErrorex = false;
				return false;
			} else {
				$("#spanexname").hide();
			}
		}

		// Validate Email
		$('#exemail').keyup(function () {
			usevalidateEmailex();
		});

		function usevalidateEmailex() {
			let useremail = $('#exemail').val();
			let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

			if (useremail.length == '') {
				$('#spanemailex').show();
				useremailErrorex = false;
				return false;
			} else if (!regex.test(useremail)) {
				$('#spanemailex').show();
				useremailErrorex = false;
				return false;
			} else {
				$('#spanemailex').hide();
			}
		}

		//validate contact
		$('#excontact').keyup(function () {
			validatecontactex();
		});

		function validatecontactex() {
			let contact = $('#excontact').val();
			let filter = /^\d*(?:\.\d{1,2})?$/;
			var pattern = /^[6,7,8,9][0-9]{0,9}$/;
			if (contact.length == '') {
				$("#spancontactex").show();
				userphoneErrorex = false;
				return false;
			} else if (contact.length != 10) {
				$("#spancontactex").show();
				userphoneErrorex = false;
				return false;
			} else if (!pattern.test(contact)) {
				$("#spancontactex").show().html('please enter correct mobile number starting with 6,7,8,9');
				userphoneErrorex = false;
				return false;
			} else {
				$("#spancontactex").hide();
			}
		}

		//message validation
		$('#exaddress').keyup(function () {
			validateaddress();
		});

		function validateaddress() {
			let message = $('#exaddress').val();
			if (message.length == '') {
				$("#spanaddressex").show();
				usertextErrorex = false;
				return false;
			} else {
				$("#spanaddressex").hide();
			}
		}

		$('#expincode').keyup(function () {
			validatebookpinex();
		});

		function validatebookpinex() {
			let bookpin = $('#expincode').val();
			let zipRegex = /^\d{6}$/;
			if (bookpin.length == '') {
				$('#spanpicodeex').show().css('color', 'red');
				pinErrorex = false;
				return false;
			} else if (!zipRegex.test(bookpin)) {
				$('#spanpicodeex').show().css('color', 'red').html('** zipcode should only be 5 digits');
				pinErrorex = false;
				return false;
			} else {
				$('#spanpicodeex').hide();
			}
		}

		//validate orprice
		$('#exorprice').keyup(function () {
			validateorprice();
		});

		function validateorprice() {
			let orprice = $('#exorprice').val();
			let filter = /^\d*(?:\.\d{1,2})?$/;
			if (orprice.length == '') {
				$("#spanorpeicex").show();
				orpriceErrorex = false;
				return false;
			} else if (!filter.test(orprice)) {
				$("#spanorpeicex").show().html('Please Enter only number');
				orpriceErrorex = false;
				return false;
			} else {
				$("#spanorpeicex").hide();
			}
		}

			//validate contact
		$('#exwrprice').keyup(function () {
			validatewrpriceex();
		});

		function validatewrpriceex() {
			let wrprice = $('#exwrprice').val();
			let filter = /^\d*(?:\.\d{1,2})?$/;
			if (wrprice.length == '') {
				$("#spanwrrpriceex").show();
				wrpriceex = false;
				return false;
			} else if (!filter.test(wrprice)) {
				$("#spanwrrpriceex").show().html('Please Enter only number');
				wrpriceex = false;
				return false;
			} else {
				$("#spanwrrpriceex").hide();
			}
		}

		// Submit button
		$(".exten_btn").click(function () {
			usernameErrorex = true;
			useremailErrorex = true;
			userphoneErrorex = true;
			usertextErrorex = true;
			orpriceErrorex = true;
			pinErrorex = true;
			wrpriceex = true;
			esrialErrorex = true;
			validatenameex();
			usevalidateEmailex();
			validatecontactex();
			validateaddress();
			validatebookpinex();
			validateorprice();
			validatewrpriceex();
			validateserial();
			if (usernameErrorex == true && useremailErrorex == true && userphoneErrorex == true &&
				usertextErrorex == true && pinErrorex == true && orpriceErrorex == true && wrpriceex == true && esrialErrorex == true) {
				return true;

			} else {
				return false;
			}
		});
	});

</script>
