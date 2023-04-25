<!--End Header-->
<style type='text/css'>
	.header-wrap,
	.mobile-nav-wrapper,
	.footer-2 {
		display: none !important;
	}

	:root {
		--var-green: #0db19e;
		--var-yellow: #f8b11b;
		--var-brown: #4c3418;
		--var-regular: 600;
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
		color: black;
		display: table;
		font-family: Georgia, serif;
		font-size: 24px;
		text-align: center;
	}

	.contentext p {
		font-size: 14px;
		width: 150px;
	}

	.contentext {
		display: flex;
	}

	.underline {
		width: 100%;
		background: #e4b424;
		height: 26px;
		margin-top: 20px;
	}

	b,
	strong {
		font-weight: bold;
		font-size: 16px;
	}

	.container1 {
		display: -webkit-inline-box;
		vertical-align: middle;
		padding-right: 0px;
		padding-left: 0px;
		background: #f2e9da;
		position: relative;
		margin: 60px 0 20px 0;
		width: 90%;
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

	.curve::before {
		content: '';
		display: block;
		position: absolute;
		border-radius: 120px 0 0px 0;
		width: 22%;
		height: 40%;
		transform: translate(355%, 150%);
		background-color: var(--var-brown);

	}

	.curve::after {
		content: '';
		display: block;
		position: absolute;
		border-radius: 0 0 120px 0;
		width: 20%;
		height: 40%;
		top: 0;
		background-color: var(--var-brown);
		;
		z-index: 1;
		/* background-image: radial-gradient(circle at 10px 15px, white 12px, transparent 13px);
     background-image: url(assets/images/border.svg) !important; */
	}

	.logo {
		color: tan;
		width: 70%;
	}

	.marquee {
		color: tan;
		font-size: 48px;
		margin: 20px;
	}

	/* .assignment {
		margin: 20px;
	} */

	.person {
		border-bottom: 2px solid #e4b424;
		font-size: 25px;
		font-style: italic;
		margin: 15px auto;
		width: 350px;
	}

	.reason {
		margin: 20px;
		text-align: left;
	}

	.border1 {
		border: 3px solid #e4b424;
		margin: 20px;
		position: inherit;
		z-index: 1;
		padding: 10px;
		width: 96%;
	}

	.bg-white {
		background: #fff;
		width: 100%;
		height: 100%;
		padding: 20px;
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
		font-family: "Roboto", sans-serif;
		font-size: 22px;
		font-weight: 500;
		width: 70px;
		height: 70px;
		border-radius: 100%;
		color: white;
		text-align: center;
		line-height: 70px;
		vertical-align: middle;
		position: relative;
		border-width: 0.2em;
		border-style: solid;
		z-index: 1;
		box-shadow: inset 0 0 0 #a7b2b8, 2px 2px 0 rgba(0, 0, 0, 0.08);
		border-color: #edeff1;
		text-shadow: 2px 2px 0 #98a6ad;
		background: linear-gradient(to bottom right, #d1d7da 50%, #c3cbcf 50%);
	}

	.quiz-medal__circle.quiz-medal__circle--gold {
		box-shadow: inset 0 0 0 #b67d05, 2px 2px 0 rgba(0, 0, 0, 0.08);
		border-color: #fadd40;
		text-shadow: 0 0 4px #9d6c04;
		background: linear-gradient(to bottom right, #f9ad0e 50%, #e89f06 50%);
	}

	.quiz-medal__ribbon {
		content: "";
		display: block;
		position: absolute;
		border-style: solid;
		border-width: 6px 10px;
		width: 0;
		height: 30px;
		top: 65px;
	}

	.quiz-medal__ribbon--left {
		border-color: #FC402D #FC402D transparent #FC402D;
		left: 8px;
		transform: rotate(20deg) translateZ(-32px);
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
		content: '>';
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
	<div class="row">
		<div class="col-12 mt-3 ml-3">
			<div class=" container">
				<div class="logoimg">
					<a href="<?php echo base_url();?>">
						<img src="<?php echo base_url();?>assets/images/logo/header.png" alt="OTG CARES"
							title="OTG CARES" />
					</a>
				</div>
				<div class="underline"></div>
				<div class="container1">
					<div class="curve"></div>
					<div class="border1">
						<div class="bg-white">
							<div class="divtag">
								<div class="quiz-medal">
									<div class="quiz-medal__circle quiz-medal__circle--gold">
										<span>
											AMC
										</span>
									</div>
									<div class="quiz-medal__ribbon quiz-medal__ribbon--left"></div>
									<div class="quiz-medal__ribbon quiz-medal__ribbon--right"></div>
								</div>
								<div class="logo">
									Certificate of Protection
								</div>
							</div>
							<div class="assignment">
								This certificate is issued to
							</div>

							<div class="person">
								Divya
							</div>

							<div class="reason">
								<div class="row justify-content-center">
									<div class="col-sm-5">
										<div class="mb-3"><strong>Plan Start Date: 16 Nov, 2022 </strong></div>
										<div class="contentext">
											<p>Email : </p>
											<p>a1@gmail.com</p>
										</div>
										<div class="contentext">
											<p>Phone : </p>
											<p>9930173191</p>
										</div>
										<div class="contentext">
											<p>Plan : </p>
											<p>Annual Maintenance Contract </p>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="mb-3"><b>Plan End Date: 15 Nov, 2023 </b></div>
										<div class="contentext">
											<p>Device : </p>
											<p>O General Split AC
											</p>
										</div>
										<div class="contentext">
											<p>Serial No : </p>
											<p>Pending</p>
										</div>
										<div class="contentext">
											<p>Plan Purchase
												Date : </p>
											<p>16 Nov, 2022</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="" style="margin-top: 10rem;">
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
				</div>

				<div class="mt-9" style="margin-top: 10rem;">
					<div class="title mb-5">
						How our process works?
					</div>
					<div class="step-progress pt-4">
						<div class="step">
							<img src="<?= base_url() ?>/assets/images/icons/grab.png" alt="Step 2">
							<p><b>Visit Onsitego</b></p>
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
			</div>
		</div>
	</div>
</div>
