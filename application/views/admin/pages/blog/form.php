<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $page_title?></h1>
                    
                  

                    <!-- DataTales Example -->
                    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                          <?php
                        //   if($message){
                        //     echo "<div class='alert alert-info'>".$message."</div>";
                        //   }
                          ?>
                            <form method='post' class="customer" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Blog Name</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFormControlInput1"
                                         name='blog'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Short Description</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFormControlInput1"
                                        name="short_desc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Main Image</label>
                                    <input type="file" class="form-control form-control-user" id="exampleFormControlInput1"
                                        name="file">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Long Description</label>
                                    <textarea id="summernote" name="editordata" class="form-control form-control-user"></textarea>
                                </div>
                                <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                </div>
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

                </div>
                <!-- /.container-fluid -->