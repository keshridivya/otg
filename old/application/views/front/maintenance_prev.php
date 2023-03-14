

    <!--Body Content-->
    <div id="page-content">
      
          
                   <!--Our benefits will change the way you buy parts-->
            <div class="section about-product">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                           <h2 class="heading"><?php echo $product_data[0]['category_name'];?></h2>
                          
                        </div>
                     </div>
                  </div>
                  <div class="row justify-content-center product-info">
                    
                     <div class="col-lg-6">
                        <div class="product-img">
                            <img src="<?php echo base_url($product_data[0]['cproduct_img']) ?>" alt="">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="product-title">
                            <h2><?php echo $product_data[0]['cproduct_name'];?></h2>
                            <p><?php echo $product_data[0]['cproduct_desc']?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--End Our benefits will change the way you buy parts-->
            <div class="section feature">

                    <div class="container">
                        <div class="row justify-content-center">
                            <?php
                            if(!empty($product_benefits)){
                            
                         
                            ?>
                            <div class="col-lg-6">
                                <div class="maintenance-features">
                                    <div class="feature-title">
                                            
                                            <h2 class="heading">Benefits</h2>
                                          
                                           
                                    </div>
                                    <div class="feature-list">
                                        <ul>
                                        <?php
                                             foreach($product_benefits as $benefits){
                                                ?>
                                                 <li>
                                                <i class="fa-solid fa-check"></i>
                                                <p><?php echo $benefits['benefits'];?></p>
                                                 </li>
                                                <?php
                                             }
                                            ?>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                               }
                            ?>
                            <div class="col-lg-6">
                                <div class="maintenance-features">
                                    <div class="feature-title">
                                            
                                            <h2 class="heading">Services & Features</h2>
                                          
                                           
                                    </div>
                                    <div class="feature-list">
                                        <ul>
                                            <?php
                                             foreach($product_features as $features){
                                                ?>
                                                 <li>
                                                <i class="fa-solid fa-check"></i>
                                                <p><?php echo $features['feature'];?></p>
                                                 </li>
                                                <?php
                                             }
                                            ?>

                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                                                  
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="section-header text-center">
                                <h2 class="heading">Type of Device</h2>
                                </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="type-tabs">
                                <ul class="nav nav-pills">
                                        <?php
                                        for($i = 0; $i < count($subcat_data); $i++) {
                                            if($subcat_data[$i]['subcat_name']==""){
                                               
                                                ?>
                                                 <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="pill" href="#home"></a>
                                                </li>
                                                <?php
                                            }else{
                                                
                                            
                                            ?>
                                               <li class="nav-item">
                                                    <a class="nav-link <?php echo ($i==0) ? 'active show': '';?>" data-toggle="pill" href="#<?php $new_str = str_replace(' ', '', $subcat_data[$i]['subcat_name']); echo $new_str; ?>"><?php  echo $subcat_data[$i]['subcat_name']; ?></a>
                                                </li>
                                           
                                         <?php 
                                         } 
                                        }
                                        ?>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">Windows Air Conditioner</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">Split Air Conditioner</a>
                                    </li> -->
                                  
                                </ul>


                            </div>

                            <div class="type-plans">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                     <?php
                                       
                                       for($i = 0; $i < count($subcat_data); $i++) {
                                        if($subcat_data[$i]['subcat_name']==""){
                                       ?>

                                            <div class="tab-pane container active show" id="home">

                                            <div class="type-content">
                                                <div class="container">
                                                    <div class="row">
                                                  
                                                        <?php 
                                                        // print_r($plans_data['cplan_name']);
                                                        foreach($plans_data as $plandata){
                                                            print_r($plandata);
                                                            $catplans=$plandata['subcat_name'];
                                                         

                                                            if($catplans==''){
                                                                print_r($catplans);
                                                                ?>
                                                                <div class="col-lg-4">
                                                               
                                                                    <div class="type-plan-details">
                                                                            <div class="plan-title">
                                                                                <h2 class="heading"><?php echo $plandata['cplan_name'];?></h2>
                                                                                    
                                                                            </div>
                                                                            <div class="plan-desc">
                                                                                <p>Lorem ipsum dolor sit amet, anfdsconsectetuer
                                                                                    adipiscing elit, sed diam nonum Lorem ipsum dolor
                                                                                    sit amet, consectetuer adipiscing elit, sed diam</p>
                                                                            </div>
                                                                            <div class="plan-price">
                                                                                <h2><i class="fa fa-inr" aria-hidden="true"></i><?php echo $plandata['cplan_price'];?></h2>
                                                                            </div>
                                                                            <!-- <?php echo $plandata['$cplan_id'];?> -->
                                                                            <div class="plan-btns">
                                                                                <a href="">View More</a>
                                                                                <a href="<?php echo base_url('addtocart/'.$plandata['cplan_id'])?>">Add to Cart</a>
                                                                            </div>
                                                                            <div class="product-accordion">
                                                                                <a href="#" class="" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="<?php echo "faq".$plandata['cplan_id'];?>">dasdas</a>
                                                              
                                                                             </div>
                                                                             <div id="faq1" class="collapse accord-text" aria-labelledby="<?php echo "faqhead".$plandata['cplan_id'];?>" data-parent="#faq">
                                                                               fsdfsdgsdgsdg asfjaoieruoirej mnrkjhfoia
                                                                             </div>

                                                                    </div>
                                                                </div>
                                                                <?php
                                                                
                                                            }
                                                        }
                                                    ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                          <?php
                                            }else{
                                                
                                            
                                            ?>   
                                       <div class="tab-pane container <?php echo ($i==0) ? 'active show': '';?>" id="<?php $new_str = str_replace(' ', '', $subcat_data[$i]['subcat_name']); echo $new_str; ?>">

                                            <div class="type-content">
                                                <div class="container">
                                                    <div class="row">
                                                        <?php 
                                                        // print_r($subcat_data[$i]['subcat_name']);
                                                        foreach($plans_data as $plandata){
                                                            $catplans=$plandata['subcat_name'];
                                                            if($catplans==$subcat_data[$i]['subcat_name']){
                                                                // print_r($catplans);
                                                                ?>
                                                                <div class="col-lg-4">
                                                                    <div class="type-plan-details">
                                                                            <div class="plan-title">
                                                                                <h2 class="heading"><?php echo $plandata['cplan_name'];?></h2>
                                                                                    
                                                                            </div>
                                                                            <div class="plan-desc">
                                                                                <p>Lorem ipsum dolor sit amet, anfdsconsectetuer
                                                                                    adipiscing elit, sed diam nonum Lorem ipsum dolor
                                                                                    sit amet, consectetuer adipiscing elit, sed diam</p>
                                                                            </div>
                                                                            <div class="plan-price">
                                                                                <h2><i class="fa fa-inr" aria-hidden="true"></i><?php echo $plandata['cplan_price'];?></h2>
                                                                            </div>
                                                                            <div class="plan-btns">
                                                                                <a href="">View More</a>
                                                                                <a href="<?php echo base_url('addtocart/'.$plandata['cplan_id'])?>">Add to Cart</a>
                                                                            </div>
                                                                            <div class="product-accordion">
                                                                                <a href="#" class="" data-toggle="collapse" data-target="<?php echo "#faq".$plandata['cplan_id'];?>" aria-expanded="true" aria-controls="<?php echo "faq".$plandata['cplan_id'];?>">dsadasd</a>
                                                              
                                                                             </div>
                                                                             <div id="<?php echo "faq".$plandata['cplan_id'];?>" class="collapse accord-text" aria-labelledby="<?php echo "faqhead".$plandata['cplan_id'];?>" data-parent="#faq">
                                                                               fsdfsdgsdgsdg asfjaoieruoirej mnrkjhfoia
                                                                             </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                
                                                            }
                                                        }
                                                      ?>
                                                        
                                                        
                                                        
                                                   
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <?php 
                                          
                                            }
                                        }
                                                    ?>
                                    <!-- <div class="tab-pane container active" id="home">

                                        <div class="type-content">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="type-plan-details">
                                                                <div class="plan-title">
                                                                    <h2 class="heading">Jet Service</h2>
                                                                        
                                                                </div>
                                                                <div class="plan-desc">
                                                                    <p>Lorem ipsum dolor sit amet, anfdsconsectetuer
                                                                        adipiscing elit, sed diam nonum Lorem ipsum dolor
                                                                        sit amet, consectetuer adipiscing elit, sed diam</p>
                                                                </div>
                                                                <div class="plan-price">
                                                                    <h2><i class="fa fa-inr" aria-hidden="true"></i>499</h2>
                                                                </div>
                                                                <div class="plan-btns">
                                                                    <a href="">View More</a>
                                                                    <a href="">Add to Cart</a>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                   
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section  how-work-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-header text-center">
                            <h2 class="heading">How does it Work?</h2>
                            
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-4">
                            <div class="bottom-icons">
                                <div class="icons-img">
                                    <img src="<?php echo base_url('assets/images/icons/plan.png')?>" alt="">
                                </div>
                                <div class="icons-title">
                                    <p>Find a Plan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-4">
                            <div class="bottom-icons">
                                <div class="icons-img">
                                    <img src="<?php echo base_url('assets/images/icons/cart.png')?>" alt="">
                                </div>
                                <div class="icons-title">
                                    <p>Add to Cart</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-4">
                            <div class="bottom-icons">
                                <div class="icons-img">
                                    <img src="<?php echo base_url('assets/images/icons/grab.png')?>" alt="">
                                </div>
                                <div class="icons-title">
                                    <p>Grab it</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
    	
         
        
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
 