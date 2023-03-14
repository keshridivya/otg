<!--Body Content-->

<style>
	.error-div {
		text-align: left;
		margin-left: 20px;
		padding-bottom: 15px;
	}
	span {
		text-align: left;
		margin-left: 20px;
		padding-bottom: 15px;
	}

</style>

<div id="page-content">
	<div class="section sign-up-forms">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">

							<button class="nav-link active" id="pills-home-tab" data-toggle="pill"
								data-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
								aria-selected="true">Sign In</button>

						</li>

						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-profile-tab" data-toggle="pill"
								data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
								aria-selected="false">Sign Up</button>
						</li>
					</ul>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<?php
										if($message ?? FALSE){

											echo "<div class='alert alert-danger'>".$message."</div>";

										}
										?>
						</div>
					</div>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel"
							aria-labelledby="pills-home-tab">
							<div class="signup-forms">
								
							<form method="post" action="">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
										value="<?php echo $this->security->get_csrf_hash();?>">
										<input type="hidden" id='login_vrf_otp'>

									<div class="row justify-content-center">
											<div class="col-lg-6">
												<div class="form-group">
													<input type="text" value="" class='form-control number' id='usernumber'
														Placeholder='Mobile no' name='number'>
												</div>
												<span id='spanotpnumber'>Mobile Number is required</span>
											</div>
										</div>
										<div class="row justify-content-center">
											<div class="col-lg-6">
												<div class="form-group loginotpbox">
													<input type="text" class="form-control " id="loginotp" name="loginotp"
														placeholder="OTP">
												</div>
												<div style='color:red;font-size:15px' class='otp_hide'>OTP expires within 5 minutes: <span id="timer"></span></div>
											</div>
										</div>
										<div class="row justify-content-center">
											<div class="col-lg-6 login_err">

											</div>
										</div>
										<button type="button" name="submit" value="login" class="btn login_send_otp" id='login_btn' disabled>Send OTP</button>
									<button type="button" name="submit" value="login" class="btn login_verify_otp" id='login_otp_verify'>Verify OTP</button>
								</form>
								<!-- <a href="<?= base_url('forget') ?>">Forgot password?</a> -->
							</div>
						</div>

						<div class="tab-pane fade" id="pills-profile" role="tabpanel"
							aria-labelledby="pills-profile-tab">
							<div class="row">
								<div class="col-12 signup-forms form_otp">
									<form action="" method='post'>
										<input type="hidden"
											name="<?php echo $this->security->get_csrf_token_name(); ?>"
											value="<?php echo $this->security->get_csrf_hash();?>" class='csrf' id='csrf2'>
										<input type='hidden' id='set_otp' value='123'>

										<div class="row justify-content-center">
											<div class="col-lg-6">
												<div class="form-group">
													<input type="text" value="" class='form-control reg_number'
														id='otp_number' Placeholder='Mobile no' name='number'>
												</div>
												<span id='spanotpnumber2'>Mobile number is required</span>
											</div>
										</div>
										<div class="row justify-content-center">
											<div class="col-lg-6">
												<div class="form-group otp_hide">
													<input type="text" class="form-control " id="get_otp" name="otp"
														placeholder="OTP">
												</div>
												<div style='color:red;font-size:15px' id='timer3' class='otp_hide'
													>OTP expires within 5 minutes: <span
														id="timer"></span>
													</div>
													
											</div>
										</div>
										<div class="row justify-content-center">
											<div class="col-lg-6 err_msg">

											</div>
										</div>
										<button type="button" name="submit" value="otp" class="btn" id='otp_btn'
											disabled>send otp</button>
										<a class='otp_hide' id='resend_otp' style='margin:auto'>Resend OTP</a>
										<button type="button" name="submit" value="otp" class="btn otp_hide"
											id='otp_verify' style='margin:auto'>Verify
											otp</button>
									</form>
								</div>
							</div>
							<div class="signup-forms form_hide">
								<form method="post" action="" class='signup'>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
										value="<?php echo $this->security->get_csrf_hash();?>">

									<div class="row justify-content-center">
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" class="form-control" id="username" name="username"
													placeholder="Name">
											</div>
											<span id='spanusername'>Enter your name</span>
											<?php echo form_error('username');?>
										</div>

										<div class="col-lg-6">
											<div class="form-group">
												<input type="number" class="form-control" id="mobile" name="mobile"
													placeholder="Mobile No." readonly>
											</div>
											<span id='spanmobile'>Enter 10 digit Mobile number</span>

											<?php echo form_error('mobile');?>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="email" class="form-control" id="email_id" name="email_id"
													placeholder="Email Address">
											</div>
											<span id='spanemail'>Please enter correct email address</span>
											
										</div>
										<!-- <div class="col-lg-6">
											<div class="form-group">
												<input type="password" class="form-control" id="password"
													name="password" placeholder="Password">
											</div>
											<span id='spanpassword'>Please enter strong password</span>
											<?php echo form_error('password');?>
										</div> -->
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" class="form-control" id="city" name="city"
													placeholder="City">
											</div>
											<span id='spancity'>Please enter correct city</span>
											<?php echo form_error('city');?>
										</div>
										<div class="col-lg-6">

											<div class="form-group">

												<input type="text" class="form-control" id="state" name="state"
													placeholder="State">

											</div>

											<span id='spanstate'>Please enter correct state</span>

											<?php echo form_error('state');?>

										</div>

										<div class="col-lg-6">

											<div class="form-group">

												<input type="text" class="form-control" id="address" name="address"
													placeholder="Service Address">

											</div>

											<span id='spanAddress'>Please enter correct address</span>
											<?php echo form_error('address');?>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" class="form-control" id="pincode" name="pincode"
													placeholder="Pincode">
											</div>
											<span id='spanPin'>Please enter 6 digit pincode</span>
											<?php echo form_error('pincode');?>
										</div>
										<div class="form-checkboxes checkboxinput">
											<div class="col-lg-12">
												<div class="form-group form-check ">
													<input type="checkbox" class="form-check-input" id="terms_services"
														name="terms_services" required checked>

													<label class="form-check-label" for="terms_services">By
														Proceeding

														you agree to the Terms of Service</label>

												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<span id='errorsubmit'></span>
									</div>
									<button type="submit" name="submit" class="btn signupbtn" id="signupbtn"
										value="register">Continue</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section"></div>
