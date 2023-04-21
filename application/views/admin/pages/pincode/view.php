<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">

				<a href="<?php echo base_url()?>admin/pincode/add" class="pull-right">Add pincode</a>
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

							<th>S.no</th>
							<th>City</th>
							<th>Pincode</th>
							<th>Product Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
                    $count = 1;
                                   foreach($pincode as $pincode){
                                    ?>
					<tr>
						<td><?= $count; ?></td>
						<td><?php echo $pincode['city']; ?></td>
						<td><?php echo $pincode['pincode']; ?></td>
						<td><?php echo $pincode['service_product']?></td>
						<td>
							<a href="<?php echo base_url('admin/pincode/edit/'.$pincode['id']); ?>"
								class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
							<a href="<?php echo base_url('admin/pincode/delete/'.$pincode['id']); ?>" type="button"
								class="btn btn-danger"
								onclick="return confirm('Are you sure you want to delete this item?');"><i
									class="fas fa-trash" aria-hidden="true"></i></a>
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
