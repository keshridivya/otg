            <style>
                .display_otp{
                    display:none;
                }
            </style>
            <div class="container-fluid">

            	<!-- Page Heading -->
            	<h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>


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
            								value="<?php echo $eng_data[0]['eng_id'];?>" name="id">
            							<input type="hidden"
            								name="<?php echo $this->security->get_csrf_token_name(); ?>"
            								value="<?php echo $this->security->get_csrf_hash();?>">
            							<div class="form-group row">
            								<div class="col-sm-6 mb-3 mb-sm-0">
            									<label for="e_name">Engineer Name</label>
            									<input type="text" name="e_name"
            										value="<?php echo $eng_data[0]['eng_name'];?>" id="engineer_name"
            										class="form-control form-control-user" placeholder="Engineer Name" required>
            									<span id='spanengineer_name'>enter engineer name</span>
            								</div>
            								<div class="col-sm-4">
            									<label for="e_contact">Contact</label>
            									<input type="text" name="e_contact"
            										value="<?php echo $eng_data[0]['contact'];?>" id="engineer_contact"
            										class="form-control form-control-user" placeholder="Contact" required>
            									<span id='spanengineer_contact'>please enter 10 digit contact number</span>
            								</div>
                                            <?php if(!$eng_data[0]['status']){ ?>
            								<!-- <div class="col-sm-2">
            									<label for="e_password"></label>
            									<button class='send_otp btn btn-primary d-block' type='button'>Send Otp</button>
            								</div>
            								<div class="col-sm-4 display_otp">
            									<label for="e_password">Otp</label>
            									<input type="text" name="otp" value="" id="otp"
            										class="form-control form-control-user engineer_otp" placeholder="enter otp" required>
                                                    <span id='spanengineer_otp'>please enter correct otp</span>
            								</div> -->
            								<?php } ?>
            							</div>

            							<div class="form-group row">
            								<div class="col-sm-4 mb-3 mb-sm-0">
            									<label for="e_email">Email Address</label>
            									<input type="email" name="e_email"
            										value="<?php echo $eng_data[0]['email_id'];?>" 
            										class="form-control form-control-user engineer_email" placeholder="Email Address" required>
            									<span id='spanengineer_email'>Please enter valid email id</span>
            								</div>
            								

            								<div class="col-sm-4">
            									<label for="e_booking">Ongoing Booking Id</label>
            									<input type="text" name="e_booking"
            										value="<?php echo $eng_data[0]['ongoing-booking'];?>" id="e_booking"
            										class="form-control form-control-user"
            										placeholder="Ongoing Booking id" required>
            								</div>
            								<?php if($eng_data[0]['status']){ ?>
            								<div class="col-sm-4">
            									<label for="e_booking">Status</label>
            									<select name="status" id="" class='form-control'>
            										<option value="active"
            											<?php if($eng_data[0]['status']=='active'){ echo 'selected'; } ?>>
            											Active</option>
            										<option value="inactive"
            											<?php if($eng_data[0]['status']=='inactive'){ echo 'selected'; } ?>>
            											Inactive</option>
            									</select>
            								</div>
            								<?php } ?>
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
