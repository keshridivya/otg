<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<!-- <div class="add-btn">

                <a href="<?php echo base_url()?>admin/offer/add" class="pull-right">Add New</a>
            </div> -->

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
							<th>banner1</th>
							<th>banner2</th>
							<th>banner3</th>
							<th>Status</th>
							<th>Created On</th>
							<th>Modified On</th>
							<th>Action</th>

						</tr>
					</thead>
					<?php 
                    $count=1;
                                   foreach($banner as $banner){
                                    ?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $banner['banner1']; ?></td>
						<td><?php echo $banner['banner1']; ?></td>
						<td><?php echo $banner['banner1']; ?></td>
						<td><?php echo $banner['status']; ?></td>
						<td><?php echo $banner['created_date']; ?></td>
						<td><?php echo $banner['modified_date']?></td>
						<td>
							<a href="<?php echo base_url('admin/offer/edit/'.$banner['id']); ?>"><i
									class="fas fa-pencil-alt" aria-hidden="true"></i></a>

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

