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
                            <form class="customer" method="post" action="">
                                        <input type="hidden" class="form-control form-control-user" value="<?php echo $products[0]['id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="cplan">Cplan</label>
                                        <?php
                                        if($products[0]['cproduct_name']){
                                            echo '<input type="text" name="product_name" class="form-control form-control-user" value="'.$products[0]['cproduct_name'].'" readonly>';
                                        }else{
                                        ?>
                                        <select name="product_name" class='form-control form-control-user' id="">
                                            <?php
                                            foreach($category_product as $category_product){
                                            ?>
                                            <option value="<?= $category_product['cproduct_id'] ?>"><?= $category_product['cproduct_name'] ?></option>
                                            <?php } ?>
                                        </select>
<?php } ?>
                                         
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="c_contact">Feature</label>
                                        <input type="text" name="benefits" value="<?php echo $products[0]['benefits']; ?>" id="c_contact" class="form-control form-control-user" 
                                           >
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