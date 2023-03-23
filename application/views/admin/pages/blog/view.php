<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6">
        <h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>

        </div>
        <div class="col-lg-6">
            <div class="add-btn">

                <a href="<?php echo base_url()?>admin/blog/add" class="pull-right">Add Blog</a>
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
                                            <th>S.no</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>description</th>
                                            <th>Written By</th>
                                            <th>status</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                        </tr>

                                        <?php
                        $count=1;
                        foreach($blog as $blog){ ?>
						<tr>
							<td><?= $count; ?></td>
                            <td><img src='<?php echo base_url($blog['file']); ?>' alt='logo'></td>
							<td><?= $blog['name'] ?></td>
							<td><?php echo substr($blog['description'],0,150); ?></td>
							<td><?= $blog['writtenby'] ?></td>
							<td><?= $blog['status'] ?></td>
							<td><?= $blog['created_date'] ?></td>
							<td>
								<a href="<?php echo base_url('admin/blog/edit/'.$blog['id']); ?>" class="btn btn-primary"><i
										class="fas fa-pencil-alt" aria-hidden="true"></i></a>
								<a href="<?php echo base_url('admin/blog/delete/'.$blog['id']); ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" ><i class="fas fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						<?php $count++; }
                        ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
