<span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
 <!-- Including Jquery -->
  <script src="<?php echo base_url();?>assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/vendor/jquery.cookie.js"></script>
     <script src="<?php echo base_url();?>assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
     <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/lazysizes.js"></script>
     <script src="<?php echo base_url();?>assets/js/main.js"></script>
     <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" ></script> -->
     <!--For Newsletter Popup-->
     <script>
		jQuery(document).ready(function(){  
		  jQuery('.closepopup').on('click', function () {
			  jQuery('#popup-container').fadeOut();
			  jQuery('#modalOverly').fadeOut();
		  });
		  
		  var visits = jQuery.cookie('visits') || 0;
		  visits++;
		  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
		  console.debug(jQuery.cookie('visits')); 
		  if ( jQuery.cookie('visits') > 1 ) {
			jQuery('#modalOverly').hide();
			jQuery('#popup-container').hide();
		  } else {
			  var pageHeight = jQuery(document).height();
			  jQuery('<div id="modalOverly"></div>').insertBefore('body');
			  jQuery('#modalOverly').css("height", pageHeight);
			  jQuery('#popup-container').show();
		  }
		  if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
		}); 
		
		jQuery(document).mouseup(function(e){
		  var container = jQuery('#popup-container');
		  if( !container.is(e.target)&& container.has(e.target).length === 0)
		  {
			container.fadeOut();
			jQuery('#modalOverly').fadeIn(200);
			jQuery('#modalOverly').hide();
		  }
		});
		
		/*--------------------------------------
			Promotion / Notification Cookie Bar 
		  -------------------------------------- */
		  if(Cookies.get('promotion') != 'true') {   
			 $(".notification-bar").show();         
		  }
		  $(".close-announcement").on('click',function() {
			$(".notification-bar").slideUp();  
			Cookies.set('promotion', 'true', { expires: 1});  
			return false;
		  });
	</script>