<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>OTG CARES</title>
	<meta name="description" content="description">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo/favicon.png<?= config_item("code_version"); ?>" />
	<!-- Plugins CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css<?= config_item("code_version"); ?>">
	<!-- Bootstap CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css<?= config_item("code_version"); ?>">
	<!-- Main Style CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css<?= config_item("code_version"); ?>">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css<?= config_item("code_version"); ?>">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css<?= config_item("code_version"); ?>">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom_responsive.css<?= config_item("code_version"); ?>">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css<?= config_item("code_version"); ?>">-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>-->

</head>
<body class="template-index home13-auto-parts">
	<div id="pre-loader">
		<img src="<?php echo base_url();?>assets/images/loader.gif" alt="Loading..." />
	</div>
	<div class="pageWrapper">

		<!--Search Form Drawer-->
		<div class="search">
			<div class="search__form">
				<form class="search-bar__form" action="#">
					<button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
					<input class="search__input" type="search" name="q" value="" placeholder="Search entire store..."
						aria-label="Search" autocomplete="off">
				</form>
				<button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
			</div>
		</div>
		<!--End Search Form Drawer-->
		<!--Header-->
		<div class="header-wrap animated d-flex border-bottom">
			<div class="container-fluid">
				<div class="row align-items-center justify-content-center">
					<!--Desktop Logo-->
					<div class="logo col-md-2 col-lg-2 d-none d-lg-block ">
						<a href="<?php echo base_url();?>">
							<img src="<?php echo base_url();?>assets/images/logo/header.png" alt="OTG CARES"
								title="OTG CARES" />
						</a>
					</div>
					<!--End Desktop Logo-->
					<div class="col-2 col-sm-3 col-md-3 col-lg-8 order2">
					    <style>
					        @media(max-width:466px){
					            .drop_menu_id{
				                transform: translate3d(-180px, 56px, 0px) !important;
					            }
					        }
					    </style>
						<div class="d-flex d-lg-none">
							<button type="button"
								class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
								<i class="icon anm anm-times-l"></i>
								<i class="anm anm-bars-r"></i>
							</button>
							<?php
            					if(get_cookie("cid")){
            					?>
							<ul class='navbar-nav'>
                                <li class='nav-item dropdown'>
                                    <div style='margin-left:10px'>
                                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <?php
                                             $name  = strtoupper(get_cookie("cname")); 
                                                $remove = ['.', 'MRS', 'MISS', 'MS', 'MASTER', 'DR', 'MR'];
                                                $nameWithoutPrefix=str_replace($remove," ",$name);
                                            
                                            $words = explode(" ", $nameWithoutPrefix);
                                            $firtsName = reset($words); 
                                             $lastName  = end($words);
                                            
                                            
                                            ?>
                                            <div class="rounded-circle"
                                                style="background:var(--var-brown);color:white;font-weight:bold;padding:3px;"><?php echo substr($firtsName,0,1);
                                             echo substr($lastName ,0,1); ?>
                                            </div>

                                        </a>
                                        <div class="dropdown-menu drop_menu_id"
                                            aria-labelledby="navbarDropdownMenuLink">
                                            <p class='dropdown-item'><span style="color:#096459;font-weight:700;border-bottom: 1px solid #f1ecec;">Hey, <?= get_cookie("cname") ?></span></p>
                                            <a class="dropdown-item" href="<?php echo base_url();?>account?show=myaccount"><i class="fa fa-user" style='color:#096459;'></i> &nbsp; &nbsp;My Account</a>
                                            <a class="dropdown-item" href="<?php echo base_url();?>account?show=booking"><i class="fa fa-info-circle" style='color:#096459;'></i> &nbsp; &nbsp;Booking Detail</a>
                                            <a class="dropdown-item" href="<?php echo base_url();?>account?show=extended"><i class="fa fa-expand" style='color:#096459;'></i> &nbsp; &nbsp;Extended Warrenty</a>
                                            <a class="dropdown-item" href="<?php echo base_url('logout')?>"><i class="fa fa-sign-out" style='color:#096459;'></i> &nbsp; &nbsp;Log Out</a>
                                        </div>
                                        <!--Profile Image-->
                                    </div>
                                </li>
                            </ul>
                            <?php } ?>
						</div>
						<!--Desktop Menu-->
						<nav class="grid__item" id="AccessibleNav">
							<!-- for mobile -->
							<ul id="siteNav" class="site-nav medium center hidearrow">
								<li class="lvl1">
									<a>Plans <i class="anm anm-angle-down-l"></i></a>
									<div class="megamenu style1">
										<ul class="grid mmWrapper">
											<li class="grid__item large-up--one-whole">
												<ul class="row grid">
													<?php foreach($dropdown as $drop){  
														$all_cate = array();
														$langs = explode(",", $drop['categ_name']);
														?>
													<li class="grid__item lvl-1 col-md-3 col-lg-3">

														<a class="site-nav lvl-1"><?= $drop['cproduct_name']; ?></a>
														<ul class="subLinks">
															<li class="lvl-2">
															<?php 
																if(in_array('Maintenance and repair', $langs)){ ?> 
																
																	<a class="maintenancefont"
																	href="<?php echo base_url('maintenance/'. $drop['cproduct_name'])?>">Maintenance and repair</a>
																<?php }
																?>
																<?php 
																if(in_array('Extended Warranty', $langs)){ ?> 
																	<a class="maintenancefont"
																	href="<?php echo base_url('extended/'. $drop['cproduct_name'])?>">Extended Warranty</a>
																<?php }
																?>
																<!-- <a
																	href="<?php echo base_url('maintenance/'. $drop['cproduct_name'])?>"
																	class="site-nav lvl-2"><?= $drop['category_name']; ?></a> -->
															</li>
														</ul>
													</li>
													<?php } ?>
											</li>

										</ul>
								</li>
							</ul>
					</div>
					</li>
					<li class="lvl1 megamenu">
						<a href="<?php echo base_url();?>about-us">About Us <i class="anm anm-angle-down-l"></i>
						</a>

					</li>
					<li class="lvl1 parent dropdown"><a>Services<i class="anm anm-angle-down-l"></i></a>
						<ul class="dropdown">
							<li><a href="" class="site-nav">Extended Warrenty</a></li>


							<li><a href="" class="site-nav">Home Care Plan/AMC</a>

							</li>
							<li><a href="" class="site-nav">Damage Protection Plan/Warrenty</a>

							</li>
							<li><a href="<?php echo base_url();?>services" class="site-nav">Quick Repair</a>
								<!-- <ul class="dropdown sub-header">
                                        <li><a href="" class="site-nav"> Compare Variant1 </a></li>
                                        <li><a href="" class="site-nav"> Compare Variant2 </a></li>
                                        <li><a href="" class="site-nav"> Compare Variant2 </a></li>
                                        <li><a href="" class="site-nav"> Compare Variant2 </a></li>
                                        <li><a href="" class="site-nav"> Compare Variant2 </a></li>
                                        <li><a href="" class="site-nav"> Compare Variant2 </a></li>
                                        <li><a href="" class="site-nav"> Compare Variant2 </a></li>

                                     </ul> -->
							</li>
							<li><a href="" class="site-nav">Other Services<i class="anm anm-angle-right-l"></i></a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url();?>services" class="site-nav">Home device
											services</a></li>
									<li><a href="" data-toggle="modal" data-target="#exampleModal"
											class="site-nav">Cleaning & Pest control</a></li>
									<li><a href="" data-toggle="modal" data-target="#exampleModal"
											class="site-nav">Plumber & electrician</a></li>
									<li><a href="" data-toggle="modal" data-target="#exampleModal"
											class="site-nav">Carpenter</a></li>
									<li><a href="" data-toggle="modal" data-target="#exampleModal" class="site-nav">Car
											wash</a></li>
									<li><a href="" data-toggle="modal" data-target="#exampleModal"
											class="site-nav">Interior Painting</a></li>

								</ul>
							</li>
						</ul>
					</li>
					<!-- <li class="lvl1"><a href="#">Contact Us <i class="anm anm-angle-down-l"></i></a>
                            
                              </li> -->
					<li class="lvl1"><a href="<?= base_url('tracker') ?>">Track Service<i
								class="anm anm-angle-down-l"></i></a>

					</li>
					<li><a href="<?php echo base_url();?>blog" class="site-nav">Blog</a></li>

					<!-- <li><a href="" class="site-nav">Blog</a></li>
        <li><a href="" class="site-nav">Contact Us</a></li> -->
					<?php
					if(!@get_cookie("cid")){
					?>
					<li class="lvl1 sign-in"><a href="<?php echo base_url();?>sign-up"><b>Sign In</b> <i
								class="anm anm-angle-down-l"></i></a></li>
					<?php }else{ ?>
				<li class="lvl1 parent dropdown" style='height:40px'>
                                    <p><a class="site-nav"><small>Hello &nbsp;&nbsp; <i
                                            class="fa fa-caret-down"></i> </small> 
                                        <br><span style="color:var(--var-green);"><?php echo get_cookie("cname")?></span></a>
                                    <ul class="dropdown">
                                        
                                        <li><a href="<?php echo base_url();?>account?show=myaccount" class="site-nav">My Account</a></li>
                                        <li><a href="<?php echo base_url();?>account?show=booking" class="site-nav">Booking Detail</a></li>
                                        <li><a href="<?php echo base_url();?>account?show=extended" class="site-nav">Extended Warrenty</a></li>
                                        <li><a href="<?php echo base_url('logout')?>" class="site-nav">Logout</a></li>
                                    </ul>
                                </p>
                                    <!-- <a
                                        href="<?php echo base_url();?>account"><b><?php echo "Hello"." ".get_cookie("cid")?></b>
                                        <i class="anm anm-angle-down-l"></i></a> -->
                                </li>
						<!--<li class="lvl1 sign-in"><a href="<?php echo base_url();?>account"><b><?php echo "Hello"." ".get_cookie("cname")?></b> <i-->
						<!--		class="anm anm-angle-down-l"></i></a></li>-->
						<?php } ?>
					</ul>
					</nav>
					<!--End Desktop Menu-->
				</div>
				<!--Mobile Logo-->
				<div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
					<div class="logo">
						<a href="<?php echo base_url();?>">
							<img src="<?php echo base_url();?>assets/images/logo/OTG_Final_LOGO.png" alt="OTG Cares"
								title="OTG Cares" class='mobileotglogo' />
						</a>
					</div>
				</div>
				<!--Mobile Logo-->
				<div class="col-4 col-sm-3 col-md-3 col-lg-1 ">
					<!-- SEARCH BAR -->
					<div class="site-cart">
						<a href="<?php echo base_url('cart');?>" class="site-header__cart" title="Cart">
							<img src="<?php echo base_url();?>/assets/images/icons/cart.png" alt="">
							<span class="site-header__cart-count"><?php echo $this->cart->total_items();?></span>
						</a>

					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="mobile-nav-wrapper" role="navigation">
		<div style='
    background: #ecf1f0;
