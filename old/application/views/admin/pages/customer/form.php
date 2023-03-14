<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>
	<?php echo $cust_data['cust_id']; ?>

	<!-- DataTales Example -->
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="p-5">
						<?php
                          if($message){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
						<form class="customer" method="post" action="">
							<input type="hidden" class="form-control form-control-user"
								value="<?php echo $cust_data[0]['cust_id'];?>" name="id">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_name">Customer Name</label>
									<input type="text" name="c_name" value="<?php echo $cust_data[0]['cust_name'];?>"
										id="c_name" class="form-control form-control-user" placeholder="Customer Name">
								</div>
								<div class="col-sm-6">
									<label for="c_contact">Customer Contact</label>
									<input type="text" name="c_contact" value="<?php echo $cust_data[0]['contact'];?>"
										id="c_contact" class="form-control form-control-user" placeholder="Contact">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="c_email">Email Address</label>
									<input type="email" name="c_email" value="<?php echo $cust_data[0]['email_id'];?>"
										id="c_email" class="form-control form-control-user" placeholder="Email Address">
								</div>
								<div class="col-sm-6">
									<label for="c_password">Password</label>
									<input type="password" name="c_password"
										value="<?php echo $cust_data[0]['password'];?>" id="c_password"
										class="form-control form-control-user" placeholder="Password">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4 mb-3 mb-sm-0">
									<label for="c_city">City</label>
									<input type="text" name="c_city" id="c_city"
										value="<?php echo $cust_data[0]['city'];?>"
										class="form-control form-control-user" placeholder="City">
								</div>
								<div class="col-sm-4">
									<label for="c_address">Address</label>
									<input type="text" name="c_address" value="<?php echo $cust_data[0]['address'];?>"
										id="c_address" class="form-control form-control-user" placeholder="Address">
								</div>
								<div class="col-sm-4">
									<label for="c_pincode">Pincode</label>
									<input type="text" name="c_pincode" value="<?php echo $cust_data[0]['pincode'];?>"
										id="c_pincode" class="form-control form-control-user" placeholder="Pincode">
								</div>
							</div>
							<input type="submit" name="submit" id='cutomer_submit' class="btn btn-primary btn-user btn-block">



						</form>
						<hr>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
