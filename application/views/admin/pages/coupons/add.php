<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?= $page_title;?></h1>
		</div>
		<div class="col-lg-6">
			<div class="add-btn">
				<a href="<?php echo base_url()?>admin/coupon" class="pull-right">Back to list</a>
			</div>
		</div>
	</div>
	<!-- DataTales Example -->
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row justify-content-center">

				<div class="col-lg-12">
					<div class="p-5">
						<?php
                          if($message ?? ''){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
						<form class="customer" method="post">
							<input type="hidden" class="form-control form-control-user"
								value="<?= $coupon[0]['coupon_id'] ?? '' ?>" name="id">
							<input type="hidden" class="csrf" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-4 mb-3 ">
									<label for="ct_name">Code</label>
									<input type="text" name="code" value="<?= $coupon[0]['code'] ?? '' ?>" id="code"
										class="form-control form-control-user">
								</div>
								<div class="col-sm-4 mb-3 ">
									<label for="ct_name">Product Name</label>
									<select name="pname" id="pname" class="form-control form-control-user">
										<option value="" disabled selected> Select Product</option>
										<?php 
                                            foreach($product as $products){ ?>
										<option value="<?= $products['cproduct_name'] ?>"
											<?php if (($coupon[0]['cproduct'] ?? "") == $products['cproduct_name']) echo 'selected'; else ''; ?>>
											<?= $products['cproduct_name'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-4 mb-3 ">
									<label for="ct_name">Product Plan</label>
									<select name="plan" id="plan" class="form-control form-control-user">
									</select>
								</div>
								<div class="col-sm-4 mb-3 ">
									<label for="ct_name">Percentage</label>
									<input type="number" name="percent" value="<?= $coupon[0]['percentage'] ?? '' ?>"
										id="percent" class="form-control form-control-user">
								</div>
								<div class="col-sm-4 mb-3 ">
									<label for="ct_name">Expiry Date</label>
									<input type="date" name="expiry" value="<?= $coupon[0]['expiry_date'] ?? '' ?>"
										id="expiry" class="form-control form-control-user">
								</div>
								<div class="col-sm-4 mb-3">
									<label for="ct_status">Status</label>
									<select class="form-control" name="ct_status" id="ct_status">
										<option value="active"
											<?php echo (($coupon[0]['sta'] ?? '')=='active') ? 'selected': ''; ?>>Active
										</option>
										<option value="inactive"
											<?php echo (($coupon[0]['sta'] ?? '') =='inactive') ? 'selected': ''; ?>>
											Inactive</option>
									</select>
								</div>
								<div class="col-sm-3 mb-3">
									<input type="checkbox" id="vehicle1" name="service[]" value="Maintenance and repair">
									<label for="vehicle1"> Maintenance and repair</label>
								</div>
								<div class="col-sm-3 mb-3">
									<input type="checkbox" id="vehicle2" name="service[]" value="Extended Warranty">
									<label for="vehicle2">Extended Warranty</label>
								</div>
								<div class="col-sm-3 mb-3"> 
									<input type="checkbox" id="vehicle3" name="service[]"
										value="AMC">
									<label for="vehicle3"> AMC</label><br><br>
								</div>
							</div>
							<input type="submit" name="submit" class="btn btn-primary btn-user btn-block"
								id="coupon_add" value="submit">
						</form>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>

<script>
	$('select[name="pname"]').on('change', function(){    
		let pname =$(this).val();
		var csrfName = $('.csrf').attr('name');
			var csrfHash = $('.csrf').val();
			$.ajax({
				url: "<?= base_url('admin/service_plan') ?>",
				data: {
					pname : pname,
					[csrfName]: csrfHash,
				},
				method:"post",
				dataType: "json",
				success:function(response){
					$('.csrf').val(response.token);
					// alert(response.token);
					let option = "";
					$.each(response.plan, function(index){
						option +=
						'<option value=" '+
						response.plan[index].cplan_id +' ">'+ response.plan[index].cplan_name +' </option>' ;
					});
					$('#plan').html(option);
					
				},
				error: function(){
					alert('Something Went Wrong');
				}
			})    
});
</script>
<!-- /.container-fluid -->
