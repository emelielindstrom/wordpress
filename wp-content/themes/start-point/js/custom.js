/* 
 * Create HTML5 elements for IE's sake
 */

/* catch ie10 */
if (/*@cc_on!@*/false) {  
    document.documentElement.className+=' ie10';  
}
/* slider */
jQuery(window).load(function() {
    jQuery('ul.sf-menu').superfish();
  });
  
 /* scroll to top */
 jQuery(document).ready(function(){

	// hide #back-top first
	jQuery("#back-top").hide();
	
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 500) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		jQuery('#back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});

