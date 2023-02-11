<!--End Header-->

<!--Body Content-->
<div id="page-content">
	<!--Home slider-->
	<div id="demo" class="carousel slide" data-ride="carousel">

		<!-- Indicators -->
		<ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ul>

		<!-- The slideshow -->
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="ban-overlay"></div>
				<div class="banner-img">
					<img src="assets/images/banner/image-1.jpg" alt="">
				</div>
				<div class="banner-content">
					<h2>Guaranteed top quality maintenance & repairs</h2>
					<div class="banner-btn learn_more-banner">
						<a href="<?php echo base_url();?>services">Learn More</a>
					</div>
				</div>

			</div>
			<div class="carousel-item">
				<div class="ban-overlay"></div>
				<div class="banner-img">
					<img src="assets/images/banner/image-2.jpg" alt="">
				</div>
				<div class="banner-content">
					<h2>Guaranteed top quality maintenance & repairs</h2>
					<div class="banner-btn learn_more-banner">
						<a href="<?php echo base_url();?>services">Learn More</a>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="ban-overlay"></div>
				<div class="banner-img">
					<img src="assets/images/banner/image-3.jpg" alt="">
				</div>
				<div class="banner-content">
					<h2>Guaranteed top quality maintenance & repairs</h2>
					<div class="banner-btn learn_more-banner">
						<a href="<?php echo base_url();?>services">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='mainsearchbardiv'>
		<div class="searchbardiv row justify-content-center">
			<div class="col-12 ">
				<h2>Expert Care For Your Devices</h2>
			</div>
			<div class="col-12 col-md-6">
				<form id="" class="search-form text-center">
					<button type="submit"><img src="assets/images/search.png" alt=""></button>
					<input type="search" id="searchinput" class='searchbar'>
				</form>
			</div>
		</div>
	</div>

	<!--End Home slider-->
	<!--Our benefits will change the way you buy parts-->
	<!-- <div class="section about-otg ">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="section-header text-center">
						<h2 class="heading">OTG CARES</h2>
						<h4 class="sub-heading"> One-stop Solution For All Your Needs</h4>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="about-info">
						<p>OTG cares is a reputed device maintenance & repairs provider & offers Extended Warranty, Annual
							Maintenance Contract Plans and Repairs On-Demand Services. A wide range of
							electronic devices & appliances are maintained & serviced by us.
						</p>
						<div class="theme-btn">
							<a href="<?php echo base_url();?>about-us">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!--End Our benefits will change the way you buy parts-->

	<div class="section what-we-do" style='padding-bottom:0'>
		<div class="container">
			<div class="row service-slider-row">
				<div class="col-lg-12 mb-5 mab-sm-0">
					<div class="section-header text-center">
						<h2 class="heading">Maintenance & Repair
							Services</h2>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="what-we-do-tab">
						<div class="row">
						<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Air Conditioner'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-1">
									<a class="main-product-content"
										href="<?php echo base_url('maintenance/Air Conditioner')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/ac.png" alt="">
										</div>
										<div class="main-product-title">
											<p>AC</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>
							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Refrigerator'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-2">
									<a class="main-product-content"
										href="<?php echo base_url('maintenance/Refrigerator')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/fridge.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Refridgerator</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>

							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Television'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-3">
									<a class="main-product-content"
										href="<?php echo base_url('maintenance/Television')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/television.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Television</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>
							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Washing Machine'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-4">
									<a class="main-product-content"
										href="<?php echo base_url('maintenance/Washing Machine')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/washing-machine.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Washing Machine</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>
							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Water Purifier'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-1">
									<a class="main-product-content"
										href="<?php echo base_url('maintenance/Water Purifier')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/filtration.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Water Purifier</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>

							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Laptop'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-2">
									<a class="main-product-content" href="<?php echo base_url('maintenance/Laptop')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/laptop.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Laptop</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>
							
							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Microwave'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-2">
									<a class="main-product-content"
										href="<?php echo base_url('maintenance/Microwave')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/microwave.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Microwave</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>
							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Printer'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-3">
									<a class="main-product-content" href="<?php echo base_url('maintenance/Printer')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/printer.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Printer</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>
							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Mobile'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-3">
									<a class="main-product-content" href="<?php echo base_url('maintenance/Mobile')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/mobile-phone.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Mobile</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>
							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Tablet'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-3">
									<a class="main-product-content" href="<?php echo base_url('maintenance/Tablet')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/tablet.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Tablet</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>
							<?php
					foreach($dropdown as $drop){
						if($drop['cproduct_name']=='Geyser'){
					 ?>
							<div class="col-4 col-md-2">
								<div class="element element-3">
									<a class="main-product-content" href="<?php echo base_url('maintenance/Geyser')?>">
										<div class="main-product-icon">
											<img src="<?php echo base_url();?>assets/images/icons/products/water-boiler.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Geyser</p>
										</div>
									</a>
								</div>
							</div>
							<?php } } ?>

						</div>
						<!-- <ul class="nav nav-pills">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="pill" href="#home">Maintenance & Repair
									Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link tab-btn" data-toggle="pill" href="#menu1">Extended Warranty</a>
							</li>
						</ul> -->
						<!-- Tab panes -->
						<!-- <div class="tab-content">
							<div class="tab-pane container active" id="home" data-aos="zoom-in">
								<div class="main-service-sliders">
									<div class="maintenance-slider">
										<div class="element element-1">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Air Conditioner')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/ac.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>AC</p>
												</div>
											</a>
										</div>
										<div class="element element-2">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Refrigerator')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/fridge.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Refridgerator</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Television')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/television.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Television</p>
												</div>
											</a>
										</div>
										<div class="element element-4">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Washing Machine')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/washing-machine.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Washing Machine</p>
												</div>
											</a>
										</div>
										<div class="element element-1">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Water Purifier')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/filtration.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Water Purifier</p>
												</div>
											</a>
										</div>
										<div class="element element-2">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Laptop')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/laptop.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Laptop</p>
												</div>
											</a>
										</div>
										<div class="element element-2">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Microwave')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/microwave.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Microwave</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Printer')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/printer.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Printer</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Mobile')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/mobile-phone.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Mobile</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Tablet')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/tablet.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Tablet</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Geyser')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/water-boiler.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Geyser</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane container fade" id="menu1" data-aos="zoom-in">
								<div class="main-service-sliders">
									<div class="maintenance-slider">
										<div class="element element-1">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Air Conditioner')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/ac.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>AC</p>
												</div>
											</a>
										</div>
										<div class="element element-2">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Refrigerator')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/fridge.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Refridgerator</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Television')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/television.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Television</p>
												</div>
											</a>
										</div>
										<div class="element element-4">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Washing Machine')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/washing-machine.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Washing Machine</p>
												</div>
											</a>
										</div>
										<div class="element element-1">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Water Purifier')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/filtration.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Water Purifier</p>
												</div>
											</a>
										</div>
										<div class="element element-2">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Laptop')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/laptop.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Laptop</p>
												</div>
											</a>
										</div>
										<div class="element element-2">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Microwave')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/microwave.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Microwave</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Printer')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/printer.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Printer</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Mobile')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/mobile-phone.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Mobile</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Tablet')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/tablet.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Tablet</p>
												</div>
											</a>
										</div>
										<div class="element element-3">
											<a class="main-product-content"
												href="<?php echo base_url('maintenance/Geyser')?>">
												<div class="main-product-icon">
													<img src="<?php echo base_url();?>assets/images/icons/products/water-boiler.png"
														alt="">
												</div>
												<div class="main-product-title">
													<p>Geyser</p>
												</div>
											</a>
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

	<!--explore our services-->
	<div class="section what-we-do" style='padding-bottom:0'>
		<div class="container">
			<div class="row service-slider-row">
				<div class="col-lg-12 mb-5 mab-sm-0">
					<div class="section-header text-center">
						<h2 class="heading">Explore Our Services</h2>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="what-we-do-tab">
						<div class="row justify">
							<div class="col-4 col-md-2 mobilenone colnone" >
								<div class="element element-1">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/quick_repair.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Quick Repair</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-4 col-md-2 colnone">
								<div class="element element-1">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/extended warranty.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Extended Warranty</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-4 col-md-2 colnone">
								<div class="element element-2">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/home care _ amc.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Home Care | Amc</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-4 col-md-2 colnone">
								<div class="element element-3">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/damage protection plan.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Damage Protection Plan</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-4 col-md-2 colnone">
								<div class="element element-4">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/cleaning & pest controls.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Cleaning & Pest Controls</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-4 col-md-2 colnone">
								<div class="element element-2">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/car wash.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Car Wash</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-4 col-md-2 colnone">
								<div class="element element-3">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/interior painting.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Interior Painting</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-4 col-md-2 colnone">
								<div class="element element-1">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/electronics.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Electrician</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-4 col-md-2 colnone">
								<div class="element element-2">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/carpenter.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Carpenter</p>
										</div>
									</a>
								</div>
							</div>

							<div class="col-4 col-md-2 colnone">
								<div class="element element-3">
									<a class="main-product-content" data-toggle="modal"
										data-target="#exampleModal" style='cursor:pointer'>
										<div class="">
											<img src="<?php echo base_url();?>assets/images/Explore Our Services/plumber.png"
												alt="">
										</div>
										<div class="main-product-title">
											<p>Plumber</p>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--explore our services-->


	<!--Popular Categories-->
	<div class="section  what-we-do" >
		<div class="container">
			<div class="row service-slider-row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="section-header text-center">
						<h2 class="heading">Popular Repair Services</h2>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="popular-slider-section">
						<div class="popular-service-slider">
							
							<div class="item">
								<a href="<?php echo base_url('maintenance/Air Conditioner')?>">
									<div class="popular-img">
										<img src="<?php echo base_url();?>assets/images/product-images/ac.png" alt="">
									</div>
									<div class="popular-title">
										<p>AC Repair Service</p>
									</div>
								</a>

							</div>
							<div class="item">
								<a href="<?php echo base_url('maintenance/Laptop')?>">
									<div class="popular-img">
										<img src="<?php echo base_url();?>assets/images/product-images/laptop.png"
											alt="">
									</div>
									<div class="popular-title">
										<p>Laptop Repair Service</p>
									</div>
								</a>

							</div>
							<div class="item">
								<a href="">
									<div class="popular-img">
										<img src="<?php echo base_url();?>assets/images/product-images/mobile.png"
											alt="">
									</div>
									<div class="popular-title">
										<p>Mobile Repair Service</p>
									</div>
								</a>

							</div>
							<div class="item">
								<div class="popular-img">
									<img src="<?php echo base_url();?>assets/images/product-images/Washing-machine.png"
										alt="">
								</div>
								<div class="popular-title">
									<p>Washing Machine</p>
								</div>
							</div>
							<div class="item">
								<div class="popular-img">
									<img src="<?php echo base_url();?>assets/images/icons/products/Water-purifier.png"
										alt="">
								</div>
								<div class="popular-title">
									<p>Water Purifier</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Popular Categories-->
	<!--Parallax Section-->
	<div class="section offer-section">
		<div class="hero hero--large hero__overlay bg-size">
			<img class="bg-img blur-up" src="assets/images/banner/banner2.png" alt="" />
			<div class="hero__inner">
				<div class="container-fluid">
					<div class="wrap-text left ">
						<h2 class="mega-title">WE ARE OTG!</h2>
						<div class="rte-setting mega-subtitle">Always on the move to resolve your electronic
							devices and appliances related issues.
						</div>
						<div class="theme-btn offer-btn">
							<a href="#" class="">Book Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Parallax Section-->
	<div class="section expertise-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-header text-center">
						<h2 class="heading">OTG EXPERTISE</h2>
						<h4 class="sub-heading"> We make sure to provide top-notch features.</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="expertise-banner">
			<img src="assets/images/banner/banner4.png" alt="">
		</div>
	</div>
	<div class="section why-us" id="why-us">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="section-header text-center">
						<h2 class="heading">Why Choose Us</h2>
						<h4 class="sub-heading">Why we should be your Top Choice</h4>
					</div>
				</div>
				<div class="col-lg-12 d-flex justify-content-center">
					<div class="dome-section text-center" id="dome-section">
						<div class="row  pb-5 pt-4 justify-content-center">
							<div class="col-lg-10 col-sm-12 counter-column">
								<div class="counter-content">
									<h2>
										<p class="counter-number" data-val="200">200</p>
										<span class="counter-sign">+</span>
									</h2>
									<p class="counter-title">Brands Covered</p>
								</div>
							</div>
							<div class="col-lg-4 col-4 counter-column">
								<div class="counter-content">
									<h2>
										<p class="counter-number" data-val="5000">4000</p>
										<span class="counter-sign">+</span>
									</h2>
									<p class="counter-title">Happy Customers</p>
								</div>
							</div>
							<div class="col-lg-3 col-4 counter-column">
								<div class="counter-logo">
									<img src="assets/images/logo/counter-logo.png" alt="">
								</div>
							</div>
							<div class="col-lg-4 col-4 counter-column">
								<div class="counter-content">
									<h2>
										<p class="counter-number" data-val="120">100</p>
										<span class="counter-sign">+</span>
									</h2>
									<p class="counter-title">Retail Stores</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 how-help">
					<div class="section-header text-center">
						<h2 class="heading">HOW WE HELP YOU</h2>
						<h4 class="sub-heading">Services from OTG cares benefits your devices</h4>
					</div>
					<div class="benefits-list">
						<ul>
							<li class='d-flex'>
								<i class="fa-solid fa-check mr-1"></i>
								<p> Improves Cooling And Performance</p>
							</li>
							<li class='d-flex'>
								<i class="fa-solid fa-check mr-1"></i>
								<p> Reduces Power Consumption</p>
							</li>
							<li class='d-flex'>
								<i class="fa-solid fa-check mr-1"></i>
								<p> Enhances The Life Of The Appliance</p>
							</li>
							<li class='d-flex'>
								<i class="fa-solid fa-check mr-1"></i>
								<p> Ensures Significant Reduction In Frequent Breakdown</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Popular Categories-->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="section-header text-center">
						<h2 class="heading">Explore Our Services</h2>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="popular-slider-section">
						<div class="popular-warrenties-slider future-verticals">
							<div class="item">
								<div class="popular-img">
									<img src="<?php echo base_url();?>assets/images/future/image-4.jpg" alt="">
								</div>
								<div class="popular-title">
									<p>Home device services</p>
								</div>
							</div>
							<div class="item">
								<div class="popular-img">
									<img src="<?php echo base_url();?>assets/images/future/image-5.jpg" alt="">
								</div>
								<div class="popular-title">
									<p>Cleaning & Pest control</p>
								</div>
							</div>
							<div class="item">
								<div class="popular-img">
									<img src="<?php echo base_url();?>assets/images/future/image-6.jpg" alt="">
								</div>
								<div class="popular-title">
									<p>Plumber & electrician</p>
								</div>
							</div>
							<div class="item">
								<div class="popular-img">
									<img src="<?php echo base_url();?>assets/images/future/image-7.jpg" alt="">
								</div>
								<div class="popular-title">
									<p>Carpenter</p>
								</div>
							</div>
							<div class="item">
								<div class="popular-img">
									<img src="<?php echo base_url();?>assets/images/future/image-8.jpg" alt="">
								</div>
								<div class="popular-title">
									<p>Car wash</p>
								</div>
							</div>
							<div class="item">
								<div class="popular-img">
									<img src="<?php echo base_url();?>assets/images/future/image-9.jpg" alt="">
								</div>
								<div class="popular-title">
									<p>Interior Painting</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Popular Categories-->
	<div class="section warrenty-offer-section" style='padding-bottom:0'>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="extended-offer-content">
						<h2>EXTEND THE LIFE <br>OF YOUR MOBILE</h2>
						<div class="theme-btn extend-btn">
							<a href="btn">Extended Warrenty</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="extend-img text-center">
						<img src="assets/images/product-images/mobile1.png" alt="" class='mobile-view-image'>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section testimonials-section pt-10">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-header text-center">
						<h2 class="heading">LIVING UP TO THE PROMISE</h2>
						<h4 class="sub-heading">Here's what our customers say about us.</h4>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-5 col-sm-12">
							<div class="slider slider-nav">
								<?php foreach($testimonial as $testarr){ ?>
								<div>
									<div class="customer-details">
										<div class="customer-icon">
											<i class="fa-solid fa-user"></i>
										</div>
										<div class="customer-title">
											<h6><?= $testarr['name'] ?></h6>
											<p><?= $testarr['comapny_name'] ?></p>

										</div>
									</div>
								</div>
								<?php } ?>
								<!-- <div>
									<div class="customer-details">
										<div class="customer-icon">
											<i class="fa-solid fa-user"></i>

										</div>
										<div class="customer-title">
											<h6>Milton Austin</h6>
											<p>Lorem Ipsum has been</p>

										</div>
									</div>
								</div>
								<div>
									<div class="customer-details">
										<div class="customer-icon">
											<i class="fa-solid fa-user"></i>

										</div>
										<div class="customer-title">
											<h6>Milton Austin</h6>
											<p>Lorem Ipsum has been</p>

										</div>
									</div>
								</div>
								<div>
									<div class="customer-details">
										<div class="customer-icon">
											<i class="fa-solid fa-user"></i>

										</div>
										<div class="customer-title">
											<h6>Milton Austin</h6>
											<p>Lorem Ipsum has been</p>

										</div>
									</div>
								</div>
								<div>
									<div class="customer-details">
										<div class="customer-icon">
											<i class="fa-solid fa-user"></i>

										</div>
										<div class="customer-title">
											<h6>Milton Austin</h6>
											<p>Lorem Ipsum has been</p>

										</div>
									</div>
								</div>
								<div>
									<div class="customer-details">
										<div class="customer-icon">
											<i class="fa-solid fa-user"></i>

										</div>
										<div class="customer-title">
											<h6>Milton Austin</h6>
											<p>Lorem Ipsum has been</p>

										</div>
									</div>
								</div> -->

							</div>
						</div>

						<div class="col-lg-7 col-sm-12">
							<div class="slider slider-single">
							<?php foreach($testimonial as $testarr){ ?>
								<div>
									<div class="customer-testimonial">
										<div class="customer-subject">
											<p><?= $testarr['short_desc'] ?></p>
											<!-- <div class="customer-rating">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-regular fa-star-half-stroke"></i>
											</div> -->

										</div>
										<div class="customer-msg">
											<p>
												"<?= $testarr['long_desc'] ?>"
											</p>
										</div>
									</div>
								</div>
								<?php } ?>
								<!-- <div>
									<div class="customer-testimonial">
										<div class="customer-subject">
											<p>It Was A Great Experience!</p>
											<div class="customer-rating">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-regular fa-star-half-stroke"></i>
											</div>

										</div>
										<div class="customer-msg">
											<p>
												"A friend recommended your InstaRepair
												service so I booked a service online for
												my water purifier and it was a good
												experience. Service was cashless and
												convenient.
												The team handled my request with
												utmost professionalism & ensured the
												service was done on time."
											</p>
										</div>
									</div>
								</div>
								<div>
									<div class="customer-testimonial">
										<div class="customer-subject">
											<p>It Was A Great Experience!</p>
											<div class="customer-rating">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-regular fa-star-half-stroke"></i>
											</div>

										</div>
										<div class="customer-msg">
											<p>
												"A friend recommended your InstaRepair
												service so I booked a service online for
												my water purifier and it was a good
												experience. Service was cashless and
												convenient.
												The team handled my request with
												utmost professionalism & ensured the
												service was done on time."
											</p>
										</div>
									</div>
								</div>
								<div>
									<div class="customer-testimonial">
										<div class="customer-subject">
											<p>It Was A Great Experience!</p>
											<div class="customer-rating">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-regular fa-star-half-stroke"></i>
											</div>

										</div>
										<div class="customer-msg">
											<p>
												"A friend recommended your InstaRepair
												service so I booked a service online for
												my water purifier and it was a good
												experience. Service was cashless and
												convenient.
												The team handled my request with
												utmost professionalism & ensured the
												service was done on time."
											</p>
										</div>
									</div>
								</div>
								<div>
									<div class="customer-testimonial">
										<div class="customer-subject">
											<p>It Was A Great Experience!</p>
											<div class="customer-rating">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-regular fa-star-half-stroke"></i>
											</div>

										</div>
										<div class="customer-msg">
											<p>
												"A friend recommended your InstaRepair
												service so I booked a service online for
												my water purifier and it was a good
												experience. Service was cashless and
												convenient.
												The team handled my request with
												utmost professionalism & ensured the
												service was done on time."
											</p>
										</div>
									</div>
								</div>
								<div>
									<div class="customer-testimonial">
										<div class="customer-subject">
											<p>It Was A Great Experience!</p>
											<div class="customer-rating">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-regular fa-star-half-stroke"></i>
											</div>

										</div>
										<div class="customer-msg">
											<p>
												"A friend recommended your InstaRepair
												service so I booked a service online for
												my water purifier and it was a good
												experience. Service was cashless and
												convenient.
												The team handled my request with
												utmost professionalism & ensured the
												service was done on time."
											</p>
										</div>
									</div>
								</div> -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section partners">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-header text-center">
						<h2 class="heading">OUR CLIENTS</h2>
						<h4 class="sub-heading">Here's what our customers say about us.</h4>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="partner-slider">
						<?php
						foreach($client as $client){
						?>
						<div class="item">
							<div class="partner-logo">
								<img src="<?= base_url($client['client_logo']) ?>" alt="">
							</div>
						</div>
<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="section-contact">
						<div class="row justify-content-center">
							<div class="col-12 col-lg-10 col-xl-8">
								<div class="header-section text-center">
									<!-- <h2 class="title">Get In Touch
										<span class="dot"></span>
										<span class="big-title">CONTACT</span>
									</h2> -->
									<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Aenean consectetur commodo risus, nec pellentesque turpis efficitur non.</p>

								</div>
							</div>
						</div>
						<div class="form-contact">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="single-input">
											<i class="fas fa-user"></i>
											<input type="text" name="name" placeholder="ENTER YOUR NAME">
										</div>
									</div>
									<div class="col-md-6">
										<div class="single-input">
											<i class="fas fa-envelope"></i>
											<input type="text" name="email" placeholder="ENTER YOUR EMAIL">
										</div>
									</div>
									<div class="col-md-6">
										<div class="single-input">
											<i class="fas fa-phone"></i>
											<input type="text" name="phoneNumber" placeholder="ENTER YOUR PHONE NUMBER">
										</div>
									</div>
									<div class="col-md-6">
										<div class="single-input">
											<i class="fas fa-check"></i>
											<input type="text" name="subject" placeholder="ENTER YOUR SUBJECT">
										</div>
									</div>
									<div class="col-12">
										<div class="single-input">
											<i class="fas fa-comment-dots"></i>
											<textarea placeholder="ENTER YOUR MESSAGE"></textarea>
										</div>
									</div>
									<div class="col-12">
										<div class="submit-input text-center">
											<input type="submit" name="submit" value="SUBMIT NOW">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="banner-btn learn_more-banner">
						<a href="http://localhost/otg_ci/services" data-dismiss="modal">Close</a>
					</div>
					<div class="banner-btn learn_more-banner">
						<a href="http://localhost/otg_ci/services">Submit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--End Testimonial Slider-->

</div>
<!--End Body Content-->
