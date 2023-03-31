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
			width: 50%;
		}
	}

</style>
<div id="page-content">
	<div class="section summery">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 mt-4 trackersearch">
					<div class="card shadow">
						<div class="card-body">
							<div class="section-header text-center">
								<h4 class="user-titles">Track Service Request</h4>
								<hr>
								<form class="customer" method="post" action="">
									<input type="hidden" class="form-control form-control-user"
										value="<?= $this->session->userdata('cid') ?>" name="id">
									<input type="hidden" class="csrf"
										name="<?php echo $this->security->get_csrf_token_name(); ?>"
										value="<?php echo $this->security->get_csrf_hash();?>">
									<div class="form-group row justify-content-center">
										<div class="col-lg-6 mb-3 mt-3 mb-sm-0">
											<!-- <label for="c_city">City</label> -->
											<input type="text" name="serviceno" id="serviceno" value=""
												class="form-control form-control-user"
												placeholder="Mobile Number / Email / Service Request Id" required>
											<span id='spanservice' class='float-left mt-2'>Search Value is not
												exist</span>
										</div>
										<div class="col-lg-12">

											<input type="button" name="submit" value="Continue"
												class="theme-btn offer-btn  mt-4" id='servicebnt'>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 trackerlist">
				<div class="container">
					<div class="card">
						<div class="card-body">
							<div class="section-header text-center">
								<h4 class="user-titles">Track Service Request</h4>
								<hr>
								<ul id="list" class="text-left"></ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container px-1 px-md-4 py-5 mx-auto">
			<div class="card">
				<div class="row d-flex justify-content-between px-3 top">
					<div class="d-flex">
						<h5>Device <span class="text-primary font-weight-bold">#Y34XDHR</span></h5>
					</div>
					<div class="d-flex flex-column text-sm-right">
						<p class="mb-0">Created Date <span>01/12/19</span></p>
						<p class="mb-0">Last Date <span>01/12/19</span></p>
						<p>Request Id <span class="font-weight-bold">234094567242423422898</span></p>
					</div>
				</div>
				<!-- Add class 'active' to progress -->
				<div>
					<div class="row d-flex justify-content-center">
						<div class="col-12">
							<ul id="progressbar" class="text-center">
								<li class="active step0"></li>
								<li class="active step0"></li>
								<li class="active step0"></li>
								<li class="step0"></li>
							</ul>
						</div>
					</div>
					<div class="row justify-content-between top">
						<div class="row d-flex icon-content">
							<img class="icon" src="https://i.imgur.com/9nnc9Et.png">
							<div class="d-flex flex-column">
								<p class="font-weight-bold">Request <br>Created</p>
							</div>
						</div>
						<div class="row d-flex icon-content">
							<img class="icon" src="https://i.imgur.com/u1AzR7w.png">
							<div class="d-flex flex-column">
								<p class="font-weight-bold">Visit in <br>Progress</p>
							</div>
						</div>
						<div class="row d-flex icon-content">
							<img class="icon" src="https://i.imgur.com/TkPm63y.png">
							<div class="d-flex flex-column">
								<p class="font-weight-bold">Service in <br>Progress</p>
							</div>
						</div>
						<div class="row d-flex icon-content">
							<img class="icon" src="https://i.imgur.com/HdsziHP.png">
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

<script>
	$(document).ready(function () {
		$('#spanservice').hide();
		$('.trackerlist').hide();
		$('#servicebnt').click(function () {
			let serviceno = $('#serviceno').val();
			var csrfName = $('.csrf').attr('name');
			var csrfHash = $('.csrf').val();
			$.ajax({
				url: "<?= base_url('welcome/service_request') ?>",
				method: "post",
				data: {
					serviceno: serviceno,
					[csrfName]: csrfHash,
				},
				dataType: "json",
				success: function (response) {
					$('.csrf').val(response.token);
					if (response.data == 'error') {
						$('#spanservice').show().css('color', 'red');
					} else {
						var len = response.data.length;
						console.log(len);
						let textwrit = '';
						$.each(response.data, function (index) {
							// dd += response.data[index].request_id_value
							textwrit +=
								'<li class="tracker_list_item" tabindex="0"><form action="" method="post"><input type="hidden" name="req_id" value="' +
								response.data[index].request_id_value +
								'"><label for="211220-000804" class="tracker_list_item_wrap"><div class="tracker_details"><h4> Others  Split AC (AMC - Breakdown)</h4><div class="tracker_details_box"><div class="tracker_detail_list"><div class="tracker_detail_list_item_"><span class="tracker_head">Request ID</span><span class="tracker_val">: ' +
								response.data[index].request_id_value +
								'</span></div><div class="tracker_detail_list_item_"><span class="tracker_head">Request Date</span><span class="tracker_val">: ' +
								response.data[index].created_on +
								'</span></div><div class="tracker_detail_list_item_"><span class="tracker_head">Status</span><span class="tracker_val tracker_detail_list_item__highlighted__1sTay">: Service ' +
								response.data[index].status +
								'</span></div></div><div class="tracker_list_item__action"><a role="button" data-loading="false" data-id="' +
								response.data[index].request_id_value +
								'" class="button_app_btn undefined trackid" data-variant="primary" title="Track Now">Track Now</a></div></div></div></label></form></li>';
						});
						$('#list').html(textwrit);
						// $('#list').html(response.data);
						$('.trackersearch').hide();
						$('.trackerlist').show();
					}
				},
				error: function () {
					alert('Request not send. Please try gain');
				}
			})
		})
	})


    $(document).ready(function () {
		$('#spanservice').hide();
		$('.trackerlist').hide();
		$('.trackid').click(function () {
			let serviceno = $('#serviceno').val();
			var csrfName = $('.csrf').attr('name');
			var csrfHash = $('.csrf').val();
			$.ajax({
				url: "<?= base_url('welcome/service_request') ?>",
				method: "post",
				data: {
					serviceno: serviceno,
					[csrfName]: csrfHash,
				},
				dataType: "json",
				success: function (response) {
					$('.csrf').val(response.token);
					if (response.data == 'error') {
						$('#spanservice').show().css('color', 'red');
					} else {
						$('#list').html(textwrit);
						$('.trackersearch').hide();
						$('.trackerlist').show();
					}
				},
				error: function () {
					alert('Request not send. Please try gain');
				}
			})
		})
	})

</script>
