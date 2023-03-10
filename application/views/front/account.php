<div class="section user-dashboard">
	<div class="container-fluid">
		<div class="row">
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

														<div class="accnt-order">
															<h6><a href="<?= base_url("invoice/$req_id") ?>">Download
																	Invoice</a></h6>
														</div>
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
								<div class="col-lg-12">
									<div class="section-header text-center">
										<h2 class="heading">My Account</h2>
										<!-- <h4><?php echo "Welcome".$customers[0]['cust_name'];?></h4> -->
									</div>
								</div>
							</div>
						</div>
						<form class="customer" method="post" action="">
							<input type="hidden" class="form-control form-control-user"
								value="<?php echo $customers[0]['cust_id'];?>" name="id">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_name">Customer Name</label>
									<input type="text" name="customer_name"
										value="<?php echo $customers[0]['cust_name'];?>" id="customer_name"
										class="form-control form-control-user" placeholder="Customer Name">
								</div>
								<div class="col-sm-6">
									<label for="c_contact">Customer Contact</label>
									<input type="text" name="customer_contact"
										value="<?php echo $customers[0]['contact'];?>" id="customer_contact"
										class="form-control form-control-user" placeholder="Contact">
								</div>

							</div>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_email">Email Address</label>
									<input type="email" name="customer_email"
										value="<?php echo $customers[0]['email_id'];?>" id="customer_email"
										class="form-control form-control-user" placeholder="Email Address" readonly>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_city">City</label>
									<input type="text" name="customer_city" id="customer_city"
										value="<?php echo $customers[0]['city'];?>"
										class="form-control form-control-user" placeholder="City">
								</div>

							</div>
							<div class="form-group row">

								<div class="col-sm-4">
									<label for="c_address">Address</label>
									<input type="text" name="customer_address"
										value="<?php echo $customers[0]['address'];?>" id="customer_address"
										class="form-control form-control-user" placeholder="Address">
								</div>
								<div class="col-sm-4">
									<label for="c_pincode">Pincode</label>
									<input type="text" name="customer_pincode"
										value="<?php echo $customers[0]['pincode'];?>" id="customer_pincode"
										class="form-control form-control-user" placeholder="Pincode">
								</div>
							</div>
							<input type="submit" name="submit" value="edit" class="btn btn-primary submit-btn">



						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
