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
                            <form class="customer" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control form-control-user" value="<?php echo $cpro_data[0]['cproduct_id'];?>" name="id">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="cp_photo">Product Photo</label>
                                        <input type="file" name="cp_photo" id="cp_photo" class="form-control">
                                        <?php
                                        if($cpro_data[0]['cproduct_img']){
                                           echo "<img src='".base_url($cpro_data[0]['cproduct_img'])."'/>";
                                        }
                                        ?>
                                    </div>
                                    
                                       
                                   
                                </div>
                                 

                                <div class="form-group row">
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="ct_name">Category Name</label>
                                        <select name="ct_name" id="ct_name" class="form-control">
                                       <?php
                                       
                                       foreach($cato as $catos){
                                        $mycat=$catos['category_name'];
                                       
                                       ?>
                                       <option value="<?php echo $mycat; ?>" <?php echo ($cpro_data[0]['category_name']==$mycat) ? 'selected': ''; ?> ><?php echo $mycat; ?></option>
                                            
                                    

                                            <?php 
                                          
                                            }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="ct_name">Product Name</label>
                                        <input type="text" name="cp_name" value="<?php echo $cpro_data[0]['cproduct_name'];?>" id="cp_name" class="form-control form-control-user">
                                    </div>
                                  
                                   
                                </div>      
                                <div class="form-group row">
                                    
                                     <div class="col-sm-6">
                                    <label for="cp_desc">Product description</label>
                                        <textarea name="cp_desc" id="cp_desc" class="form-control" rows="4"><?php echo $cpro_data[0]['cproduct_desc'];?></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                            <label for="cp_status">Status</label>
                                                     <select class="form-control" name="cp_status" id="cp_status">
                                                        <option value="active" <?php echo ($cpro_data[0]['status']=='active') ? 'selected': ''; ?> >Active</option>
                                                        <option value="inactive" <?php echo ($cpro_data[0]['status']=='inactive') ? 'selected': ''; ?> >Inactive</option>
                                                    
                                                    </select>
                                        <!-- <input type="text" name="cp_status" value="<?php echo $cpro_data[0]['status'];?>" id="cp_status" class="form-control form-control-user"> -->
                                    </div>
                                   
                                </div>
                               
                                <input type="submit" name="submit" value="submit" class="btn btn-primary btn-user btn-block">
                                    
                                
                               
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

                </div>
                <!-- /.container-fluid -->