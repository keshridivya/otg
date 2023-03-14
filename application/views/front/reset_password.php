<!--Body Content-->
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
										<input type='hidden' name='mobile' value='<?= $_GET['number']; ?>'>

										<div class="row justify-content-center">
											<div class="col-lg-6">
												<div class="form-group">
													<input type="text" value="" class='form-control number' id='new_pass'
														Placeholder='New Password' name='password'>
												</div>
                                                <span id='spanNewPass'>Password field required</span>
											</div>
										</div>
										<div class="row justify-content-center">
											<div class="col-lg-6 err_msg">
												
											</div>
										</div>
										<button type="submit" name="submit" value="otp" class="btn new_pass_btn" disabled>Change Password</button>

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


<!--Footer-->
