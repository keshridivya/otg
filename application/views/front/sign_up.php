
    

    
    <!--Body Content-->
    <div id="page-content">
    	<div class="section sign-up-forms">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Sign In</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Sign Up</button>
                        </li>
                    </ul>
                    </div>
                </div>
                                                        <?php
                                                        if($message){
                                                            echo "<div class='alert alert-info'>".$message."</div>";
                                                        }
                                                        ?>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                            <div class="signup-forms">

                                                    <form method="post" action="">
                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">

                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="userid" name="userid" placeholder="Mobile Number/Email Address" value="<?php set_value('userid');?>">
                                                                </div>
                                                            </div>
                                                  
                                                                <?php echo form_error('userid');?>
                                                            
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-6">

                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" value="<?php set_value('pwd');?>">
                                                                </div>
                                                            </div>
                                                           
                                                                <?php echo form_error('pwd');?>
                                                        
                                                        </div>
                                                        
                                                      
                                                        <button type="submit" name="submit" value="login" class="btn">Continue</button>
                                                    </form>
                                                    <a href="">Forgot password?</a>
                                            </div>
                                </div>
                                
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                         <div class="signup-forms">

                                                <form method="post" action="" class='signup'>
                                                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">

                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="username" name="username" placeholder="Name">
                                                                <span id='spanusername'></span>
                                                            </div>
                                                            
                                                            <?php echo form_error('username');?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile No.">
                                                                <span id='spanmobile'></span>
                                                            </div>
                                                            <?php echo form_error('mobile');?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email Address">
                                                            </div>  
                                                            <?php echo form_error('email_id');?>    
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                                </div>
                                                                <?php echo form_error('password');?>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                                                <span id='spancity'></span>
                                                            </div>
                                                            <?php echo form_error('city');?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="state" name="state" placeholder="State">
                                                            </div>
                                                            <span id='spanstate'></span>
                                                            <?php echo form_error('state');?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="address" name="address" placeholder="Service Address">
                                                            </div>
                                                            <?php echo form_error('address');?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
                                                            </div>
                                                            <span id='spanpincode'></span>
                                                            <?php echo form_error('pincode');?>
                                                        </div>
                                                        <div class="form-checkboxes checkboxinput">
                                                            <div class="col-lg-12">
                                                                    <div class="form-group form-check ">
                                                                        <input type="checkbox" class="form-check-input" id="terms_services" name="terms_services" required>
                                                                        <label class="form-check-label" for="terms_services">By Proceeding you agree to the Terms of Service</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                     </div>
                                                     <div class="col-lg-6">
                                                     <span id='errorsubmit'></span>
                                                        </div>
                                                     
                                                        <button type="submit" name="submit" class="btn signupbtn" value="register">Continue</button>
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
 