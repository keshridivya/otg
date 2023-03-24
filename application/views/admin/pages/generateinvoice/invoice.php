<style>
	@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

	h2 {
		font-size: 1.2rem;
	}

	::selection {
		background: #f31544;
		color: #FFF;
	}

	::moz-selection {
		background: #f31544;
		color: #FFF;
	}

	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}

	.col-left {
		float: left;
	}

	.col-right {
		float: right;
	}

	#invoiceholder {
		width: 100%;
		height: 100%;
		padding: 50px 0;
		overflow-x: scroll;
	}

	#invoice {
		position: relative;
		margin: 0 auto;
		width: 850px;
		background: #FFF;
	}

	[id*='invoice-'] {
		padding: 20px;
	}

	#invoice-top {
		border-bottom: 2px solid var(--var-green);
		;
	}

	#invoice-mid {
		min-height: 110px;
	}

	#invoice-bot {
		min-height: 240px;
	}

	.logo {
		display: inline-block;
		vertical-align: middle;
		width: 110px;
		overflow: hidden;
	}

	.info {
		display: inline-block;
		vertical-align: middle;
		margin-left: 20px;
	}

	.logo img,
	.clientlogo img {
		width: 100%;
	}


	.clientinfo {
		display: inline-block;
		vertical-align: middle;
		margin-left: 20px
	}

	.title {
		float: right;
	}

	.title p {
		text-align: right;
	}

	#message {
		margin-bottom: 30px;
		display: block;
	}


	.col-right td {
		color: #666;
		padding: 0;
		border: 0;
		font-size: 0.875rem;
		border-bottom: 1px solid #eeeeee;
	}

	.col-right td label {
		margin-left: 5px;
		font-weight: 600;
		color: #444;
	}

	.cta-group {
		width: 100%;
		text-align: center;
	}

	.cta-group .btn-primary {
		background: var(--var-green);
		;
		display: inline-block;
		padding: 7px;
		border-radius: 4px;
		background: rgb(196, 57, 10);
		margin-right: 10px;
		min-width: 100px;
		width: 200px;
		text-align: center;
		color: #fff;
		font-size: 0.75rem;
	}

	.cta-group.mobile-btn-group {
		display: none;
	}

	table {
		width: 100%;
		border-collapse: collapse;
	}

	.tableitem {
		padding: 10px;
		border: 1px solid #cccaca;
		text-align: left;
	}

	.tabletitle th {
		border: 2px solid #fff;
		background: #0e7668 !important;
		text-align: right;
		color: #fff;
	}

	.tabletitle th:nth-child(2) {
		text-align: left;
	}

	th {
		font-size: 0.875rem;
		text-align: left;
		padding: 5px 10px;
	}

	.item {
		width: 50%;
	}

	.list-item td {
		text-align: right;
	}

	.list-item td:nth-child(2) {
		text-align: left;
	}

	.total-row th,
	.total-row td {
		text-align: right;
		font-weight: 700;
		font-size: .75em;
		border: 0 none;
	}

	.effect2 {
		position: relative;
	}

</style>

