<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">
				<a href="<?php echo base_url()?>admin/warranty_price/add" class="pull-right">Add Warranty Price</a>
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
							<!-- <th>selected price</th> -->
							<th>Device</th>
							<th>From</th>
							<th>To</th>
							<th>Created_date</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
                        $count=1;
                        foreach($warranty as $warranty){ ?>
					<tr>
						<td><?= $count; ?></td>
						<td><?= $warranty['cproduct_name'] ?></td>
						<td><?= $warranty['fromprice'] ?></td>
						<td><?= $warranty['toprice'] ?></td>
						<td><?= $warranty['created_on'] ?></td>
						<td>
							<a href="<?php echo base_url('admin/warranty_price/edit/'.$warranty['id']); ?>"
								class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
							<a class="btn btn-primary view" data-device="<?= $warranty['cproduct_name'] ?>"
								data-id="<?= $warranty['id'] ?>" data-firstyear="<?= $warranty['oneyear'] ?>"
								data-secondyear="<?= $warranty['twoyear'] ?>"
								data-thirdyear="<?= $warranty['threeyear'] ?>"
								data-fouryear="<?= $warranty['fouryear'] ?>" data-from="<?= $warranty['fromprice'] ?>"
								data-to="<?= $warranty['toprice'] ?>"><i class="fas fa-eye" aria-hidden="true"></i></a>
							<a href="<?php echo base_url('admin/warranty_price/delete/'.$warranty['id']); ?>" type="button"
								class="btn btn-danger"
								onclick="return confirm('Are you sure you want to delete this item?');"><i
									class="fas fa-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
					<?php $count++; }
                        ?>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Warranty Price Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3 id="devic"></h3>
				<div class="row">
					<div class="col-sm-6">
						<p>From : <span id="from"></span></p>
					</div>
					<div class="col-sm-6">
						<p>To : <span id="to"></span></p>

					</div>
					<div class="col-sm-6">
						<p>One Year : <span id="one"></span></p>

					</div>
					<div class="col-sm-6">
						<p>Two year : <span id="two"></span></p>

					</div>
					<div class="col-sm-6">
						<p>Three Year : <span id="three"></span></p>

					</div>
					<div class="col-sm-6">
						<p>Four Year : <span id="four"></span></p>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
	$(document).on('click', '.view', function () {
		$('#devic').text($(this).data('device'));
		$('#from').text($(this).data('from'));
		$('#to').text($(this).data('to'));
		$('#one').text($(this).data('firstyear'));
		$('#two').text($(this).data('secondyear'));
		$('#three').text($(this).data('thirdyear'));
		$('#four').text($(this).data('fouryear'));
		$('#exampleModal').modal('show');
	})

</script>
<!-- /.container-fluid -->
