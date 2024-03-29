<script>
	// Document is ready
	$(document).ready(function () {
		// Validate Username
		$("#spannamequo").hide();
		$("#spanemailquo").hide();
		$("#spanecontactquo").hide();
		$("#spantextquo").hide();
		$('#spanPinquo').hide();
		let usernameError = true;
		let useremailError = true;
		let userphoneError = true;
		let usertextError = true;
		let pin_error = true;
		$("#quoname").keyup(function () {
			validatename2();
		});

		function validatename2() {
			let usernameValue = $("#quoname").val();
			let text = /^[A-Za-z ]+$/;
			if (usernameValue.length == "") {
				$("#spannamequo").show();
				usernameError = false;
				return false;
			} else if (usernameValue.length < 3) {
				$("#spannamequo").show();
				$("#spannamequo").html("**length of username minimum 3 character");
				usernameError = false;
				return false;
			} else if (!text.test(usernameValue)) {
				$("#spannamequo").show().html("Enter Alphabets only").css("color", "red").focus();
				usernameError = false;
				return false;
			} else {
				$("#spannamequo").hide();
			}
		}

		// Validate Email
		$('#quoemail').keyup(function () {
			validateEmail();
		});

		function validateEmail() {
			let useremail = $('#quoemail').val();
			let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

			if (useremail.length == '') {
				$('#spanemailquo').show();
				useremailError = false;
				return false;
			} else if (!regex.test(useremail)) {
				$('#spanemailquo').show();
				useremailError = false;
				return false;
			} else {
				$('#spanemailquo').hide();
			}
		}

		//validate contact
		$('#quocontact').keyup(function () {
			validatecontact();
		});

		function validatecontact() {
			let contact = $('#quocontact').val();
			let filter = /^\d*(?:\.\d{1,2})?$/;
			var pattern = /^[6,7,8,9][0-9]{0,9}$/;
			if (contact.length == '') {
				$("#spanecontactquo").show();
				userphoneError = false;
				return false;
			} else if (contact.length != 10) {
				$("#spanecontactquo").show();
				userphoneError = false;
				return false;
			} else if (!pattern.test(contact)) {
				$("#spanecontactquo").show().html('please enter correct mobile number starting with 6,7,8,9');
				userphoneError = false;
				return false;
			} else {
				$("#spanecontactquo").hide();
			}
		}

		//message validation
		$('#quoaddress').keyup(function () {
			validatemessage();
		});

		function validatemessage() {
			let message = $('#quoaddress').val();
			if (message.length == '') {
				$("#spantextquo").show();
				usertextError = false;
				return false;
			} else {
				$("#spantextquo").hide();
			}
		}

		$('#quopincode').keyup(function () {
			validatebookpin();
		});

		function validatebookpin() {
			let bookpin = $('#quopincode').val();
			let zipRegex = /^\d{6}$/;
			if (bookpin.length == '') {
				$('#spanPinquo').show().css('color', 'red');
				pin_error = false;
				return false;
			} else if (!zipRegex.test(bookpin)) {
				$('#spanPinquo').show().css('color', 'red').html('** zipcode should only be 5 digits');
				pin_error = false;
				return false;
			} else {
				$('#spanPinquo').hide();
			}
		}

		// Submit button
		$("#info_check").click(function () {
			usernameError = true;
			useremailError = true;
			userphoneError = true;
			usertextError = true;
			pin_error = true;
			validatename2();
			validateEmail();
			validatecontact();
			validatemessage();
			validatebookpin();
			if (usernameError == true && useremailError == true && userphoneError == true &&
				usertextError == true && pin_error == true) {
				// $('#info_check').attr('disabled',false);
				$('.set1').css('display', 'none');
				$('.set2').css('display', 'block').css('opacity', '1');
				return true;

			} else {
				// $('#info_check').attr('disabled',true);
				$('.set1').css('display', 'block');
				$('.set2').css('display', 'none');
				return false;
			}
		});
	});

