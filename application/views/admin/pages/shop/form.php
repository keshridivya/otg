            <style>
            	.display_otp {
            		display: none;
            	}

            </style>
            <div class="container-fluid">
            	<!-- Page Heading -->
            	<div class="row">
            		<div class="col-lg-6">
            			<h1 class="h3 mb-2 text-gray-800"><?php echo $action;?></h1>
            		</div>
            		<div class="col-lg-6">
            			<div class="add-btn">
            				<a href="<?php echo base_url()?>admin/shop" class="pull-right">Shop List</a>
            			</div>
            		</div>
            	</div>

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
            						<form class="customer" method="post" action="">
            							<input type="hidden" class="form-control form-control-user"
            								value="<?php echo $shop[0]['shop_id'] ?? '';?>" name="id">
            							<input type="hidden"
            								name="<?php echo $this->security->get_csrf_token_name(); ?>"
            								value="<?php echo $this->security->get_csrf_hash();?>">
            							<div class="form-group row">
            								<div class="col-sm-6 mb-3 ">
            									<label for="e_name">Shop Name</label>
            									<input type="text" name="name"
            										value="<?php echo $shop[0]['name'] ?? '';?>" id="engineer_name"
            										class="form-control form-control-user" placeholder="Shop Name"
            										required>
            									<span id='spanengineer_name'>enter shop name</span>
            								</div>
            								<div class="col-sm-6 mb-3">
            									<label for="e_contact">Contact</label>
            									<input type="text" name="contact"
            										value="<?php echo $shop[0]['contact'] ?? '';?>"
            										id="engineer_contact" class="form-control form-control-user"
            										placeholder="Contact" required>
            									<span id='spanengineer_contact'>please enter 10 digit contact
            										number</span>
            								</div>
            								<div class="col-sm-6 mb-3">
            									<label for="e_email">Email Address</label>
            									<input type="email" name="email"
            										value="<?php echo $shop[0]['email_id'] ?? '';?>"
            										class="form-control form-control-user engineer_email"
            										placeholder="Email Address" required>
            									<span id='spanengineer_email'>Please enter valid email id</span>
            								</div>
            								<div class="col-sm-6 mb-3">
            									<label for="e_email">City</label>
            									<input type="text" name="city"
            										value="<?php echo $shop[0]['city'] ?? '';?>"
            										class="form-control form-control-user " placeholder="City"
            										required>
            								</div>
            								<div class="col-sm-6 mb-3">
            									<label for="e_email">Pincode</label>
            									<input type="text" name="pincode"
            										value="<?php echo $shop[0]['pincode'] ?? '';?>"
            										class="form-control form-control-user " placeholder="Pincode "
            										required>
            								</div>
            								<div class="col-sm-6 mb-3">
            									<label for="e_booking">Status</label>
            									<select name="status" id="" class='form-control'>
            										<option value="active"
            											<?php if(($shop[0]['status'] ?? '')=='active'){ echo 'selected'; } ?>>
            											Active</option>
            										<option value="inactive"
            											<?php if(($shop[0]['status'] ?? '')=='inactive'){ echo 'selected'; } ?>>
            											Inactive</option>
            									</select>
            								</div>
            								<div class="col-sm-6 mb-3">
            									<label for="e_email">Address</label>
            									<textarea name="address" id=""
            										class="form-control" placeholder="Enter Address"><?php echo $shop[0]['address'] ?? '';?></textarea>
            								</div>
            							</div>
            							<input type="submit" name="submit"
            								class="btn btn-primary btn-user btn-block engineer_submit">
            						</form>
            						<hr>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <!-- /.container-fluid -->
