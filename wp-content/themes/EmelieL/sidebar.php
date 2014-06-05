<?php
/* The left hand sidebar, called with get_sidebar('left') in header.php */
?>

<div id="leftsidebar"class="widget-area" role="complementary">
    <ul class="xoxo">

        <?php if ( ! dynamic_sidebar( 'left-widget-area' ) ) : ?>
        <li>
            Hey buddy, you need some widget in here!
        </li>

        <?php endif; // end left widget area ?>

    </ul>
</div> <!-- #leftsidebar .widget-area -->