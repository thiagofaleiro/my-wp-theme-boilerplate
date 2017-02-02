<?php
// Basic theme configurations
add_action( 'after_setup_theme', 'my_setup' );
function my_setup() {
  // Define my timezone
  date_default_timezone_set('America/Sao_Paulo');

	// Add support to thumbnails
	add_theme_support( 'post-thumbnails' );

	// New image size
	add_image_size( 'xlarge', 1800, 2400, false);

	// Menus
	register_nav_menu('header_menu', 'Menu Principal');

	// Add Capacidade de editar Tema ao usuario Editor
	$editor = get_role('editor');
	$editor->add_cap('edit_theme_options');

  // Unregister tags taxononmy to clean dashboard options
	unregister_taxonomy_for_object_type('post_tag', 'post');
  // unregister_taxonomy_for_object_type('post_tag', 'video');
}

// Adding javascripts files
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts');
function my_enqueue_scripts(){
	// Adding scripts to footer with last update timestamp as version flag to avoid cache issues
	function add_script_to_footer($handle, $file_path){
		wp_enqueue_script( $handle, get_template_directory_uri() . $file_path, null, filemtime(TEMPLATEPATH . $file_path), true );
	}

	add_script_to_footer('theme-libs-script', '/assets/js/libs.min.js');
	add_script_to_footer('theme-main-script', '/assets/js/main.min.js');

	// Adding wp rest API auth cookie
	wp_localize_script( 'theme-main-script', 'wpApiSettings', array(
	    'root' => esc_url_raw( rest_url() ),
	    'nonce' => wp_create_nonce( 'wp_rest' )
	));
}
?>
