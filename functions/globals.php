<?php
// Global helper variables
global $menu_items;

// Site url
$utils->site_url = get_bloginfo('url');

// Template url
$utils->template_url = get_bloginfo('template_directory');

// Activate google maps API: when you need to use maps field of ACF
// function my_acf_google_map_api( $api ){
// 	$api['key'] = 'AIzaSyBFzdRhZx4tc5JTtkoPIeKa2Bouh-H91Hk';
// 	return $api;
// }
// add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
?>
