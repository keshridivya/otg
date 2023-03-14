

	<title>Success</title>

<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
				<div class="card-body">
					<center>
						<img src="<?php echo base_url().'assets/images/payment-success.png'?>">
						<h5 class="card-title text-center">Payment successful !</h5>
						<!-- <p>Your order ID : <?php echo $_SESSION['razorpay_order_id'];?></p> -->
						<a href="<?php echo base_url();?>" class="btn btn-primary" style='background:var(--var-brown);border-radius:10px'>Continue Booking</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    window.setTimeout(function() {
    window.location.href = '<?= base_url('receipt') ?>';
}, 5000);
</script>
