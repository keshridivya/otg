<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">
				<a href="<?php echo base_url()?>admin/client/add" class="pull-right">Add Client</a>
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
							<th>Client logo </th>
							<th>Status</th>
							<th>Created_date</th>
							<th>Action</th>
						</tr>
						<?php
                        $count=1;
                        foreach($client as $client){ ?>
						<tr>
							<td><?= $count; ?></td>
							<td><img src='<?php echo base_url($client['client_logo']); ?>' alt='logo'></td>
							<td><?= $client['status'] ?></td>
							<td><?= $client['created_date'] ?></td>
							<td>
								<a href="<?php echo base_url('admin/client/edit/'.$client['id']); ?>"><i
										class="fas fa-pencil-alt" aria-hidden="true"></i></a>
								<a href="<?php echo base_url('admin/client/edit/'.$client['id']); ?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash" aria-hidden="true"></i></a>
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
