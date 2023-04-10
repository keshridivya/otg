<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Sign in</title>
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

        span{
            color:red;
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
							<div class="col-lg-8">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
									</div>
									<div class="row">
										<div class="col-12 signup-forms form_otp">
											<form action="" method='post' class='user'>
												<input type="hidden"
													name="<?php echo $this->security->get_csrf_token_name(); ?>"
													value="<?php echo $this->security->get_csrf_hash();?>" class='csrf'>
												<div class="row justify-content-center">
													<div class="col-lg-12">
														<div class="">
															<input type="text" value=""
																class='form-control form-control-user reg_number'
																id='otp_number' Placeholder='Mobile no' name='number'>
														</div>
														<span id='spanotpnumber2' style='color:red'>Mobile number is
															required</span>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-lg-12 mt-2">
														<div class=" otp_hide">
															<input type="text" class="form-control form-control-user "
																id="get_otp" name="otp" placeholder="OTP">
														</div>
														<div style='color:red;font-size:15px' id='timer3'
															class='otp_hide'>OTP
															expires within 5 minutes: <span id="timer"></span>
														</div>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-lg-12 err_msg">
													</div>
												</div>
												<button type="button" name="submit" value="otp"
													class="btn btn-primary btn-user btn-block mt-2" id='otp_btn'
													disabled>send otp</button>
												<a class='' id='resend_otp' style='margin:auto'>Resend OTP</a>
												<button type="button" name="submit" value="otp"
													class="btn btn-primary btn-user btn-block otp_hide mt-2"
													id='otp_verify' style='margin:auto'>Verify
													otp</button>
											</form>
										</div>
									</div>
                                    <!-- form_hide -->
									<div class="form_hide">
										<form class="user" method="post">
                                        <input type="hidden"
													name="<?php echo $this->security->get_csrf_token_name(); ?>"
													value="<?php echo $this->security->get_csrf_hash();?>" class='csrf'>
											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
													<input type="text" class="form-control form-control-user" name="name"
														id="name" placeholder="Shop Name">
                                                        <span id="spanname">Please Enter Shop Name</span>
												</div>
												<div class="col-sm-6">
													<input type="text" class="form-control form-control-user" name="contact"
														id="contact" placeholder="Contact">
                                                        <span id="spancontact">Please Enter Contact Number</span>
												</div>
											</div>
											<div class="form-group">
												<input type="email" class="form-control form-control-user" name="email"
													id="email" placeholder="Email Address">
                                                    <span id="spanemail">Please Enter Email Address</span>
											</div>
											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="city" id="city"
            										class="form-control form-control-user " placeholder="City">
                                                    <span id="spancity">Please Enter city</span>
												</div>
												<div class="col-sm-6">
                                                <input type="text" name="pincode"
            										class="form-control form-control-user " placeholder="Pincode" id="pincode"
            										required>
                                                    <span id="spanpincode">Please Enter 6 digit pincode</span>
												</div>
											</div>
                                            <div class="form-group">
                                            <textarea name="address" id="address"
            										class="form-control form-control-user" placeholder ="Enter Address"></textarea>
                                                    <span id="spanaddress">Please Enter 6 digit pincode</span>
											</div>
											<button type="submit"  id="info_check" class="btn btn-primary btn-user btn-block">
												Register Account
											</a>
										</form>
									</div>
									<hr>
									<div class="text-center">
										<a class="small" href="<?= base_url('shop/index') ?>">Already have an account? Login!</a>
									</div>
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
<?php include_once('slider.php'); ?>
</body>

</html>
