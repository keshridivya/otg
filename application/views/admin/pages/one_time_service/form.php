<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>
                    
                    <?php echo $subcat_data['subcat_id']; ?>

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
                    <!-- <?php print_r($catp); ?> -->

                            <form class="customer" method="post">
                           <input type="hidden" class="form-control form-control-user" value="<?php echo $subcat_data[0]['subcat_id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                   
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="cp_name">Product Name</label>
                        
                                        <select name="cp_name" id="cp_name" class="form-control">
                                       <?php
                                       
                                       foreach($catp as $catpros){
                                        $mycat=$catpros['cproduct_name'];
                                        
                                       ?>
                                       <option value="<?php echo $mycat; ?>" <?php echo ($subcat_data[0]['cproduct_name']==$mycat) ? 'selected': ''; ?> ><?php echo $mycat; ?></option>
                                            
                                    

                                            <?php 
                                          
                                            }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="sc_name">Subcategory Name</label>
                                        <input type="text" name="sc_name" value="<?php echo $subcat_data[0]['subcat_name'];?>" id="sc_name" class="form-control form-control-user">
                                    </div>
                                    <div class="col-sm-4">
                                    <label for="sc_status">Status</label>
                                                 <select class="form-control" name="sc_status" id="sc_status">
                                                        <option value="active" <?php echo ($subcat_data[0]['status']=='active') ? 'selected': ''; ?> >Active</option>
                                                        <option value="inactive" <?php echo ($subcat_data[0]['status']=='inactive') ? 'selected': ''; ?> >Inactive</option>
                                                    
                                                    </select>
                                          
                                        <!-- <input type="text" name="sc_status" value="<?php echo $subcat_data[0]['status'];?>" id="sc_status" class="form-control form-control-user"> -->
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="sc_desc">Subcategory description</label>
                                        <textarea name="sc_desc" id="sc_desc" class="form-control" rows="4"><?php echo $subcat_data[0]['sub_desc'];?></textarea>
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