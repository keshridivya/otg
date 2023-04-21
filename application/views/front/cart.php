<!--Body Content-->
<style>
	.modal.fade.in .lab-modal-body {
  bottom: 0;
  opacity: 1;
}

.lab-modal-body h1 {
  font-size: 1.76rem;
}

.lab-modal-body p {
  margin: 0 0 1.62rem 0;
  line-height: 1.62;
  font-weight: 300;
  font-size: 0.875rem;
  color: #666;
}

.lab-modal-body {
  position: relative;
  bottom: -250px;
  margin: 150px auto 0;
  padding: 40px;
  max-width:100%;
  height: auto;
  background-color: rgb(248, 250, 247);
  border: 1px solid #BEBEBE;
  opacity: 0;
  -webkit-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
  -moz-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
  -o-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
  transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
}

.close {
  margin-top: -20px;
  margin-right: -20px;
  text-shadow: 0 1px 0 #ffffff;
}

.popup-button {
  margin-top: 70px;
}
</style>
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
							<div class="row">
								<div class="col-lg-12">
									<?php
                                                if($this->cart->total_items()>0){
                                                    foreach($cartItems as $item){
                                                        ?>
									<div class="row one-order">
										<input type="hidden" value="<?= $item["rowid"]?>" name="<?= $item["rowid"]?>"
											id="rowid">

										<div class="col-lg-5 col-12 cart-row">
											<!-- <h6>Product</h6> -->
											<?php $imageURL=!empty($item["image"])?base_url($item["image"]):base_url("demo.jpeg"); 
                                                                ?>
											<img src="<?php echo $imageURL;?>" alt="" width="50"><p><?php echo $item['product_name']?> (<?php echo $item['product_category']?>)</p>
										</div>

										<!-- <div class="col-lg-1 col-12 cart-row">
											<h6>Product Name</h6>
											<p><?php echo $item['product_name']?></p>
										</div> -->
										<!-- <div class="col-lg-2 col-12 cart-row">
											<h6>Service Name</h6>
											<p><?php echo $item['product_category']?></p>

										</div> -->
										<?php 
										if($item['product_category'] != 'Extended Warranty'){ ?>
										<div class="col-lg-1 col-12 cart-row">
											<h6>Plan Name</h6>
											<p><?php echo $item['name']?></p>

										</div>
										<div class="col-lg-1 col-12 cart-row">
											<h6>Price</h6>

											<p><i class="fa-solid fa-indian-rupee-sign"></i>
												<?php echo $item['price'] ?></p>
										</div>
										<?php }else{ ?>
										<div class="col-lg-2 col-12 cart-row">
											<h6>Price</h6>

											<p><i class="fa-solid fa-indian-rupee-sign"></i>
												<?php echo $item['price'] ?></p>
										</div>
										<?php 
										}
										if($item['product_category'] == 'Extended Warranty'){ ?>
											<div class="col-lg-2 col-12 cart-row">
											<h6>Duration </h6>

											<p>
												<?php echo $item['duration'] ?></p>
										</div>
										<?php }else{
										?>
										<div class="col-lg-2 col-12 cart-row">
											<h6>Quantity</h6>
											<input type="hidden" class="txt_csrfname"
												name="<?php echo $this->security->get_csrf_token_name(); ?>"
												value="<?php echo $this->security->get_csrf_hash();?>">
											<div class="d-flex justify-content-end">
												<input type='button' value='-' class='qtyminus minus qty'
													field='quantity' />
												<input type="text" class="form-control text-center item-qty"
													value="<?php echo $item['qty'];?>" readonly>
												<input type='button' value='+' class='qtyplus plus qty'
													field='quantity' />
											</div>

										</div>
										<?php } ?>
										<input type="hidden"
											name="<?php echo $this->security->get_csrf_token_name(); ?>"
											value="<?php echo $this->security->get_csrf_hash();?>">
										<!-- <td><input type="number" class="form-control text-center" value="<?php echo $item['qty'];?>" onchange="updatecartItem(this,'<?php echo $item['rowid']; ?>')"></td> -->
										<div class="col-lg-2 col-12 cart-row">
											<h6>Subtotal</h6>
											<div class="subtotal-row">

												<i class="fa-solid fa-indian-rupee-sign"></i>
												<p class="subtotal" style="display:inline-block;">
													<?php echo $item['subtotal']; ?></p>
											</div>
										</div>
										<div class="col-lg-1 col-12 cart-row delete-item">
											<a href="<?php echo base_url('removeItem/'.$item['rowid'])?>"
												onclick="return confirm('Are you sure?');"><i
													class="fa-solid fa-trash-can"></i></a>
										</div>
										<?php $this->session->pay=$this->cart->total();?>
									</div>
									<?php
                                                    }
                                                    ?>
									<hr>
									<div class="row justify-content-end total-cart">

										<div class="col-lg-1 col-6">
											<h6>Total</h6>
										</div>
										<div class="col-lg-1 col-6"><i class="fa-solid fa-indian-rupee-sign"></i>
											<?= $this->cart->format_number($this->cart->total()) ?></div>
										<div class="col-lg-2"></div>
									</div>
									<?php
                                                }else{
                                                    ?>
									<div class="alert alert-danger">No Product Found!!</div>
									<a href="<?= base_url('cart');?>"></a>
									<?php
                                                }
                                                ?>
								</div>
								
							</div>

							<div class="row justify-content-center">
								<div class="cart-btns col-lg-6">
									<div class="theme-btn offer-btn">
										<a href="<?php echo base_url('services');?>" class="contisho">Continue shopping</a>
									</div>
									<?php
                                                    if($this->cart->total_items()>0){
                                                    ?>
									<div class="theme-btn offer-btn">
										<?php
									if(!@get_cookie('cid')){
									?>
										<a href="<?php echo base_url('sign-up');?>" class="" style="line-height: 40px;">Checkout</a>
										<?php }else{ ?>
										<a href="<?php echo base_url('checkout');?>" class=""style="line-height: 40px;">Checkout</a>
										<?php } ?>

									</div>
									<?php
                                                      }
                                                    ?>

								</div>
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#lab-slide-bottom-popup"> Launch demo modal </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section"></div>

