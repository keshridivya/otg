<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6">
        <h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

        </div>
        <div class="col-lg-6">
            <!-- <div class="add-btn">

                <a href="<?php echo base_url()?>admin/bookings/add" class="pull-right">Add New</a>
            </div> -->

        </div>

    </div>
                    

                    <!-- DataTales Example -->
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
                                            <th>Quantity</th>
                                            <th>Engineer Name</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Created On</th>
                                            <th>Modified On</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                   <?php 
                                   foreach($bookings_data as $book){
                                    ?>
                                    <tr>
                                        <td><?php echo $book['new_request_id']; ?></td>
                                        <td><?php echo $book['cust_id']; ?></td>
                                        <td><?php echo $book['cust_name']; ?></td>
                                        <td> <ul style="list-style:none; padding-left:0;">
                                            
                                        <?php
                                         $book_plans=explode(",", $book['service_plan']);
                                                foreach($book_plans as $plans){
                                            
                                               
                                         ?>
                                         <li><?php echo $plans;?></li>
                                         <?php
                                          }
                                         ?>
                                         </ul>
                                         
                                        </td>
                                        <td>
                                            <ul style="list-style:none; padding-left:0;">
                                                    <?php
                                                    $book_devices=explode(" ", $book['service_device']);
                                                            foreach($book_devices as $device){
                                                        
                                                        
                                                    ?>
                                                    <li><?php echo $device;?></li>
                                                    <?php
                                                    }
                                                    ?>
                                            </ul>
                                          
                                        </td>
                                        <td><?php echo $book['quantity']; ?></td>
                                        <td><?php echo $book['eng_name']; ?></td>
                                        <td><?php echo $book['status']; ?></td> 
                                        <td><?php echo $book['total_amount']; ?></td>                                                                       
                                        <td><?php echo $book['created_on']; ?></td>                                    
                                        <td><?php echo $book['modified_on']?></td>                                    
                                        <td>
                                          <a href="<?php echo base_url('admin/bookings/edit/'.$book['request_id']); ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a> 
                                          <a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash" aria-hidden="true"></i></a>  
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
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
          <a type="button" class="btn btn-secondary" href="<?php echo base_url('admin/bookings/delete/'.$book['request_id']); ?>">Delete</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
                <!-- /.container-fluid -->