<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">

				<a href="<?php echo base_url()?>admin/category/add" class="pull-right">Add Categories</a>
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

							<th>Category Id</th>
							<th>Category Name</th>
							<th>Status</th>

							<th>Created On</th>
							<th>Modified On</th>
							<th>Action</th>

						</tr>
					</thead>
					<?php 
                                   foreach($categories as $cats){
                                    ?>
					<tr>

						<td><?php echo $cats['category_id']; ?></td>
						<td><?php echo $cats['category_name']; ?></td>
						<td><?php echo $cats['status']; ?></td>

						<td><?php echo $cats['created_on']; ?></td>
						<td><?php echo $cats['modified_on']?></td>
						<td>
							<a href="<?php echo base_url('admin/category/edit/'.$cats['category_id']); ?>" class="btn btn-primary"><i
									class="fas fa-pencil-alt" aria-hidden="true"></i></a>
							<a href="<?php echo base_url('admin/category/delete/'.$cats['category_id']); ?>" type="button"
								class="btn btn-danger"
								onclick="return confirm('Are you sure you want to delete this item?');"><i
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
