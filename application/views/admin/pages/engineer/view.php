<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">

				<a href="<?php echo base_url()?>admin/engineer/add" class="pull-right">Add Engineer</a>
			</div>

		</div>

	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Engineer Id</th>
							<th>Engineer Name</th>
							<th>Email Id</th>
							<th>Status</th>
							<th>Contact</th>
							<th>Ongoing Booking</th>
							<th>Created On</th>
							<th>Modified On</th>
							<th>Action</th>

						</tr>
					</thead>
					<?php 
                                   foreach($engineers as $eng){
                                    ?>
					<tr>
						<td><?php echo $eng['eng_id']; ?></td>
						<td><?php echo $eng['eng_name']; ?></td>
						<td><?php echo $eng['email_id']; ?></td>
						<td><?php echo $eng['status']; ?></td>

						<td><?php echo $eng['contact']; ?></td>
						<td><?php echo $eng['ongoing-booking']; ?></td>
						<td><?php echo $eng['created_on']; ?></td>
						<td><?php echo $eng['modified_on']?></td>
						<td>
							<a href="<?php echo base_url('admin/engineer/edit/'.$eng['eng_id']); ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"
									aria-hidden="true"></i></a>
							<a href="<?php echo base_url('admin/engineer/delete/'.$eng['eng_id']); ?>" type="button"
								class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i
									class="fas fa-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
					<?php
                                      }
                                    ?>



				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