<div class="row">
	<div class="col-12">
		<div class="container">
			<div id="invoiceholder">
				<div id="invoice" class="effect2">

					<div id="invoice-top">
						<div class="clearfix">
							<div class="col-left">
								<div class="logo"><img src="<?php echo base_url();?>assets/images/logo/header.png"
										alt="OTG CARES" /></div>
								<div class="clientinfo">
									<h2 id="supplier">OTGcares</h2>
									<p><span id="address">S-53, Haware Fantasia Business park, <br> Vashi Navi Mumbai
											Thane
											Maharashtra 400708</span><br>
										<span><b>Phone : </b> <span>9076020306</span></span><br>
										<span><b>Email : </b> <span>support@otgcares.com</span></span></p>

								</div>
							</div>
							<div class="col-right">
								<h2 id="supplier">INVOICE</h2>
								<table class="table">
									<tbody>
										<tr>
											<td><span>Invoice Number</span><label id="invoice_no"
													class='float-right'>INV-<?= $invoice[0]['id'] ?></label>
											</td>
										</tr>
										<tr>
											<td><span>Order Number</span><label id="order-number"
													class='float-right'><?= $invoice[0]['order_id'] ?></label></td>
										</tr>
										<tr>
											<td><span>Invoice Date</span><label id="invoice_date" class='float-right'><?php  $input=$invoice[0]['created_date']; 
										$date=strtotime($input);
										echo date('d  M  Y',$date) ?></label></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!--End Title-->
					</div>

					<!--End InvoiceTop-->
					<div id="invoice-mid">
						<div id="message">
							<h2>Bill To,</h2>
							<p><?= $invoice[0]['cust_name'] ?> <span id="supplier_name"></span><br>+91
								<?= $invoice[0]['contact'] ?></p>
						</div>
					</div>
					<!--End Invoice Mid-->

					<div id="invoice-bot">

						<div id="table">
							<table class="table-main ">
								<thead>
									
									<tr class="tabletitle">
										<th>S.No</th>
										<th>Product/Services</th>
										<th>Qty</th>
										<th>MRP</th>
										<th>Rate</th>
										<th>Disc</th>
										<th>Tax</th>
										<th> Amount</th>
									</tr>
								</thead>
								<?php
                            $count = 1;
								foreach($invoice as $invoice1){
								?>
								<tr class="list-item">
									<td data-label="Type" class="tableitem"><?= $count; ?></td>
									<td data-label="Description" class="tableitem"><?= $invoice1['product'] ?>
									</td>
									<td data-label="Quantity" class="tableitem qua" id=""><?= $invoice1['qua'] ?></td>
									<td data-label="Unit Price" class="tableitem cBalance" id=""><?= $invoice1['mrp'] ?>
									</td>
									<td data-label="Taxable Amount" class="tableitem rate"><?= $invoice1['rate'] ?></td>
									<td data-label="Tax Code" class="tableitem chDiscount" id=''>
										<?= $invoice1['discount'] ?> %
									</td>
									<td data-label="%" class="tableitem"><?= '0.00' ?></td>
									<td data-label="Tax Amount" class="tableitem amt" id='result'><?= $invoice1['amt'] ?></td>
								</tr>
								total
								<?php $count++; } ?>
								<tr class="list-item">
									<td colspan="6" style="border-left:2px solid #dee2e6;text-transform:capitalize"
										class='words text-left'></td>
									<td data-label="Grand Total" class="tableitem">Subtotal</td>
									<td data-label="Grand Total" class="tableitem numberword result" id='result'></td>
								</tr>
								<tr class="list-item">
									<td colspan="6" style="border-left:2px solid #dee2e6" class=' text-left'> Total Quantity: <?= $count; ?></td>
									<td data-label="Grand Total" class="tableitem">Total Payable</td>
									<td data-label="Grand Total" class="tableitem result" id='result'>
									</td>
								</tr>
								<tr class="list-item">
									<td colspan="6"
										style="border-bottom: 2px solid #dee2e6;border-left:2px solid #dee2e6">
									</td>
									<td data-label="Grand Total" class="tableitem">Received</td>
									<td data-label="Grand Total" class="tableitem result" id='result'>
									</td>
								</tr>
							</table>
						</div>

						<div id="table">
							<table class="table table-bordered ">
								<tr class="">
									<th>Notes <p>Thank You For Doing Business With Us</p>
									</th>
									<th>Bank Details</th>
									<th><span>Due Amount</span><span>
											0.00
										</span></th>
								</tr>

								<tr class="">
									<td colspan='2'>
										<h2>Terms And Conditions</h2>
										<p> 
										<?php
										foreach($invoice as $invoices){
											echo $invoices['qua'].' '.$invoices['product'];
										}
										?>,	
										<!-- A.M.C Upto 1.5 Ton - 3 Jet Service + 1 Time Gas Recharge + Unlimited Repair
											Total 3
											Basic AMC And 2 Service AMC Is Included In Your Contract.</p> -->
									</td>
									<td class="">
										heelo
										<p> For OTGCares</p>
									</td>
								</tr>
							</table>
						</div>
						<!--End Table-->
					</div>
				</div>
				<!--End Invoice-->
				<div class="container">
					<div class="cta-group">
						<button class="btn btn-primary invoice">Download Invoice</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- End Invoice Holder-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
</script>
<script>
	$(window).on("load", function () {
		let sum = 0;
		$('.amt').each(function(){
			let amt = $(this).text();
			sum += parseInt(amt);
		});
		$('.result').text(sum);
		console.log(sum);
	});

</script>
<script>
	$(window).on("load", function () {
		let inward = inWords(Math.round($('.numberword').text()));
		$('.words').text(inward);
	});

	var a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ',
		'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '
	];
	var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

	function inWords(num) {
		console.log(num);
		if ((num = num.toString()).length > 9) return 'overflow';
		n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
		if (!n) return;
		var str = '';
		str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
		str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
		str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
		str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
		str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' :
			'';
		return str;
	}

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.js"></script>
<script type="text/javascript">
	$(document).on("click", ".invoice", function () {
		$(this).css('display', 'none');
		Convert_HTML_To_PDF();
	});

	function Convert_HTML_To_PDF() {
		window.jsPDF = window.jspdf.jsPDF;
		var doc = new jsPDF();
		var elementHTML = document.querySelector("#invoiceholder");
		doc.html(elementHTML, {
			callback: function (doc) {
				// Save the PDF
				doc.save('invoice.pdf');
			},
			x: 15,
			y: 15,
			width: 170, //target width in the PDF document
			windowWidth: 850 //window width in CSS pixels
		});
	}

</script>

</body>