</div>

<!--End Body Content-->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>
<script>
	$(document).ready(function () {
		$('.loginotpbox').hide();
		$('.login_verify_otp').hide();
		$('#otp_btn').click(function () {
			let number = $('.reg_number').val();
			var csrfName = $('#csrf2').attr('name');
			var csrfHash = $('#csrf2').val();
			$.ajax({
				url: "<?= base_url('otp'); ?>",
				method: "post",
				data: {
					number: number,
					[csrfName]: csrfHash
				},
				dataType: 'json',
				success: function (response) {
					$('#csrf2').val(response.token);
					$('#set_otp').val(response.otp);

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
			var csrfName = $('#csrf2').attr('name');
			var csrfHash = $('#csrf2').val();
			$.ajax({
				url: "<?= base_url('resend_otp'); ?>",
				method: "post",
				data: {
					number: number,
					[csrfName]: csrfHash
				},
				dataType: 'json',
				success: function (response) {
					$('#csrf2').val(response.token);
					$('#set_otp').val(response.otp);
					$('#timer3').css('display','none')

				},
				error: function () {
					alert('OTP not send .Please try again');
				}
			})
		});

		$('#otp_verify').click(function () {
			let set_otp = $('#set_otp').val();
			let get_otp = $('#get_otp').val();
			let mob_number = $('.reg_number').val();

			if (set_otp != get_otp) {
				$('.err_msg').html('<div class="alert alert-danger">OTP is incorrect</div>');
			} else {
				$('.err_msg').html('<div class="alert alert-success">Success</div>');
				$('.form_hide').css('display', 'block');
				$('.form_otp').css('display', 'none');
				$('#mobile').val(mob_number);
			}

		});

		$('#login_btn').click(function(){
			let number = $('#usernumber').val();
			var csrfName = $('.csrf').attr('name');
			var csrfHash = $('.csrf').val();
			$.ajax({
				url: "<?= base_url('loginotp'); ?>",
				method: "post",
				data: {
					number: number,
					[csrfName]: csrfHash
				},
				dataType: 'json',
				success: function (response) {
					$('.csrf').val(response.token);
					$('#login_vrf_otp').val(response.otp);
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
				url: "<?= base_url('login-otp-verify'); ?>",
				method: "post",
				data: {
					loginotp: loginotp,
					number:number,
					[csrfName]: csrfHash
				},
				dataType: 'json',
				success: function (response) {
					$('.csrf').val(response.token);
					if (response.otp != 'error') {
						history.back();
					} else {
						$('.login_err').html(
							'<div class="alert alert-danger">This Number is registered</div>'
							);
					}
				},
				error: function () {
					alert('OTP not send .Please try again');
				}
			})
						
		});
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

<!--Footer-->
