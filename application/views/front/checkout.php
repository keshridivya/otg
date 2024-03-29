<!--Body Content-->
<style>
	ul li {
		list-style: none;
	}

	.radiobtn {
		display: none;
	}

	.radio-label {
		border-left: 2px solid #210D30;
		*/ background-color: #fff;
		display: block;
		margin: 4vh 0;
		width: 100%;
		padding: 5px;
		border: 1px solid lightblue;
	}

	.radio-label {
		vertical-align: middle;
		-webkit-transform: translateZ(0);
		transform: translateZ(0);
		box-shadow: 0 0 1px rgba(0, 0, 0, 0);
		-webkit-backface-visibility: hidden;
		backface-visibility: hidden;
		-moz-osx-font-smoothing: grayscale;
		position: relative;
		-webkit-transition-property: color;
		transition-property: color;
		-webkit-transition-duration: 0.5s;
		transition-duration: 0.5s;
		width: 100%;
	}

	.radio-label:before {
		content: "";
		position: absolute;
		z-index: -1;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: var(--var-green);
		-webkit-transform: scaleX(0);
		transform: scaleX(0);
		-webkit-transform-origin: 0 50%;
		transform-origin: 0 50%;
		-webkit-transition-property: transform;
		transition-property: transform;
		-webkit-transition-duration: 0.5s;
		transition-duration: 0.5s;
		-webkit-transition-timing-function: ease-in-out;
		transition-timing-function: ease-in-out;
	}

	.radio-label.checked {
		color: white !important;
	}

	.radio-label.checked:before {
		-webkit-transform: scaleX(1);
		transform: scaleX(1);
	}

	.slick-next {
    right: -3px;

}
.slick-prev {
    left: 3px;
}
.slick-arrow {
	background: var(--var-green);
	border-radius:50%;
}
.week_slide{
	padding:0 20px;
}
.slick-prev::after{
	content: "<";
    position: absolute;
    color: #fff;
    font-size: 13px;
    width: 100%;
    height: 100%;
    top: 10px;
    left: 0;
    font-weight: 700;
}
.slick-next::after{
	content: ">";
    position: absolute;
    color: #fff;
    font-size: 13px;
    width: 100%;
    height: 100%;
    top: 10px;
    left: 0;
    font-weight: 700;
}

</style>
<script type="text/javascript">
	var citiesByState = {
		Maharashtra: ["Mumbai", "Pune", "Nagpur", "Thane", "Pimpri Chinchwad", "Nashik", "Kalyan Dombivli",
			"Vasai Virar", "Chhatrapati Sambhajinagar", "Navi Mumbai", "Solapur", "Mira Bhayandar",
			"Bhiwandi Nizampur", "Amravati", "Nanded Waghala", "Kolhapur", "Ulhasnagar", "Sangli Miraj Kupwad",
			"Malegaon", "Jalgaon", "Akola", "Latur", "Dhule", "Ahmednagar", "Chandrapur", "Parbhani",
			"Ichalkaranji", "Jalna", "Ambarnath", "Panvel", "Bhusawal", "Badlapur", "Beed", "Gondia", "Satara",
			"Barshi", "Yavatmal", "Achalpur", "Dharashiv", "Nandurbar", "Wardha", "Udgir", "Hinganghat"
		],
		Delhi: ["New Delhi", "Bhalswa Jahangir Village", "Kirari Suleman Nagar Village", "Karawal Nagar", "Hastsal",
			"Mandoli", "Deoli", "Gokalpuri", "Dallupura", "Taj Pul", "Nangloi", "Chilla Sarda Banger",
			"Pooth Kalan", "Burari", "Gharoli", "Jafrabad", "Noida", "Ghaziabad", "Fatehpur Beri",
			"Delhi Cantonment", "Alipur", "Kair", "Karala Village", "Siraspur", "Chhawla", "Ghitorni", "Sultanpur"
		]
	}

	function makeSubmenu(value) {
		if (value.length == 0) document.getElementById("customer_city").innerHTML = "<option></option>";
		else {
			var citiesOptions = "";
			for (cityId in citiesByState[value]) {
				citiesOptions += "<option>" + citiesByState[value][cityId] + "</option>";
			}
			document.getElementById("customer_city").innerHTML = citiesOptions;
			document.getElementById("city").innerHTML = citiesOptions;
		}
	}

	function resetSelection() {
		document.getElementById("countrySelect").selectedIndex = 0;
		document.getElementById("customer_city").selectedIndex = 0;
		document.getElementById("city").selectedIndex = 0;
	}

