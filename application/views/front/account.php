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
														<?php echo $book_table['service_plan']; ?>,
														<?php echo $book_table['service_device']; ?>,
														<span> rs. </span>
														<?php echo $book_table['total_amount']; ?><br>
														<span>Status:</span><?php echo $book_table['status']; ?>
														&nbsp; &nbsp; &nbsp;
														<span>Alloted Engineer : </span>
														<?php echo $book_table['eng_name']; ?> &nbsp;
														&nbsp; &nbsp; <span>booking Date : </span>
														<?php echo $book_table['created_on']; ?></p>
														<br>
														<?php
														if($book_table['status'] == 'completed'){
                                                                            $req_id=$book_table['request_id_value'];
                                                                            ?>
														<div class="accnt-order">
															<h6><a href="<?= base_url("invoice/$req_id") ?>">Download
																	Invoice</a></h6>
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
								<div class="col-lg-6">
									<div class="b0x-shadow"><div class="section-header account_heading">
										<input type="hidden" class="ccity" value="<?php echo $customers[0]['city'];?>">
										<input type="hidden" class="cbtn" value="booking">
										<input type="hidden" class="cid" value="<?php echo $customers[0]['cust_id'];?>">
										<h3 class="cname"><?php echo $customers[0]['cust_name'];?></h3>
										<p class="ccont"><?php echo $customers[0]['contact'];?></p>
										<p class="cemail"><?php echo $customers[0]['email_id'];?></p>
										<p class="caddress"><?php echo $customers[0]['address'];?>,</p>
										<p class="cpincode"><?php echo $customers[0]['pincode'];?></p>
									</div>
									<div><a class="cust_edit">Edit</a></div></div>
								</div>
							</div>
							<div class="row mt-4 mb-4">
								<?php if($shipping_address != ''){?>
								<h1 style="width:100%">Other Service Address</h1>
								<?php } ?>
								<?php
								foreach($shipping_address as $add){
								?>
								<div class="col-lg-6">
									<div class="b0x-shadow"><div class="section-header account_heading">
									<input type="hidden" class="cbtn" value="shipping">
										<input type="hidden" class="ccity" value="<?php echo $add['city'];?>">
										<input type="hidden" class="cid" value="<?php echo $add['id'];?>">
										<h3 class="cname"><?php echo $add['name'];?></h3>
										<p class="ccont"><?php echo $add['contact'];?></p>
										<p class="cemail"><?php echo $add['email'];?></p>
										<p class="caddress"><?php echo $add['address'];?>,</p>
										<p class="cpincode"><?php echo $add['pincode'];?></p>
									</div>
									<div><a class="cust_edit"> Edit</a> | <a class="cust_edit"
											href="<?= base_url('welcome/service_address_delete?id='.$add['id']) ?>">
											Delete</a></div></div>
								</div>
								<?php } ?>
							</div>

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
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 style='margin:auto; color:green;padding:10px'>Service Address</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="customer pt-4 p-4" method="post" action="">
				<div class="modal-body" style="height:67vh;overflow-x:hidden">
					<div class="row justify-content-center">

						<input type="hidden" id="customer_id" value="" name="id">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
							value="<?php echo $this->security->get_csrf_hash();?>">
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<label for="c_name">Customer Name</label>
								<input type="text" name="username" value="" id="username"
									class="form-control form-control-user" placeholder="Customer Name">
								<span id='spanusername'>Enter your name</span>
							</div>
							<div class="col-sm-6 mb-3 mb-sm-0">
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
							<div class="col-sm-6 mb-3 ">
								<label for="c_city">City</label>
								<input type="text" name="city" id="city" value="" class="form-control form-control-user"
									placeholder="City">
								<span id='spancity'>Please enter correct city</span>
							</div>

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
					<h1 style='color:green;padding:10px'>Service Address</h1>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="customer pt-4 p-4" method="post" action="">
					<div class="modal-body" style="height:67vh;overflow-x:hidden">
						<div class="row justify-content-center">
							<input type="hidden" id="customer_btn" name="customer_btn">
							<input type="hidden" id="customer_id" class="cusid" name="customer_id">
							<input type="hidden" class="csrf"
								name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_name">Customer Name</label>
									<input type="text" name="customer_name" value="" id="customer_name"	class="form-control form-control-user" placeholder="Customer Name">
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
