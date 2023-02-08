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
                          if($message){
                            echo "<div class='alert alert-info'>".$message."</div>";
                          }
                          ?>
                            <form method='post' class="customer" enctype="multipart/form-data">
                                <div class="form-group">
                                <input type="hidden" name='id' value='<?= $testimonial_data[0]['id'] ?>'>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    <label for="exampleFormControlInput1">Name</label>
                                    
                                    <input type="text" class="form-control form-control-user" id="exampleFormControlInput1" value='<?= $testimonial_data[0]['name'] ?>'
                                         name='name'>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Company Name</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFormControlInput1"  value='<?= $testimonial_data[0]['comapny_name'] ?>'
                                        name="comapny_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Short Description</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFormControlInput1"  value='<?= $testimonial_data[0]['short_desc'] ?>'
                                        name="short_desc">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleFormControlInput1">Main Image</label>
                                    <input type="file" class="form-control form-control-user" id="exampleFormControlInput1"
                                        name="file">
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Testominal</label>
                                    <textarea id="summernote" name="testimonial" class="form-control form-control-user"><?= $testimonial_data[0]['long_desc'] ?></textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleFormControlInput1">Status</label>
									<select class="form-control" name="cp_status" id="cp_status">
										<option value="active" <?php if( $testimonial_data[0]['status']=='active'){ echo 'selected'; } ?>>Active</option>
										<option value="inactive" <?php if( $testimonial_data[0]['status']=='inactive'){ echo 'selected'; } ?>>Inactive</option>

									</select>
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