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

									<th style="text-align:end">Total Amount</th>

								</thead>
								<tbody>
									<tr>
										<td>
											<?php
                                            if($this->cart->total_items()>0){
                                                foreach($cartItems as $item){
												echo "<img src='".base_url($item['image'])."' width='40'>";
                                            ?>
											<?php echo $item['product_name']?>
											-
											<?php echo $item['name']?><br>
											<?php
                                                }
                                            }
                                            ?>
										</td>
										<td style="text-align:end" id="total_amt">
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
								<tfoot style='border-top:1px solid #e7e0e0; margin-top:20px'>
								<tr>
									<td></td>
									<td><div class="col-lg-12 mt-3">
											<div class="form-group text-left"> <label>Have coupon?</label>
												<div class="input-group"> <input type="text"
														class="form-control inputcoupon" name=""
														placeholder="Coupon code"> <span class="input-group-append">
														<button type="button" class="btn btn-primary btn-apply coupon">Apply</button>
													</span> </div>
													<span id="spancoupon"></span>
											</div>
										</div></td>
								</tr>
									<tr>
										<td></td>
										<td style="text-align:end"><i class="fa-solid fa-indian-rupee-sign"></i>
											<?php print_r($this->cart->total()); ?>
										</td>
									</tr>
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
								<div class="row text-left">
									<div class="col-lg-6  mb-4 ">
										<div class=" b0x-shadow"><div class="section-header account_heading">
											<input type="hidden" class="cbtn" value="booking">
											<input type="hidden" class="ccity"
												value="<?php echo $ex_cust[0]['city'];?>">
											<input type="hidden" class="cid"
												value="<?php echo $ex_cust[0]['cust_id'];?>">
											<h3 class="cname"><?php echo $ex_cust[0]['cust_name'];?></h3>
											<p class="ccont"><?php echo $ex_cust[0]['contact'];?></p>
											<p class="cemail"><?php echo $ex_cust[0]['email_id'];?></p>
											<p class="caddress"><?php echo $ex_cust[0]['address'];?>,</p>
											<p class="cpincode"><?php echo $ex_cust[0]['pincode'];?></p>
										</div>
										<div><a class="cust_edit">Edit</a>
											<button class="btn-booking">Booking to this address</button></div></div>
									</div>

									<?php
								foreach($shipping_address as $add){
								?>
									<div class="col-lg-6 mb-4 ">
										<div class=" b0x-shadow">
										<div class="section-header account_heading">
											<input type="hidden" class="cbtn" value="shipping">
											<input type="hidden" class="ccity" value="<?php echo $add['city'];?>">
											<input type="hidden" class="cid" value="<?php echo $add['id'];?>">
											<h3 class="cname"><?php echo $add['name'];?></h3>
											<p class="ccont"><?php echo $add['contact'];?></p>
											<p class="cemail"><?php echo $add['email'];?></p>
											<p class="caddress"><?php echo $add['address'];?>,</p>
											<p class="cpincode"><?php echo $add['pincode'];?></p>
										</div>
										<div><a class="cust_edit"> Edit</a> <button class="btn-booking">Booking to this
												address</button></div>
												</div>
									</div>
									<?php } ?>
								</div>

								<form class="customer" method="post" action="" id="book_form">
									<input type="hidden" class="form-control form-control-user" id="custid"
										value="<?php echo $ex_cust[0]['cust_id'];?>" name="id">
										<input type="hidden" class="form-control form-control-user" id="codeper"
										value="" name="codeper">
									<input type="hidden" class="csrf" name="<?php echo $this->security->get_csrf_token_name(); ?>"
										value="<?php echo $this->security->get_csrf_hash();?>">
									<div class="form-group row">
										<div class="col-lg-6 mb-sm-0">
											<input type="hidden" name="c_name"
												value="<?php echo $ex_cust[0]['cust_name'];?>" id="c_name"
												class="form-control form-control-user" placeholder="Customer Name"
												required>
											<span id='spanName' class='float-left mt-2'>** Please enter name</span>
										</div>

										<div class="col-lg-6">
											<input type="hidden" name="c_contact"
												value="<?php echo $ex_cust[0]['contact'];?>" id="c_contact"
												class="form-control form-control-user" placeholder="Contact" required>
											<span id='spanContact' class='float-left mt-2'>** Please enter contact
												number</span>
										</div>

										<div class="col-lg-6 mb-sm-0">
											<input type="hidden" name="c_email"
												value="<?php echo $ex_cust[0]['email_id'];?>" id="c_email"
												class="form-control form-control-user" placeholder="Email Address"
												required>
											<span id='spanEmail' class='float-left mt-2'>** Please enter valid email
												address</span>
										</div>
										<div class="col-lg-6 mb-sm-0">
											<input type="hidden" name="c_city" id="c_city"
												value="<?php echo $ex_cust[0]['city'];?>"
												class="form-control form-control-user" placeholder="City" required>
											<span id='spanCity' class='float-left mt-2'>** Please enter city</span>
										</div>

										<div class="col-lg-6 ">
											<input type="hidden" name="c_address"
												value="<?php echo $ex_cust[0]['address'];?>" id="c_address"
												class="form-control form-control-user" placeholder="Address" required>
											<span id='spanAddress' class='float-left mt-2'>** Please enter correct
												address</span>
										</div>

										<div class="col-lg-6">
											<input type="hidden" name="c_pincode"
												value="<?php echo $ex_cust[0]['pincode'];?>" id="c_pincode"
												class="form-control form-control-user" placeholder="Pincode" required>
											<span id='spanPin' class='float-left mt-2'>** Please enter correct
												pincode</span>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-lg-6 mt-3">
											<div class="row justify-content-center" style="    margin-left: 20px;">
												<div class="form-check col-lg-8 text-left mb-3">
													<label class="form-check-label float-left">
														<input type="radio" class="form-check-input" value="cob"
															name="payment_method" checked="checked">Cash On Booking
													</label>
												</div>
												<div class="form-check col-lg-8 text-left mb-3">
													<label class="form-check-label">
														<input type="radio" class="form-check-input" value="razorpay"
															name="payment_method">Pay Now
													</label>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-12 mt-3">
											<div class="row justify-content-center" style="    margin-left: 20px;">
												<div class="form-check col-sm-3 col-12 text-left mb-3">
													<label class="form-check-label float-left">
														<input type="radio" class="form-check-input" value="9 am to 1pm"
															name="time_slot" checked="checked">9 am to 1pm
													</label>
												</div>
												<div class="form-check col-sm-3 col-12 text-left mb-3">
													<label class="form-check-label">
													<input type="radio" class="form-check-input" value="1 pm to 5pm"
															name="time_slot" checked="checked">1 pm to 5pm
													</label>
												</div>
												<div class="form-check col-sm-3 col-12 text-left mb-3">
													<label class="form-check-label">
													<input type="radio" class="form-check-input" value="5 pm to 9pm"
															name="time_slot" checked="checked">5 pm to 9pm
													</label>
												</div>
											</div>
										</div>
										
									</div>

									<!-- <div class="form-group row">
										
									</div> -->

									<div class="form-group row">
										
										<div class="col-lg-6">
											<div class="form-checkboxes">
												<div class="col-lg-12  float-left">
													<div class="form-group form-check text-left">
														<input type="checkbox" class="form-check-input"
															id="terms_services" name="terms_services" required>
														<label class="form-check-label" for="terms_services">By
															Proceeding you agree to the Terms of Service</label>
													</div>
													<span id='spanterm' class='float-left'>** Please check our Terms of
														Service</span>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group row text-left">
										<div class="col-lg-12 mt-3 text-justify d-flex">
											<i class="fa fa-check-circle"
												style='font-size:20px;color:var(--var-brown);'></i>
											<p class='ml-2'>Rs. <?php print_r($this->cart->total()); ?> will be payable
												on service charge towards the services selected via an online payment
												link sent to you post the successful completion of services.</p>
										</div>

										<div class="col-lg-12  mt-3 text-justify d-flex">
											<i class="fa fa-check-circle"
												style='font-size:20px;color:var(--var-brown);'></i>
											<p class='ml-2'>In case you decide not to go ahead with the repairs
												recommended by the engineer. Rs.199 will be payable as visit charges.
											</p>
										</div>

										<div class="col-lg-12  mt-3 text-justify d-flex">
											<i class="fa fa-check-circle"
												style='font-size:20px;color:var(--var-brown);'></i>
											<p class='ml-2'> For detailed Term of services <a
													href='https://otgcares.com/terms'>click here</a>.</p>
										</div>
									</div>

									<div class="col-lg-12">
										<input type="submit" name="submit" value="I AGREE" class="theme-btn offer-btn " id='btn_fill'>
										<a href="<?php echo base_url('/'); ?>" class="theme-btn offer-btn1">I
											DISAGREE</a>
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
	<div class="modal fade" id="modal_edit" data-backdrop="static" data-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 style='color:green;padding:10px'>Service Address</h1>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="customer pt-4 p-4" method="post" action="<?= base_url('welcome/checkout_form') ?>">
					<div class="modal-body" style="height:67vh;overflow-x:hidden">
						<div class="row justify-content-center">
							<input type="hidden" id="customer_btn" name="customer_btn">
							<input type="hidden" id="customer_id" value="" name="customer_id">
							<input type="hidden" 
								name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_name">Customer Name</label>
									<input type="text" name="customer_name" value="" id="customer_name"
										class="form-control form-control-user" placeholder="Customer Name">
									<span id='spancustomer_name'>Enter your name</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="c_contact">Customer Contact</label>
									<input type="text" name="customer_contact" value="" id="customer_contact"
										class="form-control form-control-user" placeholder="Contact" readonly>
									<span id='spancustomer_contact'>Enter 10 digit Mobile number</span>
								</div>

								<div class="col-sm-6 mb-3 ">
									<label for="c_email">Email Address</label>
									<input type="email" name="customer_email" value="" id="customer_email"
										class="form-control form-control-user" placeholder="Email Address">
									<span id='spancustomer_email'>Please enter correct email address</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="c_city">City</label>
									<input type="text" name="customer_city" id="customer_city" value=""
										class="form-control form-control-user" placeholder="City">
									<span id='spancustomer_city'>Please enter correct city</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="c_address">Address</label>
									<input type="text" name="customer_address" value="" id="customer_address"
										class="form-control form-control-user" placeholder="Address">
									<span id='spancustomer_address'>Please enter correct address</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="c_pincode">Pincode</label>
									<input type="text" name="customer_pincode" value="" id="customer_pincode"
										class="form-control form-control-user" placeholder="Pincode">
									<span id='spancustomer_pincode'>Please enter 6 digit pincode</span>
								</div>
							</div>
							<input type="submit" name="submit" value="Edit" class="theme-btn" id="submit-btn"
								style="background:green;color:#fff">
							<button type="button" class="theme-btn" data-dismiss="modal"
								style="font-size:15px;margin-left:10px">Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>
