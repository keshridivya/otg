<?php
$results = $product;
?>
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
                          if($message ?? ''){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
						<form class="customer" method="post">
							<!-- <input class="form-control" type="hidden" class="form-control form-control-user"
								value="<?= $invoice->id ?>" name="id"> -->
							<input class="form-control csrf" type="hidden"
								name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">

								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">Client Name: *</label> <input class="form-control"
										type="text" name="name" id='quoname' placeholder="Client Name"
										value="<?= $invoice[0]['name'] ?>" />
									<span style="display:block;color:red" id="spannamequo" class="check"> Please Enter
										Name</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">Contact Number: *</label> <input class="form-control"
										type="Contact" name="contact_login" id='quocontact' placeholder="Contact"
										value="<?= $invoice[0]['contact'] ?>" />
									<span style="display:block;color:red" id="spanecontactquo" class="check"> Please
										Enter 10 digit correct
										number</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">Email: *</label> <input class="form-control" type="email"
										value="<?= $invoice[0]['email'] ?>" name="email" id='quoemail'
										placeholder="Email Id" />
									<span style="display:block;color:red" id="spanemailquo" class="check"> Please Enter
										correct emailid</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">Client Address: *</label> <input class="form-control"
										type="text" name="address" id='quoaddress' value="<?= $invoice[0]['address'] ?>"
										placeholder="Client Address" />
									<span style="display:block;color:red" id="spantextquo" class="check"> Please Enter
										Name</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">Client Pincode: *</label> <input class="form-control"
										type="text" name="pincode" id='quopincode' value="<?= $invoice[0]['pincode'] ?>"
										placeholder="Client Pincode" />
									<span style="display:block;color:red" id="spanPinquo" class="check"> Please Enter
										Name</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">Contact Person Name: *</label> <input
										class="form-control" type="text" name="contactpersonname" id='contactpersonname'
										value="<?= $invoice[0]['contactpersonname'] ?>" placeholder="Client Pincode" />
								</div>
								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">contact Person Number: *</label> <input
										class="form-control" type="text" name="contactperno" id='contactperno'
										value="<?= $invoice[0]['contactperno'] ?>" placeholder="Client Pincode" />
								</div>

								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">SGST : </label>
									<input class="form-control" type="text" name="sgst"
										value="<?= $invoice[0]['sgst'] ?? ''; ?> " id='dis' placeholder="Gst" />
								</div>
								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">CGST : </label>
									<input class="form-control" type="text" name="cgst"
										value="<?= $invoice[0]['cgst'] ?? ''; ?> " id='dis' placeholder="Gst" />
								</div>
								<div class="col-sm-12 mb-3">
									<label for="" class="fieldlabels">Terms & Condition</label>
									<textarea name="terms" id="summernote" cols="30"
										rows="10"><?= $invoice[0]['terms'] ?></textarea>
								</div>
							</div>

							<h2>Products</h2>
							<?php foreach($invoice as $invo){ ?>
								<hr>
								<div class="form-group row">
									<div class="col-sm-6 mb-3">
										<input type="hidden" name="id[]" value="<?= $invo['id']; ?>">
										<label class="fieldlabels">Product: </label>
										<input class="form-control" type="text" name="Product[]" id='product'
											value="<?= $invo['product']; ?>" placeholder="Product"  />
									</div>
									<div class="col-sm-6 mb-3">
										<label class="fieldlabels">Sub categories: </label>
										<input class="form-control" type="text" name="subcate[]" id='subcate'
											value="<?= $invo['subcate'] ?>" placeholder="Product"  />
									</div>
									<div class="col-sm-6 mb-3">
										<label class="fieldlabels">Categories Plan: </label>
										<input class="form-control" type="text" name="cateplan[]" id='cateplan'
											value="<?= $invo['cateplan'] ?>" placeholder="Product"  />
									</div>
									<div class="col-sm-6 mb-3">
										<label class="fieldlabels">Quantity: </label>
										<input class="form-control" type="text" name="qua[]" value="<?=$invo['qty'] ?>"
											id='qua' placeholder="Quantity"  />
									</div>
									<div class="col-sm-6 mb-3">
										<label class="fieldlabels">MRP : </label>
										<input class="form-control" type="text" name="mrp[]" value="<?= $invo['mrp'] ?>"
											id='mrp' placeholder="MRP"  />
									</div>

									<div class="col-sm-6 mb-3">
										<label class="fieldlabels">Discount : </label>
										<input class="form-control" type="text" name="dis[]"
											value="<?= $invo['discount'] ?? ''; ?>" id='dis' placeholder="Discount"
											 />
									</div>

								</div>
								<?php } ?>
								<div class="addinput">
									<input type="hidden" value="<?= $invoice[0]['code'] ?>" name="quoname">
								</div>
								<input type="submit" name="addextra" id="addextra" value="Add more Product" class="btn btn-success mr-2">
								<button class='btn btn-success addbutton mb-2' type="button">+</button>
							<input type="submit" name="submit" id="info_check"
								class="btn btn-primary btn-user btn-block">
						</form>

						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>
<?php
include('assets/admin/admin_login.php');
?>
<!-- /.container-fluid -->
