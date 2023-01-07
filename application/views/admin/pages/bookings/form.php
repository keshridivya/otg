            <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $action?></h1>
                    
                    <?php echo $book_data['request_id']; ?>

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
                            <form class="booking-form" method="post" action="">
                                 <input type="hidden" class="form-control form-control-user" value="<?php echo $book_data[0]['request_id'];?>" name="id">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="c_name">Customer Name</label>
                                        <input type="text" name="c_name" value="<?php echo $book_data[0]['cust_name'];?>" id="c_name" class="form-control form-control-user"
                                        placeholder="Customer Name">
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="s_plan">Service Plan</label>
                                        <input type="text" name="s_plan" value="<?php echo $book_data[0]['service_plan'];?>" id="s_plan" class="form-control form-control-user" 
                                            placeholder="Service Plan">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="s_device">Service Device</label>
                                        <input type="text" name="s_device" value="<?php echo $book_data[0]['service_device'];?>" id="s_device" class="form-control form-control-user" 
                                            placeholder="Service Device">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="e_name">Engineer Name</label>
                                    <input type="text" name="e_name" value="<?php echo $book_data[0]['eng_name'];?>" id="e_name" class="form-control form-control-user" 
                                        placeholder="Engineer Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="b_status">Status</label>
                                                 <select class="form-control" name="b_status" id="b_status">
                                                        <option value="new" <?php echo ($book_data[0]['status']=='new') ? 'selected': ''; ?> >New</option>
                                                        <option value="pending" <?php echo ($book_data[0]['status']=='pending') ? 'selected': ''; ?> >Pending</option>
                                                        <option value="completed" <?php echo ($book_data[0]['status']=='completed') ? 'selected': ''; ?> >Completed</option>
                                                    </select>
                                        <!-- <input type="text" name="b_status" value="<?php echo $book_data[0]['status'];?>" id="b_status" class="form-control form-control-user"
                                             placeholder="Status"> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="t_amnt">Total Amount</label>
                                    <input type="text" name="t_amnt" id="t_amnt" value="<?php echo $book_data[0]['total_amount'];?>" class="form-control form-control-user" 
                                        placeholder="Total Amount">
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