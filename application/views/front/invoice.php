<style>
	@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);


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
.cta-group{
	width:100%;
	text-align:center;
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
		background: var(--var-green);
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



	/* @media screen and (max-width: 767px) {
		h1 {
			font-size: .9em;
		}

		#invoice {
			width: 100%;
		}

		#message {
			margin-bottom: 20px;
		}

		[id*='invoice-'] {
			padding: 20px 10px;
		}

		.logo {
			width: 140px;
		}

		.title {
			float: none;
			display: inline-block;
			vertical-align: middle;
			margin-left: 40px;
		}

		.title p {
			text-align: left;
		}

		.col-left,
		.col-right {
			width: 100%;
		}

		.table {
			margin-top: 20px;
		}

		#table {
			white-space: nowrap;
			overflow: auto;
		}

		td {
			white-space: normal;
		}

		.cta-group {
			text-align: center;
		}

		.cta-group.mobile-btn-group {
			display: block;
			margin-bottom: 20px;
		}

		.table-main {
			border: 0 none;
		}

		.table-main thead {
			border: none;
			clip: rect(0 0 0 0);
			height: 1px;
			margin: -1px;
			overflow: hidden;
			padding: 0;
			position: absolute;
			width: 1px;
		}

		.table-main tr {
			border-bottom: 2px solid #eee;
			display: block;
			margin-bottom: 20px;
		}

		.table-main td {
			font-weight: 700;
			display: block;
			padding-left: 40%;
			max-width: none;
			position: relative;
			border: 1px solid #cccaca;
			text-align: left;
		}

		.table-main td:before {

			content: attr(data-label);
			position: absolute;
			left: 10px;
			font-weight: normal;
			text-transform: uppercase;
		}

		.total-row th {
			display: none;
		}

		.total-row td {
			text-align: left;
		}

		footer {
			text-align: center;
		}
	} */

</style>

<div id="invoiceholder">
	<div id="invoice" class="effect2">

		<div id="invoice-top">
			<!-- <div class="logo"><img src="<?php echo base_url();?>assets/images/logo/header.png" alt="OTG CARES"
					title="OTG CARES" /></div>
			<div class="title">
				<h1>Invoice #<span class="invoiceVal invoice_num">tst-inv-23</span></h1>
				<p>Invoice Date: <span id="invoice_date">01 Feb 2018</span><br>
					GL Date: <span id="gl_date">23 Feb 2018</span>
				</p>
			</div> -->

			<div class="clearfix">
				<div class="col-left">
					<div class="logo"><img src="<?php echo base_url();?>assets/images/logo/header.png"
							alt="OTG CARES" /></div>
					<div class="clientinfo">
						<h2 id="supplier">OTGcares</h2>
						<p><span id="address">S-53, Haware Fantasia Business park, <br> Vashi Navi Mumbai Thane
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
										class='float-right'>INV-<?= $invoice_create[0]['request_id_value'] ?></label>
								</td>
							</tr>
							<tr>
								<td><span>Order Number</span><label id="order-number"
										class='float-right'><?= $invoice_create[0]['request_id_value'] ?></label></td>
							</tr>
							<tr>
								<td><span>Invoice Date</span><label id="invoice_date" class='float-right'><?php  $input=$invoice_create[0]['created_date']; 
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
				<p><?= $invoice_create[0]['name'] ?> <span id="supplier_name"></span><br>+91
					<?= $invoice_create[0]['contact'] ?></p>
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
							<!-- <th>MRP</th> -->
							<th>Rate</th>
							<th>Disc</th>
							<th>Tax</th>
							<th> Amount</th>
						</tr>
					</thead>
					<tr class="list-item">
						<td data-label="Type" class="tableitem">1</td>
						<td data-label="Description" class="tableitem"><?= $invoice_create[0]['service_device'] ?>
						</td>
						<td data-label="Quantity" class="tableitem"><?= $invoice_create[0]['quantity'] ?></td>
						<!-- <td data-label="Unit Price" class="tableitem"><?= $invoice_create[0]['total_amount'] ?></td> -->
						<td data-label="Taxable Amount" class="tableitem" id="cBalance">
							<?= $invoice_create[0]['total_amount'] ?></td>
						<td data-label="Tax Code" class="tableitem" id='chDiscount'>20</td>
						<td data-label="%" class="tableitem"><?= '0.00' ?></td>
						<td data-label="Tax Amount" class="tableitem result" id='result'></td>
					</tr>
					<tr class="list-item">
						<td colspan="5" style="border-left:2px solid #dee2e6;text-transform:capitalize"
							class='words text-left'></td>
						<td data-label="Grand Total" class="tableitem">Subtotal</td>
						<td data-label="Grand Total" class="tableitem numberword result" id='result'>
							</td>
					</tr>
					<tr class="list-item">
						<td colspan="5" style="border-left:2px solid #dee2e6" class=' text-left'> Total Quantity: 9</td>
						<td data-label="Grand Total" class="tableitem">Total Payable</td>
						<td data-label="Grand Total" class="tableitem result" id='result'>
							</td>
					</tr>
					<tr class="list-item">
						<td colspan="5" style="border-bottom: 2px solid #dee2e6;border-left:2px solid #dee2e6"></td>
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
							<p> A.M.C Upto 1.5 Ton - 3 Jet Service + 1 Time Gas Recharge + Unlimited Repair Total 3
								Basic AMC And 2 Service AMC Is Included In Your Contract.</p>
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
	<div class="cta-group" >
				<button class="btn btn-primary invoice">Download Invoice</button>
			</div>
</div>
</div><!-- End Invoice Holder-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
</script>
<script>
	$(window).on("load", function () {
		let numberword = $(".numberword").text();
		$('.words').html(toWords(numberword), 'rupees only');
	});

	// American Numbering System
	let th = ['', 'thousand', 'million', 'billion', 'trillion'];
	let dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
	var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen',
	'nineteen'];
	var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

	function toWords(s) {
		s = s.toString();
		s = s.replace(/[\, ]/g, '');
		if (s != parseFloat(s)) return 'not a number';
		var x = s.indexOf('.');
		if (x == -1) x = s.length;
		if (x > 15) return 'too big';
		var n = s.split('');
		var str = '';
		var sk = 0;
		for (var i = 0; i < x; i++) {
			if ((x - i) % 3 == 2) {
				if (n[i] == '1') {
					str += tn[Number(n[i + 1])] + ' ';
					i++;
					sk = 1;
				} else if (n[i] != 0) {
					str += tw[n[i] - 2] + ' ';
					sk = 1;
				}
			} else if (n[i] != 0) {
				str += dg[n[i]] + ' ';
				if ((x - i) % 3 == 0) str += 'hundred ';
				sk = 1;
			}
			if ((x - i) % 3 == 1) {
				if (sk) str += th[(x - i - 1) / 3] + ' ';
				sk = 0;
			}
		}
		if (x != s.length) {
			var y = s.length;
			str += 'rupees and ';
			for (var i = x + 1; i < y; i++) str += dg[n[i]] + ' ';
		}
		return str.replace(/\s+/g, ' ');
	}

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.js"></script>
<script type="text/javascript">
	$(document).on("click", ".invoice", function () {
		$(this).css('display', 'none');
		Convert_HTML_To_PDF();

	});

</script>
<script>
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

<script>
	$(window).on("load", function () {
		var main = $('#cBalance').text();
		var disc = $('#chDiscount').text();
		var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
		var mult = main * dec; // gives the value for subtract from main value
		var discont = main - mult;
		let doc = Math.round(discont);
		$('.result').text(doc);
	});

</script>


</body>
