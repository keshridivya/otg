<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">
				<a href="<?php echo base_url()?>admin/extended/add" class="pull-right">Add Extended</a>
			</div>
		</div>
	</div>
	<div class="row mt-3 mb-3">
		<h5>Filter: </h5>
	<div class="col-sm-3">
			<form action="" method="post">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="csrf" 
								value="<?php echo $this->security->get_csrf_hash();?>">
				<select name="" id="shopname" class="form-control">
					<option value="">Select shop</option>
					<?php
							foreach($shopname as $shopname){
							?>
					<option value="<?= $shopname['shop_id'] ?>"><?= $shopname['name'] ?></option>
					<?php } ?>
				</select>
			</form>
		</div>
	</div>

	<ul class="nav nav-pills" role="tablist">
		<li class="nav-item">
			<a  class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">All Warranties</a>
		</li>
		<li class="nav-item">
			<a   class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">New Warranties</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Ongoing Warranties</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Ticket</a>
		</li>
	</ul>

	<div class="tab-content" id="ex1-content">
		<li class="tab-pane fade show active " id="tabs-1" role="tabpanel">
			<!-- DataTales Example -->
			<div class=" card shadow mb-4">
				<div class="card-body">

					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Warrenty Id</th>
									<th>Name</th>
									<th>Service Device</th>
									<th>Status</th>
									<th>Total Amount</th>
									<th>Start date</th>
									<th>Expire date</th>
									<th>Update date</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php  foreach($info as $info){  ?>
							<tr>
								<td><?php echo $info['warranty_code']; ?></td>
								<td><?php echo $info['name']; ?></td>
								<td><?php echo $info['cproduct_name']; ?></td>
								<td><?php echo $info['status']; ?></td>
								<td><?php echo $info['amount']; ?></td>
								<td><?php echo $info['created_on']; ?></td>
								<td><?php echo $info['expires_on']?></td>
								<td><?php echo $info['modified_on']?></td>
								<td>
									<a href="<?php echo base_url('admin/extended/edit/'.$info['warrenty_id']); ?>"
										class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>

									<a href="<?php echo base_url('admin/extended/delete/'.$info['warrenty_id']); ?>"
										type="button" class="btn btn-primary"
										onclick="return confirm('Are you sure you want to delete this item?');"><i
											class="fas fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
							<?php  }    ?>
						</table>
					</div>
				</div>
			</div>
		</li>
		<li class="tab-pane " id="tabs-2" role="tabpanel">
			<!-- DataTales Example -->
			<div class=" card shadow mb-4">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Warrenty Id</th>
									<th>Name</th>
									<th>Service Device</th>
									<th>Status</th>
									<th>Total Amount</th>
									<th>Start date</th>
									<th>Expire date</th>
									<th>Update date</th>
									<th>Action</th>

								</tr>
							</thead>
							<?php  foreach($new as $new){  ?>
							<tr>
								<td><?php echo $new['warranty_code']; ?></td>
								<td><?php echo $new['name']; ?></td>
								<td><?php echo $new['cproduct_name']; ?></td>
								<td><?php echo $new['status']; ?></td>
								<td><?php echo $new['amount']; ?></td>
								<td><?php echo $new['created_on']; ?></td>
								<td><?php echo $new['expires_on']?></td>
								<td><?php echo $new['modified_on']?></td>
								<td>
									<a href="<?php echo base_url('admin/extended/edit/'.$new['warrenty_id']); ?>"
										class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>

									<a href="<?php echo base_url('admin/extended/delete/'.$new['warrenty_id']); ?>"
										type="button" class="btn btn-primary"
										onclick="return confirm('Are you sure you want to delete this item?');"><i
											class="fas fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
							<?php  }    ?>
						</table>
					</div>
				</div>
			</div>
		</li>
		<li class="tab-pane " id="tabs-3" role="tabpanel">
			<!-- DataTales Example -->
			<div class=" card shadow mb-4">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Warrenty Id</th>
									<th>Name</th>
									<th>Service Device</th>
									<th>Status</th>
									<th>Engineer Name</th>
									<th>Start date</th>
									<th>Expire date</th>
									<th>Update date</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php  foreach($ongoing as $ongoing){  ?>
							<tr>
								<td><?php echo $ongoing['warranty_code']; ?></td>
								<td><?php echo $ongoing['name']; ?></td>
								<td><?php echo $ongoing['cproduct_name']; ?></td>
								<td><?php echo $ongoing['status']; ?></td>
								<td><?php echo $ongoing['eng_name']; ?></td>
								<td><?php echo $ongoing['created_on']; ?></td>
								<td><?php echo $ongoing['expires_on']?></td>
								<td><?php echo $ongoing['modified_on']?></td>
								<td>
									<a href="<?php echo base_url('admin/extended/edit/'.$ongoing['warrenty_id']); ?>"
										class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>

									<a href="<?php echo base_url('admin/extended/delete/'.$ongoing['warrenty_id']); ?>"
										type="button" class="btn btn-primary"
										onclick="return confirm('Are you sure you want to delete this item?');"><i
											class="fas fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
							<?php  }    ?>
						</table>
					</div>
				</div>
			</div>
		</li>
		<li class="tab-pane " id="tabs-4" role="tabpanel">
			<!-- DataTales Example -->
			<div class=" card shadow mb-4">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Warrenty Id</th>
									<th>Name</th>
									<th>Service Device</th>
									<th>Status</th>
									<th>Total Amount</th>
									<th>Start date</th>
									<th>Expire date</th>
									<th>Update date</th>
									<th>Action</th>

								</tr>
							</thead>
							
						</table>
					</div>
				</div>
			</div>
		</li>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

</script>
<!-- /.container-fluid -->
