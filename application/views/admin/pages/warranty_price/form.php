<style>
	#heading {
		text-transform: uppercase;
		color: #673AB7;
		font-weight: normal
	}

	#msform {
		text-align: center;
		position: relative;
		margin-top: 20px
	}

	#msform fieldset {
		background: white;
		border: 0 none;
		border-radius: 0.5rem;
		box-sizing: border-box;
		width: 100%;
		margin: 0;
		padding-bottom: 20px;
		position: relative
	}

	.form-card {
		text-align: left
	}

	#msform fieldset:not(:first-of-type) {
		display: none
	}

	#msform input,
	#msform textarea {
		padding: 8px 15px 8px 15px;
		border: 1px solid #ccc;
		border-radius: 0px;
		margin-bottom: 25px;
		margin-top: 2px;
		width: 100%;
		box-sizing: border-box;
		font-family: montserrat;
		color: #2C3E50;
		background-color: #ECEFF1;
		font-size: 16px;
		letter-spacing: 1px
	}

	#msform input:focus,
	#msform textarea:focus {
		-moz-box-shadow: none !important;
		-webkit-box-shadow: none !important;
		box-shadow: none !important;
		border: 1px solid #673AB7;
		outline-width: 0
	}

	#msform .action-button {
		width: 100px;
		background: #673AB7;
		font-weight: bold;
		color: white;
		border: 0 none;
		border-radius: 0px;
		cursor: pointer;
		padding: 10px 5px;
		margin: 10px 0px 10px 5px;
		float: right
	}

	#msform .action-button:hover,
	#msform .action-button:focus {
		background-color: #311B92
	}

	#msform .action-button-previous {
		width: 100px;
		background: #616161;
		font-weight: bold;
		color: white;
		border: 0 none;
		border-radius: 0px;
		cursor: pointer;
		padding: 10px 5px;
		margin: 10px 5px 10px 0px;
		float: right
	}

	#msform .action-button-previous:hover,
	#msform .action-button-previous:focus {
		background-color: #000000
	}

	.card {
		z-index: 0;
		border: none;
		position: relative
	}

	.fs-title {
		font-size: 25px;
		color: #673AB7;
		margin-bottom: 15px;
		font-weight: normal;
		text-align: left
	}

	.purple-text {
		color: #673AB7;
		font-weight: normal
	}

	.steps {
		font-size: 18px;
		color: gray;
		margin-bottom: 10px;
		font-weight: normal;
		text-align: right
	}

	.fieldlabels {
		color: gray;
		text-align: left
	}

	#progressbar {
		margin-bottom: 30px;
		overflow: hidden;
		color: lightgrey
	}

	#progressbar .active {
		color: #673AB7
	}

	#progressbar li {
		list-style-type: none;
		font-size: 15px;
		width: 25%;
		float: left;
		position: relative;
		font-weight: 400
	}

	#progressbar #account:before {
		font-family: FontAwesome;
		content: "\f13e"
	}

	#progressbar #personal:before {
		font-family: FontAwesome;
		content: "\f007"
	}

	#progressbar #payment:before {
		font-family: FontAwesome;
		content: "\f030"
	}

	#progressbar #confirm:before {
		font-family: FontAwesome;
		content: "\f00c"
	}

	#progressbar li:before {
		width: 50px;
		height: 50px;
		line-height: 45px;
		display: block;
		font-size: 20px;
		color: #ffffff;
		background: lightgray;
		border-radius: 50%;
		margin: 0 auto 10px auto;
		padding: 2px
	}

	#progressbar li:after {
		content: '';
		width: 100%;
		height: 2px;
		background: lightgray;
		position: absolute;
		left: 0;
		top: 25px;
		z-index: -1
	}

	#progressbar li.active:before,
	#progressbar li.active:after {
		background: #673AB7
	}

	.progress {
		height: 20px
	}

	.progress-bar {
		background-color: #673AB7
	}

	.fit-image {
		width: 100%;
		object-fit: cover
	}

	.check {
		display: block;
		color: red;
	}

</style>
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

	<!-- DataTales Example -->
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row justify-content-center">

				<div class="col-lg-12">
					<div class="">
						<?php
                          if($message ?? FALSE){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
						<div class="container-fluid">
							<div class="row justify-content-center">
								<div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-5 text-center p-0 mt-3 mb-2">
									<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
										<form id="msform" method='post'>

											<input type="hidden" class='csrf'
												name="<?php echo $this->security->get_csrf_token_name(); ?>"
												value="<?php echo $this->security->get_csrf_hash();?>">
											<fieldset class='fieldset set1'>
												<div class="form-card">
													<!-- <div class="row">
														<div class="col-7">
															<h2 class="fs-title">Device</h2>
														</div>
													</div> -->
													<label class="fieldlabels">Device: *</label>
													<select name="device" id="device" class="form-control one_eng_name"
														>
														<option value="" disabled selected>Select Device</option>
														<?php
															foreach($product as $product){
															?>
														<option value="<?php echo ($product['cproduct_id']) ?>"
															<?php echo (($info[0]['device']  ?? '' ) == $product['cproduct_id']) ? 'selected' : ''; ?>>
															<?php echo $product['cproduct_name']; ?></option>
														<?php  }
                                                    ?>
													</select>
													<span id="spandeviceplan">Please select device</span>


												</div>
												<input type="button" name="" id="device_check" class="action-button "
													value="Next" />
											</fieldset>
											<fieldset class='fieldset set2'>
												<div class="form-card">
													<!-- <div class="row">
														<div class="col-7">
															<h2 class="fs-title">Product : </h2>
														</div>
													</div> -->
													<label class="fieldlabels">From Price: </label>
													<input type="text" name="fromPrice[]" id='product'  required/>
													<label class="fieldlabels">To Price: </label>
													<input type="text" name="toPrice[]" id='qua'  required/>
													<label class="fieldlabels">1Year Van No : </label>
													<input type="text" name="oneyeavan[]" id='mrp'  />
													<label class="fieldlabels">1 Year : </label>
													<input type="text" name="oneyear[]" id='dis'  />
													<label class="fieldlabels">2Year Van No : </label>
													<input type="text" name="twoyearvan[]" id='mrp'  />
													<label class="fieldlabels">2 Year : </label>
													<input type="text" name="twoyear[]" id='dis'  />
													<label class="fieldlabels">3Year Van No : </label>
													<input type="text" name="threeyearvan[]" id='mrp'  />
													<label class="fieldlabels">3 Year : </label>
													<input type="text" name="threeyear[]" id='dis'  />
													<label class="fieldlabels">4Year Van No : </label>
													<input type="text" name="fouryearvan[]" id='mrp'  />
													<label class="fieldlabels">4 Year : </label>
													<input type="text" name="fouryear[]" id='dis'  />

												</div>
												<div class="addinput text-left"></div>
												<div class="text-left">
													<button class='btn btn-success adddevicebutton'
														type="button">+</button>
												</div>
												<input type="submit" name="next" class="next action-button"
													value="Submit" id='submit' /> <input type="button" name="previous"
													class="previous action-button-previous" value="Previous" />
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include('assets/admin/admin_login.php');
?>
