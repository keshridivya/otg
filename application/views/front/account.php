<script type="text/javascript">
	var citiesByState = {
		Maharashtra: ["Mumbai", "Pune", "Nagpur", "Thane", "Pimpri Chinchwad", "Nashik", "Kalyan-Dombivli",
			"Vasai Virar", "Chhatrapati Sambhajinagar", "Navi Mumbai", "Solapur", "Mira-Bhayandar",
			"Bhiwandi Nizampur", "Amravati", "Nanded Waghala", "Kolhapur", "Ulhasnagar", "Sangli Miraj Kupwad",
			"Malegaon", "Jalgaon", "Akola", "Latur", "Dhule", "Ahmednagar", "Chandrapur", "Parbhani",
			"Ichalkaranji", "Jalna", "Ambarnath", "Panvel", "Bhusawal", "Badlapur", "Beed", "Gondia", "Satara",
			"Barshi", "Yavatmal", "Achalpur", "Dharashiv", "Nandurbar", "Wardha", "Udgir", "Hinganghat"
		],
		Delhi: ["New Delhi", "Bhalswa Jahangir Village", "Kirari Suleman Nagar Village", "Karawal Nagar", "Hastsal", "Mandoli", "Deoli", "Gokalpuri", "Dallupura", "Taj Pul", "Nangloi","Chilla Sarda Banger", "Pooth Kalan", "Burari", "Gharoli", "Jafrabad", "Noida", "Ghaziabad", "Fatehpur Beri", "Delhi Cantonment", "Alipur", "Kair", "Karala Village", "Siraspur","Chhawla", "Ghitorni", "Sultanpur"]
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
<style>
	/* .cancelbtn,
	.deletebtn {
		float: left;
		width: 50%;
		
	} */

	.deletebtn1 {
		color: var(--var-green) !important;
		font-weight: 600;
		cursor: pointer;
		font-size: 16px;
	}

	.button {
		background-color: #04AA6D;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 50%;
		opacity: 0.9;
	}

	.button:hover {
		opacity: 1;
	}

	.cont1 {
		padding: 40px 16px 20px;
	}

	/* .cancelbtn {
		background-color: #ccc;
		color: black;
	}

	.deletebtn {
		background-color: var(--var-green);
	} */

	/* The Modal (background) */
	.modal1 {
		display: none;
		/* Hidden by default */
		position: fixed;
		/* Stay in place */
		z-index: 999;
		/* Sit on top */
		left: 0;
		top: 0;
		width: 100%;
		/* Full width */
		height: 100%;
		/* Full height */
		overflow: auto;
		/* Enable scroll if needed */
		background-color: #474e5d;
		padding-top: 50px;
	}

	/* Modal Content/Box */
	.modal-content1 {
		background-color: #fefefe;
		margin: 5% auto 15% auto;
		border: 1px solid #888;
		width: 60%;
		transform: translate(-50%, -50%);
		top: 50%;
		position: absolute;
		left: 50%;
		border-radius: 15px;
	}


	/* The Modal Close Button (x) */
	.close1 {
		position: absolute;
		right: 35px;
		top: 15px;
		font-size: 40px;
		font-weight: bold;
		color: #f1f1f1;
	}

	.close1:hover,
	.close1:focus {
		color: #f44336;
		cursor: pointer;
	}

	/* Clear floats */
	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}

	/* Change styles for cancel button and delete button on extra small screens
	@media screen and (max-width: 300px) {

		.cancelbtn,
		.deletebtn {
			width: 100%;
		}
	} */
	button.addcart1{
		background: var(--var-yellow);
    border-radius: 20px;
    padding: 8px 20px;
    text-align: end;
    float: right;
    border: navajowhite;
    margin-right: 15px;
    font-size: 14px;
	}
	.para{
		font-size:1rem;
	}