</script>
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
					$('.login_err').html(
						'<div class="alert alert-danger">OTP expired. Pls. try again.</div>');
					$('.otp_hide').hide();
					$('.resend_otp_hide').show();
				} else if (response.otp != 'error') {
					// alert(response.otp);
					window.location.href = "<?= base_url('admin') ?>";
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
		$('#get_otp').val('');
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
					[csrfName]: csrfHash,
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

<script>
	$('#spandeviceplan').hide();
	$("#device_check").click(function () {
		let device = $('#device').val();
		if (device != null) {
			$('#spandeviceplan').hide();
			$('.set1').css('display', 'none');
			$('.set2').css('display', 'block').css('opacity', '1');
			return true;

		} else {
			$('#spandeviceplan').show().css('color', 'red');
			$('.set1').css('display', 'block');
			$('.set2').css('display', 'none');
			return false;
		}
	});

</script>

<script>
	//add input field
	$(document).ready(function () {
		$('.adddevicebutton').click(function () {
			let field = '<hr><label class="fieldlabels">From Price: </label>\
													<input type="text" name="fromPrice[]" id="product"\
														 required/>\
													<label class="fieldlabels">To Price: </label>\
													<input type="text" name="toPrice[]" id="qua"  required/>\
													<label class="fieldlabels">1Year Van No : </label>\
													<input type="text" name="oneyeavan[]" id="mrp"  />\
													<label class="fieldlabels">1 Year : </label>\
													<input type="text" name="oneyear[]" id="dis"  />\
													<label class="fieldlabels">2Year Van No : </label>\
													<input type="text" name="twoyearvan[]" id="mrp"  />\
													<label class="fieldlabels">2 Year : </label>\
													<input type="text" name="twoyear[]" id="dis"  />\
													<label class="fieldlabels">3Year Van No : </label>\
													<input type="text" name="threeyearvan[]" id="mrp"\ />\
													<label class="fieldlabels">3 Year : </label>\
													<input type="text" name="threeyear[]" id="dis"  />\
													<label class="fieldlabels">4Year Van No : </label>\
													<input type="text" name="fouryearvan[]" id="mrp"  />\
													<label class="fieldlabels">4 Year : </label>\
													<input type="text" name="fouryear[]" id="dis"  />';
			$('.addinput').append(field);
			$("body").on("click", "#removefield", function () {
				$(this).parents("#row").remove();
			})

		})
	});

</script>

<script>
	$(document).on('change', '.product', function () {
				let product = $(this).val();
				var csrfName = $('.csrf').attr('name');
				var csrfHash = $('.csrf').val();
				let show = $(this).siblings('.selectbody');

				$.ajax({
						url: "<?= base_url('admin/checkproduct'); ?>",
						method: "post",
						data: {
							product: product,
							[csrfName]: csrfHash
						},
						dataType: 'json',
						success: function (response) {
							$('.csrf').val(response.token);
							if (response.result != 'error') {
								var tbaris = '';
								tbaris = '<option>Select Sub Categories</option>';
								$.each(response.result, function (index) {
										tbaris += '<option value="'+response.result[index].subcat_name+'">'+response.result[index].subcat_name+'</option>';
										
									});
									show.html(tbaris);
								}
								else {
									alert('gr');
								}
							},
							error: function () {
								alert('Something Wrong .Please try again');
							}
						})
				})

</script>

<script>
	$(document).on('change', '.selectbody', function () {
				let subcate = $(this).val();
				var csrfName = $('.csrf').attr('name');
				var csrfHash = $('.csrf').val();
				let show = $(this).siblings('.cateplan');
				$.ajax({
						url: "<?= base_url('admin/checkproduct'); ?>",
						method: "post",
						data: {
							subcate: subcate,
							[csrfName]: csrfHash
						},
						dataType: 'json',
						success: function (response) {
							$('.csrf').val(response.token);
							if (response.result != 'error') {
								var tbaris = '';
								tbaris = '<option>Select Categories Plan</option>';
								$.each(response.result, function (index) {
										tbaris += '<option value="'+response.result[index].cplan_name+'">'+response.result[index].cplan_name+'</option>';
										
									});
									show.html(tbaris);
								}
								else {
									alert('gr');
								}
							},
							error: function () {
								alert('Something Wrong .Please try again');
							}
						})
				})

</script>

<script>
	//add input field
	$('#addextra').hide();
	$(document).ready(function(){
		$('.addbutton').click(function(){
			let field = '<hr><div class="form-card procart" id="row">\
			<label class="fieldlabels">Product: </label>\
			<select class="form-control product" name="Product[]" id="product" placeholder="Product" required>\
			<option value="">select Product</option>\
			<?php	foreach($results as $product1){ ?>
				<option value="<?= $product1['cproduct_name'] ?>"><?= $product1['cproduct_name'] ?></option>\
			<?php }	?>
			</select>\
			<label class="fieldlabels mt-3">Sub categories: </label>\
			<select class="form-control selectbody " name="subcate[]" id="subcate" placeholder="" required>\
			</select>\
			<label class="fieldlabels mt-3">Categories Plan: </label>\
			<select class="form-control cateplan " name="cateplan[]" id="cateplan" placeholder="" required>\
			</select>\
			<label class="fieldlabels">Quantity: </label>\
			<input type="text" name="qua[]" class="form-control" id="qua" placeholder="Quantity" />\
			<label class="fieldlabels">MRP : </label>\
			<input type="text" name="mrp[]" class="form-control" id="mrp" placeholder="MRp" />\
			<label class="fieldlabels">Discount : </label>\
			<input type="text" name="dis[]" class="form-control mb-3" id="dis" placeholder="Discount" />\
			<button class="btn btn-danger mb-3" id="removefield" type="button"><i class="fa fa-trash"></i> Remove</button>\
		</div>';
		$('.addinput').append(field);
		$("body").on("click", "#removefield", function () {
			$(this).parents("#row").remove();
		})
$('#addextra').show();
		})
	});

</script>

<script>
	//add input field
	$(document).ready(function(){
		$('.addquofield').click(function(){
			let field = '<hr><div class="form-card procart" id="row">\
			<label class="fieldlabels">Product: </label>\
			<input type="text" class="form-control product" name="Product[]" id="product" placeholder="Product" required/>\
			<label class="fieldlabels mt-3">Sub categories: </label>\
			<input type="text" class="form-control selectbody " name="subcate[]" id="subcate" placeholder="" required>\
			<label class="fieldlabels mt-3">Categories Plan: </label>\
			<input type="text"class="form-control cateplan " name="cateplan[]" id="cateplan" placeholder="" required>\
			</select>\
			<label class="fieldlabels">Quantity: </label>\
			<input type="text" name="qua[]" id="qua" placeholder="Quantity" />\
			<label class="fieldlabels">MRP : </label>\
			<input type="text" name="mrp[]" id="mrp" placeholder="MRp" />\
			<label class="fieldlabels">Discount : </label>\
			<input type="text" name="dis[]" id="dis" placeholder="Discount" />\
			<button class="btn btn-danger" id="removefield" type="button"><i class="fa fa-trash"></i> Remove</button>\
		</div>';
		$('.addinput').append(field);
		$("body").on("click", "#removefield", function () {
			$(this).parents("#row").remove();
		})

		})
	});

</script>
