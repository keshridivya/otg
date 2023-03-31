
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6">
        <h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

        </div>
        <div class="col-lg-6">
            <!-- <div class="add-btn">

                <a href="<?php echo base_url()?>admin/customer/add" class="pull-right">Add Feature</a>
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
                                            <th>Plan Id</th>
                                            <th>Plan</th>
                                            <th>Feature</th>
                                            <th>Created On</th>
                                            <th>Modified On</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                   <?php 
                                   foreach($plan_features as $plans_features){
                                    ?>
                                    <tr>
                                        <td><?php echo $plans_features['cplan_id']; ?></td>
                                        <!-- <td><?php echo $plans_features['cplan_id']; ?></td> -->
                                        <td>
                                           <?php  
                                                     
                                                 for($i = 0; $i < count($plans); $i++){
                                              
                                                    if($plans[$i]['cplan_id']==$plans_features['cplan_id']){
                                                        echo $plans[$i]['cplan_name']." for ".$plans[$i]['subcat_name'];
                                                     }
                                                 }
                                          
                                          ?>
                                            </td>
                                        <td><?php echo $plans_features['cplan_features']; ?></td>

                                        <td><?php echo $plans_features['created_on']; ?></td>
                                        <td><?php echo $plans_features['modified_on']; ?></td>                                   
                                        <td>
                                          <a href="<?php echo base_url('admin/plans_features/edit/'.$plans_features['cfeature_id']); ?>" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a> 
                                          <a href="<?php echo base_url('admin/plans_features/delete/'.$plans_features['cfeature_id']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a>  
        
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
            