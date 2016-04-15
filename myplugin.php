<?php
/*
 Plugin Name: My Plugin
*/

add_filter( 'show_admin_bar', '__return_false' );

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes = array() ) {
	// add your extension to the array
	$existing_mimes['epub'] = 'application/octet-stream';
	return $existing_mimes;
}

function donate_shortcode( $atts, $content = null) {
	global $post;
	extract(shortcode_atts(array(
		'account' => 'your-paypal-email-address',
		'for' => $post->post_title,
		'onHover' => '',
	), $atts));
	if(empty($content)) $content='Make A Donation';
		return '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation for '.$for.'" title="'.$onHover.'">'.$content.'</a>';
}
add_shortcode('donate', 'donate_shortcode');

add_filter('widget_text', 'do_shortcode');