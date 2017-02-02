<?php

// WIDGETS
// Cleaning theme non suported widgets to avoid user errors
add_action('widgets_init', 'unregister_default_widgets', 11);
function unregister_default_widgets() {
	 unregister_widget('WP_Widget_Pages');
	 unregister_widget('WP_Widget_Calendar');
	 unregister_widget('WP_Widget_Archives');
	 unregister_widget('WP_Widget_Links');
	 unregister_widget('WP_Widget_Meta');
	 unregister_widget('WP_Widget_Search');
	 unregister_widget('WP_Widget_Text');
	 unregister_widget('WP_Widget_Categories');
	 unregister_widget('WP_Widget_Recent_Posts');
	 unregister_widget('WP_Widget_Recent_Comments');
	 unregister_widget('WP_Widget_RSS');
	 unregister_widget('WP_Widget_Tag_Cloud');
	 unregister_widget('WP_Nav_Menu_Widget');
	 unregister_widget('Twenty_Eleven_Ephemera_Widget');
}

// LOGIN PAGE > CUSTOM LOGO
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() { ?>
	<link rel='stylesheet' href='<?php echo get_bloginfo( 'template_directory' ) ?>/style.css' type='text/css' media='all' />
	<style type="text/css">
		/* Login > logo */
		body.login{
			background: #033852 !important;
		}
		body.login div#login h1 a {
			position: relative;
			font-family: 'fernandes-silva-icons';
			background-image: none;
			margin-left: auto;
			margin-right: auto;
			width: 250px;
			height: 70px;
			text-align: center;
		}
		body.login div#login h1 a:before {
			content: "\e902";
			display: inline-block;
			position: absolute;
			top: 30px;
			left: 0;
			font-size: 3em;
			text-indent: 0;
		}
		body.login a{
			color: rgba(255,255,255,0.5) !important;
		}
		body.login a:hover, body.login div#login h1 a:before{
			color: #daae74 !important;
		}
		/* Login bottom links */
		/*.login #nav a, .login #backtoblog a { color: #0a48bf !important }*/
		/* Login bottom links hover */
		/*.login #nav a:hover, .login #backtoblog a:hover { color: #0a48bf !important }*/
		/* Login button */
		/*.wp-core-ui .button-primary { background: #0a48bf; border-color: #0a48bf; box-shadow:inset 0 1px 0 rgba(255,255,255,0.4) !important }*/
		/* Login button hover */
		/*.wp-core-ui .button-primary:hover { background: #2873f4; border-color: #2873f4; }*/
	</style>
<?php }


// UPDATE MESSAGES
// Hide for no-Admin users
add_action('admin_menu','hide_update_message');
function hide_update_message() {
	if ( !current_user_can('install_plugins') )
		remove_action( 'admin_notices', 'update_nag', 3 );
}


// WELCOME PAGE
// Remove some default widgets to clean admin welcome interface
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
function remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}


// ADMIN: MENU
// change order of menu admin items
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	return array(	'index.php',
								'edit.php?post_type=page',
								'edit.php?post_type=editoriais',
								'edit.php?post_type=noticias',
								'edit.php?post_type=ensaios-juridicos',
								'edit.php?post_type=clientes');
}
// remove menu items
add_action('admin_menu', 'remove_menus');
function remove_menus () {
	global $menu;
	$restricted = array(__('Comentários'), __('Posts'));
	end($menu);
	while (prev($menu)){
		$value = explode(' ', $menu[key($menu)][0]);
		if( in_array($value[0] != NULL ? $value[0] : "" , $restricted) ){
			unset($menu[key($menu)]);
		}
	}
}


// ADMIN INTERFACE
// CSS to adjust some admin interface elements
function style_admin_itens() { ?>
	<style type="text/css">
		.acf_postbox .inside{ overflow: hidden; }
		.acf_postbox .inside *{ box-sizing: border-box; }
		/* Cursos - Pg de edicao */
		#acf-curso_start, #acf-curso_end, #acf-curso_time, #acf-curso_edition, #acf-curso_long, #acf-curso_local{
			display: inline-block; width: 45%; padding: 0 10px; margin: 0 5px 20px;
		}
		body .acf-tab_group-hide{
			display: none !important;
		}
	</style>
<?php
}
add_action('admin_head', 'style_admin_itens');

// ADMIN SCRIPT
// Add script after jquery load
// function my_jquery_script($hook) {
//     if(is_post_type('selo')){
//         wp_enqueue_script('custom_admin_script', get_bloginfo('template_url').'/js/title_letter_metadata.js', array('jquery'));
//     }
// }
// add_action('admin_enqueue_scripts', 'my_jquery_script');
?>
