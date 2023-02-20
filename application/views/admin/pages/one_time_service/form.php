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
                          if($message){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>

						<form class="customer" method="post">
							<input type="hidden" class="form-control form-control-user"
								value="<?php echo $bookings_data[0]['request_id'];?>" name="id">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="sc_name">Product Name</label>
									<input type="text" name="sc_device"
										value="<?php echo $bookings_data[0]['service_device'];?>" id="sc_name"
										class="form-control form-control-user" readonly>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0 ">
									<label for="sc_name">Service Plan</label>
									<input type="text" name="sc_name"
										value="<?php echo $bookings_data[0]['service_plan'];?>" id="sc_name"
										class="form-control form-control-user" readonly>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0 mt-3">
									<label for="cp_name">Engineer Name</label>

									<select name="engineer_name" id="cp_name" class="form-control">
										<?php
                                       foreach($engineer_data as $engineer_data){
                                       ?>
										<option value="<?php echo ($engineer_data['eng_id']); ?>">
											<?php echo $engineer_data['eng_name']; ?></option>
										<?php 
                                          
                                            }
                                                    ?>
									</select>
								</div>
								<div class="col-sm-6 mt-3">
									<label for="sc_status">Status</label>
									<select class="form-control" name="sc_status" id="sc_status">
										<option value="new"
											<?php echo ($bookings_data[0]['status']=='active') ? 'new': ''; ?>>New
										</option>
										<option value="pending"
											<?php echo ($bookings_data[0]['status']=='pending') ? 'selected': ''; ?>>
											Pending</option>

									</select>
								</div>
								<div class="col-sm-6 mt-3">
									<label for="sc_desc">Description</label>
									<textarea name="sc_desc" id="sc_desc" class="form-control"
										rows="4"><?php echo $bookings_data[0]['description'];?></textarea>
								</div>

							</div>

							<input type="submit" name="submit" class="btn btn-primary btn-user btn-block">



						</form>
						<hr>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
