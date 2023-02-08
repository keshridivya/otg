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
                                <input type="hidden" name='id' value='<?= $client[0]['id'] ?>'>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    <label for="exampleFormControlInput1">Name</label>
                                    
                                    <?php
                                    if($client[0]['client_logo']){ ?>
                                        <img src='<?php echo base_url($client[0]['client_logo']); ?>' alt='logo'>
                                    <?php }
                                    ?>
                                    <input type="file" class="form-control form-control-user" id="exampleFormControlInput1" value='' name='logo'>
                                    <input type='hidden' value='<?= $client[0]['client_logo'] ?>' name='file'>
                                   
                                </div>
                                <div class="form-group">
                                <label for="exampleFormControlInput1">Status</label>
									<select class="form-control" name="status" id="cp_status">
										<option value="active" <?php if( $client[0]['status']=='active'){ echo 'selected'; } ?>>Active</option>
										<option value="inactive" <?php if( $client[0]['status']=='inactive'){ echo 'selected'; } ?>>Inactive</option>

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