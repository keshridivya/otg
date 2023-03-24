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
							<th>Product Type</th>
							<th>Service Type</th>
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
                        <!-- <tr>
                            <td><?= $count ?></td>
                            <td><?= $coupon[0][''] ?></td>
                            <td><?= $coupon[0][''] ?></td>
                            <td><?= $coupon[0][''] ?></td>
                            <td><?= $coupon[0][''] ?></td>
                            <td><?= $coupon[0][''] ?></td>
                            <td><?= $coupon[0][''] ?></td>
                            <td><?= $coupon[0][''] ?></td>
                            <td><?= $coupon[0][''] ?></td>
                        </tr> -->
					<?php $count++;  }    ?>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
