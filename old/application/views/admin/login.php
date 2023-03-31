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
									<form class="user" method="post" action="">
										<input type="hidden" class="csrf"
											name="<?php echo $this->security->get_csrf_token_name(); ?>"
											value="<?php echo $this->security->get_csrf_hash();?>">

										<div class="form-group">
											<input type="text" value="" class='form-control form-control-user number'
												id='usernumber' Placeholder='Mobile no' name='number'>
										</div>
										<span id='spanotpnumber'>Mobile Number is required</span>
										<div class="form-group loginotpbox">
											<input type="text" class="form-control form-control-user " id="loginotp"
												name="loginotp" placeholder="OTP">
										</div>
										<div style='color:red;font-size:15px' class='otp_hide'>OTP expires within 5
											minutes: <span id="timer"></span></div>


										<div class="row justify-content-center">
											<div class="col-lg-12 login_err">

											</div>
										</div>
										<button type="button" name="submit" value="resend"
											class="btn btn-primary btn-user btn-block resend_otp_hide" id="resend_otp"
											>resend OTP</button>
										<button type="button" name="submit" value="login"
											class="btn btn-primary btn-user btn-block login_send_otp" id='login_btn'
											disabled>Send OTP</button>
										<button type="button" name="submit" value="login"
											class="btn btn-primary btn-user btn-block login_verify_otp"
											id='login_otp_verify'>Verify OTP</button>
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
  <?php include('assets/admin/admin_login.php') ?>


</body>

</html>
