
    

    
    <!--Body Content-->
    <div id="page-content">
      <!-- <?php print_r($ex_cust);?> -->
          
           
            
    <div class="section summery">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow">
                <div class="card-body">
                    <div class="section-header text-center">
                        <h4 class="user-titles">Order Summery</h4>
                        <hr>
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
        <div class="col-lg-12">
                    <div class="card shadow">
                                <div class="card-body">
                                     <div class="section-header text-center">
                                        <h4 class="user-titles">Booking Details</h4>
                                        <hr>
                                        <form class="customer" method="post" action="">
                                        <input type="hidden" class="form-control form-control-user" value="<?php echo $ex_cust[0]['cust_id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    <div class="col-lg-6 mb-3 mt-3 mb-sm-0">
                                        <!-- <label for="c_name">Customer Name</label> -->
                                        <input type="text" name="c_name" value="<?php echo $ex_cust[0]['cust_name'];?>" id="c_name" class="form-control form-control-user" 
                                            placeholder="Customer Name">
                                    </div>
                               

                                    <div class="col-lg-6  mt-3">
                                    <!-- <label for="c_contact">Customer Contact</label> -->
                                        <input type="text" name="c_contact" value="<?php echo $ex_cust[0]['contact'];?>" id="c_contact" class="form-control form-control-user" 
                                            placeholder="Contact">
                                    </div>
                                   
                               
                                    <div class="col-lg-6 mb-3 mt-3 mb-sm-0">
                                    <!-- <label for="c_email">Email Address</label> -->
                                    <input type="email" name="c_email" value="<?php echo $ex_cust[0]['email_id'];?>" id="c_email" class="form-control form-control-user" 
                                        placeholder="Email Address">
                                    </div>
                                    <?php
                                    if($ex_cust[0]['cust_id']==''){
                                    ?>
                                     <div class="col-lg-6 mt-3">
                                   
                                        <input type="password" name="c_password" value="" id="c_password" class="form-control form-control-user"
                                            placeholder="Password">
                                    </div>
                                    <?php
                                    }
                                    ?>

                                   
                                    <div class="col-lg-6 mb-3 mt-3 mb-sm-0">
                                    <!-- <label for="c_city">City</label> -->
                                    <input type="text" name="c_city" id="c_city" value="<?php echo $ex_cust[0]['city'];?>" class="form-control form-control-user" 
                                        placeholder="City">
                                    </div>
                            

                                    <div class="col-lg-6 mt-3">
                                    <!-- <label for="c_address">Address</label> -->
                                        <input type="text" name="c_address" value="<?php echo $ex_cust[0]['address'];?>"  id="c_address" class="form-control form-control-user"
                                            placeholder="Address">
                                    </div>
                                

                                    <div class="col-lg-6 mt-3">
                                    <!-- <label for="c_pincode">Pincode</label> -->
                                        <input type="text" name="c_pincode" value="<?php echo $ex_cust[0]['pincode'];?>" id="c_pincode" class="form-control form-control-user"
                                            placeholder="Pincode">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="schedule">Pincode</label>
                                             <input type="date" name="schedule" value="<?php echo $ex_cust[0]['pincode'];?>" id="schedule" class="form-control form-control-user"
                                            placeholder="Pincode">
                                        </div>
                                </div> -->
                                    <div class="form-group row">
                                     <div class="col-lg-6 mt-3">
                                        <div class="row justify-content-center">

                                                <div class="form-check col-lg-8 text-left mb-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="cod" name="payment_method" checked="checked">Cash On Booking
                                                </label>
                                                </div>
                                                <!-- <div class="form-check col-lg-8 text-left mb-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="razorpay" name="payment_method">Pay Now
                                                </label>
                                                </div> -->
                                        </div>
                                               
                                    </div> 

                                                 <div class="col-lg-6">
                                                        <div class="form-checkboxes">
                                                            <div class="col-lg-12">
                                                                    <div class="form-group form-check text-left">
                                                                        <input type="checkbox" class="form-check-input" id="terms_services" name="terms_services">
                                                                        <label class="form-check-label" for="terms_services">By Proceeding you agree to the Terms of Service</label>
                                                                    </div>
                                                            </div>
                                                           
                                                        </div>
                                                 </div> 
                                </div>
                                
                                <div class="col-lg-12">

                                    <input type="submit" name="submit" value="Continue" class="theme-btn offer-btn">
                                </div>
                                    

                               
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
 