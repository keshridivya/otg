<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">

				<a href="<?php echo base_url()?>admin/shop/add" class="pull-right">Add Shop</a>
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
							<th>Shop Id</th>
							<th> Name</th>
							<th>Email Id</th>
							<th>Status</th>
							<th>Contact</th>
							<th>Created On</th>
							<th>Modified On</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
                                   foreach($shop as $shop){
                                    ?>
					<tr>
						<td><?php echo $shop['shop_code']; ?></td>
						<td><?php echo $shop['name']; ?></td>
						<td><?php echo $shop['email_id']; ?></td>
						<td><?php echo $shop['status']; ?></td>
						<td><?php echo $shop['contact']; ?></td>
						<td><?php echo $shop['created_on']; ?></td>
						<td><?php echo $shop['modified_on']?></td>
						<td>
							<a href="<?php echo base_url('admin/shop/edit/'.$shop['shop_id']); ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"
									aria-hidden="true"></i></a>
							<a href="<?php echo base_url('admin/shop/delete/'.$shop['shop_id']); ?>" type="button"
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

