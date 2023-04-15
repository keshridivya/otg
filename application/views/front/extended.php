<style>
	.text-tra {
		position: relative;
		top: 50%;
		transform: translate(-50%, -50%);
		left: 42%;
	}

	.button-wrap {
		position: relative;
		text-align: center;
		top: 50%;
		margin-top: -2.5em;
	}

	@media (max-width: 40em) {
		.button-wrap {
			margin-top: -1.5em;
		}
	}

	.button-label {
		display: inline-block;
		padding: 1em 2em;
		margin: 0.5em;
		cursor: pointer;
		color: #292929;
		border-radius: 0.25em;
		background: #efefef;
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.22);
		transition: 0.3s;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		width: 25%;
	}

	.button-label h1 {
		font-size: 1em;
		font-family: "Lato", sans-serif;
	}

	.button-label:hover {
		background: #d6d6d6;
		color: #101010;
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.32);
	}

	.button-label:active {
		transform: translateY(2px);
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0px -1px 0 rgba(0, 0, 0, 0.22);
	}

	@media (max-width: 40em) {
		.button-label {
			padding: 1em 1em 3px;
			margin: 0.25em;
		}
	}

	#yes-button:checked+.button-label {
		background: var(--var-green);
		color: #efefef;
	}

	#yes-button:checked+.button-label:hover {
		background: var(--var-yellow);
		color: #e2e2e2;
	}

	#no-button:checked+.button-label {
		background: var(--var-green);
		color: #efefef;
	}

	#no-button:checked+.button-label:hover {
		background: var(--var-yellow);
		color: #e2e2e2;
	}

	#maybe-button:checked+.button-label {
		background: var(--var-green);
		color: #efefef;
	}

	#maybe-button:checked+.button-label:hover {
		background: var(--var-yellow);
		color: #e2e2e2;
	}

	#four-button:checked+.button-label {
		background: var(--var-green);
		color: #efefef;
	}

	#four-button:checked+.button-label:hover {
		background: var(--var-yellow);
		color: #e2e2e2;
	}

	.hidden {
		display: none;
	}

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
		padding: 0 1rem;
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

	.link-1 {
		font-size: 1.8rem;
		color: hsl(0, 0%, 100%);
		background: linear-gradient(to right bottom, #fff, #ec2F4B);
		box-shadow: .4rem .4rem 2.4rem .2rem hsla(236, 50%, 50%, 0.3);
		border-radius: 100rem;
		padding: 1.4rem 3.2rem;
		transition: .2s;
	}

	.link-1:hover,
	.link-1:focus {
		-webkit-transform: translateY(-.2rem);
		transform: translateY(-.2rem);
		box-shadow: 0 0 4.4rem .2rem hsla(236, 50%, 50%, 0.4);
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
	}

	@media(max-width:768px) {
		.modaldisplay {
			padding: 1rem 1rem;
			margin-top: 45%;
			width: 90%;
		}

		.title {
			font-size: 1.5rem;
		}

		.txt {
			margin-bottom: 2rem;
			font-size: 1rem;
		}

		.txt:before {
			width: 13rem;
		}

	}

</style>
<div class="cont1" id="modal-opened">
	<div class="modal modaldisplay alertmodal">

		<div class="details">
			<h1 class="title">Oops!</h1>
		</div>

		<p class="txt">
			Device Price entered is outside the plan purchase limit.</p>

		<button class="closebtn">ok &rarr;</button>

		<a href="#modal-closed" class="link-2"></a>

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
			<div class="section-header text-center">
				<h2 class="heading">Plan</h2>
			</div>
			<div class="row justify-content-center type-plan-details ">

				<div class="col-sm-6 pricebox">
					<div class="text-center ">
						<div class="plan-title">
							<h1 class="heading text-center">Explore Plan for Product</h1>
						</div>
						<p>Enter detail of your product</p>
						<form action="" method="post">
							<div class=" d-flex">
								<input type="hidden" class='csrf'
									name="<?php echo $this->security->get_csrf_token_name(); ?>"
									value="<?php echo $this->security->get_csrf_hash();?>">
								<input type="hidden" class="device" name="device"
									value="<?= $product_data[0]['cproduct_name'];?>">
								<input type="text" class="form-control price" placeholder="price">
								<input type="button" value="plan" class="btn btn-primary priceboxbtn">
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-6" id="planbox">
					<div class="text-center text-tra">
						<div class="plan-title">
							<h1 class="heading text-center">Plans for your device</h1>
						</div>
						<p>Device Price</p>
						<span><i class="fa fa-inr"></i></span> <span id="priceamt"> 3,000</span>
						<form action="" method="post" class="mt-5">
							<input type="hidden" class='csrf'
								name="<?php echo $this->security->get_csrf_token_name(); ?>"
								value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="container fetch">
							</div>
						</form>
						<div class="plan-btns">
							<a type="button" class="addcart">Add to cart</a>
						</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
	$('#planbox').hide();
	$('.priceboxbtn').click(function () {
		let price = $('.price').val();
		let device = $('.device').val();
		let csrfHash = $('.csrf').val();
		let csrfName = $('.csrf').attr('name');
		$.ajax({
			url: "<?= base_url('welcome/checkPrice'); ?>",
			method: 'post',
			data: {
				price: price,
				device: device,
				[csrfName]: csrfHash,
			},
			dataType: "json",
			success: function (response) {
				if (response.result == 'success') {
					$('#priceamt').text(price);
					$('.fetch').html(response.fetch);
					$('#planbox').show();
				} else {
					$('.cont1').css('display', 'block');
					$('.alertmodal').modal('show');
				}
				$('.pricebox').hide();
			},
			error: function () {

			}
		})
	});

	$('.addcart').click(function () {
		let year = $('.year:checked').val();
		let planid = $('.planid').val();
		let cookid = <?= get_cookie("cid") ?>;
		let csrfHash = $('.csrf').val();
		let csrfName = $('.csrf').attr('name');
		$.ajax({
			url: "<?= base_url('welcome/addtocart'); ?>",
			method: 'post',
			data: {
				planid: planid,
				year: year,
				warranty:'Extended Warranty',
				[csrfName]: csrfHash,
			},
			dataType: "json",
			success: function (response) {
				if (response.result == 'success') {
					$('#priceamt').text(price);
					$('.fetch').html(response.fetch);
					$('#planbox').show();
				} else {
					$('.cont1').css('display', 'block');
					$('.alertmodal').modal('show');
				}
				$('.pricebox').hide();
			},
			error: function () {
				alert('Something went wrong. Please try again');
			}
		})
		window.location.href = "<?= base_url() ?>" + 'addtocart/' + planid;
	})

</script>

<!--Footer-->
