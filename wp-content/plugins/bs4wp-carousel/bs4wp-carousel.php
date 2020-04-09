<?php
/**
 * @package BS4WP_Slider
 * @version 1.0.0
 */
/*
Plugin Name: BS4WP Slider
Plugin URI: http://wordpress.org/plugins/bs4wp-slider/
Description: Boostrap 4 Slider Shortcode Plugin.
Author: Hakik Zaman
Version: 1.0.0
Author URI: https://github.com/hakikz
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function bs4wp_load_textdomain(){
    load_plugin_textdomain( "bs4wp-slider", false, dirname(__FILE__)."/languages" );
}
add_action( "plugins_loaded", "bs4wp_load_textdomain" );


/**
 * ### Enqueue Scripts
 */

function bs4wp_asset(){
    // wp_enqueue_style( "bs4wp-css", plugin_dir_url( __FILE__ )."public/css/bootstrap.min.css", null, "4.4.1" );
    // wp_enqueue_script( "bs4wp-js", plugin_dir_url( __FILE__ )."public/js/bootstrap.min.js", array("jquery"), "1.0", true );
}
add_action( "wp_enqueue_scripts", "bs4wp_asset" );


/**
 * ### ShortCode Slider Container Block
 */
function bs4wp_shortcode_slider( $arguments, $content ) {
	$defaults  = array(
		'class'  => '',
		'id'     => '',
		'arrow' => 'no',
		'left_icon' => 'carousel-control-prev-icon',
		'right_icon' => 'carousel-control-next-icon',
		'dot'    => '',
	);
	
	$attributes = shortcode_atts( $defaults, $arguments );
	$content = do_shortcode( $content );

	/**
	 * ### Indicator Enable Condition
	 */
	if($attributes['dot'] != ''){
		$indicators = '<ol class="carousel-indicators">';
		for($i=0;$i<=$attributes['dot'];$i++){
			if($i == 0){
				$indicators .= '<li data-target="#'.$attributes['id'].'" data-slide-to="'.$i.'" class="active"></li>';
			}
			else{
				$indicators .= '<li data-target="#'.$attributes['id'].'" data-slide-to="'.$i.'"></li>';
			}
		}
		$indicators .= '</ol>';
	}

	/**
	 * ### Arrow Enable Condition
	 */
	if($attributes['arrow'] == 'yes'){
		$arrow_content = <<<EOD
		<a class="carousel-control-prev" href="#{$attributes['id']}" role="button" data-slide="prev">
			<span class="{$attributes['left_icon']}" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#{$attributes['id']}" role="button" data-slide="next">
			<span class="{$attributes['right_icon']}" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
EOD;
	}

	/**
	 * ### Slider Container
	 */
	$shortcode_output = <<<EOD
	<div id="{$attributes["id"]}" class="carousel slide {$attributes["class"]}" data-ride="carousel">
		{$indicators}
		<div class="carousel-inner">
			{$content}
		</div>
		{$arrow_content}
	</div>
EOD;
	return $shortcode_output;
}

add_shortcode( 'bs4slider', 'bs4wp_shortcode_slider' );


/**
 * ### ShortCode Slides Block
 */
function bs4wp_shortcode_slide( $arguments ) {
	$defaults   = array(
		'class'  => 'd-block w-100',
		'id'     => '',
        'size'   => 'large',
		'alt'    => '',
		'active' => '',
		'cap_class' => 'd-none d-md-block',
		'cap_title' => '',
		'cap_subtitle' => ''
	);
	$attributes = shortcode_atts( $defaults, $arguments );

	/**
	 * ### Condition for Caption
	 */

	//When Title and Subtitle not Blank 
	if($attributes['cap_title'] != '' && $attributes['cap_subtitle'] != ''){
		$caption = <<<EOD
		<div class="carousel-caption {$attributes['cap_class']}">
			<h5>{$attributes['cap_title']}</h5>
			<p>{$attributes['cap_subtitle']}</p>
		</div>
EOD;
	}
	//When Title not Blank but Subtitle Blank
	elseif($attributes['cap_title'] != '' && $attributes['cap_subtitle'] == ''){
		$caption = <<<EOD
		<div class="carousel-caption {$attributes['cap_class']}">
			<h5>{$attributes['cap_title']}</h5>
		</div>
EOD;
	}
	//When Title Blank but Subtitle not Blank
	elseif($attributes['cap_title'] == '' && $attributes['cap_subtitle'] != ''){
		$caption = <<<EOD
		<div class="carousel-caption {$attributes['cap_class']}">
			<h5>{$attributes['cap_title']}</h5>
		</div>
EOD;
	}else{
		$caption = "";
	}

	$image_src = wp_get_attachment_image_src($attributes['id'],$attributes['size']);

	$shortcode_output = <<<EOD
	<div class="carousel-item {$attributes['active']}">
		<img src="{$image_src[0]}" class="{$attributes['class']}" alt="{$attributes['alt']}">
		{$caption}
	</div>
EOD;
	return $shortcode_output;
}

add_shortcode( 'bs4slide', 'bs4wp_shortcode_slide' );
?>