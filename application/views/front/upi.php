<div id="page-content">
	<div class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="card">
						<h1 style='margin:auto; color:green;padding:10px'>Please Scan and pay</h1>
						<div class="card-body" style='margin:auto;width:300px;height:500px'>
							<img src="<?= base_url('assets/images/upi.jpeg') ?>" alt="" style='height:100%;width:100%'>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div>
	<?php
	$current_date = date('2023-5-23'); // get current date
	$validity_date = date('Y-m-d', strtotime($current_date . ' + 2 years')); // calculate date validity for 2 years
    echo $validity_date;
	?>
</div>
