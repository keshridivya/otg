<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">
				<a href="<?php echo base_url()?>admin/generateinvoice/add" class="pull-right">Add Invoice</a>
			</div>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>S.no</th>
							<th>Name</th>
							<th>Contact</th>
							<th>Order Id</th>
							<th>Created On</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
						$count = 1;
						foreach($invoice as $invoice){ ?>
						<tr>
							<td><?= $count; ?></td>
							<td><?= $invoice['cust_name'] ?></td>
							<td><?= $invoice['cont'] ?></td>
							<td><?= $invoice['order_id'] ?></td>
							<td><?= $invoice['created_date'] ?></td>
							<td>
								<a href="<?= base_url('admin/generateinvoice/invoice/'.$invoice['order_id']) ?>" class="btn btn-primary"><i
										class="fa fa-download"></i></a>
								<a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