<!-- MODAL CONTENT SAMPLE STARTS HERE -->
<div class="modal fade" id="lab-slide-bottom-popup" data-keyboard="false" data-backdrop="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="lab-modal-body">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h1>Verify Your Mobile number</h1>

			<div class="signup-forms">

<form method="post" action="">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
		class="csrf" value="<?php echo $this->security->get_csrf_hash();?>">
	<!-- <input type="hidden" id='login_vrf_otp'> -->

	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="form-group">
				<input type="text" value="" class='form-control number' id='usernumber'
					Placeholder='Mobile no' name='number'>
			</div>
			<span id='spanotpnumber'>Mobile Number is required</span>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="form-group loginotpbox">
				<input type="text" class="form-control " id="loginotp" name="loginotp"
					placeholder="OTP">
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-lg-6 login_err">
		</div>
	</div>
	<button type="button" name="submit" value="login" class="btn login_send_otp"
		id='login_btn' disabled>Send OTP</button>
	<button type="button" name="submit" value="login" class="btn login_verify_otp"
		id='login_otp_verify'>Verify OTP</button>
</form>
<!-- <a href="<?= base_url('forget') ?>">Forgot password?</a> -->
</div>  </div>
  <!-- /.modal-body -->
</div>
</div>
<!--End Body Content-->

<!--Footer-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><script>
	$(document).ready(function($) {
  // auto timer
  setTimeout(function() {
    $('#lab-slide-bottom-popup').modal('show');
  }, 5000); // optional - automatically opens in xxxx milliseconds

  $(document).ready(function() {
    $('.lab-slide-up').find('a').attr('data-toggle', 'modal');
    $('.lab-slide-up').find('a').attr('data-target', '#lab-slide-bottom-popup');
  });

});
</script>

