<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>OTG CARES</title>
	<meta name="description" content="description">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo/favicon.png" />
	<!-- Plugins CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css">
	<!-- Bootstap CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<!-- Main Style CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom_responsive.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
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
						<div class="d-block d-lg-none">
							<button type="button"
								class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
								<i class="icon anm anm-times-l"></i>
								<i class="anm anm-bars-r"></i>
							</button>
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
													<?php foreach($dropdown as $drop){  ?>
													<li class="grid__item lvl-1 col-md-3 col-lg-3">

														<a class="site-nav lvl-1"><?= $drop['cproduct_name']; ?></a>
														<ul class="subLinks">
															<li class="lvl-2"><a
																	href="<?php echo base_url('maintenance/'. $drop['cproduct_name'])?>"
																	class="site-nav lvl-2"><?= $drop['category_name']; ?></a>
															</li>
														</ul>
													</li>
													<?php } ?>
													<!-- <a class="site-nav lvl-1">Water Purifier</a>
														<ul class="subLinks">
															<li class="lvl-2"><a href="<?php echo base_url('maintenance/Water Purifier')?>"
																	class="site-nav lvl-2">Maintenance and Repair</a></li>

														</ul>
														<a class="site-nav lvl-1">Washing Machine</a>
														<ul class="subLinks">
															<li class="lvl-2"><a href="<?php echo base_url('maintenance/Washing Machine')?>"
																	class="site-nav lvl-2">Maintenance and Repair</a></li>

														</ul> -->



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
					if(!@$this->session->userdata['cid']){
					?>
					<li class="lvl1 sign-in"><a href="<?php echo base_url();?>sign-up"><b>Sign In</b> <i
								class="anm anm-angle-down-l"></i></a></li>
					<?php }else{ ?>
						<li class="lvl1 sign-in"><a href="<?php echo base_url();?>account"><b><?php echo "Hello"." ".$this->session->userdata['cname']?></b> <i
								class="anm anm-angle-down-l"></i></a></li>
						<?php } ?>
					</ul>
					</nav>
					<!--End Desktop Menu-->
				</div>
				<!--Mobile Logo-->
				<div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
					<div class="logo">
						<a href="index.php">
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

		<ul id="MobileNav" class="mobile-nav p-2">
			<!-- <li class="lvl1 megamenu"><a href="<?php echo base_url();?>">Home</a>

				</li> -->
			<li class="lvl1 megamenu"><a class='dropdownmenubar'>Device & Plans <i class="anm anm-plus-l"></i></a>

				<ul class="mobile-submenu pl-1">
					<li class='row'>
						<?php
					foreach($dropdown as $drop){
					 ?>
						<div class="mobile-sublink col-6">
							<p><?= $drop['cproduct_name']; ?></p>
							<a class="maintenancefont"
								href="<?php echo base_url('maintenance/'. $drop['cproduct_name'])?>"><?= $drop['category_name']; ?></a>
						</div>
						<?php } ?>
						<!-- <div class="mobile-sublink">
								<p>Water Purifier</p>
								<a href="<?php echo base_url('maintenance/Water Purifier')?>">Maintenance & Repair</a>
							</div>
							<div class="mobile-sublink">
								<p>Washing Machine</p>
								<a href="<?php echo base_url('maintenance/Washing Machine')?>">Maintenance & Repair</a>
							</div>
							<div class="mobile-sublink">
								<p>Laptop</p>
								<a href="<?php echo base_url('maintenance/Laptop')?>">Maintenance & Repair</a>
							</div>
							<div class="mobile-sublink">
								<p>Microwave</p>
								<a href="<?php echo base_url('maintenance/Microwave')?>">Maintenance & Repair</a>
							</div> -->
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
							<li><a href="" class="site-nav">Air Conditioner</a></li>
							<li><a href="" class="site-nav">Water Purifier</a></li>
							<li><a href="" class="site-nav">Washing Machine</a></li>
							<li><a href="" class="site-nav">Laptop</a></li>
							<li><a href="" class="site-nav">Microwave</a></li>
							<li><a href="" class="site-nav">Mobile Phone</a></li>
							<li><a href="" class="site-nav">Geyser</a></li>
							<li><a href="" class="site-nav">Printer</a></li>
							<li><a href="" class="site-nav">Refridgerator</a></li>
							<li><a href="" class="site-nav">Chimney</a></li>
							<li><a href="" class="site-nav">Tablet</a></li>
							<li><a href="" class="site-nav">Television</a></li>


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
			<li class="lvl1"><a href="#">Track Service</a>

			</li>
			<li class="lvl1"><a href="<?php echo base_url();?>about-us">About Us</a>

			</li>
			<li><a href="" class="site-nav">My Account</a></li>
			<li><a href="<?php echo base_url();?>blog" class="site-nav">Blog</a></li>
			<li><a href="<?php echo base_url();?>contact" class="site-nav">Contact Us</a></li>
			<?php
if(!$this->session->userdata['cid']){
?>
			<li class="lvl1 signinbtn"><a href="<?php echo base_url();?>sign-up"> <i class='fas fa-user-circle'></i>
					<b>Sign In</b></a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<!--End Mobile Menu-->
