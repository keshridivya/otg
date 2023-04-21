<style>
	.wrapper {
		width: 90%;
		margin: auto;
	}

	@media(max-width:992px) {
		.wrapper {
			width: 100%;
		}
	}

	.panel-heading {
		padding: 0;
		border: 0;
	}

	.panel-body {
		padding: 15px;
	}

	.panel-title>a,
	.panel-title>a:active {
		display: block;
		padding: 15px;
		color: #555;
		font-size: 16px;
		font-weight: bold;
		text-transform: uppercase;
		letter-spacing: 1px;
		word-spacing: 3px;
		text-decoration: none;
	}

	.panel {
		background: #fff;
		margin-bottom: 15px;
	}

	.faed {
		float: right;
		transition: all 0.5s;
	}

	.panel-heading.active a:before {
		-webkit-transform: rotate(180deg);
		-moz-transform: rotate(180deg);
		transform: rotate(180deg);
	}

	.input-field {
		display: flex;
		flex-direction: column;
		width: 100%;
		margin-top: 25px;
	}

	.input-field label {
		margin-left: 10px;
	}

	.input-field label .label-style {
		background: #FFF;
		font-weight: bold;
		padding: 0 10px;
		position: absolute;
		margin-top: -14px;
		color: #605959;
		font-size: 15px;
	}

	form p {
		color: 605959;
	}

	.input-field input,
	.input-field select {
		height: 50px;
		margin-top: -10px;
		padding: 10px 20px;
		border-radius: 5px;
		border-color: #d0c6c6;
	}

	.form-control:focus {
		box-shadow: 0 0 0 0.1rem #9e958a;
		border-color: #9e958a;
	}

	div#smileys input[type=radio] {
		-webkit-appearance: none;
		width: 30px;
		height: 30px;
		border: none;
		cursor: pointer;
		transition: border 0.2s ease;
		filter: grayscale(100%);
		margin: 0 5px;
		transition: all 0.2s ease;
	}

	div#smileys input[type=radio]:hover,
	div#smileys input[type=radio]:checked {
		filter: grayscale(0);
	}

	div#smileys input[type=radio]:focus {
		outline: 0;
	}

	div#smileys input[type=radio].happy {
		background: url("https://res.cloudinary.com/turdlife/image/upload/v1492864443/happy_ampvnc.svg") center;
		background-size: cover;
	}

	div#smileys input[type=radio].neutral {
		background: url("https://res.cloudinary.com/turdlife/image/upload/v1492864443/neutral_t3q8hz.svg") center;
		background-size: cover;
	}

	.mtt {
		position: fixed;
		bottom: 10px;
		right: 20px;
		color: #999;
		text-decoration: none;
	}

	.mtt span {
		color: #e74c3c;
	}

	.mtt:hover {
		color: #666;
	}

	.mtt:hover span {
		color: #c0392b;
	}

