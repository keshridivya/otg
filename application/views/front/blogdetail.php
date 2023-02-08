    <!--Body Content-->
    <div id="page-content">
    	<!--Parallax Section-->
    	<div class="sub-banner">
    		<div class="hero hero--large hero__overlay bg-size">
    			<img class="bg-img blur-up" src="<?= base_url(); ?>assets/images/banner/about.png" alt="" />
    			<div class="hero__inner">
    				<div class="row justify-content-center">
    					<div class="col-lg-10">
    						<div class="sub-banner_content">
    							<h2 class="sub-banner_content">Blog Detail</h2>
    						</div>
    					</div>
    				</div>

    			</div>
    		</div>
    	</div>
    	<!--End Parallax Section-->
    	<div class="section">
    		<div class="container">
    			<div class="section-header text-center">
    				<h2 class="heading">Our Blog</h2>

    			</div>
    		</div>
    	</div>

    	<div class="section vision-mission">
    		<div class="container">
    			<div class="row justify-content-around">
                    <?php
                    foreach($blog as $blog){
                    ?>
    					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
    						<div class="card">
    							<img class="card-img"
    								src="<?php echo base_url($blog['file']) ?>"
    								alt="Bologna">
    							<div class="card-body">
    								<h1 class="card-title"><?= $blog['name'] ?></h1>

                                    <p class="bottom10"><span>By:</span><?= $blog['writtenby'] ?> <span>|</span> <span>Date:</span> Feb 22, 2017</p>
    								<p class="card-text"><?=  $blog['description'] ?></p>
    							</div>
    						</div>
    					</div>
                        <?php } ?>
    			</div>
    		</div>
    	</div>
    </div>
    <!--End Body Content-->

    <!--Footer-->
