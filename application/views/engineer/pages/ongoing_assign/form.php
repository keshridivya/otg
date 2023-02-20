<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Edit Assignment</h1>
	<!-- DataTales Example -->
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-2">
					<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%' id='imgPreview1'>
				</div>
				<div class="col-xs-6 col-md-2">
					<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%' id='imgPreview2'>
				</div>
				<div class="col-xs-6 col-md-2">
					<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%' id='imgPreview3'>
				</div>
				<div class="col-xs-6 col-md-2">
					<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%' id='imgPreview4'>
				</div>
				<div class="col-xs-6 col-md-2">
					<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%' id='imgPreview5'>
				</div>
			</div>
			<div class="row justify-content-center">

				<div class="col-lg-12">
					<div class="p-5">
						<?php
                        //   if($message){
                        //     echo "<div class='alert alert-info'>".$message."</div>";
                        //   }
                          ?>

						<form class="customer" method="post">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
									<div class="row">
										<div class="col-xs-12 col-md-7">
										<label for="sc_name">Please Upload 1st image</label>
										</div>
										<div class="col-xs-12 col-md-5">
										<input type='file' name='image1' class='image' id='photo1'>
										</div>
									</div>
								</div>
								<div class="col-sm-12 mb-3 mb-sm-0 mt-3">
								<div class="row">
										<div class="col-xs-12 col-md-7">
										<label for="sc_name">Please Upload 2nd image</label>
										</div>
										<div class="col-xs-12 col-md-5">
										<input type='file' name='image2' class='image' id='photo2'>
										</div>
									</div>
								</div>
								<div class="col-sm-12 mb-3 mb-sm-0 mt-3">
								<div class="row">
										<div class="col-xs-12 col-md-7">
										<label for="sc_name">Please Upload 3rd image</label>
										</div>
										<div class="col-xs-12 col-md-5">
										<input type='file' name='image3' class='image' id='photo3'>
										</div>
									</div>
								</div>
								<div class="col-sm-12 mt-3">
								<div class="row">
										<div class="col-xs-12 col-md-7">
										<label for="sc_name">Please Upload 4th image</label>
										</div>
										<div class="col-xs-12 col-md-5">
										<input type='file' name='image4' class='image' id='photo4'>
										</div>
									</div>
								</div>
								<div class="col-sm-12 mt-3">
								<div class="row">
										<div class="col-xs-12 col-md-7">
										<label for="sc_name">Please Upload 5th image</label>
										</div>
										<div class="col-xs-12 col-md-5">
										<input type='file' name='image5' class='image' id='photo5'>
										</div>
									</div>
								</div>
							</div>
							<div class="row justify-content-center mt-5">
								<div class="col-xs-6"><input type="submit" name="submit" class="btn btn-primary btn-user btn-block btn_image_submit"></div>
							</div>



						</form>
						<hr>
						<div id='message_upload' class='alert alert-danger'></div>

					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
