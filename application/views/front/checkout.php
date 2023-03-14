<!--Body Content-->
<div id="page-content">
	<!-- <?php print_r($ex_cust);?> -->



	<div class="section summery">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">

					<div class="card shadow">
						<div class="card-body">
							<div class="section-header text-center">
								<h4 class="user-titles">Order Summery</h4>
								<hr>
							</div>
							<table>
								<thead>
									<th>Product Details</th>

									<th>Total Amount</th>

								</thead>
								<tbody>
									<tr>
										<td>
											<?php
                                            if($this->cart->total_items()>0){
                                                foreach($cartItems as $item){
                                            ?>
											<?php echo $item['product_name']?>
											-
											<?php echo $item['name']?><br>
											<?php
                                                }
                                            }
                                            ?>
										</td>
										<td> 
                                        <?php
                                            if($this->cart->total_items()>0){
                                                foreach($cartItems as $item){
                                            ?>
											<i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $item['price']?>
											<br>
											<?php
                                                }
                                            }
                                            ?>
											</td>
									</tr>
									<tr></tr>
                                    <tfoot  style='border-top:1px solid #e7e0e0; margin-top:20px'>
                                        <tr><td></td><td >
                                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php print_r($this->cart->total()); ?> 
                                        </td></tr>
                                    </tfoot>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="card shadow">
						<div class="card-body">
							<div class="section-header text-center">
								<h4 class="user-titles">Booking Details</h4>
								<hr>
								<form class="customer" method="post" action="">
									<input type="hidden" class="form-control form-control-user"
										value="<?php echo $ex_cust[0]['cust_id'];?>" name="id">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
										value="<?php echo $this->security->get_csrf_hash();?>">
									<div class="form-group row">
										<div class="col-lg-6 mb-3 mt-3 mb-sm-0">
											<!-- <label for="c_name">Customer Name</label> -->
											<input type="text" name="c_name"
												value="<?php echo $ex_cust[0]['cust_name'];?>" id="c_name"
												class="form-control form-control-user" placeholder="Customer Name"
												required>
											<span id='spanName' class='float-left mt-2'>** Please enter name</span>
										</div>

										<div class="col-lg-6  mt-3">
											<!-- <label for="c_contact">Customer Contact</label> -->
											<input type="text" name="c_contact"
												value="<?php echo $ex_cust[0]['contact'];?>" id="c_contact"
												class="form-control form-control-user" placeholder="Contact" required>
											<span id='spanContact' class='float-left mt-2'>** Please enter contact
												number</span>
										</div>


										<div class="col-lg-6 mb-3 mt-3 mb-sm-0">
											<!-- <label for="c_email">Email Address</label> -->
											<input type="email" name="c_email"
												value="<?php echo $ex_cust[0]['email_id'];?>" id="c_email"
												class="form-control form-control-user" placeholder="Email Address"
												required>
											<span id='spanEmail' class='float-left mt-2'>** Please enter valid email
												address</span>
										</div>
										<?php
                                    if($ex_cust[0]['cust_id']==''){
                                    ?>
										<div class="col-lg-6 mt-3">
											<input type="text" name="c_password" value="" id="c_password"
												class="form-control form-control-user" placeholder="Password">
											<span id='spanPassword' class='float-left mt-2'>** Please enter
												password</span>
										</div>
										<?php
                                    }
                                    ?>


										<div class="col-lg-6 mb-3 mt-3 mb-sm-0">
											<!-- <label for="c_city">City</label> -->
											<input type="text" name="c_city" id="c_city"
												value="<?php echo $ex_cust[0]['city'];?>"
												class="form-control form-control-user" placeholder="City" required>
											<span id='spanCity' class='float-left mt-2'>** Please enter city</span>
										</div>


										<div class="col-lg-6 mt-3">
											<!-- <label for="c_address">Address</label> -->
											<input type="text" name="c_address"
												value="<?php echo $ex_cust[0]['address'];?>" id="c_address"
												class="form-control form-control-user" placeholder="Address" required>
											<span id='spanAddress' class='float-left mt-2'>** Please enter correct
												address</span>
										</div>


										<div class="col-lg-6 mt-3">
											<!-- <label for="c_pincode">Pincode</label> -->
											<input type="text" name="c_pincode"
												value="<?php echo $ex_cust[0]['pincode'];?>" id="c_pincode"
												class="form-control form-control-user" placeholder="Pincode" required>
											<span id='spanPin' class='float-left mt-2'>** Please enter correct
												pincode</span>
										</div>
									</div>
									<!-- <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="schedule">Pincode</label>
                                             <input type="date" name="schedule" value="<?php echo $ex_cust[0]['pincode'];?>" id="schedule" class="form-control form-control-user"
                                            placeholder="Pincode">
                                        </div>
                                </div> -->
									<div class="form-group row">
										<div class="col-lg-6 mt-3">
											<div class="row justify-content-center">

												<div class="form-check col-lg-8 text-left mb-3">
													<label class="form-check-label float-left">
														<input type="radio" class="form-check-input" value="cob" name="payment_method" checked="checked">Cash On Booking
													</label>
												</div>
												<!-- <div class="form-check col-lg-8 text-left mb-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="razorpay" name="payment_method">Pay Now
                                                </label>
                                                </div> -->
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-checkboxes">
												<div class="col-lg-12  float-left">
													<div class="form-group form-check text-left">
														<input type="checkbox" class="form-check-input"
															id="terms_services" name="terms_services" required>
														<label class="form-check-label" for="terms_services">By
															Proceeding you agree to the Terms of Service</label>

													</div>
													<span id='spanterm' class='float-left'>** Please check our Terms of Service</span>
												</div>
											</div>
										</div>
									</div>

                                    <div class="form-group row text-left">
										<div class="col-lg-12 mt-3 text-justify d-flex">
                                        <i class="fa fa-check-circle" style='font-size:20px;color:var(--var-brown);'></i> 
                                        <p class='ml-2'>Rs. <?php print_r($this->cart->total()); ?> will be payable on service charge towards the services selected via an online payment link sent to you post the successful completion of services.</p>
										</div>

										<div class="col-lg-12  mt-3 text-justify d-flex">
                                        <i class="fa fa-check-circle" style='font-size:20px;color:var(--var-brown);'></i> 
                                        <p class='ml-2'>In case you decide not to go ahead with the repairs recommended by the engineer. Rs.199 will be payable as visit charges.</p>
										</div>

                                        <div class="col-lg-12  mt-3 text-justify d-flex">
                                        <i class="fa fa-check-circle" style='font-size:20px;color:var(--var-brown);'></i>
                                        <p class='ml-2'> For detailed Term of services <a href='https://otgcares.com/terms'>click here</a>.</p>
										</div>
									</div>

									<div class="col-lg-12">
										<input type="submit" name="submit" value="I AGREE" class="theme-btn offer-btn " id='btn_fill'>
                                        <a href="<?php echo base_url('/'); ?>" class="theme-btn offer-btn1">I DISAGREE</a>
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
