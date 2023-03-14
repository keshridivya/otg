

<!-- <?php print_r($plan_features);?>
<?php print_r($plans);?>
<?php print_r($all_plans);?> -->

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>
                    
                    <?php echo $plan_features[0]['cfeature_id']; ?>

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
                            <form class="customer" method="post" action="">
                                        <input type="hidden" class="form-control form-control-user" value="<?php echo $plan_features[0]['cfeature_id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="cplan">Cplan</label>
                                        <input type="text" name="cplan" value="<?php echo $plan_features[0]['cplan_id'];?>" id="cplan" class="form-control form-control-user" 
                                            placeholder="Cate">

                                         
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="c_contact">Feature</label>
                                        <input type="text" name="c_contact" value="<?php echo $plan_features[0]['cplan_features'];?>" id="c_contact" class="form-control form-control-user" 
                                            placeholder="Contact">
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