<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800">Ongoing Assignment</h1>

		</div>

	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Service Request Id</th>
							<th>Service Device</th>
							<th>Service Plan</th>
							<th>Customer Name</th>
							<th>Customer Contact</th>
							<th>Status</th>
							<th>Created date</th>
							<th>Assign date</th>
							<th>Payment</th>
							<th>Address</th>
							<th>Pincode</th>
							<th>Action</th>
						</tr>
						<?php
                        foreach($booking_data as $booking_data){ ?>
						<tr>
							<td><?= $booking_data['request_id_value'] ?></td>
							<td><?= $booking_data['service_device'] ?></td>
							<td><?= $booking_data['service_plan'] ?></td>
							<td><?= $booking_data['cust_name'] ?></td>
							<td><?= $booking_data['contact'] ?></td>
							<td><?= $booking_data['status'] ?></td>
							<td><?= $booking_data['date'] ?></td>
							<td><?= $booking_data['created_date'] ?></td>
							<td><?= $booking_data['amt'] ?></td>
							<td><?= $booking_data['address'] ?></td>
							<td><?= $booking_data['pincode'] ?></td>
							<td>
								<a
									href="<?php echo base_url('engineer/ongoing/edit/'.$booking_data['request_id']); ?>"><i
										class="fas fa-pencil-alt" aria-hidden="true" title='Proceed'></i></a>
										<a
									href="<?php echo base_url('engineer/ongoing/add/'.$booking_data['request_id']); ?>" title='Reschedule Assignment'><i
										class="fa fa-calendar" aria-hidden="true"></i></a>

								<!-- <a href="<?php echo base_url('admin/testimonial/delete/'.$booking_data['request_id']); ?>"
									type="button" class="btn btn-primary"
									onclick="return confirm('Are you sure you want to delete this item?');"><i
										class="fas fa-trash" aria-hidden="true"></i></a> -->
							</td>
						</tr>
						<?php  }
                        ?>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
