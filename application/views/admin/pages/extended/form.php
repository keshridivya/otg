<style>
	.form-group span{
		color:red;
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
                          if($message  ?? FALSE){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
						<form class="customer" method="post" enctype="multipart/form-data">
							<input type="hidden" class="form-control form-control-user"
								value="<?php echo $info[0]['warrenty_id'] ?? '';?>" name="id">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 ">
									<label for="sc_name">Name</label>
									<input type="text" name="name" value="<?php echo $info[0]['name'] ?? '';?>"
										id="exname" class="form-control form-control-user"  required>
										<span id="spanexname">Please Enter Name</span>
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="sc_name">Contact</label>
									<input type="text" name="contact" value="<?php echo $info[0]['contact'] ?? '';?>"
										id="excontact" class="form-control form-control-user"  required>
										<span id="spancontactex">Please Enter 10 digit number</span>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="sc_name">Email</label>
									<input type="email" name="email" value="<?php echo $info[0]['email'] ?? '';?>"
										id="exemail" class="form-control form-control-user"  required>
										<span id="spanemailex">Please Enter Correct Email </span>
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="sc_name">Full Address</label>
									<input type="text" name="address" value="<?php echo $info[0]['address'] ?? '';?>"
										id="exaddress" class="form-control form-control-user" required>
										<span id="spanaddressex">Please Full Address</span>
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="sc_name">Pincode</label>
									<input type="text" name="pincode" value="<?php echo $info[0]['pincode'] ?? '';?>"
										id="expincode" class="form-control form-control-user" required>
										<span id="spanpicodeex">Please Enter 6 digit pincode</span>
								</div>
								<div class="col-sm-6 mb-3 ">
									<label for="cp_name">Device</label>
									<select name="device" id="cp_name" class="form-control one_eng_name" required>
										<option value="" disabled selected>Select Device</option>
										<?php
                                       foreach($product as $product){
                                       ?>
										<option value="<?php echo ($product['cproduct_id']) ?>" <?php echo (($info[0]['device']  ?? '' ) == $product['cproduct_id']) ? 'selected' : ''; ?>>
											<?php echo $product['cproduct_name']; ?></option>
										<?php 
                                            }
                                                    ?>
									</select>
								</div>
								<div class="col-sm-6 mb-3 ">
									<label for="cp_name">Shop Name</label>
									<select name="shop_id" id="shop_id" class="form-control one_eng_name" required>
									<option value="">Select shop</option>
										<?php
												foreach($shopname as $shopname){
												?>
										<option value="<?= $shopname['shop_id'] ?>"><?= $shopname['name'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-6 mb-3  ">
									Original Price <input type="text" name="orprice" value="<?php echo $info[0]['original_price'] ?? '';?>"
										id="exorprice" class="form-control form-control-user" required>
										<span id="spanorpeicex">Please Enter Original Price</span>
								</div>
								<div class="col-sm-6 mb-3  ">
									Warranty Price <input type="text" name="waprice" value="<?php echo $info[0]['amount'] ?? '';?>"
										id="exwrprice" class="form-control form-control-user" required>
										<span id="spanwrrpriceex">Please Enter Warranty Price</span>
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="sc_name">Duration</label>
									<select name="duration" id="" class="form-control" required>
										<option value="1 years">1 Year</option>
										<option value="2 years">2 Year</option>
									</select>
									<!-- <input type="text" name="duration" value="<?php echo $info[0]['duration'] ?? '';?>"
										id="sc_name" class="form-control form-control-user" > -->
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="sc_name">Start date</label>
									<input type="date" name="st_date" value="<?php echo $info[0]['created_on'] ?? '';?>"
										id="sc_name" class="form-control form-control-user"  required>
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="sc_name">Invoice date<span style="color:red">*</span></label>
									<input type="date" name="invoice_date" value="<?php echo $info[0]['created_on'] ?? '';?>"
										id="invoice_date" class="form-control form-control-user"  >
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="sc_name">Device Serial Number</label>
									<input type="text" name="de_se_no" value="<?php echo $info[0]['device_serial_no'] ?? '';?>"
										id="exserialno" class="form-control form-control-user" required >
										<span id="spanserialnoex">Please Enter Serial Number</span>
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="device_photo">Device Serial Number Photo</label>
									<?php
                                    if($info[0]['serial_no_image'] ?? FALSE){ ?>
								<div class="row">
									<div class="col-12">
									<img src='<?php echo base_url($info[0]['serial_no_image']); ?>' alt='logo' width='500' height='400'>
									</div>
								</div>
								<?php }
                                    ?>
									<input type="file" name="device_photo" value=""
										id="sc_name" class="form-control form-control-user" accept="image/png, image/jpeg, image/jpg, image/webp" required>
								</div>
								<div class="col-sm-6 mb-3  ">
									<label for="sc_name">Invoice Upload</label>
									<?php
                                    if($info[0]['invoice_image'] ?? FALSE){ ?>
								<div class="row">
									<div class="col-12">
									<img src='<?php echo base_url($info[0]['invoice_image']); ?>' alt='logo' width='500' height='400'>
									</div>
								</div>
								<?php }
                                    ?>
									<input type="file" name="invoice_photo" value=""
										id="sc_name" class="form-control form-control-user" accept="image/*,.pdf" required>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="sc_status">Status</label>
									<select class="form-control" name="status" id="sc_status" required>
										<option value="active" <?php echo (($info[0]['status'] ?? ' ') =='new') ? 'selected': ''; ?>>
											New
										</option>
										<option value="inactive"
											<?php echo (($info[0]['status'] ?? '') =='process') ? 'selected': ''; ?>>
											Process</option>
											<option value="inactive"
											<?php echo (($info[0]['status'] ?? '') =='completed') ? 'selected': ''; ?>>
											Completed</option>
											<option value="inactive"
											<?php echo (($info[0]['status'] ?? '') =='close') ? 'selected': ''; ?>>
											Close</option>
									</select>
								</div>
							</div>
							<input type="submit" name="submit"
								class="btn btn-primary btn-user btn-block exten_btn">
							<div class='error_message'></div>
						</form>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" ></script>
<script>
	$(document).ready(function () {
		// Validate Username
		$("#spanexname").hide();
		$("#spanemailex").hide();
		$("#spancontactex").hide();
		$("#spanaddressex").hide();
		$('#spanpicodeex').hide();
		$("#spanorpeicex").hide();
		$("#spanwrrpriceex").hide();
		$("#spanserialnoex").hide();
		let usernameErrorex = true;
		let useremailErrorex = true;
		let userphoneErrorex = true;
		let usertextErrorex = true;
		let pinErrorex = true;
		let orpriceErrorex = true;
		let wrpriceex = true;
		let esrialErrorex = true;

			//message validation
		$('#exserialno').keyup(function () {
			validateserial();
		});

		function validateserial() {
			let message = $('#exserialno').val();
			if (message.length == '') {
				$("#spanserialnoex").show();
				esrialErrorex = false;
				return false;
			} else {
				$("#spanserialnoex").hide();
			}
		}


		$("#exname").keyup(function () {
			validatenameex();
		});

		function validatenameex() {
			let usernameValue = $("#exname").val();
			let text = /^[A-Za-z ]+$/;
			if (usernameValue.length == "") {
				$("#spanexname").show();
				usernameErrorex = false;
				return false;
			} else if (usernameValue.length < 3) {
				$("#spanexname").show();
				$("#spanexname").html("**length of username minimum 3 character");
				usernameErrorex = false;
				return false;
			} else if (!text.test(usernameValue)) {
				$("#spanexname").show().html("Enter Alphabets only").css("color", "red").focus();
				usernameErrorex = false;
				return false;
			} else {
				$("#spanexname").hide();
			}
		}

		// Validate Email
		$('#exemail').keyup(function () {
			usevalidateEmailex();
		});

		function usevalidateEmailex() {
			let useremail = $('#exemail').val();
			let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

			if (useremail.length == '') {
				$('#spanemailex').show();
				useremailErrorex = false;
				return false;
			} else if (!regex.test(useremail)) {
				$('#spanemailex').show();
				useremailErrorex = false;
				return false;
			} else {
				$('#spanemailex').hide();
			}
		}

		//validate contact
		$('#excontact').keyup(function () {
			validatecontactex();
		});

		function validatecontactex() {
			let contact = $('#excontact').val();
			let filter = /^\d*(?:\.\d{1,2})?$/;
			var pattern = /^[6,7,8,9][0-9]{0,9}$/;
			if (contact.length == '') {
				$("#spancontactex").show();
				userphoneErrorex = false;
				return false;
			} else if (contact.length != 10) {
				$("#spancontactex").show();
				userphoneErrorex = false;
				return false;
			} else if (!pattern.test(contact)) {
				$("#spancontactex").show().html('please enter correct mobile number starting with 6,7,8,9');
				userphoneErrorex = false;
				return false;
			} else {
				$("#spancontactex").hide();
			}
		}

		//message validation
		$('#exaddress').keyup(function () {
			validateaddress();
		});

		function validateaddress() {
			let message = $('#exaddress').val();
			if (message.length == '') {
				$("#spanaddressex").show();
				usertextErrorex = false;
				return false;
			} else {
				$("#spanaddressex").hide();
			}
		}

		$('#expincode').keyup(function () {
			validatebookpinex();
		});

		function validatebookpinex() {
			let bookpin = $('#expincode').val();
			let zipRegex = /^\d{6}$/;
			if (bookpin.length == '') {
				$('#spanpicodeex').show().css('color', 'red');
				pinErrorex = false;
				return false;
			} else if (!zipRegex.test(bookpin)) {
				$('#spanpicodeex').show().css('color', 'red').html('** zipcode should only be 5 digits');
				pinErrorex = false;
				return false;
			} else {
				$('#spanpicodeex').hide();
			}
		}

		//validate orprice
		$('#exorprice').keyup(function () {
			validateorprice();
		});

		function validateorprice() {
			let orprice = $('#exorprice').val();
			let filter = /^\d*(?:\.\d{1,2})?$/;
			if (orprice.length == '') {
				$("#spanorpeicex").show();
				orpriceErrorex = false;
				return false;
			} else if (!filter.test(orprice)) {
				$("#spanorpeicex").show().html('Please Enter only number');
				orpriceErrorex = false;
				return false;
			} else {
				$("#spanorpeicex").hide();
			}
		}

			//validate contact
		$('#exwrprice').keyup(function () {
			validatewrpriceex();
		});

		function validatewrpriceex() {
			let wrprice = $('#exwrprice').val();
			let filter = /^\d*(?:\.\d{1,2})?$/;
			if (wrprice.length == '') {
				$("#spanwrrpriceex").show();
				wrpriceex = false;
				return false;
			} else if (!filter.test(wrprice)) {
				$("#spanwrrpriceex").show().html('Please Enter only number');
				wrpriceex = false;
				return false;
			} else {
				$("#spanwrrpriceex").hide();
			}
		}

		// Submit button
		$(".exten_btn").click(function () {
			usernameErrorex = true;
			useremailErrorex = true;
			userphoneErrorex = true;
			usertextErrorex = true;
			orpriceErrorex = true;
			pinErrorex = true;
			wrpriceex = true;
			esrialErrorex = true;
			validatenameex();
			usevalidateEmailex();
			validatecontactex();
			validateaddress();
			validatebookpinex();
			validateorprice();
			validatewrpriceex();
			validateserial();
			if (usernameErrorex == true && useremailErrorex == true && userphoneErrorex == true &&
				usertextErrorex == true && pinErrorex == true && orpriceErrorex == true && wrpriceex == true && esrialErrorex == true) {
				return true;

			} else {
				return false;
			}
		});
	});

</script>

<!-- /.container-fluid -->
