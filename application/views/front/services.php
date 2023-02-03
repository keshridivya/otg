

    
    <!--Body Content-->
    <style>
        /* .row {
        margin-right: 0px; 
         margin-left: 0px;
    } */
    </style>
    <div id="page-content">
                <!--Parallax Section-->
                        <div class="sub-banner">
                        <div class="hero hero--large hero__overlay bg-size">
                            <img class="bg-img blur-up" src="assets/images/banner/services.jpg" alt="" />
                            <div class="hero__inner">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="sub-banner_content">
                                                <form id="" class="search-form text-center">
                                                    <button type="submit"><img src="assets/images/search.png" alt=""></button>
                                                    <input type="search" id="searchinput" >
                                                </form>
                                                <h2 class="sub-banner_content">SERVICES</h2>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        </div>
                        <!--End Parallax Section-->
            
                <div class="section">
                    <div class="container">
                        <div class="row" style='margin-right:-15px;margin-left:-15px'>

                            <div class="col-lg-12">
                                    <div class="section-header text-center">
                                   <h2 class="heading">Maintenance & Repair Services</h2>
                                 
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="row" style='margin-right:-15px;margin-left:-15px'>
                                <?php
                                       
                                       for($i = 0; $i < count($product_data); $i++) {

                                    //     echo base_url($product_data[$i]['cproduct_img']);
                                    //    }

                                        
                                       ?>
                                       <div class="col-lg-3 col-6">
                                        <div class="service-product-content">
                                            <div class="service-product-img">
                                                <img src="<?php echo base_url($product_data[$i]['cproduct_img'])?>" alt="">
                                                <h4><?php echo $product_data[$i]['cproduct_name']?></h4>
                                            </div>
                                            <a href="<?php echo base_url('maintenance/'.$product_data[$i]['cproduct_name']) ?>">View Plans</a>
                                        </div>
                                    </div>
                                       <?php 
                                       
                                       }
                                       ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    	
            <div class="section"></div>
         
        
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
 