</style>
<?php
if($message ?? ''){
	echo $message;
}
?>
<div class="section user-dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
			</div>
			<div class="col-lg-12">
				<div class="tab-content mt-4" id="v-pills-tabContent">

					<div class="tab-pane fade <?=(isset($_GET['show']) && $_GET['show'] =='booking') ? "show active" : ""; ?>"
						id="booking" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="section-header text-center">
										<h2 class="heading">Booking Details</h2>
										<!-- <h4><?php echo "Welcome".$customers[0]['cust_name'];?></h4> -->
									</div>
								</div>
							</div>
						</div>
						<!-- <?php print_r($bookings_table)?> -->
						<div class="card shadow mb-4">

							<div class="card-body">
								<div class="">
									<div class="row accnt-row">
										<?php 
                                                    foreach($bookings_table as $book_table){
                                                    ?>
										<div class="col-12 col-md-6 col-lg-4" style='border-right: 1px solid #efe3e3;'>

											<div class="row">
												<div class="col-3 col-sm-12 col-12"><img
														src='<?= base_url('uploads/category/ac.png') ?>'>
												</div>
												<div class="col-7 col-sm-12 col-12">
													<div class='booking_design'>
														<div class='d-flex'>
															<h6>Request Id : </h6>
															<p> &nbsp;
																<?php echo $book_table['request_id_value']; ?>
														</div><br>
														<h3 style="text-transform: capitalize;">
															<?php echo $book_table['cust_name']; ?></h3>
														<span
															class="device"><?php echo $book_table['service_device']; ?></span>
														(<?php echo $book_table['service_plan']; ?>,)
														<span> rs. </span>
														<?php echo $book_table['total_amount']; ?><br>
														<span>Status:</span><?php echo $book_table['status']; ?>
														&nbsp; &nbsp; &nbsp;
														<span>Alloted Engineer : </span>
														<?php echo $book_table['e_name'] ?? 'Pending'?>
														&nbsp;
														&nbsp; &nbsp; <span>booking Date : </span>
														<span
															class="date"><?php echo $book_table['created_date']; ?></span>
														</p>
														<br>
														<?php
														$req_id=$book_table['request_id_value'];
														if($book_table['status'] == 'completed'){
                                                                            $req_id=$book_table['request_id_value'];
                                                                            ?>
														<div class="accnt-order">
															<h6><a href="<?= base_url("invoice/$req_id") ?>">Download
																	Invoice</a></h6>
																	
														</div>
														<?php } ?>
														<?php
														$req_id=$book_table['request_id_value'];
														if($book_table['service_warranty'] == 'AMC'){
                                                                            $req_id=$book_table['request_id_value'];
                                                                            ?>
														<div class="accnt-order">
														<h6><a href="<?= base_url("certificate/$req_id") ?>">Certificate of Protection
																	</a></h6>
														</div>
														<?php } ?>
														<?php //} ?>
													</div>
												</div>
											</div>
										</div>

										<!-- <div class="col-lg-2 col-12"> <div class="accnt-order"> <h6>Request Id</h6> <p><?php echo $book_table['new_request_id']; ?></p> </div></div> -->

										<!-- <div class="col-lg-2 col-12"> <div class="accnt-order"> <h6>Service Plan</h6> <p><?php echo $book_table['service_plan']; ?></p> </div></div>
                                                    <div class="col-lg-2 col-12"> <div class="accnt-order"> <h6>Service Device</h6> <p><?php echo $book_table['service_device']; ?></p> </div></div>
                                                    <div class="col-lg-2 col-12"> <div class="accnt-order"> <h6>Engineer Name</h6><p><?php echo $book_table['eng_name']; ?></p>  </div></div>
                                                    <div class="col-lg-1 col-12"> <div class="accnt-order"> <h6>Status</h6> <p><?php echo $book_table['status']; ?></p> </div></div> 
                                                    <div class="col-lg-1 col-12"> <div class="accnt-order"> <h6>Total Amount</h6> <p><?php echo $book_table['total_amount']; ?></p> </div></div>                                                                       
                                                    <div class="col-lg-2 col-12"> <div class="accnt-order"> <h6>Date</h6> <p><?php echo $book_table['created_on']; ?></p> </div></div>                                     -->

										<?php
                                                    }
                                                   ?>
									</div>
									<!-- </table> -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade <?=(isset($_GET['show']) && $_GET['show'] =='extended') ? "show active" : ""; ?>"
						id="extended" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="section-header text-center">
										<h2 class="heading">Extended Service</h2>
										<!-- <h4><?php echo "Welcome".$customers[0]['cust_name'];?></h4> -->
									</div>
								</div>
							</div>
						</div>
						<h2> Coming soon</h2>
					</div>
					<div class="tab-pane fade <?=(isset($_GET['show']) && $_GET['show'] =='myaccount') ? "show active" : ""; ?>"
						id="myaccount" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<div class="container">
							<div class="row">
								<div class="col-lg-10 col-12 col-sm-8">
									<div class="section-header text-left bottom40">
										<h3 class="heading"><?php echo "Welcome ".$customers[0]['cust_name'];?></h3>
										<div class="line_1"></div>
										<div class="line_2"></div>

										<!-- <h4><?php echo "Welcome".$customers[0]['cust_name'];?></h4> -->
									</div>
								</div>
								<div class="col-lg-2 col-sm-4 mb-3">
									<div class="section-header text-right">
										<div class="plan-btns">
											<a style="cursor:pointer" data-toggle="modal" data-target="#staticBackdrop"
												class="add_address">Add Address</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="b0x-shadow">
										<div class="section-header account_heading">
											<input type="hidden" class="ccity"
												value="<?php echo $customers[0]['city'];?>">
											<input type="hidden" class="cbtn" value="booking">
											<input type="hidden" class="cid"
												value="<?php echo $customers[0]['cust_id'];?>">
											<h3 class="cname"><?php echo $customers[0]['cust_name'];?></h3>
											<p class="ccont"><?php echo $customers[0]['contact'];?></p>
											<p class="cemail"><?php echo $customers[0]['email_id'];?></p>
											<p class="caddress d-inline"><?php echo $customers[0]['address'];?>,</p>
											<span><?php echo $customers[0]['city'];?></span>
											<p class="cpincode"><?php echo $customers[0]['pincode'];?></p>
										</div>
										<div><a class="cust_edit">Edit</a></div>
									</div>
								</div>
							</div>
							<div class="row mt-4 mb-4">
								<?php if($shipping_address != ''){?>
								<h1 style="width:100%">Other Service Address</h1>
								<?php } ?>
								<?php
								foreach($shipping_address as $add){
								?>
								<div class="col-sm-6">
									<div class="b0x-shadow">
										<div class="section-header account_heading">
											<input type="hidden" class="cbtn" value="shipping">
											<input type="hidden" class="ccity" value="<?php echo $add['city'];?>">
											<input type="hidden" class="cid" value="<?php echo $add['id'];?>">
											<h3 class="cname"><?php echo $add['name'];?></h3>
											<p class="ccont"><?php echo $add['contact'];?></p>
											<p class="cemail"><?php echo $add['email'];?></p>
											<p class="caddress d-inline"><?php echo $add['address'];?>,
											</p>
											<span><?php echo $add['city'];?></span>
											<p class="cpincode"><?php echo $add['pincode'];?></p>
										</div>
										<div><a class="cust_edit"> Edit</a> | <a class="deletebtn1 id1"
												data-id="<?= $add['id']; ?>"
												onclick="document.getElementById('id01').style.display='block'">
												Delete</a></div>
									</div>
								</div>
								<?php } ?>
							</div>
							<!-- href="<?= base_url('welcome/service_address_delete?id='.$add['id']) ?>"  -->
						</div>
						<!-- <form class="customer cust_form_field pt-4" method="post" action="">
							<input type="hidden" id="customer_id" value="" name="id">
							<input type="hidden" id="customer_btn" name="customer_btn">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_name">Customer Name</label>
									<input type="text" name="customer_name" value="" id="customer_name"
										class="form-control form-control-user" placeholder="Customer Name">
									<span id='spancustomer_name'>Enter your name</span>
								</div>
								<div class="col-sm-6">
									<label for="c_contact">Customer Contact</label>
									<input type="text" name="customer_contact" value="" id="customer_contact"
										class="form-control form-control-user" placeholder="Contact" readonly>
									<span id='spancustomer_contact'>Enter 10 digit Mobile number</span>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_email">Email Address</label>
									<input type="email" name="customer_email" value="" id="customer_email"
										class="form-control form-control-user" placeholder="Email Address">
									<span id='spancustomer_email'>Please enter correct email address</span>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_city">City</label>
									<input type="text" name="customer_city" id="customer_city" value=""
										class="form-control form-control-user" placeholder="City">
									<span id='spancustomer_city'>Please enter correct city</span>
								</div>
								<div class="col-sm-4 mb-3">
									<label for="c_address">Address</label>
									<input type="text" name="customer_address" value="" id="customer_address"
										class="form-control form-control-user" placeholder="Address">
									<span id='spancustomer_address'>Please enter correct address</span>
								</div>
								<div class="col-sm-4">
									<label for="c_pincode">Pincode</label>
									<input type="text" name="customer_pincode" value="" id="customer_pincode"
										class="form-control form-control-user" placeholder="Pincode">
									<span id='spancustomer_pincode'>Please enter 6 digit pincode</span>
								</div>
							</div>
							<input type="submit" name="submit" value="edit" class="btn btn-primary submit-btn "
								id="submit-btn">
						</form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal -->


