<!--Body Content-->
<style>

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

	</div>
</div>
<div class="section"></div>
</div>
<!--End Body Content-->

<!--Footer-->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>

<script>
	$('#spanservice').hide();
		$('.trackerlist').hide();
	$(document).on('click','#servicebnt',function(){
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
								'"><label for="211220-000804" class="tracker_list_item_wrap"><div class="tracker_details"><h4>' +
								response.data[index].service_plan +
								' ' +
								response.data[index].service_device +
								' (' +
								response.data[index].service_warranty +
								')</h4><div class="tracker_details_box"><div class="tracker_detail_list"><div class="tracker_detail_list_item_"><span class="tracker_head">Request ID</span><span class="tracker_val">: ' +
								response.data[index].request_id_value +
								'</span></div><div class="tracker_detail_list_item_"><span class="tracker_head">Request Date</span><span class="tracker_val">: ' +
								response.data[index].created_on +
								'</span></div><div class="tracker_detail_list_item_"><span class="tracker_head">Status</span><span class="tracker_val tracker_detail_list_item__highlighted__1sTay">: Service ' +
								response.data[index].status +
								'</span></div></div><div class="tracker_list_item__action"><a role="button" data-loading="false" href="<?= base_url()?>'+ 'service_tracker/'+
								response.data[index].request_id_value +'" class="button_app_btn undefined trackid" data-variant="primary" title="Track Now">Track Now</a></div></div></div></label></form></li>';
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


	// $(document).on('click','.trackid',function(){
	// 	alert('fgfg');
	// 		let req_id = $(this).data('id');
	// 		let req_date = $(this).data('date');
	// 		$('#requestid').text(req_id);
	// 		$('#reqdate').text(req_date);
	// 		var csrfName = $('.csrf').attr('name');
	// 		var csrfHash = $('.csrf').val();
	// 		$.ajax({
	// 			url: "<?= base_url('welcome/track') ?>",
	// 			method: "post",
	// 			data: {
	// 				req_id: req_id,
	// 				[csrfName]: csrfHash,
	// 			},
	// 			dataType: "json",
	// 			success: function (response) {
	// 				$('.csrf').val(response.token);
	// 			},
	// 			error: function () {
	// 				alert('Request not send. Please try gain');
	// 			}
	// 		})
	// })

</script>