</style>
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?= $assign_data[0]['request_id_value']  ?></h1>
	<!-- DataTales Example -->


	<div class="wrapper center-block">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading active" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
							aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-angle-down faed"></i>
							Add New Device
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<form action="" enctype='multipart/form-data'>
							<p><?= $assign_data[0]['service_device']  ?></p>
							<div class="input-field">
								<label for="name"><span class="label-style">Select Brand</span></label>
								<select name="brand" id="" class="form-control">
									<option value="Daikin">Daikin</option>
									<option value="Samsung">Samsung</option>
									<option value="LG">LG</option>
								</select>
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Type of
										<?= $assign_data[0]['service_device']  ?></span></label>
								<select name="type" id="" class="form-control">
									<?php
								foreach($subcat_data as $subcat_data){
								?>
									<option value="<?= $subcat_data['subcat_id'] ?>"><?= $subcat_data['subcat_name'] ?>
									</option>
									<?php } ?>
								</select>
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Enter Model Name</span></label>
								<input type="text" placeholder="Name" name="name" class="form-control">
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Select Room Type</span></label>
								<select name="brand" id="" class="form-control">
									<option value="Guest Room AC">Guest Room AC</option>
									<option value="Master Bedroom">Master Bedroom</option>
								</select>
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Tonnage</span></label>
								<select name="brand" id="" class="form-control">
									<option value="1 Ton">1 Ton</option>
									<option value="2 Ton">2 Ton</option>
									<option value="3 Ton">3 Ton</option>
									<option value="4 Ton">4 Ton</option>
									<option value="5 Ton">5 Ton</option>
									<option value="6 Ton">6 Ton</option>
								</select>
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Device Purchase Date</span></label>
								<input type="date" placeholder="Name" name="name" class="form-control">
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Enter Indoor unit Serial
										Number</span></label>
								<input type="text" placeholder="Name" name="name" class="form-control">
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Enter Outdoor unit Serial
										Number</span></label>
								<input type="text" placeholder="Name" name="name" class="form-control">
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Select Gas Type</span></label>
								<select name="brand" id="" class="form-control">
									<option value="R22">R22</option>
									<option value="R23">R23</option>
								</select>
							</div>

							<div class="input-field">
								<label for="name"><span class="label-style">Enter Outdoor unit Serial
										Number</span></label>
								<input type='file' name='image6[]' class='form-control'
									accept="image/png, image/jpeg, image/jpg" multiple>
							</div>
							<div class="">
								<input type="submit" value="confirm" class="btn btn-success mt-2">
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i
								class="fa fa-angle-down faed"></i>
							Device History
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
						3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
						laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
						coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
						anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
						occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
						of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							<i class="fa fa-angle-down faed"></i>
							Servie Requested
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingfour">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							<i class="fa fa-angle-down faed"></i>
							Pre-Service Checklist
						</a>
					</h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
					<div class="panel-body">
						<form action="" enctype='multipart/form-data'>
							<p>Service Checklist</p>
							<div class="row">
								<div class="col-7">Satbilizer Installed <span style="color:red">*</span>
								</div>
								<div class="col-5">
									<div id="smileys">
										<input type="radio" name="smiley" value="neutral" class="neutral">
										<input type="radio" name="smiley" value="happy" class="happy" checked="checked">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-7">Evaporator Coil Ok?
									<span style="color:red">*</span>
								</div>
								<div class="col-5">
									<div id="smileys">
										<input type="radio" name="smiley" value="neutral" class="neutral">
										<input type="radio" name="smiley" value="happy" class="happy" checked="checked">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-7">Condenser Coil Ok?
									<span style="color:red">*</span>
								</div>
								<div class="col-5">
									<div id="smileys">
										<input type="radio" name="smiley" value="neutral" class="neutral">
										<input type="radio" name="smiley" value="happy" class="happy" checked="checked">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-7">Noice Vibration
									<span style="color:red">*</span>
								</div>
								<div class="col-5">
									<div id="smileys">
										<input type="radio" name="smiley" value="neutral" class="neutral">
										<input type="radio" name="smiley" value="happy" class="happy" checked="checked">
									</div>
								</div>
							</div>

							<div class="row">
								
							</div>

							<div class="">
								<input type="submit" value="confirm" class="btn btn-success mt-2">
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFive">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
							<i class="fa fa-angle-down faed"></i>
							Problems
						</a>
					</h4>
				</div>
				<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingSix">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
							<i class="fa fa-angle-down faed"></i>
							Spareparts
						</a>
					</h4>
				</div>
				<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingSeven">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
							<i class="fa fa-angle-down faed"></i>
							Upload Images
						</a>
					</h4>
				</div>
				<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingEight">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
							<i class="fa fa-angle-down faed"></i>
							Upload Video
						</a>
					</h4>
				</div>
				<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingNine">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
							<i class="fa fa-angle-down faed"></i>
							Service Outcome
						</a>
					</h4>
				</div>
				<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-2 col-md-2">
						<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%'
							id='imgPreview1'>
					</div>
					<div class="col-xs-6  col-2 col-md-2">
						<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%'
							id='imgPreview2'>
					</div>
					<div class="col-xs-6  col-2 col-md-2">
						<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%'
							id='imgPreview3'>
					</div>
					<div class="col-xs-6 col-2 col-md-2">
						<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%'
							id='imgPreview4'>
					</div>
					<div class="col-xs-6 col-2 col-md-2">
						<img src="<?= base_url(); ?>assets/images/product-images/mobile1.png" alt="" style='width:100%'
							id='imgPreview5'>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="p-5">
							<?php
                          if($message ?? FALSE){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
							<form class="customer" method="post" enctype='multipart/form-data'>
								<input type='hidden' name='c_id' value='<?= $assign_data[0]['cust_id']  ?>'>
								<input type='hidden' name='c_name' value='<?= $assign_data[0]['cust_name']  ?>'>
								<input type='hidden' name='e_id' value='<?= $assign_data[0]['eng_name']  ?>'>
								<input type='hidden' name='e_name' value='<?= $assign_data[0]['e_name']  ?>'>
								<input type='hidden' name='request_id'
									value='<?= $assign_data[0]['request_id_value']  ?>'>
								<input type='hidden' name='r_id' value='<?= $assign_data[0]['request_id']  ?>'>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
									value="<?php echo $this->security->get_csrf_hash();?>">
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
										<div class="row">
											<div class="col-xs-12 col-md-4">
												<label for="sc_name">Please Upload 1st image</label>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='text' name='additional_text_1' class='form-control'
													placeholder='Additional Expenses Details' required>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='file' name='image1' class='form-control' id='photo1'
													accept="image/png, image/jpeg, image/jpg">
											</div>
										</div>
									</div>
									<div class="col-sm-12 mb-3 mb-sm-0 mt-3">
										<div class="row">
											<div class="col-xs-12 col-md-4">
												<label for="sc_name">Please Upload 2nd image</label>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='text' name='additional_text_2' class='form-control'
													placeholder='Additional Expenses Details' required>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='file' name='image2' class='form-control' id='photo2'
													accept="image/png, image/jpeg, image/jpg">
											</div>
										</div>
									</div>
									<div class="col-sm-12 mb-3 mb-sm-0 mt-3">
										<div class="row">
											<div class="col-xs-12 col-md-4">
												<label for="sc_name">Please Upload 3rd image</label>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='text' name='additional_text_3' class='form-control'
													placeholder='Additional Expenses Details' required>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='file' name='image3' class='form-control' id='photo3'
													accept="image/png, image/jpeg, image/jpg">
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-3">
										<div class="row">
											<div class="col-xs-12 col-md-4">
												<label for="sc_name">Please Upload 4th image</label>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='text' name='additional_text_4' class='form-control'
													placeholder='Additional Expenses Details' required>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='file' name='image4' class='form-control' id='photo4'
													accept="image/png, image/jpeg, image/jpg">
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-3">
										<div class="row">
											<div class="col-xs-12 col-md-4">
												<label for="sc_name">Please Upload 5th image</label>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='text' name='additional_text_5' class='form-control'
													placeholder='Additional Expenses Details' required>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='file' name='image5' class='form-control' id='photo5'
													accept="image/png, image/jpeg, image/jpg">
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-3 newinput">
										<div class="row">
											<div class="col-xs-12 col-md-4">
												<label for="sc_name">Upload Multiple Extra Image</label>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='text' name='additional_text_5' class='form-control'
													placeholder='Additional Expenses Details'>
											</div>
											<div class="col-xs-12 col-md-4">
												<input type='file' name='image6[]' class='form-control'
													accept="image/png, image/jpeg, image/jpg" multiple>
											</div>
										</div>
									</div>
									<!-- <button type='button' class='btn btn-danger' id='addnewinput'>+</button> -->
								</div>
								<div class="row justify-content-center mt-5">
									<div class="col-xs-6"><input type="submit" name="submit"
											class="btn btn-primary btn-user btn-block btn_image_submit"></div>
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
