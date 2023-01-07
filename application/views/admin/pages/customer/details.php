                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>Contact</th>
                                            <th>Email Id</th>
                                            <th>Password</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Pincode</th>
                                            <th>Created On</th>
                                            <th>Modified On</th>
                                            <!-- <th>Action</th> -->

                                        </tr>
                                    </thead>
                                   <?php 
                                   foreach($customers as $cust){
                                    ?>
                                    <tr>
                                        <td><?php echo $cust['cust_id']; ?></td>
                                        <td><?php echo $cust['cust_name']; ?></td>
                                        <td><?php echo $cust['contact']; ?></td>
                                        <td><?php echo $cust['email_id']; ?></td>
                                        <td><?php echo $cust['password']; ?></td>
                                        <td><?php echo $cust['city']; ?></td> 
                                        <td><?php echo $cust['address']; ?></td>                                    
                                        <td><?php echo $cust['pincode']; ?></td>                                    
                                        <td><?php echo $cust['created_on']; ?></td>                                    
                                        <td><?php echo $cust['modified_on']?></td>                                    
                                        <!-- <td>
                                          <a href="<?php echo base_url('admin/customer/edit/'.$cust['cust_id']); ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a> 
                                          <a href="<?php echo base_url('admin/customer/delete/'.$cust['cust_id']); ?>"><i class="fas fa-trash" aria-hidden="true"></i></a>  
                                          <a href="<?php echo base_url('admin/customer/details/'.$cust['cust_id']); ?>" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-eye" aria-hidden="true"></i></a>  
                                       
                                        
                                            
                                        </td> -->
                                    </tr>
                                    <?php
                                      }
                                    ?>
                                 
                               
                                   
                                </table>
                               
                               
                            </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>