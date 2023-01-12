
    

    
    <!--Body Content-->
    <div id="page-content">
      <!-- <?php print_r($ex_cust);?> -->
          
           
            
    <div class="section summery">
<div class="container">
    <div class="row">
        <div class="col-lg-8">

            <div class="card shadow">
                <div class="card-body">
                    <div class="section-header text-center">
                    <h4 class="user-titles">Order Summery</h4>
                    
                    </div>
                    <table>
                        <thead>
                            <th>Product Details</th>

                            <th>Total Amount</th>
                          
                        </thead>
                        <tbody>
                        <tr>
                           
                            
                             <td>
                             <?php
                             if($this->cart->total_items()>0){
                                foreach($cartItems as $item){
                             ?>
                                <?php echo $item['product_name']?>
                              -
                                 <?php echo $item['name']?><br>
                                 <?php
                                }
                            }
                             ?>
                            </td>
                            
                            
                             <td> <i class="fa-solid fa-indian-rupee-sign"></i> <?php print_r($this->cart->total()); ?> </td>
                              </tr>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
                    <div class="card shadow">
                                <div class="card-body">
                                     <div class="section-header text-center">
                                        <h4 class="user-titles">Address Details</h4>
                                        <form class="customer" method="post" action="">
                                        <input type="hidden" class="form-control form-control-user" value="<?php echo $ex_cust[0]['cust_id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <!-- <label for="c_name">Customer Name</label> -->
                                        <input type="text" name="c_name" value="<?php echo $ex_cust[0]['cust_name'];?>" id="c_name" class="form-control form-control-user" 
                                            placeholder="Customer Name">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                    <!-- <label for="c_contact">Customer Contact</label> -->
                                        <input type="text" name="c_contact" value="<?php echo $ex_cust[0]['contact'];?>" id="c_contact" class="form-control form-control-user" 
                                            placeholder="Contact">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <!-- <label for="c_email">Email Address</label> -->
                                    <input type="email" name="c_email" value="<?php echo $ex_cust[0]['email_id'];?>" id="c_email" class="form-control form-control-user" 
                                        placeholder="Email Address">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <!-- <label for="c_city">City</label> -->
                                    <input type="text" name="c_city" id="c_city" value="<?php echo $ex_cust[0]['city'];?>" class="form-control form-control-user" 
                                        placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                    <!-- <label for="c_address">Address</label> -->
                                        <input type="text" name="c_address" value="<?php echo $ex_cust[0]['address'];?>"  id="c_address" class="form-control form-control-user"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                    <!-- <label for="c_pincode">Pincode</label> -->
                                        <input type="text" name="c_pincode" value="<?php echo $ex_cust[0]['pincode'];?>" id="c_pincode" class="form-control form-control-user"
                                            placeholder="Pincode">
                                    </div>
                                </div>
                                <input type="submit" name="submit" value="Continue" class="theme-btn offer-btn">
                                    
                                
                               
                            </form>
                                        </div>
                                </div>
                    </div>            
        </div>
    </div>
</div>
    </div>
    

    	
             
           
            <div class="section"></div>
         
        
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
 
    
    <script>

  



    </script>
 