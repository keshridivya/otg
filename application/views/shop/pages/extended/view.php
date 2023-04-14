<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">

				<a href="<?php echo base_url()?>shop/extended/add" class="pull-right">Add Extended</a>
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
							<th>Warrenty Id</th>
							<th>Name</th>
							<th>Service Device</th>
							<th>Status</th>
							<th>Invoice Image</th>
							<th>Device Image</th>
							<th>Start date</th>
							<th>Expire date</th>
							<th>Update date</th>
							<!-- <th>Action</th> -->

						</tr>
					</thead>
					<?php 
                                   foreach($info as $info){
                                    ?>
					<tr>
						<td><?php echo $info['warranty_code']; ?></td>
						<td><?php echo $info['name']; ?></td>
						<td><?php echo $info['cproduct_name']; ?></td>
						<td><?php echo $info['status']; ?></td>
						<td><embed src="<?php echo base_url($info['invoice_image']); ?>" width="250" height="150"
								type="application/pdf">
								<a href="<?php echo base_url($info['invoice_image']); ?>" target="_blank">open invoice</a>
							</td>
						<td><a href="<?php echo base_url($info['serial_no_image']); ?>" target="_blank"><img src="<?php echo base_url($info['serial_no_image']); ?>" style="width:100%"></a></td>
						<td><?php echo $info['created_on']; ?></td>
						<td><?php echo $info['expires_on']?></td>
						<td><?php echo $info['modified_on']?></td>
						<!-- <td>
							<a href="<?php echo base_url('shop/extended/edit/'.$info['warrenty_id']); ?>" class="btn btn-primary"><i
									class="fas fa-pencil-alt" aria-hidden="true"></i></a>

							<a href="<?php echo base_url('shop/extended/delete/'.$info['warrenty_id']); ?>"
								type="button" class="btn btn-primary"
								onclick="return confirm('Are you sure you want to delete this item?');"><i
									class="fas fa-trash" aria-hidden="true"></i></a>
						</td> -->
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
