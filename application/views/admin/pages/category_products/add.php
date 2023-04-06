<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>
	<!-- DataTales Example -->
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row justify-content-center">

				<div class="col-lg-12">
					<div class="p-5">
						<?php
                          if(!$message==" "){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
						<form class="customer" action="" method="post" enctype="multipart/form-data">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="cp_photo">Product Photo</label>
									<input type="file" name="cp_photo" id="cp_photo" class="form-control">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="ct_name">Category Name</label>
									<div id="output"></div>
									<select name="ct_name" id="ct_name" class="form-control chosen-select" data-placeholder="Choose tags ..." name="tags[]" multiple>
										<?php
                                       foreach($cato as $catos){
                                        $mycat=$catos['category_name'];
                                       ?>
										<option value="<?php echo $mycat; ?>"><?php echo $mycat; ?></option>
										<?php 
                                            }
                                                    ?>
									</select>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="ct_name">Product Name</label>
									<input type="text" name="cp_name" value="" id="cp_name"
										class="form-control form-control-user">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label for="cp_desc">Product description</label>
									<textarea name="cp_desc" id="cp_desc" class="form-control" rows="4"></textarea>
								</div>
								<div class="col-sm-6">
									<label for="cp_status">Status</label>
									<select class="form-control" name="cp_status" id="cp_status">
										<option value="active">Active</option>
										<option value="inactive">Inactive</option>

									</select>
								</div>

							</div>
							<input type="submit" name="send" value="submit"
								class="btn btn-primary btn-user btn-block">
						</form>
						<hr>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script>document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();</script>
<!-- /.container-fluid -->