<div id="id01" class="modal1">
	<!-- <span onclick="document.getElementById('id01').style.display='none'" class="close1" title="Close Modal">×</span> -->
	<form class="modal-content1" action="/action_page.php">
		<input type="hidden" name="id" id="deleteid">
		<div class="container cont1">
			<h1>Delete Address</h1>
			<p class="para">Are you sure you want to delete your Address?</p>

			<div class="clearfix mt-5">
			<button type="button" class="addcart1" onclick="document.getElementById('id01').style.display='none'">Cancel </button>
			<button type="button" class="deletebtn addcart1">Delete</button>
		
				<!-- <button type="button" class="cancelbtn button" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
				<button type="button" class="deletebtn button">Delete</button> -->
			</div>
		</div>
	</form>
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
			<form class="customer pt-4 p-4" method="post" action="">
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
								<input type="text" name="city" id="city" value="" class="form-control form-control-user"
									placeholder="City">
								<select name="city" id="city" value="" class="form-control form-control-user">
									<option value="">Select City</option>
									<option value="Mumbai">Mumbai</option>
									<option value="Thane">Thane</option>
									<option value="Kalyan-Dombivli">Kalyan-Dombivli</option>
									<option value="Navi Mumbai">Navi Mumbai</option>
									<option value="Mira Bhayandar">Mira Bhayandar</option>
									<option value="Bhiwandi Nizampur">Bhiwandi Nizampur</option>
									<option value="Ulhasnagar"> Ulhasnagar</option>
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
					<button type="button" class="theme-btn" data-dismiss="modal" style="font-size:20px">Close</button>

				</div>
			</form>

		</div>
	</div>
