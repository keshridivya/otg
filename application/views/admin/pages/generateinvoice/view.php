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
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Invoice Id</th>
							<th>Name</th>
							<th>Contact</th>
							<th>Product</th>
							<th>price</th>
							<th>Additional</th>
							<th>Created On</th>
							<th>Modified On</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

