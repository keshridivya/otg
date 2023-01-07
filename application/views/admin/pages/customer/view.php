<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6">
        <h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

        </div>
        <div class="col-lg-6">
            <div class="add-btn">

                <a href="<?php echo base_url()?>admin/customer/add" class="pull-right">Add Customer</a>
            </div>

        </div>

    </div>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>Contact</th>
                                            <th>Email Id</th>
                                            
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Pincode</th>
                                            <th>Created On</th>
                                            <th>Modified On</th>
                                            <th>Action</th>

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
                                        
                                        <td><?php echo $cust['city']; ?></td> 
                                        <td><?php echo $cust['address']; ?></td>                                    
                                        <td><?php echo $cust['pincode']; ?></td>                                    
                                        <td><?php echo $cust['created_on']; ?></td>                                    
                                        <td><?php echo $cust['modified_on']?></td>                                    
                                        <td>
                                          <a href="<?php echo base_url('admin/customer/edit/'.$cust['cust_id']); ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a> 
                                          <a href="<?php echo base_url('admin/customer/delete/'.$cust['cust_id']); ?>"><i class="fas fa-trash" aria-hidden="true"></i></a>  
                                          <!-- <a href="<?php echo base_url('admin/customer/details/'.$cust['cust_id']); ?>"><i class="fas fa-eye" aria-hidden="true"></i></a>   -->
                                           <!-- Modal -->
                                        
                                            
                                        </td>
                                    </tr>
                                    <?php
                                      }
                                    ?>
                                 
                               
                                   
                                </table>
                               
                               
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->