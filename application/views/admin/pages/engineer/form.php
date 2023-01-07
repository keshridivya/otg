            <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>
                    
                    <?php echo $eng_data['eng_id']; ?>

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
                           <input type="hidden" class="form-control form-control-user" value="<?php echo $eng_data[0]['eng_id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="e_name">Engineer Name</label>
                                        <input type="text" name="e_name" value="<?php echo $eng_data[0]['eng_name'];?>" id="e_name" class="form-control form-control-user" 
                                            placeholder="Engineer Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="e_contact">Contact</label>
                                        <input type="text" name="e_contact" value="<?php echo $eng_data[0]['contact'];?>" id="e_contact" class="form-control form-control-user" 
                                            placeholder="Contact">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="e_email">Email Address</label>
                                    <input type="email" name="e_email" value="<?php echo $eng_data[0]['email_id'];?>" id="e_email" class="form-control form-control-user"
                                        placeholder="Email Address">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="e_password">Password</label>
                                        <input type="password" name="e_password" value="<?php echo $eng_data[0]['password'];?>" id="e_password" class="form-control form-control-user"
                                             placeholder="Password">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="e_booking">Ongoing Booking Id</label>
                                        <input type="text" name="e_booking" value="<?php echo $eng_data[0]['ongoing-booking'];?>" id="e_booking" class="form-control form-control-user" 
                                            placeholder="Ongoing Booking id">
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