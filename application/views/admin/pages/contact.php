<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> S.no</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Message</th>
							<th>Created On</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
                    $count=1;
                                   foreach($contact_data as $contact_data){
                                    ?>
					<tr>

						<td><?php echo $count; ?></td>
						<td><?php echo $contact_data['name']; ?></td>
						<td><?php echo $contact_data['email']; ?></td>
						<td><?php echo $contact_data['contact']; ?></td>
						<td><?php echo $contact_data['message']; ?></td>

						<td><?php echo $contact_data['created_date']; ?></td>
						<td>
							<a href="<?php echo base_url('admin/contact/delete/'.$contact_data['id']) ?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
					<?php
                                      $count++;  }
                                    ?>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

