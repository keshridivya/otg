
    

    
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

                        <table>
                            <thead>
                                <tr>
                                
                                    <th width="10%">Product</th>
                                    <th width="10%">Product Name</th>
                                    <th width="10%">Service Name</th>
                                    <th width="15%">Plan Name</th>

                                    <th width="5%">Price</th>
                                    <th width="10%">Quantity</th>
                                    <th width="10%">Subtotal</th>
                                    <th width="10%"></th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($this->cart->total_items()>0){
                                    foreach($cartItems as $item){
                                        ?>

                                        <tr>
                                            <input type="hidden" value="<?= $item["rowid"]?>" name="<?= $item["rowid"]?>" id="rowid">
                                            <td>
                                                <?php $imageURL=!empty($item["image"])?base_url($item["image"]):base_url("demo.jpeg"); 
                                                ?>
                                                <img src="<?php echo $imageURL;?>" alt="" width="50">
                                            </td>
                                            <td><?php echo $item['product_name']?></td>
                                            <td><?php echo $item['product_category']?></td>
                                            <td><?php echo $item['name']?></td>
                                        
                                            <td><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $item['price'] ?></td>
                                            <td>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                                
                                            <input type="number" class="form-control text-center item-qty" value="<?php echo $item['qty'];?>"></td>
                                            <!-- <td><input type="number" class="form-control text-center" value="<?php echo $item['qty'];?>" onchange="updatecartItem(this,'<?php echo $item['rowid']; ?>')"></td> -->
                                            <td><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $item['subtotal']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url().'removeitem/'.$item['rowid'];?>" onclick="return confirm('Are you sure?');"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                            <?php $this->session->pay=$this->cart->total();?>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5"></td>
                                        <th class="right"> <strong>Total</strong></th>
                                        <td colspan="3"><i class="fa-solid fa-indian-rupee-sign"></i> <?= $this->cart->format_number($this->cart->total()) ?></td>
                                    </tr>
                                    <?php
                                }else{
                                    ?>
                                    <div class="alert alert-danger">No Record Found!!</div>
                                    <a href="<?= base_url('cart');?>"></a>
                                    <?php
                                }
                                ?>
                            
                            </tbody>
                        </table>
                                            <div class="row justify-content-center">
                                                <div class="cart-btns col-lg-6">
                                                    <div class="theme-btn offer-btn">
                                                        <a href="#" class="">Continue shopping</a>
                                                    </div>
                                                    <div class="theme-btn offer-btn">
                                                        <a href="<?php echo base_url('checkout');?>" class="">Checkout</a>
                                                    </div>
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

        // function updatecartItem(obj, rowid){
            
        //     $.get("<?php echo base_url('cart/updateItemqty/');?>",{rowid:rowid, qty:obj.value},function(resp){
                
        //             if(resp=='ok'){
        //                 location.reload();
        //             }else{
        //                 alert("cart update failed, please try again later");
        //             }
        //     });
        // }

    //    function updateitemqty(obj,rowid){
    //         var objqty=obj.value;
    //         var rowid=rowid;
    //        $.ajax({
    //             'url':'<?= base_url()?>update_cart',
    //             'type':'POST',
    //             'data':{'id':rowid,'qty':objqty},
    //             success:function(result){
    //                 window.location.href='';
    //             }
    //        });
    //    }
    $(document).ready(function(){
        $(".item-qty").on('change',function(){
                var el=$(this).closest('tr');
                var id=$(el).find('#rowid').val();
                var qty=$(this).val();
                // alert(qty);
                // alert(id);
                $.ajax({
                    'url':'<?= base_url()?>update_cart/',
                    'type':'POST',
                    'data':{'id':id,'qty':qty},
                    success:function(result){
                        window.location.href='';
                    }
                });
        });
    });




    </script>
 