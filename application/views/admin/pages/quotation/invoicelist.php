<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
		<div class="add-btn ml-3">
				<a href="<?php echo base_url()?>admin/quotation/invoicelist" class="pull-right">Quotation Invoice List</a>
			</div>
			<div class="add-btn ml-3">
				<a href="<?php echo base_url()?>admin/quotation/add" class="pull-right">Add Invoice</a>
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
							<th>Invoice no</th>
							<th>Name</th>
							<th>Quotation no</th>
							<th>Created On</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
						$count = 1;
						foreach($invoice as $invoice){ ?>
						<tr>
							<td><?= $invoice['inv_code']; ?></td>
							<td><?= $invoice['name'] ?></td>
							<td><?= $invoice['quo_code'] ?></td>
							<td><?= $invoice['created_date'] ?></td>
							<td>
                                <a href="<?= base_url('admin/quotation/generateinvoice/'.$invoice['quo_code']) ?>" class="btn btn-primary" title="invoice"><i
										class="fa fa-download"></i></a>

						</tr>

						<?php $count++; }
						?>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
