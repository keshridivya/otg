<script type="text/javascript">
	var citiesByState = {
		Maharashtra: ["Mumbai", "Pune", "Nagpur", "Thane", "Pimpri Chinchwad", "Nashik", "Kalyan Dombivli",
			"Vasai Virar", "Chhatrapati Sambhajinagar", "Navi Mumbai", "Solapur", "Mira Bhayandar",
			"Bhiwandi Nizampur", "Amravati", "Nanded Waghala", "Kolhapur", "Ulhasnagar", "Sangli Miraj Kupwad",
			"Malegaon", "Jalgaon", "Akola", "Latur", "Dhule", "Ahmednagar", "Chandrapur", "Parbhani",
			"Ichalkaranji", "Jalna", "Ambarnath", "Panvel", "Bhusawal", "Badlapur", "Beed", "Gondia", "Satara",
			"Barshi", "Yavatmal", "Achalpur", "Dharashiv", "Nandurbar", "Wardha", "Udgir", "Hinganghat"
		],
		Delhi: ["New Delhi", "Bhalswa Jahangir Village", "Kirari Suleman Nagar Village", "Karawal Nagar", "Hastsal", "Mandoli", "Deoli", "Gokalpuri", "Dallupura", "Taj Pul", "Nangloi","Chilla Sarda Banger", "Pooth Kalan", "Burari", "Gharoli", "Jafrabad", "Noida", "Ghaziabad", "Fatehpur Beri", "Delhi Cantonment", "Alipur", "Kair", "Karala Village", "Siraspur","Chhawla", "Ghitorni", "Sultanpur"]
	}

	function makeSubmenu(value) {
		if (value.length == 0) document.getElementById("customer_city").innerHTML = "<option></option>";
		else {
			var citiesOptions = "";
			for (cityId in citiesByState[value]) {
				citiesOptions += "<option>" + citiesByState[value][cityId] + "</option>";
			}
			document.getElementById("city").innerHTML = citiesOptions;
		}
	}

	function resetSelection() {
		document.getElementById("countrySelect").selectedIndex = 0;
		document.getElementById("city").selectedIndex = 0;
	}

</script>
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-6">
			<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

		</div>
		<div class="col-lg-6">
			<div class="add-btn">
				<a href="<?php echo base_url()?>admin/pincode" class="pull-right">Pincode List</a>
			</div>
		</div>

	</div>
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
							<input type="hidden" class="form-control form-control-user" value="<?= $pincode->id ?? ''?>" name="id">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
							<div class="col-sm-6 mb-3">
								<label for="c_city">State</label>
								<select id="countrySelect" size="1"  class="form-control" onchange="makeSubmenu(this.value)">
									<option value="" disabled selected>Choose State</option>
									<option>Maharashtra</option>
									<!-- <option>Delhi</option> -->
								</select>
							</div>
							<div class="col-sm-6 mb-3">
								<label for="c_city">City</label>
								<select name="city" id="city" value="" class="form-control form-control-user">
									<option value="">Select City</option>
								</select>
							</div>
								<div class="col-sm-6 mb-3">
									<label for="ct_name">Pincode</label>
									<input type="text" name="pincode" value="<?= $pincode->pincode ?? '' ?>" id="pincode"
										class="form-control form-control-user">
								</div>
								<div class="col-sm-6">
									<label for="ct_status">Product</label>
									<select class="form-control" name="category" id="category">
										<?php foreach($cate as $cate){ ?>
										<option value="<?= $cate['cproduct_id'] ?>" <?php echo (($pincode->service_product  ?? '')== $cate['cproduct_id']) ?'selected' :' ';  ?>><?= $cate['cproduct_name'] ?>
										</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="message"></div>
							<input type="submit" name="submit" class="btn btn-primary btn-user btn-block pincodecheck">
						</form>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
