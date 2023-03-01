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

                            <?php if(@$payment_method == 'cob'){ ?> 
                                <form class="new-booking hrrlo" method="post" action="<?php echo base_url('receipt') ?>">
								<input type="hidden" class="form-control form-control-user" name="customer_id"
									value="<?php echo $customers[0]['cust_id'];?>" >

                                    <input type="hidden" class="form-control form-control-user" 
									value="<?php echo $customers[0]['email_id'];?>" name="c_email">

                                    <input type="hidden" class="form-control form-control-user" 
									value="<?php echo $customers[0]['contact'];?>" name="c_contact">

								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
									value="<?php echo $this->security->get_csrf_hash();?>">
								<div class="form-group row">
									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="c_name">Customer Name</label>
										<input type="text" name="c_name"
											value="<?php echo $customers[0]['cust_name'];?>" id="c_name"
											class="form-control form-control-user" placeholder="Customer Name" readonly>
									</div>

									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="s_plan">Service Plan</label>
										<input type="text" name="s_plan" value="<?php if($this->cart->total_items()>0){
                                                foreach($cartItems as $item){
                                                     echo $item['name']." "; 
                                                     
                                                    }
                                                    }?>" id="s_plan" class="form-control form-control-user"
											placeholder="Service Plan" readonly>
									</div>

									<div class="col-sm-4">
										<label for="s_device">Service Device</label>
										<input type="text" name="s_device" value="<?php if($this->cart->total_items()>0){
                                                foreach($cartItems as $item){
                                                     echo $item['product_name']." ";
                                                    
                                                    }
                                                    }?>" id="s_device" class="form-control form-control-user"
											placeholder="Service Device" readonly>
									</div>

								</div>
								<div class="form-group row">
									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="quantity">Total Devices</label>
										<input type="text" name="quantity" id="quantity" value="<?= $item['qty'] ?>"
											class="form-control form-control-user" placeholder="Total Amount" readonly>
									</div>
									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="sub_total">Subtotal</label>
										<input type="text" name="sub_total" id="sub_total"
											value="<?= $item['subtotal'] ?>" class="form-control form-control-user"
											placeholder="Total Amount" readonly>
									</div>
									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="t_amnt">Total Amount</label>
										<input type="text" name="t_amnt" id="t_amnt"
											value="<?= $this->cart->format_number($this->cart->total()) ?>"
											class="form-control form-control-user" placeholder="Total Amount" readonly>
									</div>

								</div>

								<div class="col-lg-12 text-center">

									<input type="submit" name="submitsummery" value="Checkout" class="theme-btn offer-btn">
								</div>



							</form>
                            <?php } ?>
							<form class="new-booking" method="post" action="<?php echo base_url('pay') ?>">
								<input type="hidden" class="form-control form-control-user" name="customer_id"
									value="<?php echo $customers[0]['cust_id'];?>" >

                                    <input type="hidden" class="form-control form-control-user" 
									value="<?php echo $customers[0]['email_id'];?>" name="c_email">

                                    <input type="hidden" class="form-control form-control-user" 
									value="<?php echo $customers[0]['contact'];?>" name="c_contact">

								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
									value="<?php echo $this->security->get_csrf_hash();?>">
								<div class="form-group row">
									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="c_name">Customer Name</label>
										<input type="text" name="c_name"
											value="<?php echo $customers[0]['cust_name'];?>" id="c_name"
											class="form-control form-control-user" placeholder="Customer Name" readonly>
									</div>

									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="s_plan">Service Plan</label>
										<input type="text" name="s_plan" value="<?php if($this->cart->total_items()>0){
                                                foreach($cartItems as $item){
                                                     echo $item['name']." "; 
                                                     
                                                    }
                                                    }?>" id="s_plan" class="form-control form-control-user"
											placeholder="Service Plan" readonly>
									</div>

									<div class="col-sm-4">
										<label for="s_device">Service Device</label>
										<input type="text" name="s_device" value="<?php if($this->cart->total_items()>0){
                                                foreach($cartItems as $item){
                                                     echo $item['product_name']." ";
                                                    
                                                    }
                                                    }?>" id="s_device" class="form-control form-control-user"
											placeholder="Service Device" readonly>
									</div>

								</div>
								<div class="form-group row">
									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="quantity">Total Devices</label>
										<input type="text" name="quantity" id="quantity" value="<?= $item['qty'] ?>"
											class="form-control form-control-user" placeholder="Total Amount" readonly>
									</div>
									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="sub_total">Subtotal</label>
										<input type="text" name="sub_total" id="sub_total"
											value="<?= $item['subtotal'] ?>" class="form-control form-control-user"
											placeholder="Total Amount" readonly>
									</div>
									<div class="col-sm-4 mb-3 mb-sm-0">
										<label for="t_amnt">Total Amount</label>
										<input type="text" name="t_amnt" id="t_amnt"
											value="<?= $this->cart->format_number($this->cart->total()) ?>"
											class="form-control form-control-user" placeholder="Total Amount" readonly>
									</div>

								</div>

								<div class="col-lg-12 text-center">

									<input type="submit" name="submitsummery" value="Checkout" class="theme-btn offer-btn">
								</div>



							</form>
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
										<td><?php echo $customers[0]['cust_name'];?></td>
									</tr>
									<tr>
										<td>
											<h6>Contact</h6>
										</td>
										<td><?php echo $customers[0]['contact'];?></td>
									</tr>
									<tr>
										<td>
											<h6>Email Id</h6>
										</td>
										<td><?php echo $customers[0]['email_id'];?></td>
									</tr>
									<tr>
										<td>
											<h6>City</h6>
										</td>
										<td><?php echo $customers[0]['city'];?></td>
									</tr>
									<tr>

										<td>
											<h6>Address</h6>
										</td>
										<td><?php echo $customers[0]['address'];?></td>
									</tr>
									<tr>

										<td>
											<h6>Pincode</h6>
										</td>
										<td><?php echo $customers[0]['pincode'];?></td>
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