</script>
<div id="page-content">
	<!-- <?php print_r($ex_cust);?> -->
	<div class="section summery">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-9">
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
											<?php echo $item['product_name']?>(<?php echo $item['product_category']?>)

											<?php
											if($item['category_name'] == 'Maintenance and repair'){
												echo '- '.
												$item['name'].'<br>';
												echo '<input type="hidden" value="Maintenance and repair" class="mainten" >'; 
											}
											else{
												echo '<input type="hidden" value="'.$item['product_category'].'" class="mainten" >'; 
												
											}
                                                }
                                            }
                                            ?>
										</td>
										<td style="text-align:end">
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
										<td>
											<div class="form-group text-left"> <label>Have coupon?</label>
												<div class="input-group"> <input type="text"
														class="form-control inputcoupon" name=""
														placeholder="Coupon code"> <span class="input-group-append">
														<button type="button"
															class="btn btn-primary btn-apply coupon">Apply</button>
													</span> </div>
												<span id="spancoupon"></span>
											</div>
										</td>
									</tr>
									<tr>
										<td></td>
										<td style="text-align:end"><i class="fa-solid fa-indian-rupee-sign"></i>
											<span id="total_amt"><?php print_r($this->cart->total()); ?></span>
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
								<div class="tracker_details_box">
									<h4 class="user-titles mobiletitle">Booking Details</h4>
									<div class="col-lg-2 col-sm-4 floatright">
										<div class="section-header text-right">
											<div class="plan-btns">
												<a style="cursor:pointer" data-toggle="modal"
													data-target="#staticBackdrop" class="add_address">Add Address</a>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row text-left">
									<div class="col-sm-6  mb-4 ">
										<div class=" b0x-shadow">
											<div class="section-header account_heading">
												<input type="hidden" class="cbtn" value="booking">
												<input type="hidden" class="ccity"
													value="<?php echo $ex_cust[0]['city'];?>">
												<input type="hidden" class="cid"
													value="<?php echo $ex_cust[0]['cust_id'];?>">
												<h3 class="cname"><?php echo $ex_cust[0]['cust_name'];?></h3>
												<p class="ccont"><?php echo $ex_cust[0]['contact'];?></p>
												<p class="cemail"><?php echo $ex_cust[0]['email_id'];?></p>
												<p class="caddress d-inline">
													<?php echo $ex_cust[0]['address'];?>,
												</p>
												<span><?php echo $ex_cust[0]['city'];?></span>
												<p class="cpincode"><?php echo $ex_cust[0]['pincode'];?></p>
											</div>
											<div><a class="cust_edit">Edit</a>
												<button class="btn-booking btn-active">Selected address</button></div>
										</div>
									</div>

									<?php
								foreach($shipping_address as $add){
								?>
									<div class="col-sm-6 mb-4 ">
										<div class=" b0x-shadow">
											<div class="section-header account_heading">
												<input type="hidden" class="cbtn" value="shipping">
												<input type="hidden" class="ccity" value="<?php echo $add['city'];?>">
												<input type="hidden" class="cid" value="<?php echo $add['id'];?>">
												<h3 class="cname"><?php echo $add['name'];?></h3>
												<p class="ccont"><?php echo $add['contact'];?></p>
												<p class="cemail"><?php echo $add['email'];?></p>
												<p class="caddress d-inline">
													<?php echo $add['address'];?>,</p>
												<span><?php echo $add['city'];?></span>
												<p class="cpincode"><?php echo $add['pincode'];?></p>
											</div>
											<div><a class="cust_edit"> Edit</a> <button class="btn-booking">Booking to
													this
													address</button></div>
										</div>
									</div>
									<?php } ?>
								</div>

								<form class="customer" method="post" action="" id="book_form">
									<input type="hidden" class="form-control form-control-user" id="custid"
										value="<?php echo $ex_cust[0]['cust_id'];?>" name="id">
									<input type="hidden" class="form-control form-control-user" id="codeper"
										value="<?php print_r($this->cart->total()); ?>" name="codeper">
									<input type="hidden" class="form-control form-control-user" id="perge" value="0"
										name="percentage">
									<input type="hidden" class="csrf"
										name="<?php echo $this->security->get_csrf_token_name(); ?>"
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
											<!-- <span id='spanAddress' class='float-left mt-2'>** Please enter correct
												address</span> -->
										</div>

										<div class="col-lg-6">
											<input type="hidden" name="c_pincode"
												value="<?php echo $ex_cust[0]['pincode'];?>" id="c_pincode"
												class="form-control form-control-user" placeholder="Pincode" required>
											<!-- <span id='spanPin' class='float-left mt-2'>** Please enter correct
												pincode</span> -->
										</div>
									</div>

									<div class="form-group row">
										<div class="col-lg-5 mt-3">
											<div class="row justify-content-center" style="    margin-left: 20px;">
												<div class="form-check col-lg-8 text-left mb-3">
													<label class="form-check-label float-left">
														<input type="radio" class="form-check-input" value="cob"
															name="payment_method" checked="checked">Cash On Booking
													</label>
												</div>
												<!-- <div class="form-check col-lg-8 text-left mb-3">
													<label class="form-check-label">
														<input type="radio" class="form-check-input" value="razorpay"
															name="payment_method">Pay Now
													</label>
												</div> -->
											</div>
										</div>
										<?php
										if($item['category_name'] != 'Extended Warranty'){
										?>
										<div class="col-sm-7 col-12 mt-4">
											<h3 class="">Select date and time for Maintenance & Repair Service</h3>

											<ul class="row week_slide">
											
												<li class="col-sm-2 col-4">
													<?php
													$today = date('Y-m-d'); 
													$day =date("l");
													$current_time = time(); 
													$given_time = strtotime('2023-04-26 12:00:00');
													?>
													<label class="full-width radio-label ">
														<?php
														if ($current_time >= $given_time) { ?>
													
													<input type="radio"
															class="radiobtn"
															value="<?php echo "$day, not available"; ?>"
															name="time_slot" disabled><?php echo "$day<br> not available"; ?></input>
															<?php } else { ?> 
																<input type="radio"
															class="radiobtn"
															value="<?php echo "$day<br> $today"; ?>"
															name="time_slot"><?php echo "$day<br> $today"; ?></input>
															<?php }
														?>
													</label>
												</li>
												<li class="col-sm-2 col-4">
													<?php
													$today = date('Y-m-d');  
													$one_day_after = date('Y-m-d', strtotime($today . ' +1 day'));  
													$day_after = date('l', strtotime($one_day_after)); 
													?>
													<label class="full-width radio-label checked"><input type="radio"
															class="radiobtn"
															value="<?php echo "$day_after, $one_day_after"; ?>"
															name="time_slot"><?php echo "$day_after<br> $one_day_after"; ?></input></label>
												</li>
												<li class="col-sm-2 col-4">
													<?php
													$two_days_after = date('Y-m-d', strtotime($today . ' +2 day')); 
													$day_after = date('l', strtotime($two_days_after));
													?>
													<label class="full-width radio-label"><input type="radio"
															class="radiobtn"
															value="<?php echo "$day_after, $two_days_after"; ?>"
															name="time_slot"><?php echo "$day_after<br> $two_days_after"; ?></input></label>
												</li>
												<li class="col-sm-2 col-4">
													<?php
													$three_days_after = date('Y-m-d', strtotime($today . ' +3 day')); 
													$day_after = date('l', strtotime($three_days_after)); 
													?>
													<label class="full-width radio-label"><input type="radio"
															class="radiobtn"
															value="<?php echo "$day_after, $three_days_after"; ?>"
															name="time_slot"><?php echo "$day_after<br> $three_days_after"; ?></input></label>
												</li>
												<li class="col-sm-2 col-4">
													<?php
													$four_days_after = date('Y-m-d', strtotime($today . ' +4 day')); 
													$day_after = date('l', strtotime($four_days_after));
													?>
													<label class="full-width radio-label"><input type="radio"
															class="radiobtn"
															value="<?php echo "$day_after, $four_days_after"; ?>"
															name="time_slot"><?php echo "$day_after<br> $four_days_after"; ?></input></label>
												</li>
												<li class="col-sm-2 col-4">
													<?php
													$five_days_after = date('Y-m-d', strtotime($today . ' +5 day')); 
													$day_after = date('l', strtotime($five_days_after));
													?>
													<label class="full-width radio-label"><input type="radio"
															class="radiobtn"
															value="<?php echo "$day_after, $five_days_after"; ?>"
															name="time_slot"><?php echo "$day_after<br> $five_days_after"; ?></input></label>
												</li>
												<li class="col-sm-2 col-4">
													<?php
													$six_days_after = date('Y-m-d', strtotime($today . ' +6 day')); 
													$day_after = date('l', strtotime($six_days_after));
													?>
													<label class="full-width radio-label"><input type="radio"
															class="radiobtn"
															value="<?php echo "$day_after, $six_days_after"; ?>"
															name="time_slot"><?php echo "$day_after<br> $six_days_after"; ?></input></label>
												</li>
											</ul>
											<!-- <div class="row justify-content-center" style="    margin-left: 20px;">
													<div class="form-check col-sm-8 col-12 text-left mb-3">
														<label class="form-check-label float-left">
															<input type="datetime-local" class="form-check-input"
																value="<?= date('y-m-d h:i') ?>" name="time_slot">
														</label>
													</div>
												</div> -->
											<div class="row justify-content-center">
												<div class="form-check col-sm-3 col-4 text-left mb-3">
													<label class="form-check-label">
														<input type="radio" class="form-check-input" value="1 pm to 5pm"
															name="timepm">9 am to 1pm
													</label>
												</div>
												<div class="form-check col-sm-3 col-4 text-left mb-3">
													<label class="form-check-label">
														<input type="radio" class="form-check-input" value="1 pm to 5pm"
															name="timepm">1 pm to 5pm
													</label>
												</div>
												<div class="form-check col-sm-3 col-4 text-left mb-3">
													<label class="form-check-label">
														<input type="radio" class="form-check-input" value="5 pm to 9pm"
															name="timepm">5 pm to 9pm
													</label>
												</div>
											</div>
										</div>
										<?php } ?>
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
									<div class="col-lg-12">
										<input type="submit" name="submit" value="I AGREE" class="theme-btn offer-btn "
											id='btn_fill'>
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
					<div class="modal-body">
						<div class="row justify-content-center">
							<input type="hidden" id="customer_btn" name="customer_btn">
							<input type="hidden" id="customer_id" value="" name="customer_id">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3">
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
									<label for="c_city">State</label>
									<select id="countrySelect" size="1" onchange="makeSubmenu(this.value)">
										<option value="" disabled selected>Choose State</option>
										<option>Maharashtra</option>
										<!-- <option>Delhi</option> -->
									</select>
								</div>
								<div class="col-sm-6 mb-3">

									<label for="c_city">City</label>
									<!-- <input type="text" name="customer_city" id="customer_city" value="" class="form-control form-control-user" placeholder="City"> -->
									<select name="customer_city" id="customer_city" value=""
										class="form-control form-control-user citySelect">
										<option value="">Select City</option>
									</select>
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

	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
					<div class="modal-body">
						<div class="row justify-content-center">

							<input type="hidden" id="customer_id" value="" name="id">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 ">
									<label for="c_name">Customer Name</label>
									<input type="text" name="username" value="" id="username"
										class="form-control form-control-user" placeholder="Customer Name">
									<span id='spanusername'>Enter your name</span>
								</div>
								<div class="col-sm-6 mb-3 ">
									<label for="c_contact">Customer Contact</label>
									<input type="text" name="mobile" id="mobile" class="form-control form-control-user"
										placeholder="Contact">
									<span id='spanmobile'>Enter 10 digit Mobile number</span>
								</div>

								<div class="col-sm-6 mb-3 ">
									<label for="c_email">Email Address</label>
									<input type="email" name="email_id" value="" id="email_id"
										class="form-control form-control-user" placeholder="Email Address">
									<span id='spanemail'>Please enter correct email address</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="c_city">State</label>
									<select id="countrySelect" size="1" onchange="makeSubmenu(this.value)">
										<option value="" disabled selected>Choose State</option>
										<option>Maharashtra</option>
										<!-- <option>Delhi</option> -->
									</select>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="c_city">City</label>
									<select name="city" id="city" value="" class="form-control form-control-user">
										<option value="">Select City</option>
									</select>
									<span id='spancity'>Please enter correct city</span>
								</div>
								<!-- <div class="col-sm-6 mb-3 ">
									<label for="c_city">City</label>
									<input type="text" name="city" id="city" value=""
										class="form-control form-control-user" placeholder="City">
									<select name="city" id="city" value="" class="form-control form-control-user">
										<option value="">Select City</option>
										<option value="Mumbai">Mumbai</option>
										<option value="Thane">Thane</option>
										<option value="Kalyan-Dombivli">Kalyan-Dombivli</option>
										<option value="Navi Mumbai">Navi Mumbai</option>
										<option value="Mira Bhayandar">Mira Bhayandar</option>
										<option value="Bhiwandi Nizampur">Bhiwandi Nizampur</option>
										<option value="Ulhasnagar">Ulhasnagar</option>
										<option value="Panvel">Panvel</option>
										<option value="Badlapur">Badlapur</option>
										<option value="Ambarnath">Ambarnath</option>
										<option value="Amravati">Amravati</option>
										<option value="Delhi">Delhi</option>
									</select>
									<span id='spancity'>Please enter correct city</span>
								</div> -->

								<div class="col-sm-6 mb-3 ">
									<label for="c_address">Address</label>
									<input type="text" name="address" value="" id="address"
										class="form-control form-control-user" placeholder="Address">
									<span id='spanAddress'>Please enter correct address</span>
								</div>
								<div class="col-sm-6 mb-3 ">
									<label for="c_pincode">Pincode</label>
									<input type="text" name="pincode" value="" id="pincode"
										class="form-control form-control-user" placeholder="Pincode">
									<span id='spanPin'>Please enter 6 digit pincode</span>
								</div>
							</div>

						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" name="submit" id="signupbtn" class="theme-btn  offer-btn " value="add"
							style="font-size:20px;cursor:pointer;color:#fff">Add</button>
						<button type="button" class="theme-btn" data-dismiss="modal"
							style="font-size:20px">Close</button>

					</div>
				</form>

			</div>
		</div>
	</div>


