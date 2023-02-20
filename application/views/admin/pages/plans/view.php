<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">

				<a href="<?php echo base_url()?>admin/plans/add" class="pull-right">Add Plans</a>
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

							<th>Plan id</th>
							<th>Plan name</th>
							<th>Plan Description</th>
							<th>Plan Amount</th>

							<th>Plan Status</th>
							<th>Subcategory Name</th>
							<th>Product Name</th>
							<th>Created On</th>
							<th>Modified On</th>
							<th>Action</th>



						</tr>
					</thead>
					<?php 
                                   foreach($cplans as $cplan){
                                    ?>
					<tr>


						<td><?php echo $cplan['cplan_id']; ?></td>
						<td><?php echo $cplan['cplan_name']; ?></td>

						<td><?php echo $cplan
                                        ['cplan_desc']; ?></td>
						<td><?php echo $cplan['cplan_price']?></td>
						<td><?php echo $cplan['status']?></td>

						<td><?php echo $cplan['subcat_name']?></td>
						<td><?php echo $cplan['cproduct_name']?></td>

						<td><?php echo $cplan['created_on']?></td>
						<td><?php echo $cplan['modified_on']?></td>


						<td>
							<a href="<?php echo base_url('admin/plans/edit/'.$cplan['cplan_id']); ?>"><i
									class="fas fa-pencil-alt" aria-hidden="true"></i></a>
							<a href="<?php echo base_url('admin/plans/delete/'.$cplan['cplan_id']); ?>" type="button"
								class="btn btn-primary"
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

