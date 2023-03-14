<div id="page-content">
   <div class="section">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-8">
                  <div class="card">
                   <div class="card-body">
                     <table class="body-wrap">
                        <tbody>
                           <tr>
                              <td></td>
                               <td class="container">
                                 <div class="content">
                                    <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                       <tbody>
                                          <tr>
                                             <td class="content-wrap aligncenter">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                   <tbody>
                                                      <tr>
                                                         <td class="content-block">
                                                            <div class="section-header text-center">
                                                               <h4 class="user-titles"><?php print_r($message); ?></h4>
                                                               <hr>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td class="content-block">
                                                            <table class="invoice">
                                                               <tbody>
                                                                  <tr>
                                                                     <td>
                                                                        <h4>
                                                                        <?php echo $new_booking[0]['cust_name']?></>
                                                                     </td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td>Request Id: <?php echo $new_booking[0]['request_id_value'] ?></td>
                                                                     <td class="alignright">Date: <?php echo $new_booking[0]['created_on'] ?></td>
                                                                  </tr>
                                                                  <td colspan="2">
                                                                     <table class="invoice-items" >
                                                                        <tbody>
                                                                           <tr>
                                                                              <td>Service Device</td>
                                                                              <td class="alignright"><?php echo $new_booking[0]['service_device'] ?></td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td>Service Plan</td>
                                                                              <td class="alignright"><?php echo $new_booking[0]['service_plan'] ?></td>
                                                                           </tr>
                                                                           <tr class="total">
                                                                              <td class="alignright" width="80%">Total</td>
                                                                              <td class="alignright"> <i class="fa-solid fa-indian-rupee-sign"></i><?= $this->cart->format_number($this->cart->total()) ?></td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </td>
                              <td></td>
                           </tr>
                        </tbody>
                     </table>
                   </div>
                 </div>
            </div>
         </div>
      </div>
   </div>
</div>
