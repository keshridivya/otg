
    

    
    <!--Body Content-->
    <div id="page-content">
      
          
           
            
     <!-- <?php print_r($cartItems);?> -->
     <div class="section cart">
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="section-header text-center">
                           <h2 class="heading">My Cart</h2>
                         
                        </div>
                    <hr>
                                <div class="row">
                                    <div class="col-lg-12">

                                           
                                          
                                                <?php
                                                if($this->cart->total_items()>0){
                                                    foreach($cartItems as $item){
                                                        ?>

                                                        <div class="row one-order">
                                                            <input type="hidden" value="<?= $item["rowid"]?>" name="<?= $item["rowid"]?>" id="rowid">
                                                            
                                                            <div class="col-lg-1 col-12 cart-row">
                                                                <h6>Product</h6>
                                                                <?php $imageURL=!empty($item["image"])?base_url($item["image"]):base_url("demo.jpeg"); 
                                                                ?>
                                                                <img src="<?php echo $imageURL;?>" alt="" width="50">
                                                            </div>

                                                            <div class="col-lg-1 col-12 cart-row">
                                                                 <h6>Product Name</h6>
                                                                <p><?php echo $item['product_name']?></p>
                                                            </div>
                                                            <div class="col-lg-2 col-12 cart-row">
                                                                <h6>Service Name</h6>
                                                                <p><?php echo $item['product_category']?></p>
                                                                
                                                            </div>
                                                            <div class="col-lg-2 col-12 cart-row">
                                                                <h6>Plan Name</h6>
                                                                <p><?php echo $item['name']?></p>
                                                                
                                                            </div>
                                                            <div class="col-lg-1 col-12 cart-row">
                                                                <h6>Price</h6>

                                                                <p><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $item['price'] ?></p>
                                                            </div>
                                                            <div class="col-lg-2 col-12 cart-row">
                                                                <h6>Quantity</h6>
                                                            <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                                            <input type="number" class="form-control text-center item-qty" value="<?php echo $item['qty'];?>">
                                                            </div>
                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                                            <!-- <td><input type="number" class="form-control text-center" value="<?php echo $item['qty'];?>" onchange="updatecartItem(this,'<?php echo $item['rowid']; ?>')"></td> -->
                                                            <div class="col-lg-2 col-12 cart-row">
                                                            <h6>Subtotal</h6>
                                                            <div class="subtotal-row">
                                                                
                                                                <i class="fa-solid fa-indian-rupee-sign"></i> <p class="subtotal" style="display:inline-block;"> <?php echo $item['subtotal']; ?></p> 
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-1 col-12 cart-row delete-item">
                                                                <a href="<?php echo base_url('removeItem/'.$item['rowid'])?>" onclick="return confirm('Are you sure?');"><i class="fa-solid fa-trash-can"></i></a>
                                                            </div>
                                                            <?php $this->session->pay=$this->cart->total();?>
                                                    </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <hr>
                                                    <div class="row justify-content-end total-cart">
                                                    
                                                        <div class="col-lg-1 col-6"><h6>Total</h6></div>
                                                        <div class="col-lg-1 col-6"><i class="fa-solid fa-indian-rupee-sign"></i> <?= $this->cart->format_number($this->cart->total()) ?></div>
                                                        <div class="col-lg-2"></div>
                                                </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="alert alert-danger">No Product Found!!</div>
                                                    <a href="<?= base_url('cart');?>"></a>
                                                    <?php
                                                }
                                                ?>
                                            
                                    
                                    </div>
                                     
                                    
                                </div>
                       
                                            <div class="row justify-content-center">
                                                <div class="cart-btns col-lg-6">
                                                    <div class="theme-btn offer-btn">
                                                        <a href="<?php echo base_url('services');?>" class="">Continue shopping</a>
                                                    </div>
                                                    <?php
                                                    if($this->cart->total_items()>0){
                                                    ?>
                                                    <div class="theme-btn offer-btn">
                                                        <a href="<?php echo base_url('checkout');?>" class="">Checkout</a>
                                                    </div>
                                                    <?php
                                                      }
                                                    ?>
                                                    
                                               </div>
                                            </div>
                                              
                    </div>
                                            

                  </div>
          
              </div>
              
       
        
        </div>
</div>
     </div>
    	
             
           
            <div class="section"></div>
         
        
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script>

    

   
    $(document).ready(function(){
        $(".item-qty").on('change',function(){
                var el=$(this).closest('.row');
                var id=$(el).find('#rowid').val();
                var qty=$(this).val();
                var csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
                var csrfHash = $('.txt_csrfname').val();
               
                $.ajax({
                    'url':'<?php echo base_url('update_cart/')?>',
                    'type':'POST',
                    'data':{'id':id,'qty':qty,[csrfName]: csrfHash},
                    success:function(result){
                        var qty=result.qty;
                        $('.item-qty').text(qty);
                        window.location.href="";
                       
                    }
                });
        });
    });




    </script>
 