<script>
	$(document).ready(function () {
		$(".item-qty").on('change', function () {
			var el = $(this).closest('.row');
			var id = $(el).find('#rowid').val();
			var qty = $(this).val();
			var csrfName = $('.txt_csrfname').attr(
				'name'); // Value specified in $config['csrf_token_name']
			var csrfHash = $('.txt_csrfname').val();

			$.ajax({
				'url': '<?php echo base_url('update_cart/')?>',
				'type': 'POST',
				'data': {
					'id': id,
					'qty': qty,
					[csrfName]: csrfHash
				},
				success: function (result) {
					var qty = result.qty;
					$('.item-qty').text(qty);
					window.location.href = "";

				}
			});
		});
	});
	$(document).ready(function () {
		$(".plus").on('click', function () {
			$(".item-qty").val(parseInt($(".item-qty").val()) + 1).change();
		});

		$(".minus").on('click', function () {
			let qty = $('.item-qty').val();
			if (qty > 0) {
				$(".item-qty").val(parseInt($(".item-qty").val()) - 1).change();
			}

		});

	});

</script>

<script>
	$(document).ready(function () {
		$('.loginotpbox').hide();
		$('.login_verify_otp').hide();
		$('#resend_otp').hide();
			$('#login_btn').click(function () {
			let number = $('#usernumber').val();
			var csrfName = $('.csrf').attr('name');
			var csrfHash = $('.csrf').val();
			$.ajax({
				url: "<?= base_url('regloginotp'); ?>",
				method: "post",
				data: {
					number: number,
					[csrfName]: csrfHash
				},
				dataType: 'json',
				success: function (response) {
					$('.csrf').val(response.token);
					// $('#login_vrf_otp').val(response.otp);
					if (response.otp != 'error') {
						$('.login_err').html(
							'<div class="alert alert-success">OTP is send on your mobile</div>'
						);
						$('.loginotpbox').show();
						$('.login_send_otp').hide();
						$('.login_verify_otp').show();
					} else {
						$('.login_err').html(
							'<div class="alert alert-danger">This Number is incorrect</div>'
						);
					}
				},
				error: function () {
					alert('OTP not send .Please try again');
				}
			})
		});

		$('#login_otp_verify').click(function () {
			let loginotp = $('#loginotp').val();
			let number = $('#usernumber').val();
			var csrfName = $('.csrf').attr('name');
			var csrfHash = $('.csrf').val();
			$.ajax({
				url: "<?= base_url('login-otp-verify'); ?>",
				method: "post",
				data: {
					loginotp: loginotp,
					number: number,
					[csrfName]: csrfHash
				},
				dataType: 'json',
				success: function (response) {
					$('.csrf').val(response.token);
					if (response.otp != 'error') {
						history.back();
					} else {
						$('.login_err').html(
							'<div class="alert alert-danger">OTP is Incorrect</div>'
						);
					}
				},
				error: function () {
					alert('OTP not send .Please try again');
				}
			})

		});
	});
		document.getElementById('timer').innerHTML =
		05 + ":" + 00;
	startTimer();


	function startTimer() {
		var presentTime = document.getElementById('timer').innerHTML;
		var timeArray = presentTime.split(/[:]+/);
		var m = timeArray[0];
		var s = checkSecond((timeArray[1] - 1));
		if (s == 59) {
			m = m - 1
		}
		if (m < 0) {
			return
		}

		document.getElementById('timer').innerHTML =
			m + ":" + s;
		console.log(m)
		setTimeout(startTimer, 1000);

	}

	function checkSecond(sec) {
		if (sec < 10 && sec >= 0) {
			sec = "0" + sec
		}; // add zero in front of numbers < 10
		if (sec < 0) {
			sec = "59"
		};
		return sec;
	}

	setTimeout(function () {
		// alert('545');
		$('#set_otp').val('');
	}, 300000);

</script>

