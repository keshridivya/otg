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
							<input class="form-control" type="hidden" class="form-control form-control-user"
								value="<?= $invoice->id ?>" name="id">
							<input class="form-control" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">

								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">Client Name: *</label> <input class="form-control" type="text" name="name"
										id='quoname' placeholder="Client Name" value="<?= $invoice->name ?>" />
									<span style="display:block;color:red"id="spannamequo" class="check"> Please Enter Name</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label class="fieldlabels">Contact Number: *</label> <input class="form-control" type="Contact"
										name="contact_login" id='quocontact' placeholder="Contact" value="<?= $invoice->contact ?>" />
									<span style="display:block;color:red"id="spanecontactquo" class="check"> Please Enter 10 digit correct
										number</span>
								</div>
                                <div class="col-sm-6 mb-3">
                                <label class="fieldlabels">Email: *</label> <input class="form-control" type="email" value="<?= $invoice->email ?>"
														name="email" id='quoemail' placeholder="Email Id" /> 
														<span style="display:block;color:red"id="spanemailquo" class="check"> Please Enter correct emailid</span>
								</div>
                                <div class="col-sm-6 mb-3">
                                <label
														class="fieldlabels">Client Address: *</label> <input class="form-control" type="text"
														name="address" id='quoaddress' value="<?= $invoice->address ?>"placeholder="Client Address" />
														<span style="display:block;color:red"id="spantextquo" class="check"> Please Enter Name</span>
								</div>
                                <div class="col-sm-6 mb-3">
								<label
														class="fieldlabels">Client Pincode: *</label> <input class="form-control" type="text"
														name="pincode" id='quopincode' value="<?= $invoice->pincode ?>"placeholder="Client Pincode" />
														<span style="display:block;color:red"id="spanPinquo" class="check"> Please Enter Name</span>
								</div>
                                <div class="col-sm-6 mb-3">
								<label class="fieldlabels">Product: </label>
													<input class="form-control" type="text" name="Product" id='product' value="<?= $invoice->product ?>"
														placeholder="Product" required/>
								</div>
                                <div class="col-sm-6 mb-3">
								<label class="fieldlabels">Quantity: </label>
													<input class="form-control" type="text" name="qua" value="<?=$invoice->qty ?>"id='qua' placeholder="Quantity" required/>
								</div>
                                <div class="col-sm-6 mb-3">
                                <label class="fieldlabels">MRP : </label>
													<input class="form-control" type="text" name="mrp"  value="<?= $invoice->mrp ?>"id='mrp' placeholder="MRP" required/>
								</div>
                                <div class="col-sm-6 mb-3">
                                <label class="fieldlabels">Discount : </label>
													<input class="form-control" type="text" name="dis" value="<?= $invoice->discount ?? ''; ?>" id='dis' placeholder="Discount" required/>
                                </div>
                                <div class="col-sm-6 mb-3">
                                <label class="fieldlabels">Gst : </label>
													<input class="form-control" type="text" name="gst"  value="<?= $invoice->gst ?? ''; ?> "id='dis' placeholder="Gst" />
                                </div>
                                <div class="col-sm-12 mb-3">
                                <label for="" class="fieldlabels">Terms & Condition</label>
												<textarea name="terms" id="summernote" cols="30" rows="10"><?= $invoice->terms ?></textarea>
                                </div>

							</div>

							<input type="submit" name="submit" id="info_check"  class="btn btn-primary btn-user btn-block">



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
