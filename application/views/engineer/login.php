<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $page_title;?></title>
	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url();?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="<?php echo base_url();?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
	<style>
		.error {
			font-size: 15px;
			color: red;
			width: 100%;
			padding: 10px;
		}

		#otpdiv {
			display: none;
		}

		#verifyotp {
			display: none;
		}

		#resend_otp {
			display: none;
		}

		.countdown {
			display: table;
			width: 100%;
			text-align: left;
			font-size: 15px;
		}

		#resend_otp:hover {
			text-decoration: underline;
		}

	</style>

</head>

<body class="" style="background-color: #EEF3F4;">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row justify-content-center">
							<!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
									</div>
                                    
									<?Php
                                    if($message){
                                        echo '<div class="error">'.$message.'</div>';
                                    }
                                    ?>
									
									<form class="user" method="post" action="">
										<input type="hidden"
											name="<?php echo $this->security->get_csrf_token_name(); ?>"
											value="<?php echo $this->security->get_csrf_hash();?>">
										<div class="form-group">
											<label for="mobile">Enter Mobile Number</label>
											<input type="text" class="form-control" id="mob" placeholder="Enter mobile">

										</div>
										<div class="form-group" id="otpdiv">
											<label for="otp verification">Enter OTP</label>
											<input type="text" class="form-control" id="otp" placeholder="Enter OTP">
											<br>
											<div class="countdown"></div>
											<a href="#" id="resend_otp" type="button">Resend</a>
										</div>

										<button type="button" id="sendotp" class="btn btn-primary">Send OTP</button>
										<button type="button" id="verifyotp" class="btn btn-primary">Verify OTP</button>
                                        <div class="form-group  mt-4 mb-4">
                                        <div class="otp_msg"></div>
                                        </div>
									</form>
                                    
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url();?>assets/admin/js/sb-admin-2.min.js"></script>
	<script>
		$(document).ready(function () {
			function validate_mobile(mob) {
				let pattern = /^[6-9]\d{9}$/;
				if (mob == '') {
					return false;
				} else if (!pattern.test(mob)) {
					return false;
				} else {
					return true;
				}
			}


			//send otp function
			function send_otp(mob) {
				var ch = "send_otp";
				$.ajax({
					url: "<?php echo base_url();?>engineer",
					method: "post",
					data: {
						mob: mob,
						ch: ch
					},
					dataType: "text",
					success: function (data) {
						if (data == 'success') {
							$('#otpdiv').css("display", "block");
							$('#sendotp').css("display", "none");
							$('#verifyotp').css("display", "block");
							timer();
							$('.otp_msg').html(
									'<div class="alert alert-success">OTP sent successfully</div>')
								.fadeIn();
							window.setTimeout(function () {
								$('.otp_msg').fadeOut();
							}, 1000)
						} else {
							$('.otp_msg').html(
								'<div class="alert alert-danger">Error in sending OTP</div>').fadeIn();
							window.setTimeout(function () {
								$('.otp_msg').fadeOut();
							}, 1000)
						}
					}
				});
			}
			//end of send otp function

			//send otp function
			$('#sendotp').click(function () {
				var mob = $('#mob').val();
				if (validate_mobile(mob) == false) $('.otp_msg').html(
					'<div class="alert alert-danger" style="position:absolute">Enter Valid mobile number</div>'
					).fadeIn();
				else send_otp(mob);
				window.setTimeout(function () {
					$('.otp_msg').fadeOut();
				}, 1000)
			});

			//end of send otp function

			//resend otp function
			$('#resend_otp').click(function () {
				var mob = $('#mob').val();
				send_otp(mob);
				$(this).hide();
			});
			//end of resend otp function


			//verify otp function starts

			$('#verifyotp').click(function () {
				var ch = "verify_otp";
				var otp = $('#otp').val();
				$.ajax({
					url: "otp_process.php",
					method: "post",
					data: {
						otp: otp,
						ch: ch
					},
					dataType: "text",
					success: function (data) {

						if (data == "success") {
							$('.otp_msg').html(
								'<div class="alert alert-success">OTP Verified successfully</div>'
								).show().fadeOut(4000);
							window.location = "inde.php";

						} else {

							$('.otp_msg').html(
									'<div class="alert alert-danger">otp did not match</div>')
								.show().fadeOut(4000);
						}
					}
				});
			});

			//end of verify otp function

			//start of timer function

			function timer() {
				var timer2 = "00:31";
				var interval = setInterval(function () {
					var timer = timer2.split(':');
					//by parsing integer, I avoid all extra string processing
					var minutes = parseInt(timer[0], 10);
					var seconds = parseInt(timer[1], 10);
					--seconds;
					minutes = (seconds < 0) ? --minutes : minutes;

					seconds = (seconds < 0) ? 59 : seconds;
					seconds = (seconds < 10) ? '0' + seconds : seconds;
					//minutes = (minutes < 10) ?  minutes : minutes;
					$('.countdown').html("Resend otp in:  <b class='text-primary'>" + minutes + ':' +
						seconds + " seconds </b>");
					//if (minutes < 0) clearInterval(interval);
					if ((seconds <= 0) && (minutes <= 0)) {
						clearInterval(interval);
						$('.countdown').html('');
						$('#resend_otp').css("display", "block");
					}
					timer2 = minutes + ':' + seconds;
				}, 1000);

			}

			//end of timer
		});

	</script>
</body>

</html>
