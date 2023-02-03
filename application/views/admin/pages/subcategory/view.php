<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6">
        <h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

        </div>
        <div class="col-lg-6">
            <div class="add-btn">

                <a href="<?php echo base_url()?>admin/subcategory/add" class="pull-right">Add Categories</a>
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
                                            
                                            <th> Id</th>
                                            <th>Category Product Name</th>
                                            <th>Subcategory Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            
                                            <th>Created On</th>
                                            <th>Modified On</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                   <?php 
                                   foreach($scategory as $scats){
                                    ?>
                                    <tr>
                                       
                                        <td><?php echo $scats['subcat_id']; ?></td>
                                        <td><?php echo $scats['cproduct_name']; ?></td>
                                        <td><?php echo $scats['subcat_name']; ?></td>
                                        <td><?php echo $scats['sub_desc']; ?></td>
                                        <td><?php echo $scats['status']; ?></td>
                                                                            
                                        <td><?php echo $scats['created_on']; ?></td>                                    
                                        <td><?php echo $scats['modified_on']?></td>                                    
                                        <td>
                                          <a href="<?php echo base_url('admin/subcategory/edit/'.$scats['subcat_id']); ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a> 
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
                <!-- /.container-fluid -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
          <a type="button" class="btn btn-secondary" href="<?php echo base_url('admin/subcategory/delete/'.$scats['subcat_id']); ?>">Delete</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>