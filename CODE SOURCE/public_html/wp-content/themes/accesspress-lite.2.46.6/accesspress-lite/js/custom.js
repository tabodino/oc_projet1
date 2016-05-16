jQuery(document).ready(function(){
    
  jQuery(window).resize(function(){
  	console.log("width = "+jQuery(window).width());

  	if (jQuery('#content').length) {
  		
  		if (jQuery('#content').height() < 500) {
  			jQuery('#colophon').css({'position': 'fixed', 'width': '100%', 'bottom': 0});
  		}else {
  			jQuery('#colophon').css({'position': 'relative'});
  		}

  	}
  	

    jQuery('.slider-caption').each(function(){
    var cap_height = jQuery(this).actual( 'outerHeight' );
    jQuery(this).css('margin-top',-(cap_height/2));
    });
    }).resize();;
  
    jQuery('.testimonial-slider').bxSlider({
   controls:false,
   auto:true,
   mode:'fade',
   speed:1000
  });
  jQuery('.commentmetadata').after('<div class="clear"></div>');

  jQuery('.menu-toggle').click(function(){
    jQuery('#site-navigation .menu').slideToggle('slow');
  });
    
    jQuery('.thumbnail-gallery .gallery-item a').each(function(){
        jQuery(this).addClass('fancybox-gallery').attr('data-lightbox-gallery','gallery');
    });
    
    jQuery(".fancybox-gallery").nivoLightbox();
    jQuery(".image_feature_lightbox").nivoLightbox();
    
    jQuery('.search_one').click(function(){
         jQuery('.searchform').show();
         jQuery('.search_one').hide();
         
    });
 });
