<?php
/*
Plugin Name: sxss Theme showcase
Plugin URI: http://sxss.nw.am
Description: Use a shortcode to display the screenshots of all installed wordpress themes. If you use Multisite, only activated themes will be displayed.
Author: sxss
Version: 0.2
*/

function sxss_theme_showcase( $atts )
{
	extract( shortcode_atts( array(
		'width' => 200,
		'quantity' => 0
	), $atts ) );

	$width = (int) $width;
	$quantity = (int) $quantity;

	$height = $width / 4 * 3;

	$themelist = wp_get_themes( array( 'allowed' => true ) );

	foreach( $themelist as $key => $value )
	{
		$path = $value->get_template_directory() . "/screenshot.png";

		if( true == file_exists( $path ) )
		{
			$name = $value->get("Name");

			$image = $value->get_template_directory_uri() . "/screenshot.png";

			$themearray[] = '<img alt="' . $name . '" title="' . $name . '" style="margin: 0 15px 15px 0; width: ' . $width . 'px; height: ' . $height . 'px;" id="sxss_theme_' . $key . '" class="sxss-themes-screenshot" src="' . $image . '"> ';
		}
	}

	$themes = "";

	$themes .= '<div id="sxss-theme-showcase">';

	if( 0 == $quantity )
	{
		$themes .= implode("", $themearray );
	}
	else
	{
		$amount_of_themes = sizeof( $themearray );

		$start = 0;
		
		$end = $start + $quantity;

		for( $i = $start; $i < $end && $i <= $amount_of_themes; $i++ )
		{
			$themes .= $themearray[$i];
		}
	}

	$themes .= '</div>';
	
	return $themes;
}

add_shortcode('themes','sxss_theme_showcase');

?>