</div>
<!--End Body Content-->

<!--Footer-->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$(document).on('click', '.coupon', function () {
		let cartItems = "<?=  $item['product_name'] ?>";
		let servicename = "<?=  $item['name'] ?>";
		let inputcoupon = $('.inputcoupon').val();
		let service = $('.mainten').val();
		var csrfName = $('.csrf').attr('name');
		var csrfHash = $('.csrf').val();
		let total_amt = $('#total_amt').text();
		$.ajax({
			url: "<?= base_url('welcome/coupon_check') ?>",
			method: "post",
			data: {
				inputcoupon: inputcoupon,
				cartItems: cartItems,
				servicename: servicename,
				service: service,
				[csrfName]: csrfHash,
			},
			dataType: "json",
			success: function (response) {
				$('.csrf').val(response.token);
				let percentage = response.percentage;
				let amt = total_amt - (total_amt * percentage / 100);
				if (response.coupon == 'success') {
					$('#spancoupon').text(
						'Coupon code applied successfully'
					).css('color', 'green');
					$('#codeper').val(amt);
					$('#total_amt').text(amt);
					$('#perge').val(response.percentage);
					// alert(total_amt);
					// $('#btn_fill').attr('disabled',false);
				} else {
					$('#spancoupon').text(
						'Sorry. The offer you are trying to avail does not exist or has expired!'
					).css('color', 'red');
					$('#codeper').val(total_amt);
					// $('#btn_fill').attr('disabled',true);
				}
			},
			error: function () {
				alert('OTP not send .Please try again');
			}
		})
	});

	// checkdata();
	function checkdata() {
		let cartItems = "<?=  $item['product_name'] ?>";
		var csrfName = $('.csrf').attr('name');
		var csrfHash = $('.csrf').val();
		let c_pincode = $('#c_pincode').val();
		let c_city = $('#c_city').val();
		$.ajax({
			url: "<?= base_url('welcome/checkpin') ?>",
			method: "post",
			data: {
				c_pincode: c_pincode,
				c_city: c_city,
				cartItems: cartItems,
				[csrfName]: csrfHash,
			},
			dataType: "json",
			success: function (response) {
				$('.csrf').val(response.token);
				if (response.msg == 'success') {
					alert('sorry, this pincode is not serviceable on this product');
					pincheck_error = false;
					window.location.href = '<?= base_url("welcome/checkout") ?>';
					return false;
				} else if (response.msg == 'nocity') {
					alert('sorry, City is not serviceable');
					pincheck_error = false;
					window.location.href = '<?= base_url("welcome/checkout") ?>';
					return false;
				} else {
					pincheck_error = true;
					return true;
				}
			},
			error: function () {
				alert('OTP not send .Please try again');
			}
		})
	}

</script>
<script>
	$(document).ready(function () {
		$("input[name=time_slot]").click(function () {
			$('input[name=time_slot]:not(:checked)').parent().removeClass("checked");
			$('input[name=time_slot]:checked').parent().addClass("checked");
		});
	});
	$(document).ready(function(){
		$('.week_slide').slick({
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
});


</script>
