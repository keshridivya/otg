<style>
.text-tra{
	position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    left: 42%;
}

</style>
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
		<div class="section-header text-center">
						<h2 class="heading">Plan</h2>
					</div>
			<div class="row justify-content-center type-plan-details ">

				<div class="col-sm-6">
					<div class="text-center text-tra">
						<div class="plan-title">
							<h1 class="heading text-center">Explore Plan for Product</h1>
						</div>
						<p>Enter detail of your product</p>
						<form action="" method="post">
								<div class=" d-flex">
									<input type="text" class="form-control" value="price">
									<input type="submit" value="plan" class="btn btn-primary">
								</div>
						</form>
					</div>
				</div>
				<div class="col-12 col-sm-4">
					<img src="<?= base_url('assets/extended-warranty-banner.webp') ?>" alt="">
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