</div>

<div class="modal fade" id="modal_edit" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 style='color:green;padding:10px'>Edit Address</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="customer pt-4 p-4" method="post" action="">
				<div class="modal-body">
					<div class="row justify-content-center">
						<input type="hidden" id="customer_btn" name="customer_btn">
						<input type="hidden" id="customer_id" class="cusid" name="customer_id">
						<input type="hidden" class="csrf" name="<?php echo $this->security->get_csrf_token_name(); ?>"
							value="<?php echo $this->security->get_csrf_hash();?>">
						<div class="form-group row">
							<div class="col-sm-6 mb-3 ">
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
								<!-- <input type="text" name="customer_city" id="customer_city" value=""
									class="form-control form-control-user" placeholder="City"> -->
								<select name="customer_city" id="customer_city" value=""
									class="form-control form-control-user citySelect">
									<option value="">Select City</option>

								</select>
								<span id='spancustomer_city'>Please enter correct city</span>
							</div>
							<!-- <div class="col-sm-6 mb-3">
								<label for="c_city">City</label>
								<select name="customer_city" id="customer_city" value=""
									class="form-control form-control-user">
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
								<input type="text" name="customer_city" id="customer_city" value=""
									class="form-control form-control-user" placeholder="City">
								<span id='spancustomer_city'>Please enter correct city</span>
							</div> -->
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
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>

<script>
	$(document).ready(function () {
		$('.id1').click(function () {
			$('#id1').css('display', 'block');
			$('#deleteid').val($(this).data('id'));
		});
	});

	$(document).on('click', '.deletebtn', function () {
		let id = $('#deleteid').val();
		var csrfName = "<?= $this->security->get_csrf_token_name(); ?>";
		var csrfHash = "<?= $this->security->get_csrf_hash(); ?>";
		$.ajax({
			url: "<?= base_url('welcome/service_address_delete') ?>",
			method: "post",
			data: {
				id: id,
				[csrfName]: csrfHash
			},
			success: function (response) {
				console.log('success');
				$('#id01').css('display', 'none');
				location.reload();
			},
			error: function () {
				console.log('error');
			}
		})
	})

</script>
