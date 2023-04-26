<!--End Header-->
<style type='text/css'>
	.header-wrap,
	.mobile-nav-wrapper,
	.footer-2 {
		display: none !important;
	}
	#invoiceholder {
		width: 100%;
		height: 100%;
		padding: 50px 0;
		overflow-x: scroll;
	}
	:root {
		--var-green: #0db19e;
		--var-yellow: #f8b11b;
		--var-brown: #4c3418;
		--var-regular: 600;
	}
	.maindiv{
		width: 85%;
    padding: 15px 0px 40px 20px;
	}

	h2,
	.h2 {
		font-size: 30px;
		letter-spacing: 0.03em;
		text-transform: capitalize !important;
	}

	.carddiv div {
		height: 140px;
	}

	.carddiv p {
		height: 30px;
	}

	body,
	html {
		margin: 0;
		padding: 0;
	}

	body {
		color: var(--var-brown);
		display: table;
		/* font-family: Georgia, serif; */
		font-size: 24px;
		text-align: center;
	}

	.contentext p {
		font-size: 14px;
		width: 50%;
	}

	.contentext {
		display: flex;
		width:100%;
	}

	.underline {
		width: 100%;
		/* background: #e4b424; */
		height: 26px;
		margin-top: 20px;
	}

	b,
	strong {
		font-weight: bold;
		font-size: 16px;
	}

	.container1 {
	display: table;
    background: #f2e9da;
    position: relative;
    margin: 60px auto 20px auto;
    width: 96%;
    /* height: 550px; */
	}

	.logoimg {
		width: 22%;
	}

	.curve {
		position: absolute;
		height: 100%;
		width: 100%;
		bottom: 0;
		text-align: center;
	}
	.curve>div>img{
		    height: 309px;
    width: 100%;
	}
	.logo1 {
	    color: var(--var-green);
    width: 70%;
    font-size: 32px;
    margin: auto;
    text-transform: uppercase;
    font-weight: bold;
    margin-bottom: 30px;
	}

	.marquee {
		color: tan;
		font-size: 48px;
		margin: 20px;
	}
	.person {
		border-bottom: 2px solid #e4b424;
		font-size: 23px;
		/* font-style: italic; */
		margin: 15px auto;
		width: 350px;
		text-transform: capitalize;
    font-weight: bold;
	}

	.reason {
		margin: 20px;
		text-align: left;
	}

	.border1 {
		border: 3px solid #e4b424;
    margin: 15px;
    position: inherit;
    z-index: 1;
    padding: 10px;
    width: 97%;
	}

	.bg-white {
		background: #fff;
		width: 100%;
		height: 100%;
		padding: 50px 3px 20px 49px;
		display: flex;
	}

	.divtag {
		display: -webkit-box;

	}

	#step-4 {
		float: right;
	}

	.quiz-medal {
		position: relative;
		margin-bottom: 16px;
		width: 15%;
	}

	.quiz-medal__circle {
		z-index: 5;
		font-family: "Roboto", sans-serif;
		font-size: 42px;
		font-weight: 500;
		width: 150px;
		height: 150px;
		border-radius: 100%;
		color: var(--var-brown);
		text-align: center;
		line-height: 143px;
		vertical-align: middle;
		position: relative;
		border-width: 5px;
		border-style: solid;
		/* z-index: 1; */
		box-shadow: inset 0 0 0 #a7b2b8, 2px 2px 0 rgba(0, 0, 0, 0.08);
		border-color: #c7a658;
		/* border-image:  linear-gradient(to bottom right, #d1d7da 50%, #c3cbcf 50%); */
		/* border-image-source: linear-gradient(to left, #743ad5, #d53a9d); */
		text-shadow: 2px 2px 0 #98a6ad;
		background: #fff;
		margin-bottom: -12px;
	}

	.quiz-medal__circle.quiz-medal__circle--gold {
		box-shadow: inset 0 0 0 #b67d05, 2px 2px 0 rgba(0, 0, 0, 0.08);
		border-color: #fadd40;
		text-shadow: 0 0 4px #9d6c04;
		background:#fff;
		/* background: linear-gradient(to bottom right, #f9ad0e 50%, #e89f06 50%); */
	}

	.quiz-medal__ribbon {
		content: "";
		/* display: block; */
		position: absolute;
		border-style: solid;
		border-width: 29px 28px;
		/* width: 5px; */
		height: 420px;
		top: -70px;
	}

	.quiz-medal__ribbon--left {
		border-color: #4c3418 #4c3418 transparent #4c3418;
		left: 48px;
		border-top-right-radius: 28px;
    border-top-left-radius: 28px;
	}
	.quiz-medal__ribbon--left:before{
		content: '';
    position: inherit;
    border: 1px solid #dab22e;
    height: 111%;
    left: 20px;
    top: -19px;
	}
	.quiz-medal__ribbon--left:after{
		content: '';
    position: inherit;
    border: 1px solid #dab22e;
    height: 111%;
    right: 20px;
    top: -19px;
	}

	.quiz-medal__ribbon--right {
		left: 41px;
		border-color: #f31903 #f31903 transparent #f31903;
		transform: rotate(-20deg) translateZ(-48px);
	}

	.multi-steps {
		display: table;
		table-layout: fixed;
		width: 100%;
		position: relative;
	}

	.multi-steps>li {
		counter-increment: stepNum;
		display: table-cell;
		position: relative;
		color: #101210;
		text-align: initial;
		font-size: 18px;
		width: 150px;
	}

	[class^=ribbon-] {
		position: relative;
		margin-bottom: 80px;
	}

	[class^=ribbon-]:before,
	[class^=ribbon-]:after {
		content: "";
		position: absolute;
	}

	.ribbon-4 {
		width: 170px;
		height: 50px;
		margin-left: -10px;
		margin-right: -10px;
		background-image: linear-gradient(to right, #d4a452, #fff198, #d4a452);
	}

	.ribbon-4:before {
		height: 0;
		width: 0;
		border-top: 10px solid #FFDE2E;
		border-left: 10px solid transparent;
		bottom: -10px;
	}

	.ribbon-4:after {
		height: 0;
		width: 0;
		border-top: 10px solid #cd8d11;
		border-right: 10px solid transparent;
		right: 0;
		bottom: -10px;
	}

	.ribbon-4:before {
		height: 0;
		width: 0;
		border-width: 20px 20px;
		border-style: solid;
		border-color: #ffef9d #ffef9d #ffef9d transparent;
		top: 20px;
		left: -30px;
	}

	.ribbon-4:after {
		height: 0;
		width: 0;
		border-width: 20px 20px;
		border-style: solid;
		border-color: #ffef9d transparent #ffef9d #ffef9d;
		top: 20px;
		right: -30px;
	}

	.ribbon-content {
		height: inherit;
		margin-bottom: 0;
		background-image: linear-gradient(to bottom, #d4a452, #fff198);
		z-index: 100;
		font-size: 15px;
	}

	.ribbon-content:before {
		height: 0;
		width: 0;
		border-top: 10px solid #c49a31;
		border-left: 10px solid transparent;
		bottom: -10px;
		left: 0;
	}

	.ribbon-content:after {
		height: 0;
		width: 0;
		border-top: 10px solid #c49a31;
		border-right: 10px solid transparent;
		right: 0;
		bottom: -10px;
	}

	.multi-steps>li:before {
		content: "";
		display: block;
		width: 25px;
		height: 25px;
		margin-left: 40px;
		border-width: 2px;
		border-style: solid;
		border-color: var(--var-brown);
		border-radius: 50%;
		color: white;
	}

	.multi-steps>li.is-active:before {
		background-color: var(--var-brown);
		border-color: var(--var-brown);
		color: var(--var-brown);
		animation: pulse 2s infinite;
	}

	.multi-steps>li.is-active~li:before {
		background-color: var(--var-brown);
		border-color: var(--var-brown);
		color: var(--var-brown);
		animation: pulse 2s infinite;
	}

	.is-active {
		float: left;
	}


	.progress-bar {
		background-color: #e4b424;
		height: 3px;
		overflow: hidden;
		position: absolute;
		left: 5%;
		top: 10px;
		width: 86%;
		z-index: -1;
	}

	.progress-bar__bar {
		background-color: #e4b424;
		bottom: 0;
		left: 0;
		position: absolute;
		right: 0;
		top: 0;
		transition: all 500ms ease-out;
		width: 100%;
	}

	.carddiv {
		font-size: 16px;
	}

	.rowdiv {
		width: 70%;
		text-align: center;
		align-items: center;
		margin: auto;
	}

	.mt-9 {
		margin-top: 90px;
	}

	.step-progress {
		display: flex;
		justify-content: space-between;
		align-items: center;
		width: 100%;
	}

	.step {
		display: flex;
		flex-direction: column;
		align-items: center;
		position: relative;
		width: 25%;
		height: 230px;
	}

	.step img {
		width: 75px;
		height: 75px;
		background: #fff;
		border-radius: 50%;
		border: 2px solid #ddd;
		margin-bottom: 10px;
		z-index: 1;
		padding: 8px;
	}

	.step p {
		font-size: 16px;
		text-align: center;
	}

	.step:before {
		content: '';
		position: absolute;
		top: 34px;
		left: 0;
		height: 2px;
		width: 100%;
		border: 1px dotted #ddd;
		/* background-color: #ddd; */
	}

	.step-progress span {
		font-size: x-large;
		font-weight: 900;
		position: relative;
		top: -80px;
		color: aquamarine;
	}

	.step-progress span:before {
		content: '';

	}

	.step:first-child:before {
		content: '';
		position: absolute;
		top: 34px;
		left: 50%;
		height: 2px;
		width: 50%;
		border: 1px dotted #ddd;
		/* background-color: #ddd; */
	}

	.step:last-child:before {
		content: '';
		position: absolute;
		top: 34px;
		left: 0;
		height: 2px;
		width: 50%;
		border: 1px dotted #ddd;
		/* background-color: #ddd; */
	}

	.step.active img {
		border-color: #337ab7;
	}

	.step.active:before {
		background-color: #337ab7;
	}

</style>
<!--Body Content-->
<div id="page-content">
	<div class="row" >
		<div class="col-12 mt-3 ml-3" >
			<div class="container " id="invoiceholder">
				<div class="logoimg">
					<a href="<?php echo base_url();?>">
						<img src="<?php echo base_url();?>assets/images/logo/header.png" alt="OTG CARES"
							title="OTG CARES" />
					</a>
				</div>
				<!-- <div class="underline"></div> -->
				<div class="container1">
					<div class="curve">
						<div class=""><img src="<?php echo base_url();?>assets/images/wave.png" alt=""></div>
					</div>
					<div class="border1">
						<div class="bg-white">
							<div class="quiz-medal">
							<!-- <div class="flower">
									<div class="petal petal-1"></div>
									<div class="petal petal-2"></div>
									<div class="petal petal-3"></div>
									<div class="petal petal-4"></div>
									<div class="petal petal-5"></div>
									<div class="core"></div>
								</div> -->
								<div class="quiz-medal__circle quiz-medal__circle--gold">
									<span>
										AMC
									</span>
								</div>
								
								<div class="ribbon-4">
									<div class="ribbon-content"><span class="d-block">ORDER ID</span><span class=""><?= $data->request_id_value; ?></span></div>
								</div>
								<div class="quiz-medal__ribbon quiz-medal__ribbon--left"></div>
								<!-- <div class="quiz-medal__ribbon quiz-medal__ribbon--right"></div> -->
							</div>
							<div class="maindiv">
								<div class="logo1">
									Certificate of Protection
								</div>
								<div class="assignment">
									This certificate is issued to
								</div>

								<div class="person">
								<?= $data->cust_name; ?> 
								</div>

								<div class="reason">
									<div class="row justify-content-center">
										<div class="col-sm-5">
										<?php 
													$date = $data->created_on;
													$date_str = strtotime($date);
													$date_formatted = date('d M, Y', $date_str);
													?>
											<div class="mb-3"><strong>Plan Start Date: <?= $date_formatted ?> </strong></div>
											<div class="contentext">
												<p>Email : </p>
												<p><?= $data->cust_email; ?></p>
											</div>
											<div class="contentext">
												<p>Phone : </p>
												<p><?= $data->cust_contact; ?></p>
											</div>
											<div class="contentext">
												<p>Plan : </p>
												<p>Annual Maintenance Contract </p>
											</div>
										</div>
										<div class="col-sm-5">
											<?php 
											$current_date = date($data->created_on); // get current date
											$validity_date = date('j M, Y', strtotime($current_date . ' + 1 years'));
											?>
											<div class="mb-3"><b>Plan End Date: <?= $validity_date ?> </b></div>
											<div class="contentext">
												<p>Device : </p>
												<p>
													<?php
													if($subdata->subcat_id == $data->sub_cateplanid ){
													?>
													<?php echo  $data->sub_cateplanid; }else{ echo '0'; }?> <?= $data->service_device; ?>
												</p>
											</div>
											<div class="contentext">
												<p>Serial No : </p>
												<p><?= $data->status; ?></p>
											</div>
											<div class="contentext">
												<p>Purchase
													Date : </p>
													<?php 
													$date = $data->created_on;
													$date_str = strtotime($date);
													$date_formatted = date('d M, Y', $date_str);
													?>
												<p><?= $date_formatted ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="" style="margin-top: 10rem;">
					<div class="container-fluid">
						<br /><br />
						<ul class="list-unstyled multi-steps">
							<li id="step-1" class="is-active">16 Nov, 2022 <p>
									(start date)
								</p>

							</li>
							<li id="step-4" class="">16 Nov, 2023 <p>
									(start date)
								</p>
							</li>
							<div class="progress-bar progress-bar--success">
								<div class="progress-bar__bar"></div>
						</ul>
					</div>
					<div class="container mt-9 ">
						<div class="title mb-3">
							<h2>Covered</h2>
						</div>
						<div class="row rowdiv">

							<div class="col-sm-3 carddiv">
								<div><img src="<?= base_url() ?>/assets/images/icons/grab.png" alt=""></div>
								<p>2 Scheduled
									Cleaning Services</p>
							</div>
							<div class="col-sm-3 carddiv">
								<div><img src="<?= base_url() ?>/assets/images/icons/grab.png" alt=""></div>
								<p>Free Gas Changing
									& Repair Of Gas
									Leakage</p>
							</div>
							<div class="col-sm-3 carddiv">
								<div><img src="<?= base_url() ?>/assets/images/icons/grab.png" alt=""></div>
								<p> Unlimited Repairs</p>
							</div>
							<div class="col-sm-3 carddiv">
								<div><img src="<?= base_url() ?>/assets/images/icons/grab.png" alt=""></div>
								<p> Transportation</p>
							</div>
						</div>
					</div>

					<div class="container mt-9 ">
						<div class="title mb-3 pt-5">
							<h2>Not Covered</h2>
						</div>
						<div class="row rowdiv justify-content-center">

                        <div class="col-sm-3 carddiv">
								<div><img src="<?= base_url() ?>/assets/images/icons/grab.png" alt=""></div>
								<p> Spare Parts</p>
							</div>
							<div class="col-sm-3 carddiv">
								<div><img src="<?= base_url() ?>/assets/images/icons/grab.png" alt=""></div>
								<p> Damages</p>
							</div>
						</div>
					</div>
				</div> -->

				<div class="mt-9" style="margin-top: 10rem;">
					<div class="title mb-5">
						How our process works?
					</div>
					<div class="step-progress pt-4">
						<div class="step">
							<img src="<?= base_url() ?>/assets/images/icons/grab.png" alt="Step 2">
							<p><b>Visit OTGCares</b></p>
							<p><a href="https://otgcares.com/">Visit</a></p>
						</div><span>></span>
						<div class="step">
							<img src="<?= base_url() ?>/assets/images/icons/grab.png" alt="Step 2">
							<p><b>Select Service</b></p>
							<p>Select service you wish to avail and
								your preferred time slo</p>
						</div><span>></span>
						<div class="step">
							<img src="<?= base_url() ?>/assets/images/icons/grab.png" alt="Step 3">
							<p><b>We Repair</b></p>
							<p>We send an expert technician to
								your home for the service</p>
						</div><span>></span>
						<div class="step">
							<img src="<?= base_url() ?>/assets/images/icons/grab.png" alt="Step 4">
							<p><b>Enjoy Your Device</b></p>
							<p>Your Air Conditioner remains in
								great health and you enjoy your Air
								Conditioner to the fullest</p>
						</div>

					</div>

				</div>
				<!-- <button class="invoice">pdf</button> -->
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.js"></script>

<script type="text/javascript">
	// $(document).on("click", ".invoice", function () {
	// 	$(this).css('display', 'none');
	// 	Convert_HTML_To_PDF();
	// });
	$(window).on("load", function () {
		Convert_HTML_To_PDF();
	});

	function Convert_HTML_To_PDF() {
		window.jsPDF = window.jspdf.jsPDF;
		var doc = new jsPDF();
		var elementHTML = document.getElementById("invoiceholder");
		doc.html(elementHTML, {
			callback: function (doc) {
				// Save the PDF
				doc.save('invoice.pdf');
			},
			x: 15,
			y: 15,
			width: 170, //target width in the PDF document
			windowWidth: 850 //window width in CSS pixels
		}).then(function() {
			// window.location.href = "<?= base_url() ?>account?show=booking";
});
		
	}

	// function redirectfunction(){
	// 	window.location.href = "<?= base_url() ?>account?show=booking";
	// }

</script>

