<!--Body Content-->
<div id="page-content">
	<div class="section summery">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 mt-4">
					<div class="card shadow">
						<div class="card-body">
							<div class="section-header text-center">
								<h4 class="user-titles">Track Service Request</h4>
								<hr>
								<form class="customer" method="post" action="">
									<input type="hidden" class="form-control form-control-user"
										value="<?php echo $ex_cust[0]['cust_id'];?>" name="id">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
										value="<?php echo $this->security->get_csrf_hash();?>">
									<div class="form-group row justify-content-center">

										<div class="col-lg-6 mb-3 mt-3 mb-sm-0">
											<!-- <label for="c_city">City</label> -->
											<input type="text" name="c_city" id="c_city"
												value=""
												class="form-control form-control-user" placeholder="Mobile Number / Email / Service Request Id" required>
											<span id='spanCity' class='float-left mt-2'>** Please enter city</span>
										</div>
									<div class="col-lg-12">

										<input type="submit" name="submit" value="Continue" class="theme-btn offer-btn "
											id='btn_fill'>
									</div>
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

<!--Footer-->


<script>





</script>
