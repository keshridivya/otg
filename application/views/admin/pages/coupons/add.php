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
							<input type="hidden" class="form-control form-control-user" value="<?= $coupon[0]['coupon_id'] ?? '' ?>" name="id">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-4 mb-3 mb-sm-0">
									<label for="ct_name">Code</label>
									<input type="text" name="code" value="<?= $coupon[0]['code'] ?? '' ?>" id="code"
										class="form-control form-control-user">
								</div>
								<div class="col-sm-4 mb-3 mb-sm-0">
									<label for="ct_name">Product Name</label>
									<select name="pname" id="pname" class="form-control form-control-user">
										<?php 
                                            foreach($product as $products){ ?>
										<option value="<?= $products['cproduct_id'] ?>" <?php if (($coupon[0]['cproduct'] ?? "") == $products['cproduct_id']) echo 'selected'; else ''; ?>>
											<?= $products['cproduct_name'] ?></option>
										<?php } ?>
									</select>

								</div>
								<div class="col-sm-4 mb-3 mb-sm-0">
									<label for="ct_name">Product Plan</label>
									<select name="plan" id="plan" class="form-control form-control-user">
										<?php
                                            foreach($plan as $plans){ ?>
										<option value="<?= $plans['cplan_id'] ?>" <?php if (($coupon[0]['cplan'] ?? '') == $plans['cplan_id']) echo 'selected'; else ''; ?>><?= $plans['cplan_name'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-4 mb-3 mb-sm-0">
									<label for="ct_name">Percentage</label>
									<input type="number" name="percent" value="<?= $coupon[0]['percentage'] ?? '' ?>" id="percent"
										class="form-control form-control-user">
								</div>
								<div class="col-sm-4 mb-3 mb-sm-0">
									<label for="ct_name">Expiry Date</label>
                                    
									<input type="date" name="expiry" value="<?= $coupon[0]['expiry_date'] ?? '' ?>" id="expiry"
										class="form-control form-control-user">
								</div>
								<div class="col-sm-4">
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
<!-- /.container-fluid -->
