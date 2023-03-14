<button id="rzp-button1" style="display:none;">Pay with Razorpay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<form name='razorpayform' action="<?php echo base_url().'verify';?>" method="POST">
<?php  if($this->cart->total_items()>0){
                                    foreach($cartItems as $item){ ?>
	<input type="hidden" class="form-control form-control-user" name="customer_id"
		value="<?php echo $customers[0]['cust_id'];?>">
        <input type="hidden" value='<?= rand(10000,100000) ?>' name='order_id'>
	<input type="hidden" class="form-control form-control-user" value="<?php echo $customers[0]['email_id'];?>"
		name="c_email">

	<input type="hidden" class="form-control form-control-user" value="<?php echo $customers[0]['contact'];?>"
		name="c_contact">
	<input type="hidden" name="c_name" value="<?php echo $customers[0]['cust_name'];?>" id="c_name"
		class="form-control form-control-user" placeholder="Customer Name" readonly>
	<input type="hidden" name="s_plan[]" value="<?php echo $item['name']; ?>" id="s_plan" class="form-control form-control-user"
		placeholder="Service Plan" readonly>
	<input type="hidden" name="s_device[]" value="<?php 
                                                     echo $item['product_name']; ?>" id="s_device" class="form-control form-control-user"
		placeholder="Service Device" readonly>
	<input type="hidden" name="quantity[]" id="quantity" value="<?= $item['qty'] ?>"
		class="form-control form-control-user" placeholder="Total Amount" readonly>
        <input type="hidden" name="sub_total" value='<?= $item['price'] ?>'>
        <?php  } } ?>
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
		value="<?php echo $this->security->get_csrf_hash();?>">
	<input type="hidden" name="t_amnt" id="t_amnt" value="<?= $this->cart->format_number($this->cart->total()) ?>"
		class="form-control form-control-user" placeholder="Total Amount" readonly>
	<input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
	<input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>
<script>
	// Checkout details as a json
	let options = <?php echo json_encode($data); ?> ;

	/**
	 * The entire list of Checkout fields is available at
	 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
	 */
	options.handler = function (response) {
		document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
		document.getElementById('razorpay_signature').value = response.razorpay_signature;
		document.razorpayform.submit();
	};

	// Boolean whether to show image inside a white frame. (default: true)
	options.theme.image_padding = false;

	options.modal = {
		ondismiss: function () {
			console.log("This code runs when the popup is closed");
		},
		// Boolean indicating whether pressing escape key 
		// should close the checkout form. (default: true)
		escape: true,
		// Boolean indicating whether clicking translucent blank
		// space outside checkout form should close the form. (default: false)
		backdropclose: false
	};

	var rzp = new Razorpay(options);

	$(document).ready(function () {
		$("#rzp-button1").click();
		rzp.open();
		e.preventDefault();
	});

</script>
