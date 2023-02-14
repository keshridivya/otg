    <!--Body Content-->
	<div class="load-wrapp loadhide">
    <div class="load-9">
	<div class="contactloader"></div>
      <p class="h3 text-center text-pur mt-2">Uploading Your Data, Please Wait</p>
			<p class="h6 text-center  text-pur">This Might take some time</p>
    </div>
  </div>
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
    				<h2 class="heading">Contact Us</h2>

    			</div>
    		</div>
    	</div>

    	<div class="section vision-mission">
    		<div class="container">
    			<div class="row">

    				<div class="col-xs-12">

    					<div class="contact-bg">

    						<div class="row">

    							<div class="col-md-7 col-sm-6 col-xs-12">
    								<div class="col-lg-12">
    									<div class="section-header  bottom40">
    										<h2 class="heading">How Can We Help you?</h2>
    										<h4 class='heading4'>We take bulk corporate orders too ! <br>
    											Place your enquiry here to know the Quote.</h4>
    										<div class="line_1"></div>
    										<div class="line_2"></div>
    										<div class="line_3"></div>
    									</div>
    								</div>
    								<!-- <div class="bottom40">
                        <h2 class="text-uppercase">Send us<span class="color_red"> a message </span></h2>
                       
                      </div> -->

    								<form class="contact-form1" method='post'>
    									<div class="row">
    										<div class="col-md-4 col-sm-4 col-xs-12">
    											<div class="form-group single-query">
												<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    <label for="exampleFormControlInput1">Name</label>
    												<input type="text" name="name" class="form-control name" id='name'
    													placeholder="Your Name">
    												<span id='spanname'>** Username is missing</span>
    											</div>
    										</div>

    										<div class="col-md-4 col-sm-4 col-xs-12">
    											<div class="form-group single-query">
    												<input type="email" name="email" class="form-control email"
    													placeholder="Your E-mail">
    												<span id='spanemail'>** Please enter valid email</span>
    											</div>
    										</div>

    										<div class="col-md-4 col-sm-4 col-xs-12">
    											<div class="form-group single-query">
    												<div class="input-group mb-2">
    													<div class="input-group-prepend">
    														<div class="input-group-text">+91</div>
    													</div>
    													<input type="text" name="contact" class="form-control contact"
    														placeholder="Your Contact Number">
															<span id='spanecontact' style='color:red;display:block'>** Enter valid mobile number</span>
    												</div>
    												
    											</div>
    										</div>
    									</div>

    									<div class="row">
    										<div class="col-md-12">
    											<div class="form-group single-query">
    												<textarea name="message" placeholder="Message"
    													class='form-control message' id="message" rows='7'></textarea>
    												<span id='spantext'>** Message is missing</span>
    											</div>
    										</div>
    									</div>

    									<div class="row">
    										<div class="col-md-12 top20">
    											<div class="form-group single-query">
    												<button type="submit" class="btn_fill" id="btn_submit"
    													name="btn_submit">Submit</button>
    											</div>
    										</div>

    									</div>
    								</form>
    							</div>
    							<div class="col-md-1 col-sm-1 col-xs-12"></div>

    							<div class="col-md-4 col-sm-5 col-xs-12">


    								<div class="col-lg-12">
    									<div class="section-header text-left bottom40">
    										<h2 class="text-uppercase text-left sub-heading">get in<span
    												class="color_red"> touch</span></h2>
    										<div class="line_1"></div>
    										<div class="line_2"></div>
    										<div class="line_3"></div>
    									</div>
    								</div>

    								<div class="agent-p-contact p-t-30">
    									<ul class="addressFooter addressfoot">
    										<li class="phone"><i class="fa-solid fa-phone"></i>
    											<p>+91 9076020306</p>
    										</li>
    										<li class="email"><i class="fa-solid fa-envelope"></i>
    											<p>support@otgcares.com</p>
    										</li>
    										<li><i class="fa-solid fa-location-dot"></i>
    											<p>2<sup>nd</sup> Floor, Haware Fantasia Business Park, Vashi, Navi
    												Mumbai 400703</p>
    										</li>


    									</ul>
    									<ul class="socials">
    										<li><a class="social-icons__link" href="#" target="_blank"><i
    													class="fa-brands fa-facebook-f"></i></a></li>
    										<li><a class="social-icons__link"
    												href="https://instagram.com/otg_cares?igshid=ZDdkNTZiNTM="
    												target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
    										<li><a class="social-icons__link"
    												href="https://www.linkedin.com/in/otg-cares-23b191229"
    												target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
    									</ul>
    								</div>

    							</div>
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-md-12">
    							<div class="col-lg-12">
    								<div class="section-header bottom40">
    									<h2 class="text-uppercase text-left sub-heading">Our <span class="color_red">
    											Location </span></h2>
    									<div class="line_1"></div>
    									<div class="line_2"></div>
    									<div class="line_3"></div>
    								</div>
    							</div>

    							<div class="contact">
    								<div id="map">
    									<iframe
    										src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120559.05607893599!2d72.94815434514896!3d19.21831589360046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bf9dffa2199b%3A0xa8ca187fdb6af995!2sOTGCares!5e0!3m2!1sen!2sin!4v1676096513401!5m2!1sen!2sin"
    										style="border:0;" allowfullscreen="" loading="lazy"
    										referrerpolicy="no-referrer-when-downgrade"></iframe>
    								</div>
    							</div>
    						</div>
    					</div>

    				</div>

    			</div>

    		</div>
    	</div>
    </div>
    </div>
    <!--End Body Content-->

    <!--Footer-->
