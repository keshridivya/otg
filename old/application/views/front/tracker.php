<!--Body Content-->
<div id="page-content">
	<div class="section summery">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 mt-4 sendrequest">
					<div class="card shadow2">
						<div class="card-body">
							<div class="section-header text-center">
								<h4 class="user-titles">Track Service Request</h4>
								<hr>
								<form class="customer" method="post" action="">
									<input type="hidden" class="form-control form-control-user"
										value="<?= $this->session->userdata('cid') ?>" name="id">
									<input type="hidden" class="csrf"
										name="<?php echo $this->security->get_csrf_token_name(); ?>"
										value="<?php echo $this->security->get_csrf_hash();?>">
									<div class="form-group row justify-content-center">
										<div class="col-lg-6 mb-3 mt-3 mb-sm-0">
											<!-- <label for="c_city">City</label> -->
											<input type="text" name="serviceno" id="serviceno" value=""
												class="form-control form-control-user"
												placeholder="Mobile Number / Email / Service Request Id" required>
											<span id='spanservice' class='float-left mt-2'>Search Value is not
												exist</span>
										</div>
										<div class="col-lg-12">

											<input type="button" name="submit" value="Continue"
												class="theme-btn offer-btn " id='servicebnt'>
										</div>
								</form>
							</div>
						</div>
					</div>
</div>
				</div>

				<div class="col-12 service-request">
					<div class="card shadow1">
						<div class="card-body">
							<div class="section-header text-center">
								<h4 class="user-titles">Track Service Request</h4>
								<hr>

								<div class="row text-left justify-content-center">
									<div class="col-12 col-sm-8">
									<h3 class="mb-4">Split Ac</h3>
									<div class="row">
										<div class="col-6">
											<p>Service Id </p>
											<p>Request Date</p>
											<p>Status</p>
										</div>
										<div class="col-6">
											<p>: 12121</p>
											<p>: 22-32-32</p>
											<p>: Completed</p>
										</div>
									</div>
									</div>
								</div>
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

<!--Footer-->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>

<script>
	$(document).ready(function () {
		$('#spanservice').hide();
		$('#servicebnt').click(function () {
			let serviceno = $('#serviceno').val();
			var csrfName = $('.csrf').attr('name');
			var csrfHash = $('.csrf').val();
			$.ajax({
				url: "<?= base_url('welcome/service_request') ?>",
				method: "post",
				data: {
					serviceno: serviceno,
					[csrfName]: csrfHash,
				},
				dataType: "json",
				success: function (response) {
					$('.csrf').val(response.token);
					if (response.data == 'error') {
						$('#spanservice').show().css('color', 'red');
					} else {
						$('.sendrequest').hide();
						$('.service-request').show();
						// window.location
					}
				},
				error: function () {
					alert('Request not send. Please try gain');
				}
			})
		})
	})

</script>
