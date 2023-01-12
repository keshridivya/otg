<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6">
        <h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

        </div>
        <div class="col-lg-6">
            <div class="add-btn">

                <a href="<?php echo base_url()?>admin/category_products/add" class="pull-right">Add Categories</a>
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
                                            
                                            <th>Category Product Image</th>
                                            <!-- <th>Category Product Id</th> -->
                                            <th>Category Name</th>
                                            <th>Category Product Name</th>
                                            
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Created On</th>
                                            <th>Modified On</th>
                                            <th>Action</th>



                                        </tr>
                                    </thead>
                                   <?php 
                                   foreach($cproducts as $cpro){
                                    ?>
                                    <tr>
                                       
                                        <td><img src='<?php echo base_url($cpro['cproduct_img']);?>' /></td>
                                        <!-- <td><?php echo $cpro['cproduct_id']; ?></td> -->
                                        <td><?php echo $cpro['category_name']; ?></td>
                                                                            
                                        <td><?php echo $cpro['cproduct_name']; ?></td>                                    
                                        <td><?php echo $cpro['cproduct_desc']?></td>  
                                        <td><?php echo $cpro['status']?></td>  
                                        <td><?php echo $cpro['created_on']?></td>                                    
                                        <td><?php echo $cpro['modified_on']?></td>                                    


                                        <td>
                                          <a href="<?php echo base_url('admin/category_products/edit/'.$cpro['cproduct_id']); ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a> 
                                          <a href="<?php echo base_url('admin/category_products/delete/'.$cpro['cproduct_id']); ?>"><i class="fas fa-trash" aria-hidden="true"></i></a>  
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