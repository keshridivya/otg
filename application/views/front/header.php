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
<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
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
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
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
                <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                    <a href="<?php echo base_url();?>">
                    	<img src="<?php echo base_url();?>assets/images/logo/header.png" alt="OTG CARES" title="OTG CARES" />
                    </a>
                </div>
                
                <!--End Desktop Logo-->
                <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                	<div class="d-block d-lg-none">
                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        	<i class="icon anm anm-times-l"></i>
                            <i class="anm anm-bars-r"></i>
                        </button>
                    </div>
                	<!--Desktop Menu-->
                	<nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                        <ul id="siteNav" class="site-nav medium center hidearrow">
                            <li class="lvl1 parent megamenu">
                              <a>Plans <i class="anm anm-angle-down-l"></i></a>
                                <div class="megamenu style1">
                                    <ul class="grid mmWrapper">
                                        <li class="grid__item large-up--one-whole">
                                            <ul class="grid">
                                              
                                                <li class="grid__item lvl-1 col-md-3 col-lg-3">
                                                     <a class="site-nav lvl-1">Air Conditioner</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Air Conditioner')?>" class="site-nav lvl-2">Maintenance & Repair</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Water Purifier</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Water Purifier')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>
                                                      
                                                    </ul>
                                                    <a class="site-nav lvl-1">Washing Machine</a>
                                                    <ul class="subLinks">
                                                      <!-- <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li> -->
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Washing Machine')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>

                                                    </ul>
                                                    <!-- <a href="" class="site-nav lvl-1">Air Purifier</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="" class="site-nav lvl-2">Maintenance & Repair</a></li>

                                                    </ul> -->
                                                    <!-- <a class="site-nav lvl-1">Audio System</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul> -->
                                                   
                                                    <!-- <a class="site-nav lvl-1">Chopper & Blender</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Desktop</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Digital Camera</a>
                                                    <ul class="subLinks">
                                                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">Spill & Drops/ Damage Protection</a></li>

                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Dishwasher</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Electric Cooker</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul> -->
                                                  </li>
                                                 <li class="grid__item lvl-1 col-md-3 col-lg-3">
                                                   <!-- <a class="site-nav lvl-1">Fan</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Fitness Tracker</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Gaming Console</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul> -->
                                                   
                                                    <a class="site-nav lvl-1">Laptop</a>
                                                    <ul class="subLinks">
                                                      <!-- <li class="lvl-2"><a href="#" class="site-nav lvl-2">Spill & Drops/ Damager Protection</a></li>
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li> -->
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Laptop')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Microwave</a>
                                                    <ul class="subLinks">
                                                      <!-- <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li> -->
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Microwave')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Mobile Phone</a>
                                                    <ul class="subLinks">
                                                      <!-- <li class="lvl-2"><a href="#" class="site-nav lvl-2">Spill & Drops/ Damager Protection</a></li>
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Screen Protection</a></li>
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li> -->
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Mobile')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>

                                                    </ul>
                                                    <!-- <a class="site-nav lvl-1">Groom & Hair Care</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Headphone</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Home Theatre and Soundbar</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Iron</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Juicer Mixer Grinder</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul> -->
                                                </li>
                                                <li class="grid__item lvl-1 col-md-3 col-lg-3">
                                                    <!-- <a class="site-nav lvl-1">Kettle</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul> -->
                                                    <a class="site-nav lvl-1">Geyser</a>
                                                    <ul class="subLinks">
                                                      <!-- <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li> -->
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Geyser')?>" class="site-nav lvl-2">Maintenance Repair</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Printer</a>
                                                    <ul class="subLinks">
                                                      <!-- <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li> -->
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Printer')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Refridgerator</a>
                                                    <ul class="subLinks">
                                                      <!-- <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li> -->
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Refrigerator')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>

                                                    </ul>
                                                    <!-- <a class="site-nav lvl-1">Room Cooler</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul> -->
                                                </li>
                                                <li class="grid__item lvl-1 col-md-3 col-lg-3">
                                                    <!-- <a class="site-nav lvl-1">Smart Watch</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul> -->
                                                    <a class="site-nav lvl-1">Chimney</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Chimney')?>" class="site-nav lvl-2">Maintenance & Repair</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Tablet</a>
                                                    <ul class="subLinks">
                                                      <!-- <li class="lvl-2"><a href="#" class="site-nav lvl-2">Spill & Drops/ Damager Protection</a></li>
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Screen Protection</a></li>
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li> -->
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Tablet')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>

                                                    </ul>
                                                    <a class="site-nav lvl-1">Television</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="<?php echo base_url('maintenance/Television')?>" class="site-nav lvl-2">Maintenance and Repair</a></li>

                                                    </ul>
                                                    <!-- <a class="site-nav lvl-1">Vaccum Cleaner</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Extended Warrenty</a></li>

                                                    </ul> -->
                                                  
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="lvl1 megamenu"><a href="<?php echo base_url();?>about-us">About Us <i class="anm anm-angle-down-l"></i></a>
                            	
                            </li>
                        <li class="lvl1 megamenu"><a href="<?php echo base_url();?>services">Services<i class="anm anm-angle-down-l"></i></a>
                        	
                        </li>
                        <li class="lvl1"><a href="#">Contact Us <i class="anm anm-angle-down-l"></i></a>
                          
                        </li>
                        <li class="lvl1"><a href="#">Book<i class="anm anm-angle-down-l"></i></a>
                        
                        </li>
                        <li class="lvl1"><a href="<?php echo base_url();?>sign-up"><b>Sign In</b> <i class="anm anm-angle-down-l"></i></a></li>
                      </ul>
                    </nav>
                    <!--End Desktop Menu-->
                </div>
                <!--Mobile Logo-->
                <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                	<div class="logo">
                        <a href="index.php">
                            <img src="assets/images/logo/header.png" alt="OTG Cares" title="OTG Cares" />
                        </a>
                    </div>
                </div>
                <!--Mobile Logo-->
                <div class="col-4 col-sm-3 col-md-3 col-lg-1  left-menu">
                <div class="site-header__search">
                    	<button type="button" class="search-trigger">
                            <!-- <i class="icon anm anm-search-l"></i> -->
                            <img src="/assets/images/search.png" alt="">

                        </button>
                    </div>
                	<div class="site-cart">
                    	<a href="<?php echo base_url('cart/');?>" class="site-header__cart" title="Cart">
                        	<!-- <i class="icon anm anm-bag-l"></i> -->
                            <img src="/assets/images/cart.png" alt="">
                            <span  class=""><?php echo "hello" ?></span>
                        </a>
                        <!--Minicart Popup-->
                        <!-- <div id="header-cart" class="block block-cart">
                        	<ul class="mini-products-list">
                                <li class="item">
                                	<a class="product-image" href="#">
                                    	<img src="assets/images/product-images/cape-dress-1.jpg" alt="3/4 Sleeve Kimono Dress" title="" />
                                    </a>
                                    <div class="product-details">
                                    	<a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                        <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                        <a class="pName" href="">Sleeve Kimono Dress</a>
                                        <div class="variant-cart">Black / XL</div>
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                            	<span class="label">Qty:</span>
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="priceRow">
                                        	<div class="product-price">
                                            	<span class="money">$59.00</span>
                                            </div>
                                         </div>
									                </div>
                                </li>
                                <li class="item">
                                	<a class="product-image" href="#">
                                    	<img src="assets/images/product-images/cape-dress-2.jpg" alt="Elastic Waist Dress - Black / Small" title="" />
                                    </a>
                                    <div class="product-details">
                                    	<a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                        <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                        <a class="pName" href="">Elastic Waist Dress</a>
                                        <div class="variant-cart">Gray / XXL</div>
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                            	<span class="label">Qty:</span>
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                       	<div class="priceRow">
                                            <div class="product-price">
                                                <span class="money">$99.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="total">
                            	<div class="total-in">
                                	<span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">$748.00</span></span>
                                </div>
                                 <div class="buttonSet text-center">
                                    <a href="#" class="btn btn-secondary btn--small">View Cart</a>
                                    <a href="#" class="btn btn-secondary btn--small">Checkout</a>
                                </div>
                            </div>
                        </div> -->
                        <!--End Minicart Popup-->
                    </div>
                  
                </div>
        	</div>
        </div>
    </div>
       <!--Mobile Menu-->
       <div class="mobile-nav-wrapper" role="navigation">
		<div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
        	<li class="lvl1 megamenu"><a href="index.php">Home</a>
        
          </li>
          <li class="lvl1 megamenu"><a href="#">Device & Plans</a>
            <!-- <ul>
              <li>
                <a href="product-layout-1.php" class="site-nav">Product Page<i class="anm anm-plus-l"></i></a>
                <ul>
                  <li><a href="product-layout-1.html" class="site-nav">Product Layout 1</a></li>
                  <li><a href="product-layout-2.html" class="site-nav">Product Layout 2</a></li>
                  <li><a href="product-layout-3.html" class="site-nav">Product Layout 3</a></li>
                  <li><a href="product-with-left-thumbs.html" class="site-nav">Product With Left Thumbs</a></li>
                  <li><a href="product-with-right-thumbs.html" class="site-nav">Product With Right Thumbs</a></li>
                  <li><a href="product-with-bottom-thumbs.html" class="site-nav last">Product With Bottom Thumbs</a></li>
                </ul>
              </li>
              <li><a href="short-description.html" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
                <ul>
                  <li><a href="short-description.html" class="site-nav">Short Description</a></li>
                  <li><a href="product-countdown.html" class="site-nav">Product Countdown</a></li>
                  <li><a href="product-video.html" class="site-nav">Product Video</a></li>
                  <li><a href="product-quantity-message.html" class="site-nav">Product Quantity Message</a></li>
                  <li><a href="product-visitor-sold-count.html" class="site-nav">Product Visitor/Sold Count </a></li>
                  <li><a href="product-zoom-lightbox.html" class="site-nav last">Product Zoom/Lightbox </a></li>
                </ul>
              </li>
              <li><a href="#" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
                <ul>
                  <li><a href="product-with-variant-image.html" class="site-nav">Product with Variant Image</a></li>
                  <li><a href="product-with-color-swatch.html" class="site-nav">Product with Color Swatch</a></li>
                  <li><a href="product-with-image-swatch.html" class="site-nav">Product with Image Swatch</a></li>
                  <li><a href="product-with-dropdown.html" class="site-nav">Product with Dropdown</a></li>
                  <li><a href="product-with-rounded-square.html" class="site-nav">Product with Rounded Square</a></li>
                  <li><a href="swatches-style.html" class="site-nav last">Product Swatches All Style</a></li>
                </ul>
              </li>
              <li><a href="#" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
                <ul>
                  <li><a href="product-accordion.html" class="site-nav">Product Accordion</a></li>
                  <li><a href="product-pre-orders.html" class="site-nav">Product Pre-orders </a></li>
                  <li><a href="product-labels-detail.html" class="site-nav">Product Labels</a></li>
                  <li><a href="product-discount.html" class="site-nav">Product Discount In %</a></li>
                  <li><a href="product-shipping-message.html" class="site-nav">Product Shipping Message</a></li>
                  <li><a href="product-shipping-message.html" class="site-nav last">Size Guide </a></li>
                </ul>
              </li>
            </ul> -->
          </li>
        
        	<li class="lvl1 parent megamenu"><a href="#">Services <i class="anm anm-plus-l"></i></a>
          <!-- <ul>
            <li>
              <a href="product-layout-1.html" class="site-nav">Product Page<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="product-layout-1.html" class="site-nav">Product Layout 1</a></li>
                <li><a href="product-layout-2.html" class="site-nav">Product Layout 2</a></li>
                <li><a href="product-layout-3.html" class="site-nav">Product Layout 3</a></li>
                <li><a href="product-with-left-thumbs.html" class="site-nav">Product With Left Thumbs</a></li>
                <li><a href="product-with-right-thumbs.html" class="site-nav">Product With Right Thumbs</a></li>
                <li><a href="product-with-bottom-thumbs.html" class="site-nav last">Product With Bottom Thumbs</a></li>
              </ul>
            </li>
            <li><a href="short-description.html" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="short-description.html" class="site-nav">Short Description</a></li>
                <li><a href="product-countdown.html" class="site-nav">Product Countdown</a></li>
                <li><a href="product-video.html" class="site-nav">Product Video</a></li>
                <li><a href="product-quantity-message.html" class="site-nav">Product Quantity Message</a></li>
                <li><a href="product-visitor-sold-count.html" class="site-nav">Product Visitor/Sold Count </a></li>
                <li><a href="product-zoom-lightbox.html" class="site-nav last">Product Zoom/Lightbox </a></li>
              </ul>
            </li>
            <li><a href="#" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="product-with-variant-image.html" class="site-nav">Product with Variant Image</a></li>
                <li><a href="product-with-color-swatch.html" class="site-nav">Product with Color Swatch</a></li>
                <li><a href="product-with-image-swatch.html" class="site-nav">Product with Image Swatch</a></li>
                <li><a href="product-with-dropdown.html" class="site-nav">Product with Dropdown</a></li>
                <li><a href="product-with-rounded-square.html" class="site-nav">Product with Rounded Square</a></li>
                <li><a href="swatches-style.html" class="site-nav last">Product Swatches All Style</a></li>
              </ul>
            </li>
            <li><a href="#" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="product-accordion.html" class="site-nav">Product Accordion</a></li>
                <li><a href="product-pre-orders.html" class="site-nav">Product Pre-orders </a></li>
                <li><a href="product-labels-detail.html" class="site-nav">Product Labels</a></li>
                <li><a href="product-discount.html" class="site-nav">Product Discount In %</a></li>
                <li><a href="product-shipping-message.html" class="site-nav">Product Shipping Message</a></li>
                <li><a href="product-shipping-message.html" class="site-nav last">Size Guide </a></li>
              </ul>
            </li>
          </ul> -->
        </li>
        	<li class="lvl1 parent megamenu"><a href="#">Contact Us <i class="anm anm-plus-l"></i></a>
          <!-- <ul>
          	<li><a href="cart-variant1.html" class="site-nav">Cart Page <i class="anm anm-plus-l"></i></a>
                <ul class="dropdown">
                    <li><a href="cart-variant1.html" class="site-nav">Cart Variant1</a></li>
                    <li><a href="cart-variant2.html" class="site-nav">Cart Variant2</a></li>
                 </ul>
            </li>
            <li><a href="compare-variant1.html" class="site-nav">Compare Product <i class="anm anm-plus-l"></i></a>
                <ul class="dropdown">
                    <li><a href="compare-variant1.html" class="site-nav">Compare Variant1</a></li>
                    <li><a href="compare-variant2.html" class="site-nav">Compare Variant2</a></li>
                 </ul>
            </li>
			      <li><a href="checkout.html" class="site-nav">Checkout</a></li>
            <li><a href="my-account.html" class="site-nav">My Account</a></li>
            <li><a href="about-us.html" class="site-nav">About Us<span class="lbl nm_label1">New</span></a></li>
            <li><a href="contact-us.html" class="site-nav">Contact Us</a></li>
            <li><a href="faqs.html" class="site-nav">FAQs</a></li>
            <li><a href="lookbook1.html" class="site-nav">Lookbook<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                <li><a href="lookbook2.html" class="site-nav last">Style 2</a></li>
              </ul>
            </li>
            <li><a href="404.html" class="site-nav">404</a></li>
            <li><a href="coming-soon.html" class="site-nav">Coming soon<span class="lbl nm_label1">New</span></a></li>
          </ul> -->
        </li>
        	<li class="lvl1 parent megamenu"><a href="#">Book Now <i class="anm anm-plus-l"></i></a>
          <!-- <ul>
            <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
            <li><a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
            <li><a href="blog-fullwidth.html" class="site-nav">Fullwidth</a></li>
            <li><a href="blog-grid-view.html" class="site-nav">Gridview</a></li>
            <li><a href="blog-article.html" class="site-nav">Article</a></li>
          </ul> -->
        </li>
        	<li class="lvl1"><a href="#"><b>Sign In</b></a>
        </li>
      </ul>
	</div>
	<!--End Mobile Menu-->