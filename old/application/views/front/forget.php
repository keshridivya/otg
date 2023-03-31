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
				<div class="col-lg-10">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<?php
										if($message){

											echo "<div class='alert alert-danger'>".$message."</div>";

										}
										?>
						</div>
					</div>
					<div class="row">
								<div class="col-12 signup-forms form_otp">
									<form action="" method='post'>
										<input type="hidden"
											name="<?php echo $this->security->get_csrf_token_name(); ?>"
											value="<?php echo $this->security->get_csrf_hash();?>" class='csrf'>
										<input type='hidden' id='set_otp' value='123'>

										<div class="row justify-content-center">
											<div class="col-lg-6">
												<div class="form-group">
													<input type="text" value="" class='form-control number' id='otp_number'
														Placeholder='Mobile no' name='number'>
												</div>
												<span id='spanotpnumber'>Mobile number is required</span>
											</div>
										</div>
										<div class="row justify-content-center">
											<div class="col-lg-6">
												<div class="form-group otp_hide">
													<input type="text" class="form-control " id="get_otp" name="otp"
														placeholder="OTP">
												</div>
												<div style='color:red;font-size:15px' class='otp_hide'>OTP expires within 5 minutes: <span id="timer"></span></div>
												
												
											</div>
										</div>
										<div class="row justify-content-center">
											<div class="col-lg-6 err_msg">
												
											</div>
										</div>
										<button type="button" name="submit" value="otp" class="btn" id='otp_btn' disabled>send
											otp</button>
											<!-- <a href="" class='otp_hide'>Resend OTP</a> -->
										<button type="button" name="submit" value="otp" class="btn otp_hide" id='otp_verify' style='margin:auto'>Verify
											otp</button>
									</form>
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
		$('#otp_btn').click(function () {
			let number = $('.number').val();
			let csrfName = $('.csrf').attr('name');
			let csrfHash = $('.csrf').val();
			$.ajax({
				url: "http://localhost/otg.omsaifoodservices.com/forgetotp",
				method: "post",
				data: {
					number: number,
					[csrfName]: csrfHash
				},
				dataType: 'json',
				success: function (response) {
					$('.csrf').val(response.token);
					$('#set_otp').val(response);
					
					if(response == 'error'){
                        $('.err_msg').html('<div class="alert alert-danger">This number is not registered</div>');
					}
					else{
                    $('#otp_btn').css('display','none');
					$('.otp_hide').css('display','block');
					$('.err_msg').html('<div class="alert alert-success">OTP is send on your mobile</div>');					
					}
				},
				error: function () {
					alert('OTP not send .Please try again');
					// $('#email').val("");
				}
			})
		});

		$('#otp_verify').click(function () {
			let set_otp = $('#set_otp').val();
			let get_otp = $('#get_otp').val();
			let mob_number = $('.number').val();
			
			if(set_otp != get_otp){
				$('.err_msg').html('<div class="alert alert-danger">OTP is incorrect</div>');
			}
			else{
				$('.err_msg').html('<div class="alert alert-success">Success</div>');
				window.location.href = "http://localhost/otg.omsaifoodservices.com/reset-password?number="+mob_number;
			}
			
		});
	});

// 	document.getElementById('timer').innerHTML =
//   05 + ":" + 11;
// startTimer();


// function startTimer() {
//   var presentTime = document.getElementById('timer').innerHTML;
//   var timeArray = presentTime.split(/[:]+/);
//   var m = timeArray[0];
//   var s = checkSecond((timeArray[1] - 1));
//   if(s==59){m=m-1}
//   if(m<0){
//     return
//   }
  
//   document.getElementById('timer').innerHTML =
//     m + ":" + s;
//   console.log(m)
//   setTimeout(startTimer, 1000);
  
// }

// function checkSecond(sec) {
//   if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
//   if (sec < 0) {sec = "59"};
//   return sec;
// }

// setTimeout(function() {
// 	alert('545');
// 	$('#set_otp').val('');
// }, 300000);
</script>

<!--Footer-->
