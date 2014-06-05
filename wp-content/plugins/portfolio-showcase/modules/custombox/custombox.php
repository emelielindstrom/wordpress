<?php
 
 

function wpdm_qneue_custombox(){
    wp_enqueue_script("wpdm-custombox",PS_PLUGIN_URL.'/modules/custombox/src/jquery.custombox.js',array('jquery'));
    wp_enqueue_style("wpdm-custombox", PS_PLUGIN_URL.'/modules/custombox/src/jquery.custombox.css');
}

function wpdm_custombox_init(){
    ?>
    <script type="text/javascript">
     
	jQuery(function ($) {
    	$('.pm-popup').on('click', function ( e ) {
    		var url = this.href;    		 
        	$.fn.custombox( this, {
        url: url,		
        effect: 'slit'
    } );
        	e.preventDefault();
    	});
	});
    </script>

    <?php
}

add_action("wp_enqueue_scripts", "wpdm_qneue_custombox");
add_action("wp_head", "wpdm_custombox_init");

?>
