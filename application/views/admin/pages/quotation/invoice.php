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
		width: 25%;
		margin-bottom: 20px;
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
		background: #0db19e !important;
		text-align: left;
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
		text-align: left;
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
						<div class="logo"><img src="<?php echo base_url();?>assets/images/logo/header.png"
								alt="OTG CARES" /></div>
						<div class="clearfix">
							<div class="col-left">

								<div class="clientinfo">
									<h2 id="supplier" style="color:#4c3418;font-weight:bold">OTGcares</h2>
									<p><span id="address">2nd floor, Haware Fantasia Business park, <br> Vashi Navi
											Mumbai
											Thane
											Maharashtra 400705</span><br>
										<span><b>Phone : </b> <span>9076020306</span></span><br>
										<span><b>Email : </b> <span>support@otgcares.com</span></span><br>
										<span><b>GSTIN : </b> <span>27AAHFO5291Q1ZF</span></span></p>

								</div>
							</div>
							<div class="col-right">
								<h2 id="supplier" style="color:#f8b11b;">QUOTATION</h2>
								<table class="table">
									<tbody>
										<tr>
											<td><span>Quotation Number</span><label id="order-number"
													class='float-right'><?= $invoice[0]['quo_code'] ?></label></td>
										</tr>
										<tr>
											<td><span>Quotation Date</span><label id="invoice_date" class='float-right'><?php  $input=$invoice[0]['created_date']; 
										$date=strtotime($input);
										echo date('d  M  Y',$date) ?></label></td>
										</tr>
										<?php if($invoice[0]['contactpersonname'] != ''){ ?>
										<tr>
											<td><span>Contact Person : </span><label id="order-number"
													class='float-right'><?= $invoice[0]['contactpersonname'] ?></label></td>
										</tr>
										<?php } ?>
										<?php if($invoice[0]['contactpersonname'] != ''){ ?>
										<tr>
											<td><span>Contact Number : </span><label id="order-number"
													class='float-right'><?= $invoice[0]['contactperno'] ?></label></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<!--End Title-->
					</div>

					<!--End InvoiceTop-->
					<hr>
					<div class="container text-black text-center"><span><b>CLIENTS &nbsp;&nbsp;DETAILS</b> <span></div>
					<hr>
					<div id="invoice-mid">
						<div class="clearfix">
							<div class="col-left" style="width:40%">

								<div id="message">
									<h2>Bill To,</h2>
									<p>
										<?= $invoice[0]['addr'] ?></p>
								</div>
							</div>
							<div class="col-right">
								<div class="">
									<p>
										<span><b>Client Name : </b>
											<span><?= $invoice[0]['name'] ?></span></span><br>
										<span><b>Client Number : </b> <span>+91
												<?= $invoice[0]['contact'] ?></span></span><br>
									</p>

									<br>
								</div>
							</div>
						</div>

					</div>

					<!--End Invoice Mid-->

					<div id="invoice-bot">

						<div id="table">
							<table class="table-main ">
								<thead>

									<tr class="tabletitle">
										<th class="text-left">S.No</th>
										<th>Product/Services</th>
										<th>Qty</th>
										<th>MRP</th>
										<th>Rate</th>
										<th>Disc</th>
										<th> Amount</th>
									</tr>
								</thead>
								<?php
                            $count = 1;
								foreach($invoice as $invoice1){
								?>
								<tr class="list-item">
									<td data-label="Type" class="tableitem"><?= $count; ?></td>
									<td data-label="Description" class="tableitem"><?= $invoice1['cateplan'] ?> (<?= $invoice1['product'] ?>)
									</td>
									<td data-label="Quantity" class="tableitem qua" id=""><?= $invoice1['qty'] ?></td>
									<td data-label="Unit Price" class="tableitem cBalance" id=""><?= $invoice1['mrp'] ?>
									</td>
									<td data-label="Taxable Amount" class="tableitem rate"><?= round( $invoice1['rate'] ,2 )?></td>
									<td data-label="Tax Code" class="tableitem chDiscount" id=''>
										<?= $invoice1['discount'] ?> %
									</td>
									<td data-label="Tax Amount" class="tableitem amt" id='result'>
										<?= round($invoice1['amt'],2) ?></td>
								</tr>

								<?php $count++; } ?>
								<tr class="list-item">
									<td colspan="4" style="border-left:2px solid #dee2e6;text-transform:capitalize"
										class=' text-left'>
										<!-- <span class="words"></span><br>Total
										Quantity: 
										<span id="qty"></span></td> -->
									<td colspan="3">
										<table>
											<tr>
												<td data-label="Grand Total" class="tableitem text-left">Total</td>
												<td data-label="Grand Total" class="tableitem"></td>
												<td data-label="Grand Total" class="tableitem"></td>
												<td data-label="Grand Total" class="tableitem numberword result totalPayable"
													id='result'></td>
											</tr>
											<tr>
												<td data-label="Grand Total" class="tableitem"></td>
												<td data-label="Grand Total" class="tableitem">SGST</td>
												<td data-label="Grand Total" class="tableitem "><span
														id='gst'><?= $invoice[0]['sgst'] ?? '0'?></span><span>%</span></td>
												<td data-label="Grand Total" class="tableitem gsttotresult totalPayable"></td>
											</tr>
											<tr>
												<td data-label="Grand Total" class="tableitem"></td>
												<td data-label="Grand Total" class="tableitem">CGST</td>
												<td data-label="Grand Total" class="tableitem ">
													<span id='cgst'><?= $invoice[0]['cgst'] ?? "0" ?></span><span>%</span></td>
												<td data-label="Grand Total" class="tableitem cgsttotresult totalPayable" id=''></td>
											</tr>
											<tr>
												<td data-label="Grand Total" class="tableitem text-left" colspan="2">
													Total Payable</td>
												<td data-label="Grand Total" class="tableitem"></td>
												<td data-label="Grand Total" class="tableitem gstresult" id=''></td>
											</tr>
										</table>
									</td>
									

								</tr>
								<tr class=" text-left" style="border:1px solid #dcd7d7">
									<td colspan="7">
									<span class="words" style=";padding:5px 10px 5px 10px;text-transform:capitalize"></span>
									</td>
									
								</tr>
								<tr class=" text-right" style="border:1px solid #dcd7d7">
									<th colspan="4">
										<p>Declaration : We declare that this invoice shows that actual price of the
											service describe and that all particulars
											are true and correct.</p>
									</th>
									<td colspan="3" style="border-left:1px solid #dcd7d7">
										for OTG cares
										<p class="mt-3"> Authorised signature</p>
									</td>
								</tr>
								<tr class=" text-right" style="border:1px solid #dcd7d7">
									<th colspan="7">
										<h5>Terms & Conditions(General Note):</h5>
										<p><?= $invoice[0]['terms'] ?></p>
									</th>
									
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!--End Invoice-->
				<div class="container mt-4">
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
		$('.amt').each(function () {
			let amt = $(this).text();
			sum += parseFloat(amt);
		});
        let resulsum = sum.toFixed(2)
		$('.result').text(resulsum);
	});

	$(window).on('load', function () {
		let result = Math.round($('.result').text());
		let gst = $('#gst').text();
		var dec = (gst / 100).toFixed(2);
		var mult = result * dec;
		let round = mult.toFixed(2)
		$('.gsttotresult').text(round);
	})

	$(window).on('load', function () {
		let result = Math.round($('.result').text());
		let gst = $('#cgst').text();
		var dec = (gst / 100).toFixed(2);
		var mult = result * dec;
		let round = mult.toFixed(2)
		$('.cgsttotresult').text(round);
	})

    $(window).on("load", function () {
		let totsum = 0;
		$('.totalPayable').each(function () {
			let amt = $(this).text();
			totsum += parseFloat(amt);
		});
        let resultotal = totsum.toFixed(2)
		$('.gstresult').text(resultotal);
	});

	$(window).on("load", function () {
		let qusum = 0;
		$('.qua').each(function () {
			let qty = $(this).text();
			qusum += parseInt(qty);
		});
		$('#qty').text(qusum);
	})

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