<!--End Body Content-->

<!--Footer-->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>
<script>
	$(document).on('click', '.coupon', function () {
		let cartItems ="<?=  $item['product_name'] ?>";
		let inputcoupon = $('.inputcoupon').val();
		var csrfName = $('.csrf').attr('name');
		var csrfHash = $('.csrf').val();
		let total_amt = $('#total_amt').text();
		$.ajax({
			url: "<?= base_url('welcome/coupon_check') ?>",
			method: "post",
			data: {
				inputcoupon: inputcoupon,
				cartItems :cartItems,
				[csrfName]: csrfHash,
			},
			dataType: "json",
			success: function (response) {
				$('.csrf').val(response.token);
				let percentage = response.percentage;
				let amt = total_amt-(total_amt*percentage/100);
				if(response.coupon == 'success'){
				$('#spancoupon').text(
					'Coupon code applied successfully'
				).css('color','green');
				$('#codeper').val(amt);
				$('#total_amt').text(amt);
				$('#btn_fill').attr('disabled',false);
			}else{
				$('#spancoupon').text(
					'Sorry. The offer you are trying to avail does not exist or has expired!'
				).css('color','red');
				$('#codeper').val(total_amt);
				$('#btn_fill').attr('disabled',true);
			}
			},
			error: function () {
				alert('OTP not send .Please try again');
			}
		})
	});

	

</script>
