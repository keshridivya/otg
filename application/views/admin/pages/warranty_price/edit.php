<style>

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


</style>
<div class="container-fluid">
	<!-- Page Heading -->
    <div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">
				<a href="<?php echo base_url()?>admin/warranty_price" class="pull-right">Add Warranty Price</a>
			</div>
		</div>
	</div>
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
												<div class="form-card">
													<label class="fieldlabels">Device: *</label>
													<select name="device" id="device" class="form-control one_eng_name">
														<option value="" disabled selected>Select Device</option>
														<?php
															foreach($product as $product){
															?>
														<option value="<?php echo ($product['cproduct_id']) ?>"
															<?php echo (($warranty->device  ?? '' ) == $product['cproduct_id']) ? 'selected' : ''; ?>>
															<?php echo $product['cproduct_name']; ?></option>
														<?php  }
                                                    ?>
													</select>
													<span id="spandeviceplan">Please select device</span>

												</div>

												<div class="form-card mt-3">
													<label class="fieldlabels">From Price: </label>
													<input type="text" name="fromPrice" id='product'  required value="<?= $warranty->fromprice ?>"/>
													<label class="fieldlabels">To Price: </label>
													<input type="text" value="<?= $warranty->toprice ?>" name="toPrice" id='qua'  required/>
													<label class="fieldlabels">1Year Van No : </label>
													<input type="text" value="<?= $warranty->oneyearvan ?>" name="oneyeavan" id='mrp'  />
													<label class="fieldlabels">1 Year : </label>
													<input type="text" value="<?= $warranty->oneyear ?>" name="oneyear" id='dis'  />

                                                    <?php if($warranty->twoyearvan){ ?>
													<label class="fieldlabels">2Year Van No : </label>
													<input type="text" value="<?= $warranty->twoyearvan ?>" name="twoyearvan" id='mrp'  />
													<label class="fieldlabels">2 Year : </label>
													<input type="text" value="<?= $warranty->twoyear ?>" name="twoyear" id='dis'  />
                                                    <?php } ?>

                                                    <?php if($warranty->threeyearvan){ ?>
													<label class="fieldlabels">3Year Van No : </label>
													<input type="text" value="<?= $warranty->threeyearvan ?>" name="threeyearvan" id='mrp'  />
													<label class="fieldlabels">3 Year : </label>
													<input type="text" value="<?= $warranty->threeyear ?>" name="threeyear" id='dis'  />
                                                    <?php } ?>

                                                    <?php if($warranty->fouryearvan){ ?>
													<label class="fieldlabels">4Year Van No : </label>
													<input type="text" value="<?= $warranty->fouryearvan ?>" name="fouryearvan" id='mrp'  />
													<label class="fieldlabels">4 Year : </label>
													<input type="text" value="<?= $warranty->fouryear ?>" name="fouryear" id='dis'  />
                                                    <?php } ?>

												</div>
												<div class="addinput text-left"></div>
												<div class="text-left">
													<!-- <button class='btn btn-success adddevicebutton'
														type="button">+</button> -->
												</div>
												<input type="submit" name="next" class="next action-button"
													value="Submit" id='submit' /> 
                                                  
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