'>
			<div class="row pt-2 pb-2" style='margin-right:0;margin-left:0'>
				<div class="col-6">
					<a href="<?php echo base_url();?>">
						<img src="<?php echo base_url();?>assets/images/logo/OTG_Final_LOGO.png" alt="OTG CARES"
							title="OTG CARES" />
					</a>
				</div>
				<div class="col-6">
					<div class="closemobileMenu">
						<i class="icon anm anm-times-l pull-right"></i>
					</div>
				</div>
			</div>
		</div>

		<ul id="MobileNav" class="mobile-nav p-2" style='overflow:scroll'>
			<!-- <li class="lvl1 megamenu"><a href="<?php echo base_url();?>">Home</a>

				</li> -->
			<li class="lvl1 megamenu"><a class='dropdownmenubar'>Device & Plans <i class="anm anm-plus-l"></i></a>

				<ul class="mobile-submenu pl-1">
					<li class='row'>
						<?php
					foreach($dropdown as $drop){
						$langs = explode(",", $drop['categ_name']);
					 ?>
						<div class="mobile-sublink col-6">
							<p><?= $drop['cproduct_name']; ?></p>
							<?php 
							if(in_array('Maintenance and repair', $langs)){ ?> 
								<a class="maintenancefont"
								href="<?php echo base_url('maintenance/'. $drop['cproduct_name'])?>">Maintenance and repair</a>
							<?php }
							?>
							<?php 
							if(in_array('Extended Warranty', $langs)){ ?> 
								<a class="maintenancefont"
								href="<?php echo base_url('extended/'. $drop['cproduct_name'])?>">Extended Warranty</a>
							<?php }
							?>
						</div>
						<?php } ?>
					</li>

				</ul>
			</li>
			<li class="lvl1 parent megamenu"><a class='dropdownmenubar'>Services<i class="anm anm-plus-l"></i></a>
				<ul class='pl-2'>
					<li><a href="<?php echo base_url();?>services" class="site-nav">Extended Warrenty</a></li>
					<li><a href="<?php echo base_url();?>services" class="site-nav">Home Care Plan/AMC</a></li>
					<li><a href="" class="site-nav">Damage Protection Plan/Warrenty</a></li>

					<li class=''><a href="" class="site-nav dropdownmenubar">Quick Repair <i
								class="anm anm-plus-l"></i></a>
						<ul class="dropdown sub-header pl-2">
						    <?php foreach($dropdown as $drop){  ?>
												
															<li><a
																	href="<?php echo base_url('maintenance/'. $drop['cproduct_name'])?>"
																	class="site-nav" style='font-weight:500'><?= $drop['cproduct_name']; ?></a>
															</li>
														
													<?php } ?>
						</ul>
					</li>
					<li class=''><a href="" class="site-nav dropdownmenubar">Other Services <i
								class="anm anm-plus-l"></i></a>
						<ul class="dropdown pl-2">
							<li><a href="" class="site-nav">Home device services</a></li>
							<li><a href="" class="site-nav">Cleaning & Pest control</a></li>
							<li><a href="" class="site-nav">Plumber & electrician</a></li>
							<li><a href="" class="site-nav">Carpenter</a></li>
							<li><a href="" class="site-nav">Car wash</a></li>
							<li><a href="" class="site-nav">Interior Painting</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="lvl1"><a href="<?= base_url('tracker') ?>">Track Service</a>

			</li>
			<li class="lvl1"><a href="<?php echo base_url();?>about-us">About Us</a>

			</li>
			<li><a href="" class="site-nav">My Account</a></li>
			<li><a href="<?php echo base_url();?>blog" class="site-nav">Blog</a></li>
			<li><a href="<?php echo base_url();?>contact" class="site-nav">Contact Us</a></li>
			<?php
                if(!(get_cookie("cid"))){
                ?>
			<li class="lvl1 signinbtn" style='margin-bottom: 100px;'><a href="<?php echo base_url();?>sign-up"> <i class='fas fa-user-circle'></i>
					<b>Sign In</b></a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<!--End Mobile Menu-->
