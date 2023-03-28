<!-- <?php print_r($customers);?> -->
<div id="page-content">
	<div class="section final-summery">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="card shadow">
						<div class="card-body">
							<div class="section-header text-center">
								<h4 class="user-titles">Booking Details</h4>
								<hr>
							</div>
							<?php 
                            $payment_method=$this->input->get('payment_option');
                            if(@$payment_method == 'cob'){ 
                                ?>
							<form class="new-booking hrrlo" method="post"
								action="<?php echo base_url('summerydetail') ?>">

								<?php  if($this->cart->total_items()>0){
                                    foreach($cartItems as $item){ ?>
								<input type="hidden" class="form-control form-control-user" name="customer_id"
									value="<?php echo $_SESSION['id'];?>">

								<input type="hidden" class="form-control form-control-user" id="c_email"
									value="<?php echo $_SESSION['c_email'];?>" name="c_email">

								<input type="hidden" class="form-control form-control-user"
									value="<?php echo $_SESSION['c_contact'];?>" name="c_contact">

								<input type="hidden" value='OTG-<?= time().rand(100, 999) ?>' name='order_id'>

								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
									value="<?php echo $this->security->get_csrf_hash();?>">
								<div class="form-group row">
									<input type="hidden" name="c_name[]"
										value="<?php echo $_SESSION['c_name'];?>" id="c_name"
										class="form-control form-control-user" placeholder="Customer Name" readonly>
									<!--</div>-->
									<div class="col-sm-4 col-6 mb-3 mb-sm-0">
										<label for="s_plan">Service Plan</label>
										<input type="text" name="s_plan[]" value="<?php echo $item['name']; ?>"
											id="s_plan" class="form-control form-control-user"
											placeholder="Service Plan" readonly>
									</div>
									<div class="col-sm-4 col-6">
										<label for="s_device">Service Device</label>
										<input type="text" name="s_device[]" value="<?php  echo $item['product_name']; ?>" id="s_device"
											class="form-control form-control-user" placeholder="Service Device"
											readonly>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-4 col-6 mb-3 mb-sm-0">
										<label for="quantity">Total Devices</label>
										<input type="text" name="quantity[]" id="quantity" value="<?= $item['qty'] ?>"
											class="form-control form-control-user" placeholder="Total Amount" readonly>
									</div>
									<div class="col-sm-4 col-6 mb-3 mb-sm-0">
										<label for="sub_total">Subtotal</label>
										<input type="text" name="sub_total[]" id="sub_total"
											value="<?= $item['price'] ?>" class="form-control form-control-user"
											placeholder="Total Amount" readonly>
									</div>
								</div>
								<hr>
								<?php  } } ?>
								<div class="col-sm-12 mb-3 mb-sm-0">
									<div class="row">
										<div class="col-sm-6">
											<label for="t_amnt">Total Amount</label>
										</div>
										<div class="col-sm-6">
											<input type="text" name="t_amnt" id="t_amnt"
												value="<?= $this->cart->format_number($this->cart->total()) ?>"
												class="form-control form-control-user" placeholder="Total Amount"
												readonly>
										</div>
									</div>
								</div>
								<div class="col-lg-12 text-center">
									<input type="submit" name="submitsummery" value="Checkout"
										class="theme-btn offer-btn">
								</div>
							</form>
							<?php }else{ ?>
							<!-- <form class="new-booking" method="post" action="<?php echo base_url('pay') ?>"> -->
							<form class="new-booking hrrlo" method="post"
								action="<?php echo base_url('summerydetail') ?>">
								<?php  if($this->cart->total_items()>0){
                                    foreach($cartItems as $item){ ?>
								<input type="hidden" class="form-control form-control-user" name="customer_id"
									value="<?php echo $_SESSION['id'];?>">

								<input type="hidden" class="form-control form-control-user" id="c_email"
									value="<?php echo $_SESSION['c_email'];?>" name="c_email">

								<input type="hidden" class="form-control form-control-user"
									value="<?php echo $_SESSION['c_contact'];?>" name="c_contact">

								<input type="hidden" value='OTG-<?= time().rand(100, 999) ?>' name='order_id'>

								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
									value="<?php echo $this->security->get_csrf_hash();?>">
								<div class="form-group row">
									<input type="hidden" name="c_name" value="<?php echo $_SESSION['c_name'];?>"
										id="c_name" class="form-control form-control-user" placeholder="Customer Name"
										readonly>
									<!--</div>-->
									<div class="col-sm-4 col-6 mb-3 mb-sm-0">
										<label for="s_plan">Service Plan</label>
										<input type="text" name="s_plan[]" value="<?php echo $item['name']; ?>"
											id="s_plan" class="form-control form-control-user"
											placeholder="Service Plan" readonly>
									</div>
									<div class="col-sm-4 col-6">
										<label for="s_device">Service Device</label>
										<input type="text" name="s_device[]" value="<?php 
                                                     echo $item['product_name']; ?>" id="s_device"
											class="form-control form-control-user" placeholder="Service Device"
											readonly>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-4 col-6 mb-3 mb-sm-0">
										<label for="quantity">Total Devices</label>
										<input type="text" name="quantity[]" id="quantity" value="<?= $item['qty'] ?>"
											class="form-control form-control-user" placeholder="Total Amount" readonly>
									</div>
									<div class="col-sm-4 col-6 mb-3 mb-sm-0">
										<label for="sub_total">Subtotal</label>
										<input type="text" name="sub_total[]" id="sub_total"
											value="<?= $item['price'] ?>" class="form-control form-control-user"
											placeholder="Total Amount" readonly>
									</div>
								</div>
								<hr>
								<?php  } } ?>
								<div class="col-sm-12 mb-3 mb-sm-0">
									<div class="row">
										<div class="col-sm-6">
											<label for="t_amnt">Total Amount</label>
										</div>
										<div class="col-sm-6">
											<input type="text" name="t_amnt" id="t_amnt"
												value="<?= $this->cart->format_number($this->cart->total()) ?>"
												class="form-control form-control-user" placeholder="Total Amount"
												readonly>
										</div>
									</div>
								</div>
								<div class="col-lg-12 text-center">
									<input type="submit" id='summarycheck' name="submitsummery" value="Checkout"
										class="theme-btn offer-btn">
										<input type="button" value="checkout"
										class="theme-btn offer-btn checlout">
								</div>
							</form>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card shadow">
						<div class="card-body">
							<table>
								<tbody>
									<div class="section-header text-center">
										<h4 class="user-titles">Booking Details</h4>
										<hr>
									</div>
									<tr>
										<td>
											<h6>Customer Name</h6>
										</td>
										<td><?php echo $_SESSION['c_name']; ?></td>
									</tr>
									<tr>
										<td>
											<h6>Contact</h6>
										</td>
										<td><?php echo $_SESSION['c_contact'];?></td>
									</tr>
									<tr>
										<td>
											<h6>Email Id</h6>
										</td>
										<td><?php echo $_SESSION['c_email'];?></td>
									</tr>
									<tr>
										<td>
											<h6>City</h6>
										</td>
										<td><?php echo $_SESSION['c_city'];?></td>
									</tr>
									<tr>
										<td>
											<h6>Address</h6>
										</td>
										<td><?php echo $_SESSION['c_address'];?></td>
									</tr>
									<tr>
										<td>
											<h6>Pincode</h6>
										</td>
										<td><?php echo $_SESSION['c_pincode'];?></td>
									</tr>
								</tbody>
							</table>
						</div>
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
			<h1 style='margin:auto; color:green;padding:10px'>Please Scan and pay</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="height:67vh">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body" style='margin:auto;width:300px;height:500px'>
							<img src="<?= base_url('assets/images/upi.jpeg') ?>" alt="" style='height:100%;width:100%'>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="modal-footer">
			<button type="button" name='send' data-dismiss="modal" class="theme-btn  offer-btn pay" style="font-size:20px">pay</button>
				<button type="button" class="theme-btn" data-dismiss="modal" style="font-size:20px">Close</button>
				
			</div>

		</div>
	</div>
</div>


