<!-- *** Footer Sidebar Starts *** -->
<?php get_sidebar('footer'); ?>
<!-- *** Footer Sidebar Ends *** -->

<!-- *** Footer Copyright Starts *** -->
<div class="footer-copyright-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="footer-copyright">
				<?php if (startpoint_get_option('startpoint_footertext') != '') { ?>
                    <p><?php echo startpoint_get_option('startpoint_footertext'); ?></p>
					<?php } else { ?>
                    <p><a href="http://www.inkthemes.com">StartPoint Theme</a> Powered By <a href="http://www.wordpress.org"> WordPress</a></p>
					<?php } ?>
                </div>
            </div>

            <div class="col-md-7">
                <div class="footer-menu nav-collapse">
                    <?php startpoint_footer_nav() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- *** Footer Copyright Ends *** -->

<!-- Include the wookmark plug-in -->
<script type="text/javascript">
    jQuery(function() {
        var $menu = jQuery('nav#mm-menu'),
                $html = jQuery('html, body');

        $menu.mmenu();
        $menu.find('li > a').on(
                'click',
                function()
                {
                    var href = jQuery(this).attr('href');

                    //	if the clicked link is linked to an anchor, scroll the page to that anchor 
                    if (href.slice(0, 1) == '#')
                    {
                        $menu.one(
                                'closed.mm',
                                function()
                                {
                                    setTimeout(
                                            function()
                                            {
                                                $html.animate({
                                                    scrollTop: jQuery(href).offset().top
                                                });
                                            }, 10
                                            );
                                }
                        );
                    }
                }
        );
    });
</script>
<script>
// Prevent console.log from generating errors in IE for the purposes of the demo
    if (!window.console)
        console = {log: function() {
            }};

// The actual plugin
    jQuery('.single-page-nav').singlePageNav({
        offset: jQuery('.single-page-nav').outerHeight(),
        filter: ':not(.external)',
    });
	
//scroll effect
jQuery(document).ready(function () {

    var animated_element = jQuery('.animated');

    function image_animation() {
        animated_element.each(function () {
            var get_offset = jQuery(this).offset();
            if (jQuery(window).scrollTop() + jQuery(window).height() > get_offset.top + jQuery(this).height() / 2) {
                jQuery(this).addClass('animation_started');
                setTimeout(function () {
                    jQuery(this).removeClass('animated').removeAttr('style');
                }, 300);
            }
        });
    }

    jQuery(window).scroll(function () {
        image_animation();
    });

    jQuery(window).load(function () {
        setInterval(image_animation, 300);
    });

	jQuery('#tiles li').hover(function() {
   jQuery(this).find('.wook-hover-button').show();
   jQuery(this).find('.post-thumb').css("opacity", "0.7");
}, function() {
   jQuery(this).find('.wook-hover-button').hide();
    jQuery(this).find('.post-thumb').css("opacity", "1");
});
	
});

</script>
<?php wp_footer(); ?>
</body>
</html>