<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>
                    
                    <?php echo $cats_data['category_id']; ?>

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
                           <input type="hidden" class="form-control form-control-user" value="<?php echo $cats_data[0]['category_id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="ct_name">Category Name</label>
                                        <input type="text" name="ct_name" value="<?php echo $cats_data[0]['category_name'];?>" id="ct_name" class="form-control form-control-user">
                                    </div>
                                    <div class="col-sm-4">
                                    <label for="ct_status">Category Status</label>
                                    
                                                     <select class="form-control" name="ct_status" id="ct_status">
                                                        <option value="active" <?php echo ($cats_data[0]['status']=='active') ? 'selected': ''; ?> >Active</option>
                                                        <option value="inactive" <?php echo ($cats_data[0]['status']=='inactive') ? 'selected': ''; ?> >Inactive</option>
                                                    
                                                    </select>
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