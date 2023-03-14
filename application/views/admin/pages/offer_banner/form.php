<style>
	label{
		color:black;
		font-weight:700;
	}
	.span{
		color:red;
		margin:10px 0;
	}
</style>
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title?></h1>
	<!-- DataTales Example -->
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row justify-content-center">

				<div class="col-lg-12">
					<div class="p-5">
						<?php
                          if($message ?? FALSE){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
						<form method='post' class="customer" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name='id' value='<?= $testimonial_data[0]['id'] ?>'>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
									value="<?php echo $this->security->get_csrf_hash();?>">
							</div>
							<div class="form-group mb-4">
								<label for="exampleFormControlInput1">Banner 1</label>
								<?php
                                    if($banner[0]['banner1']){ ?>
								<div class="row">
									<div class="col-12">
									<img src='<?php echo base_url($banner[0]['banner1']); ?>' alt='logo' width='500' height='400'>
									</div>
								</div>
								<?php }
                                    ?>
								<input type="file" class="form-control form-control-user mt-4" id="exampleFormControlInput1"
									name="file1">
									<span class='span'>Image dimension should be 1074x768 and size 500 </span>
							</div>
                            <div class="form-group mb-4">
								<label for="exampleFormControlInput1">Banner 2</label>
								<?php
                                    if($banner[0]['banner2']){ ?>
								<div class="row">
									<div class="col-12">
									<img src='<?php echo base_url($banner[0]['banner2']); ?>' alt='logo' width='500' height='400'>
									</div>
								</div>
								<?php }
                                    ?>
								<input type="file" class="form-control form-control-user mt-4" id="exampleFormControlInput1"
									name="file2">
									<span class='span'>Image dimension should be 1074x768 and size 500 </span>
							</div>
                            <div class="form-group mb-4">
								<label for="exampleFormControlInput1">Banner 3</label>
								<?php
                                    if($banner[0]['banner3']){ ?>
								<div class="row">
									<div class="col-12">
									<img src='<?php echo base_url($banner[0]['banner3']); ?>' alt='logo' width='500' height='400'>
									</div>
								</div>
								<?php }
                                    ?>
								<input type="file" class="form-control form-control-user mt-4" id="exampleFormControlInput1"
									name="file3">
									<span class='span'>Image dimension should be 1074x768 and size 500 </span>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Status</label>
								<select class="form-control" name="cp_status" id="cp_status">
									<option value="active"
										<?php if( $banner[0]['status']=='active'){ echo 'selected'; } ?>>
										Active</option>
									<option value="inactive"
										<?php if( $banner[0]['status']=='inactive'){ echo 'selected'; } ?>>
										Inactive</option>

								</select>
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary btn-user btn-block">
							</div>
						</form>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
