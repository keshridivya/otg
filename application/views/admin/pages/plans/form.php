<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>
                    
                    <?php echo $cplan_data['cplan_id']; ?>

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
                                <input type="hidden" class="form-control form-control-user" value="<?php echo $cplan_data[0]['cplan_id'];?>" name="id">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="cp_photo">Product Photo</label>
                                        <input type="file" name="cp_photo" id="cp_photo" class="form-control">
                                       // <?php
                                        //if($cpro_data[0]['cproduct_img']){
                                          //  echo "<img src='".base_url($cpro_data[0]['cproduct_img'])."'/>";
                                        //}
                                        //?>
                                    </div> -->
                                    
                                       
                                   
                                </div>
                                
                                <div class="form-group row">
                                    
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="pl_name">Plan Name</label>
                                        <input type="text" name="pl_name" value="<?php echo $cplan_data[0]['cplan_name'];?>" id="pl_name" class="form-control form-control-user">
                                    </div>
                                    <!-- <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="cp_name">Product Name</label>
                                        <input type="text" name="cp_name" value="<?php echo $cplan_data[0]['cproduct_name'];?>" id="cp_name" class="form-control form-control-user">
                                    </div> -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="cp_name">Product Name</label>

                                        <select name="cp_name" id="cp_name" class="form-control">
                                       <?php
                                       
                                       foreach($catp as $catpros){
                                        $mycat=$catpros['cproduct_name'];
                                        
                                       ?>
                                       <option value="<?php echo $mycat; ?>" <?php echo ($cplan_data[0]['cproduct_name']==$mycat) ? 'selected': ''; ?> ><?php echo $mycat; ?></option>
                                            
                                    

                                            <?php 
                                          
                                            }
                                                    ?>
                                        </select>
                                    </div>
                                    <!-- <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="subcat_name">Subcategory Name</label>
                                        <input type="text" name="subcat_name" value="<?php echo $cplan_data[0]['subcat_name'];?>" id="subcat_name" class="form-control form-control-user">
                                    </div> -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="subcat_name">Subcategory Name</label>

                                        <select name="subcat_name" id="subcat_name" class="form-control">
                                       <?php
                                       
                                       foreach($subcats as $subcat){
                                        $mycat=$subcat['subcat_name'];
                                        
                                       ?>
                                       <option value="<?php echo $mycat; ?>" <?php echo ($cplan_data[0]['subcat_name']==$mycat) ? 'selected': ''; ?> ><?php echo $mycat; ?></option>
                                            
                                    

                                            <?php 
                                          
                                            }
                                                    ?>
                                        </select>
                                    </div>
                                  
                                   
                                </div>
                                <div class="form-group row">
                                    
                                     <div class="col-sm-6">
                                    <label for="pl_desc">Plan description</label>
                                        <textarea name="pl_desc" id="pl_desc" class="form-control" rows="4"><?php echo $cplan_data[0]['cplan_desc'];?></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="pl_price">Price</label>
                                        <input type="text" name="pl_price" value="<?php echo $cplan_data[0]['cplan_price'];?>" id="pl_price" class="form-control form-control-user">
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="pl_status">Status</label>
                                                <select class="form-control" name="pl_status" id="pl_status">
                                                        <option value="active" <?php echo ($cplan_data[0]['status']=='active') ? 'selected': ''; ?> >Active</option>
                                                        <option value="inactive" <?php echo ($cplan_data[0]['status']=='inactive') ? 'selected': ''; ?> >Inactive</option>
                                                    
                                                    </select>
                                        <!-- <input type="text" name="pl_status" value="<?php echo $cplan_data[0]['status'];?>" id="pl_status" class="form-control form-control-user"> -->
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