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
    							<h2 class="sub-banner_content">One-stop Solution for All Your Needs</h2>
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
    					<div class="col-12 col-sm-8 col-md-6 col-lg-4">
    						<div class="card">
    							<img class="card-img"
    								src="<?php echo base_url($blog['file']) ?>"
    								alt="Bologna">
    							<div class="card-body">
    								<h2 class="card-title"><?= $blog['name'] ?></h2>

                                    <p class="bottom10">
										<?php
										if($blog['writtenby']!=''){
										?>
										<span>By:</span><?= $blog['writtenby'] ?> <span> |
											<?php } ?>
											</span> <span>Date:</span> Feb 22, 2017</p>
    								<p class="card-text"><?= substr( $blog['description'],0,150) ?></p>
    								<a href="<?php base_url() ?>blogdetail/<?= $blog['id'] ?>" class="btn btn-offgreen">Read more</a>
    							</div>
    							<!-- <div
    								class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
    								<div class="views">Oct 20, 12:45PM
    								</div>
    								<div class="stats">
    									<i class="far fa-eye"></i> 1347
    									<i class="far fa-comment"></i> 12
    								</div>

    							</div> -->
    						</div>
    					</div>
                        <?php } ?>
    			</div>
    		</div>
    	</div>
    </div>
    <!--End Body Content-->

    <!--Footer-->
