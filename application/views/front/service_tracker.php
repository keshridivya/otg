<!--Body Content-->
<style>
	.top {
		padding-top: 40px;
		padding-left: 13% !important;
		padding-right: 13% !important;
	}

	/*Icon progressbar*/
	#progressbar {
		margin-bottom: 30px;
		overflow: hidden;
		color: #455A64;
		padding-left: 0px;
		margin-top: 30px;
	}

	#progressbar li {
		list-style-type: none;
		font-size: 13px;
		width: 25%;
		float: left;
		position: relative;
		font-weight: 400;
	}

	#progressbar .step0:before {
		font-family: FontAwesome;
		content: "\f10c";
		color: #fff;
	}

	#progressbar li:before {
		width: 40px;
		height: 40px;
		line-height: 45px;
		display: block;
		font-size: 20px;
		background: #C5CAE9;
		border-radius: 50%;
		margin: auto;
		padding: 0px;
		position: relative;
		z-index: 1;
	}

	.font-weight-bold {
		font-weight: 900 !important;
		color: var(--var-brown);
	}

	/*ProgressBar connectors*/
	#progressbar li:after {
		content: '';
		width: 100%;
		height: 12px;
		background: #C5CAE9;
		position: absolute;
		left: 0;
		top: 16px;
		z-index: 0;
	}

	#progressbar li:last-child:after {
		border-top-right-radius: 10px;
		border-bottom-right-radius: 10px;
		position: absolute;
		left: -50%;
	}

	#progressbar li:nth-child(2):after,
	#progressbar li:nth-child(3):after {
		left: -50%;
	}

	#progressbar li:first-child:after {
		border-top-left-radius: 10px;
		border-bottom-left-radius: 10px;
		position: absolute;
		left: 50%;
	}

	#progressbar li:last-child:after {
		border-top-right-radius: 10px;
		border-bottom-right-radius: 10px;
	}

	#progressbar li:first-child:after {
		border-top-left-radius: 10px;
		border-bottom-left-radius: 10px;
	}

	/*Color number of the step and the connector before it*/
	#progressbar li.active:before,
	#progressbar li.active:after {
		background: #651FFF;
	}

	#progressbar li.active:before {
		font-family: FontAwesome;
		content: "\f00c";
	}

	.icon {
		width: 60px;
		height: 60px;
		margin-right: 15px;
	}

	.icon-content {
		padding-bottom: 20px;
	}

	@media screen and (max-width: 992px) {
		.icon-content {
			width: 25%;
		}

		.icon {
			width: 30px;
			height: 30px;
			margin-bottom: 6px;
			margin-left: 15px;
		}

		.font-weight-bold {
			font-weight: 900 !important;
			font-size: 12px;
		}

		.top {
			padding-top: 2px;
		}
	}

	@media(max-width:768px) {
		h5 {
			font-size: 13px;
		}

		.font-weight-bold {
			font-weight: 600 !important;
		}

		.icon {
			margin-left: 7px;
		}
	}

</style>
<div id="page-content">
	<div class="section summery">
		<div class="container px-1 px-md-4 py-5 mx-auto">
			<div class="card">
				<h4 class="user-titles text-center pt-4">Track Service Request</h4>
				<hr>
				<div class="row d-flex justify-content-between px-3 top">
					<div class="d-flex">
						<h5>Request Id: <span
								class="text-primary font-weight-bold"><?= $track->request_id_value ?></span></h5>
					</div>
					<div class="d-flex flex-column text-sm-right">
						<p class="mb-0">Created Date : <span id="reqdate"><?= $track->cdate ?></span></p>
						<p class="mb-0">Last Date : <span><?= $track->mdate ?></span></span></p>
						<p>Device : <span class="font-weight-bold"
								id="requestid"><?= $track->service_device; if($track->service_plan){  ?>
								(<?= $track->service_plan ?>) <?php } ?></span></p>
					</div>
				</div>
				<!-- Add class 'active' to progress -->
				<div>
					<div class="row d-flex justify-content-center">
						<div class="col-12">
							<ul id="progressbar" class="text-center">
								<li class="active step0"></li>
								<li class="<?= ($track->eng_name != '0') ? 'active': ''; ?> step0">
									<p><?= ($track->eng_name != '0') ? 'Engineer appointment confirmed': ''; ?></p>
								</li>
								<li
									class="<?php if ($track->status == 'pending' || $track->status == 'process'  || $track->status == 'completed'  ||  $track->status == 'close' ) {echo 'active'; } ?> step0">
									<p><?= ($track->status == 'pending') ? 'Service Reschduled date('.$track->mdate.')': ''; ?>
									</p>
								</li>
								<li
									class="<?php if ($track->status == 'completed'  ||  $track->status == 'close' ) {echo 'active'; } ?>">
								</li>
							</ul>
						</div>
					</div>
					<div class="row justify-content-between top">
						<div class="row d-flex icon-content">
							<img class="icon" src="<?= base_url('assets/images/request.png') ?>">
							<div class="d-flex flex-column">
								<p class="font-weight-bold">Request <br>Created</p>
							</div>
						</div>
						<div class="row d-flex icon-content">
							<img class="icon" src="<?= base_url('assets/images/worker.png') ?>">
							<div class="d-flex flex-column">
								<p class="font-weight-bold">Visit in <br>Progress</p>
							</div>
						</div>
						<div class="row d-flex icon-content">
							<img class="icon" src="<?= base_url('assets/images/service.png') ?>">
							<div class="d-flex flex-column">
								<p class="font-weight-bold">Service in <br>Progress</p>
							</div>
						</div>
						<div class="row d-flex icon-content">
							<img class="icon" src="<?= base_url('assets/images/completed.png') ?>">
							<div class="d-flex flex-column">
								<p class="font-weight-bold">Request<br>Completed</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section"></div>
</div>
<!--End Body Content-->

<!--Footer-->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>
