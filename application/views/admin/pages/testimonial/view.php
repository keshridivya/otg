<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">
				<a href="<?php echo base_url()?>admin/testimonial/add" class="pull-right">Add Testimonial</a>
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
							<th>Name</th>
							<th>Company Name</th>
							<th>Short Desc</th>
							<th>Status</th>
							<th>Created_date</th>
							<th>Action</th>
						</tr>
						<?php
                        $count=1;
                        foreach($testimonial_data as $testarr){ ?>
						<tr>
							<td><?= $count; ?></td>
							<td><?= $testarr['name'] ?></td>
							<td><?= $testarr['comapny_name'] ?></td>
							<td><?= $testarr['short_desc'] ?></td>
							<td><?= $testarr['status'] ?></td>
							<td><?= $testarr['created_date'] ?></td>
							<td>
								<a href="<?php echo base_url('admin/testimonial/edit/'.$testarr['id']); ?>"><i
										class="fas fa-pencil-alt" aria-hidden="true"></i></a>
								<a href="<?php echo base_url('admin/testimonial/edit/'.$testarr['id']); ?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						<?php $count++; }
                        ?>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
