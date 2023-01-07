                <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="section-header text-center">
                           <h2 class="heading">My Account</h2>
                         <!-- <h4><?php echo "Welcome".$customers[0]['cust_name'];?></h4> -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="section user-dashboard">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">My Bookings</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Extended Warrenty</button>
                        <button class="nav-link" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Edit Details</button>
                        <a class="nav-link" href="<?php echo base_url('logout')?>" type="button"  aria-selected="false">Logout</a>
                        
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                             <h2><?php echo "Welcome"." ".$customers[0]['cust_name'];?></h2>


                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <!-- <?php print_r($bookings_table)?> -->
                                 <div class="card shadow mb-4">
                       
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Request Id</th>
                                                        <th>Customer Id</th>
                                                        <th>Customer  Name</th>
                                                        <th>Service Plan</th>
                                                        <th>Service Device</th>
                                                        <th>Engineer Name</th>
                                                        <th>Status</th>
                                                        <th>Total Amount</th>
                                                        <th>Created On</th>
                                                        <th>Modified On</th>
                                                      

                                                    </tr>
                                                </thead>
                                                <?php 
                                                foreach($bookings_table as $book_table){
                                                ?>
                                                <tr>
                                                    <td><?php echo $book_table['request_id']; ?></td>
                                                    <td><?php echo $book_table['cust_id']; ?></td>
                                                <td><?php echo $book_table['cust_name']; ?></td>
                                                    <td><?php echo $book_table['service_plan']; ?></td>
                                                    <td><?php echo $book_table['service_device']; ?></td>
                                                    <td><?php echo $book_table['eng_name']; ?></td>
                                                    <td><?php echo $book_table['status']; ?></td> 
                                                    <td><?php echo $book_table['total_amount']; ?></td>                                                                       
                                                    <td><?php echo $book_table['created_on']; ?></td>                                    
                                                    <td><?php echo $book_table['modified_on']?></td>                                    
                                                  
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                                
                                                
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Coming soon</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                        <form class="customer" method="post" action="">
                                        <input type="hidden" class="form-control form-control-user" value="<?php echo $customers[0]['cust_id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="c_name">Customer Name</label>
                                        <input type="text" name="customer_name" value="<?php echo $customers[0]['cust_name'];?>" id="customer_name" class="form-control form-control-user" 
                                            placeholder="Customer Name">
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="c_contact">Customer Contact</label>
                                        <input type="text" name="customer_contact" value="<?php echo $customers[0]['contact'];?>" id="customer_contact" class="form-control form-control-user" 
                                            placeholder="Contact">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="c_email">Email Address</label>
                                    <input type="email" name="customer_email" value="<?php echo $customers[0]['email_id'];?>" id="customer_email" class="form-control form-control-user" 
                                        placeholder="Email Address">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="c_city">City</label>
                                    <input type="text" name="customer_city" id="customer_city" value="<?php echo $customers[0]['city'];?>" class="form-control form-control-user" 
                                        placeholder="City">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-sm-4">
                                    <label for="c_address">Address</label>
                                        <input type="text" name="customer_address" value="<?php echo $customers[0]['address'];?>"  id="customer_address" class="form-control form-control-user"
                                             placeholder="Address">
                                    </div>
                                    <div class="col-sm-4">
                                    <label for="c_pincode">Pincode</label>
                                        <input type="text" name="customer_pincode" value="<?php echo $customers[0]['pincode'];?>" id="customer_pincode" class="form-control form-control-user"
                                             placeholder="Pincode">
                                    </div>
                                </div>
                                <input type="submit" name="submit" value="edit" class="btn btn-primary submit-btn">
                                    
                                
                               
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
              

               </div>