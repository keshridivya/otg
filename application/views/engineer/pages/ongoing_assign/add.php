<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Full Information</h1>
	<!-- DataTales Example -->
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="p-5">
							<?php
                          if($message ?? FALSE){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>

							<form class="customer" method="post" enctype='multipart/form-data'>
								<input type='hidden' name='eng_name' class='eng_name'
									value='<?= $assign_data[0]['eng_name']  ?>'>
								<input type='hidden' name='service_plan' class='service_plan'
									value='<?= $assign_data[0]['service_plan']  ?>'>
								<input type='hidden' name='service_device' class='service_device'
									value='<?= $assign_data[0]['service_device']  ?>'>

								<input type='hidden' name='request_id'
									value='<?= $assign_data[0]['request_id_value']  ?>'>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
									value="<?php echo $this->security->get_csrf_hash();?>">
								<div class="form-group row">
									<div class="col-md-4 mb-3 mb-sm-0 mt-3">
										<input type='text' name='service_number' class='form-control request_id' id=''
											value='<?= $assign_data[0]['request_id_value'] ?>'
											placeholder='Service Request No' readonly>

									</div>
									<div class="col-md-4 mb-3 mb-sm-0 mt-3">
										<input type='text' name='created_date' class='form-control'
											value='<?= $assign_data[0]['created_on'] ?>' placeholder='Created Date'
											readonly>
									</div>
									<div class="col-md-4 mt-3">
										<select name="service_type" id="" class='service_type form-control'>
											<option value="AMC">AMC</option>
											<option value="Extended">Extended</option>
										</select>
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='customer_name' class='form-control customer_name'
											value='<?= $assign_data[0]['cust_name'] ?>' placeholder='Customer Name'
											readonly>
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='c_contact' class='form-control'
											value='<?= $assign_data[0]['contact'] ?>' placeholder='Customer Contact '
											readonly>
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='customer_city' class='form-control'
											placeholder='Customer City' value='<?= $assign_data[0]['city'] ?>' readonly>
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='device_modal' class='form-control device_modal'
											placeholder='Device Model' required>
									</div>
									<div class="col-md-4 mt-3">
										<select name="booking_status" class='form-control booking_status'>
											<option value="open">Open</option>
											<option value="pending">Pending</option>
											<option value="on hold">On Hold</option>
											<option value="close">Close</option>
										</select>
										<!-- <input type='text' name='booking-status' class='form-control booking_status'
											placeholder='Booking Status' required> -->
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='payment_method' class='form-control payment_method'
											placeholder='Payment Method'>
									</div>

									<div class="col-md-8 mt-3">
										<input type='text' name='address' class='form-control' placeholder='Address'
											value='<?= $assign_data[0]['address'] ?>' readonly>
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='pincode' class='form-control' placeholder='Pincode'
											value='<?= $assign_data[0]['pincode'] ?>' readonly>
									</div>
									<div class="col-md-8 mt-3">
										<input type='text' name='additional_expens'
											class='form-control additional_expens'
											placeholder='Additional Expenses Details' required>
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='total_amount' class='total_amount form-control'
											value='<?= $assign_data[0]['total_amount']  ?>' readonly>
									</div>
									<div class="col-md-4 mt-3">
										<input type='number' name='additional' class='form-control additional'
											placeholder='Additional Expenses' required>
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='addon' class='form-control addon'
											placeholder='Addon Service' required>
									</div>
									<div class="col-md-4 mt-3">
										<input type='text' name='comment' class='form-control comment'
											placeholder='Comments' required>
									</div>
									<div class="col-md-4 mt-3">
										<input type='number' name='expenes' class='form-control expenes'
											placeholder='Expenses' required readonly>
									</div>
									<div class="col-md-4 mt-3">
										<input type='number' name='advance_payment' class='form-control advance_payment'
											placeholder='Advance Payment' required>
									</div>

									<div class='datetimerow row mt-4'>
										<div class="col-md-2 mt-3">
											<p>Reschdule Date & Time <i class='fa fa-arrow-right'></i></p>

										</div>
										<div class="col-md-3 mt-3">
											<input type='datetime-local' name='reschedule_ddate'
												class='form-control advance_payment' placeholder='Reschdule Date & Time'
												required>
										</div>
										<div class="col-md-4 mt-3">
											<p>Click here for reschedule Service <i class='fa fa-arrow-right'></i></p>
											<input type='hidden' name='btn_name' class='btn_name'>
										</div>
										<div class="col-md-3 mt-3">
											<button type='submit' class='btn btn-success'>Reschedule Service</button>
										</div>
									</div>

								</div>
								<div class="row justify-content-center mt-5">
									<div class="col-md-4 mb-3"><button type="button" name="reschedule"
											class="btn btn-primary btn-user btn-block btn_image_submit reschedule_btn"
											data-name='Reschedule'>Reschedule Assignment
										</button></div>
									<?php 
									if($submit_data[0]['booking_request_id']){
									?>
									<div class="col-md-4 mb-3"><button type="button" name="reschedule"
											class="btn btn-primary btn-user btn-block btn_image_submit reschedule"
											data-name='Generate'>Generate Estimate
										</button></div>
										<?php } ?>
									<div class="col-md-4">
									<button type="button" name="reschedule"
											class="btn btn-primary btn-user btn-block btn_image_submit reschedule"
											data-name='Close'>Close Assignment
										</button>	
									</div>
								</div>
							</form>
							<hr>
							<div id='message_upload_error' class=''></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<form action="" id='client-form' method='post'>

		<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
			aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Payment Mode</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="device_modal" id='device_modal'>
						<input type="hidden" name="booking_status" id='booking_status'>
						<input type="hidden" name="payment_method" id='payment_method'>
						<input type="hidden" name="additional_expens" id='additional_expens'>
						<input type="hidden" name="additional" id='additional'>
						<input type="hidden" name="addon" id='addon'>
						<input type="hidden" name="comment" id='comment'>
						<input type="hidden" name="expenes" id='expenes'>
						<input type="hidden" name="advance_payment" id='advance_payment'>
						<input type="hidden" name="visiting_card" id='visiting_card'>
						<input type="hidden" name="customer_name" id='customer_name'>
						<input type="hidden" name="service_type" id='service_type'>
						<input type="hidden" name="service_plan" id='service_plan'>
						<input type="hidden" name="service_device" id='service_device'>
						<input type="hidden" name="request_id" id='request_id'>
						<input type="hidden" name="total_amount" id='total_amount'>
						<input type="hidden" name="btn_name" id='btn_name'>
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
							value="<?php echo $this->security->get_csrf_hash();?>">
						<input type="hidden" name="eng_name" id='eng_name'>
						<div class="row mb-4">
							<div class="col-md-6 mt-3 viding_btn_name">
								<input type='text' name='visiting_card' class='form-control visiting_card'
									placeholder='Visiting Charges' value='Visiting Charges: 199 rs' readonly>
							</div>
						</div>
						<input type="radio" id="age1" name="case_payment" value="cash-199">
						<label for="age1">Cash Payment</label><br>
						<input type="radio" id="age2" name="case_payment" value="online-199">
						<label for="age2">Online Payment</label><br>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name='send' class="btn btn-primary">pay</button>
					</div>

				</div>
			</div>
		</div>
	</form>
</div>
<!-- /.container-fluid -->
