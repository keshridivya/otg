<style>
		/*modal*/

		.cont1 {
		position: fixed;
		top: 0;
		left: 0;
		z-index: 9999;
		display: none;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 100%;

	}

	.cont1:target {
		display: flex;
	}

	.modaldisplay {
		top: 35%;
		width: 42%;
		margin: auto;
		padding: 1rem 1rem;
		border-radius: .0rem;
		color: hsl(0, 0%, 100%);
		background: linear-gradient(to right bottom, #fff, #28a745);
		box-shadow: .4rem .4rem 2.4rem .2rem hsla(236, 50%, 50%, 0.3);
		position: relative;
		overflow: hidden;
		padding-right: 2rem !important;
		border-radius: 25px;
	}

	.details {
		text-align: center;
		margin-bottom: 1rem;
		padding-bottom: 1rem;
		border-bottom: 1px solid hsla(0, 0%, 100%, .4);
	}

	.title {
		font-size: 1.6rem;
	}

	.description {
		margin-top: 2rem;
		font-size: 1rem;
		font-style: normal;
	}

	.txt {
		padding: 0 0rem;
		margin-bottom: 2rem;
		font-size: 1rem;
		line-height: 2;
	}

	.txt::before {
		content: '';
		position: absolute;
		top: 0%;
		left: 100%;
		-webkit-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		width: 15rem;
		height: 11rem;
		border: 1px solid hsla(0, 0%, 100%, .2);
		border-radius: 100rem;
		pointer-events: none;
	}

	.closebtn {
		border: 1px solid hsla(0, 0%, 100%, .4);
		border-radius: 100rem;
		color: inherit;
		background: transparent;
		font-family: inherit;
		letter-spacing: .2rem;
		transition: .2s;
		cursor: pointer;
		float: right;
		margin-right: 14px;
		padding: 4px 1rem;
		font-size: 0.765rem;
	}

	.closebtn:hover,
	.closebtn:focus {
		border-color: hsla(0, 0%, 100%, .6);
		-webkit-transform: translateY(-.2rem);
		transform: translateY(-.2rem);
	}

	.link-2 {
		width: 2rem;
		height: 2rem;
		border: 1px solid hsla(0, 0%, 100%, .4);
		border-radius: 50%;
		color: inherit;
		font-size: 1.7rem;
		position: absolute;
		top: 1.2rem;
		right: 2rem;
		display: flex;
		justify-content: center;
		align-items: center;
		transition: .2s;
	}

	.link-2::before {
		content: '×';
		-webkit-transform: translateY(-.1rem);
		transform: translateY(-.1rem);
	}

	.link-2:hover,
	.link-2:focus {
		border-color: hsla(0, 0%, 100%, .6);
		-webkit-transform: translateY(-.2rem);
		transform: translateY(-.2rem);
		text-decoration:none;
	}

	@media(max-width:768px) {
		.modaldisplay {
			padding: 1rem 1rem;
			width: 90%;
		}

		.title {
			font-size: 1.5rem;
		}

		.txt {
			margin-bottom: 1rem;
			font-size: 1rem;
		}

		.txt:before {
			width: 13rem;
		}

	}
</style>
<input type="hidden" class='csrf'
								name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>"><div class="cont1 contsec" id="modal-opened">
	<div class="modal modaldisplay modalalready">
		<div class="details">
			<h1 class="title">Oops!</h1>
		</div>
		<p class="txt">
			<b>Want to Replace the Plan in Your Cart?</b></p>
			<p>Your cart contains Repair and Services plan. Would you like to discard it and replace it with Protection plans?</p>

		<button class="closesec">No &rarr;</button>
		<button class="closebtn2">Yes &rarr;</button>
<input type="hidden" id="planid">
		<a href="#modal-closed" class="link-2 closesec"></a>

	</div>
</div>
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
				<div class="col-lg-5">
					<div class="product-img">
						<img src="<?php echo base_url($product_data[0]['cproduct_img']) ?>" alt="">
					</div>
				</div>
				<div class="col-lg-5">
					<div class="product-title">
						<h2><?php echo $product_data[0]['cproduct_name'];?></h2>
						<p><?php echo $product_data[0]['cproduct_desc']?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Our benefits will change the way you buy parts-->


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
							<!-- <li class="nav-item">
								<a class="nav-link active show" data-toggle="pill" href="#home"></a>
							</li> -->
							<?php
                                            }else{
                                                
                                            
                                            ?>
							<li class="nav-item">
								<a class="nav-link <?php echo ($i==0) ? 'active show': '';?>" data-toggle="pill"
									href="#<?php $new_str = str_replace(' ', '', $subcat_data[$i]['subcat_name']); echo $new_str; ?>"><?php  echo $subcat_data[$i]['subcat_name']; ?></a>
							</li>

							<?php 
                                         } 
                                        }
                                        ?>


						</ul>


					</div>

					<div class="type-plans">
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
                                                        foreach($plans_data as $plandata){
                                                            // print_r($plandata);
                                                            $catplans=$plandata['subcat_name'];

                                                            if($catplans==''){
                                                                // print_r($catplans);
                                                                ?>
											<div class="col-lg-6">
												<div class="type-plan-details">
													<div class="plan-table">

														<div class="plan-desc">
															<div class="plan-title">
																<h2 class="heading">
																	<?php echo $plandata['cplan_name'];?></h2>
															</div>
															<p><?= $plandata['cplan_desc'] ?></p>
														</div>
														<div class='float_right_justify'>
															<div class="plan-price">
																<h2><i class="fa fa-inr"
																		aria-hidden="true"></i><?php echo $plandata['cplan_price'];?>
																</h2>
															</div>
															<div class="plan-btns">
																<a data-id="<?= $plandata['cplan_id']; ?>" class="addcart">Add</a>
															</div>
															<div class="product-accordion">
																<a href="#" class="accordionanchor"
																	data-toggle="collapse"
																	data-target="<?php echo "#faq".$plandata['cplan_id'];?>"
																	aria-expanded="true"
																	aria-controls="<?php echo "faq".$plandata['cplan_id'];?>"><span
																		class='accordionspan'>Plan Benefits</span></a>
															</div>
														</div>
													</div>

													<div id="<?php echo "faq".$plandata['cplan_id'];?>"
														class="collapse accord-text"
														aria-labelledby="<?php echo "faqhead".$plandata['cplan_id'];?>"
														data-parent="#faq">
														<ul class="plan-features">


															<?php  foreach($plan_features as $plans_features){
                                                                                    if($plans_features['cplan_id']==$plandata['cplan_id']){
                                                                          ?>
															<li><i class="fa-solid fa-check"></i>
																<p><?php echo $plans_features['cplan_features']; ?></p>
															</li>

															<?php 
                                                                           }
                                                                }
                                                                          ?>
														</ul>
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
							<div class="tab-pane container <?php echo ($i==0) ? 'active show': '';?>"
								id="<?php $new_str = str_replace(' ', '', $subcat_data[$i]['subcat_name']); echo $new_str; ?>">

								<div class="type-content">
									<div class="container">
										<div class="row">
											<?php 
                                                        
                                                        foreach($plans_data as $plandata){
                                                            $catplans=$plandata['subcat_name'];
                                                            if($catplans==$subcat_data[$i]['subcat_name']){
                                                               
                                                                ?>
											<div class="col-lg-6">
												<div class="type-plan-details">
													<div class="plan-table">

														<div class="plan-desc">
															<div class="plan-title">
																<h2 class="heading">
																	<?php echo $plandata['cplan_name'];?></h2>

															</div>
															<p><?= $plandata['cplan_desc'] ?></p>
														</div>
														<div class='float_right_justify'>
															<div class="plan-price">
																<h2><i class="fa fa-inr"
																		aria-hidden="true"></i><?php echo $plandata['cplan_price'];?>
																</h2>
															</div>
															<div class="plan-btns">
																<a data-id="<?= $plandata['cplan_id']; ?>" class="addcart">Add</a>
															</div>
															<div class="product-accordion">
																<a href="#" class="accordionanchor"
																	data-toggle="collapse"
																	data-target="<?php echo "#faq".$plandata['cplan_id'];?>"
																	aria-expanded="true"
																	aria-controls="<?php echo "faq".$plandata['cplan_id'];?>"><span
																		class='accordionspan'>Plan Benefits</span></a>
															</div>
														</div>
													</div>

													<div id="<?php echo "faq".$plandata['cplan_id'];?>"
														class="collapse accord-text"
														aria-labelledby="<?php echo "faqhead".$plandata['cplan_id'];?>"
														data-parent="#faq">
														<ul class="plan-features">


															<?php
                                                                            //  $plan_features=$this->db->get_where('plan_features',array('cplan_id'=>$plandata['cplan_id']))->result_array();
                                                                   
                                                                            
                                                                                foreach($plan_features as $plans_features){
                                                                                    if($plans_features['cplan_id']==$plandata['cplan_id']){
                                                                                        // print_r($plans_features);
                                                                
                                                                          ?>
															<li><i class="fa-solid fa-check"></i>
																<p><?php echo $plans_features['cplan_features']; ?></p>
															</li>

															<?php 
                                                                           }
                                                                }
                                                                          ?>
														</ul>

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

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--benefits & features-->
	<div class="section feature" style='padding-top:0'>

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

							<h2 class="heading">Features</h2>
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
	<!--benefits & features-->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
	$('.addcart').click(function () {
		let planid = $(this).data('id');
		let csrfHash = $('.csrf').val();
		let csrfName = $('.csrf').attr('name');
		$.ajax({
			url: "<?= base_url('welcome/addtocart'); ?>",
			method: 'post',
			data: {
				planid: planid,
				warranty:'Maintenance and repair',
				[csrfName]: csrfHash,
			},
			dataType: "json",
			success: function (response) {
				$('.csrf').val(response.token);
				if (response.result == 'success') {
					window.location.href = "<?= base_url('cart') ?>";
				} else {
					// alert('Item not added in the card');
					$('#planid').val(planid);
					$('.contsec').css('display', 'block');
					$('.modalalready').modal('show');
				}
			},
			error: function () {
				alert('Something went wrong. Please try again');
			}
		})
	});

	$('.closebtn2').click(function () {
		let planid = $('#planid').val();
		let csrfHash = $('.csrf').val();
		let csrfName = $('.csrf').attr('name');
		$.ajax({
			url: "<?= base_url('welcome/removecart'); ?>",
			method: 'post',
			data: {
				planid: planid,
				warranty:'Maintenance and repair',
				[csrfName]: csrfHash,
			},
			dataType: "json",
			success: function (response) {
				$('.csrf').val(response.token);
				if (response.result == 'success') {
					window.location.href = "<?= base_url('cart') ?>";
				} else {
					alert('Item not added in the card');
				}
			},
			error: function () {
				alert('Something went wrong. Please try again');
			}
		})
	});

	$('.closesec').click(function(){
		$('.pricebox').show();
		$('.modalalready').modal('hide');
		$('.contsec').css('display', 'none');
	})
</script>
<!--End Body Content-->

<!--Footer-->
