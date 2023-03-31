<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?= $page_title;?></h1>
		</div>
		<div class="col-lg-6">
			<div class="add-btn">
                <a href="<?php echo base_url()?>admin/coupon/add" class="pull-right">Add New</a>
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
							<th>s.no</th>
							<th>Coupon Code</th>
							<th>Product</th>
							<th>Service Plan </th>
							<th>Percentage</th>
							<th>Created date</th>
							<th>Expired date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php  
                    $count = 1;
                    foreach($coupon as $coupon){  ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $coupon['code'] ?></td>
                            <td><?= $coupon['cproduct'] ?></td>
                            <td><?= $coupon['cplan'] ?></td>
                            <td><?= $coupon['percentage'] ?></td>
                            <td><?= $coupon['created_on'] ?></td>
                            <td><?= $coupon['expiry_date'] ?></td>
                            <td><?= $coupon['status'] ?></td>
                            <td>
							<a href="<?php echo base_url('admin/coupon/edit/'.$coupon['coupon_id']); ?>" class="btn btn-primary"><i
										class="fas fa-pencil-alt" aria-hidden="true"></i></a>
								<a href="<?php echo base_url('admin/coupon/delete/'.$coupon['coupon_id']); ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash" aria-hidden="true"></i></a>

							</td>
                        </tr>
					<?php $count++;  }    ?>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
