<?php
register_sidebar( array(
    'name' => __('Left Widget Area', 'twentytwelve'),
    'id' => 'left-widget-area',
    'description' => __('The left hand sidebar widget area',
        'twentytwelve' ),
    'before_widget' => '<li id="%1$s" class="widget-container%2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
));
?>

