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
                        //   if($message){
                        //     echo "<div class='alert alert-info'>".$message."</div>";
                        //   }
                          ?>
						<form method='post' class="customer" enctype="multipart/form-data">
							<input type="hidden" name='id' value='<?= $blog[0]['id'] ?>'>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group">
								<label for="exampleFormControlInput1">Blog Name</label>
								<input type="text" class="form-control form-control-user" id="exampleFormControlInput1"
									value='<?= $blog[0]['name'] ?>' name='blog'>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Written By</label>
								<input type="text" class="form-control form-control-user" id="exampleFormControlInput1"
									value='<?= $blog[0]['writtenby'] ?>' name="writtenby">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Date</label>
								<?php
                                    if($blog[0]['insert_date']){ ?>
								<input type="text" class="form-control form-control-user" id="exampleFormControlInput1"
									value='<?= $blog[0]['insert_date'] ?>' name="blogdate">
								<?php } else {
                                    ?>
								<input type="date" class="form-control form-control-user" id="exampleFormControlInput1"
									value='' name="blogdate">
								<?php } ?>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Main Image</label>
								<?php
                                    if($blog[0]['file']){ ?>
								<img src='<?php echo base_url($blog[0]['file']); ?>' alt='logo'>
								<?php }
                                    ?>
								<input type="file" class="form-control form-control-user" id="exampleFormControlInput1"
									name="file">
								<input type='hidden' value='<?= $blog[0]['file'] ?>' name='file'>

							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Status</label>
								<select class="form-control" name="cp_status" id="cp_status">
									<option value="active"
										<?php if( $blog[0]['status']=='active'){ echo 'selected'; } ?>>Active</option>
									<option value="inactive"
										<?php if( $blog[0]['status']=='inactive'){ echo 'selected'; } ?>>Inactive
									</option>

								</select>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Long Description</label>
								<textarea id="summernote" name="editordata"
									class="form-control form-control-user"><?= $blog[0]['description'] ?></textarea>
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary btn-user btn-block">
							</div>
						</form>
						<hr>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
