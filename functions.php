<?php
// date_default_timezone_set('America/Sao_Paulo');
// setlocale(LC_TIME, 'pt_BR.UTF-8');

// POST TYPES
add_action( 'init', 'register_post_types' );
function register_post_types() {
	// Sobre: HISTORICO
	$labels = array(
		'name' => 'Histórico',
		'singular_name' => 'Histórico',
		'add_new' => 'Add Novo',
		'add_new_item' => 'Add Histórico',
		'edit_item' => 'Editar Histórico',
		'new_item' => 'Novo Histórico',
		'view_item' => 'Ver Histórico',
		'search_items' => 'Buscar Histórico',
		'not_found' => 'Nenhum Histórico encontrada',
		'not_found_in_trash' => 'Nenhum Histórico encontrado na lixeira',
		'parent_item_colon' => 'Parent Histórico:',
		'menu_name' => 'Histórico',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author'),
		'rewrite' => array(
			'slug'=>'historico',
			'with_front'=> false,
			'feed'=> true,
			'pages'=> true
		)
	);
	register_post_type( 'historico', $args );

	// PORTFOLIO
	$labels = array(
		'name' => 'Portifólio',
		'singular_name' => 'Portifólio',
		'add_new' => 'Add Novo',
		'add_new_item' => 'Add Portifólio',
		'edit_item' => 'Editar Portifólio',
		'new_item' => 'Novo Portifólio',
		'view_item' => 'Ver Portifólio',
		'search_items' => 'Buscar Portifólio',
		'not_found' => 'Nenhum Portifólio encontrada',
		'not_found_in_trash' => 'Nenhum Portifólio encontrado na lixeira',
		'parent_item_colon' => 'Parent Portifólio:',
		'menu_name' => 'Portifólio',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author'),
		'taxonomies' => array('post_tag'),
		'rewrite' => array(
			'slug'=>'portifolio',
			'with_front'=> false,
			'feed'=> true,
			'pages'=> true
		)
	);
	register_post_type( 'portifolio', $args );

	// CURSOS
	$labels = array(
		'name' => 'Curso',
		'singular_name' => 'Curso',
		'add_new' => 'Add Novo',
		'add_new_item' => 'Add Curso',
		'edit_item' => 'Editar Curso',
		'new_item' => 'Novo Curso',
		'view_item' => 'Ver Curso',
		'search_items' => 'Buscar Curso',
		'not_found' => 'Nenhum Curso encontrada',
		'not_found_in_trash' => 'Nenhum Curso encontrado na lixeira',
		'parent_item_colon' => 'Parent Curso:',
		'menu_name' => 'Cursos',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author'),
		'rewrite' => array(
			'slug'=>'cursos',
			'with_front'=> false,
			'feed'=> true,
			'pages'=> true
		)
	);
	register_post_type( 'curso', $args );

	// TEXTOS
	$labels = array(
		'name' => 'Texto',
		'singular_name' => 'Texto',
		'add_new' => 'Add Novo',
		'add_new_item' => 'Add Texto',
		'edit_item' => 'Editar Texto',
		'new_item' => 'Novo Texto',
		'view_item' => 'Ver Texto',
		'search_items' => 'Buscar Texto',
		'not_found' => 'Nenhum Texto encontrada',
		'not_found_in_trash' => 'Nenhum Texto encontrado na lixeira',
		'parent_item_colon' => 'Parent Texto:',
		'menu_name' => 'Textos',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author'),
		'rewrite' => array(
			'slug'=>'textos-e-reflexoes',
			'with_front'=> false,
			'feed'=> true,
			'pages'=> true
		)
	);
	register_post_type( 'texto', $args );

}

// TAXONOMIES
function create_taxonomies()
{
		// 1) Gêneros
		// $labels = array(
		// 		'name' => _x( 'Gêneros', 'taxonomy general name' ),
		// 		'singular_name' => _x( 'Gênero', 'taxonomy singular name' ),
		// 		'search_items' =>  __( 'Buscar Gênero' ),
		// 		'all_items' => __( 'Todos os Gêneros' ),
		// 		'parent_item' => __( 'Gênero Superior' ),
		// 		'parent_item_colon' => __( '' ),
		// 		'edit_item' => __( 'Editar Gênero' ),
		// 		'update_item' => __( 'Atualizar Gênero' ),
		// 		'add_new_item' => __( 'Adicionar Novo' ),
		// 		'new_item_name' => __( '' ),
		// 		'menu_name' => __( 'Gêneros' ),
		// );
		// register_taxonomy('genero',array('selo'), array(
		// 		'public' => true,
		// 		'hierarchical' => true,
		// 		'labels' => $labels,
		// 		'show_ui' => true,
		// 		'query_var' => true,
		// 		'rewrite' =>  false
		// 		//'rewrite' =>  array( 'slug' => 'genero', 'with_front'=> false)
		// ));
}
add_action( 'init', 'create_taxonomies', 0 );


// remove_action( 'wp_head', 'wp_generator' );
// remove_action( 'wp_head', 'wlwmanifest_link' );
//remove_action( 'wp_head', 'rsd_link' );
//remove_action( 'wp_head', 'feed_links', 2 );
//remove_action( 'wp_head', 'feed_links_extra', 3 );

// Add Capacidade de editar Tema ao usuario Editor
$editor = get_role('editor');
$editor->add_cap('edit_theme_options');


// CONFIGURACOES BASICAS
function my_setup() {
	global $template_url;

	add_theme_support( 'post-thumbnails' );

	// New image size
	add_image_size( 'xlarge', 960, 960, false);

	register_nav_menu('header_menu', 'Menu Principal');
	register_nav_menu('sobre_menu', 'Menu Sobre');
}
add_action( 'after_setup_theme', 'my_setup' );


// CUSTOMIZACAO > LOGO DO CLIENTE NO ADMIN
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() { ?>
<style type="text/css">
/* Login > background
body.login { background: url(<?php echo get_bloginfo( 'template_directory' ) ?>/img/background.jpg) repeat }*/
/* Login > logo */
body.login div#login h1 a {
	background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/assets/img/logo-versalete.png); background-position: bottom center; background-size: 100%; margin-left: auto; margin-right: auto;
	width: 237px; height: 145px;
}
/* Login bottom links */
.login #nav a, .login #backtoblog a { color: #0a48bf !important }
/* Login bottom links hover */
.login #nav a:hover, .login #backtoblog a:hover { color: #0a48bf !important }
/* Login button */
.wp-core-ui .button-primary { background: #0a48bf; border-color: #0a48bf; box-shadow:inset 0 1px 0 rgba(255,255,255,0.4) !important }
/* Login button hover */
.wp-core-ui .button-primary:hover { background: #2873f4; border-color: #2873f4; }
</style>
<?php }


// ESCONDER MENSAGEM DE ATUALIZACAO
// Somente para usuarios que nao sao ADMIN
add_action('admin_menu','hide_update_message');
function hide_update_message() {

	if ( !current_user_can('install_plugins') )
		remove_action( 'admin_notices', 'update_nag', 3 );

}


// WIDGETS > PARA O PLUGIN DE NEWSLETTER
// Remove os Widgets padrao
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
add_action('widgets_init', 'unregister_default_widgets', 11);


/////
// ADMIN WP > Ajustes no admin
////
// ADD CSS no Admin para editar itens da interface
function hide_admin_itens() { ?>
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
add_action('admin_head', 'hide_admin_itens');

// ADD SCRIPT AFTER JQUERY
// function my_jquery_script($hook) {
//     if(is_post_type('selo')){
//         wp_enqueue_script('custom_admin_script', get_bloginfo('template_url').'/js/title_letter_metadata.js', array('jquery'));
//     }
// }
// add_action('admin_enqueue_scripts', 'my_jquery_script');


function remove_menus () {
global $menu;
	$restricted = array(__('Comentários'),__('Posts'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');


// Muda ordem dos itens no menu do Admin
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	return array('index.php','edit.php?post_type=page','edit.php?post_type=historico','edit.php?post_type=portifolio','edit.php?post_type=curso','edit.php?post_type=texto');
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');


// Admin Dashboard > Remove items
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
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

///////
// END > ADMIN USER INTERFACE ADJUSTMENTS
///////


// MIDIA > EXIBIR DATA CORRETAMENTE
date_default_timezone_set('America/Sao_Paulo');
function midia_date($date){

	//echo date('M Y', strtotime($date));

	setlocale(LC_TIME, "ptb");
	echo strftime('%b %Y', strtotime($date));

}


/////
// FUNCOES UTEIS
////

// SITE TITLE > DINAMICO
function site_title( $separador = ' - ' ){

	global $post;

	$sep = $separador;

	if ( is_tax() ) {

		$term =  get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		$tax = get_taxonomy( get_query_var('taxonomy') );

		echo $term->name . $sep . $tax->labels->name . $sep;

	} else if ( is_tag() || is_category() ) {

		if( is_tag() )
			echo 'Tag: ';

		wp_title($sep, true, 'right');

	} else if ( is_page() && !is_front_page() ) {

		global $post;

		$parents = array_reverse(get_post_ancestors($post->ID));
		echo get_the_title($post->ID) . $sep;

		// Adiciona titulo das paginas pai
		foreach ($parents as $parent)
			echo get_the_title($parent) . $sep;

	} else if ( is_single() ) {

		// Exibir em qual taxonomia aquele post esta inserido - exibe apenas a primeira taxonomia e NAO todas
		$postTerms = wp_get_post_terms($post->ID, get_taxonomies());

		if ($postTerms){
			echo get_the_title() . $sep . $postTerms[0]->name . $sep;
		} else {
			echo get_the_title() . $sep;
		}

	} else {

		wp_title($sep, true, 'right');

	}

	// Titulo do site
	bloginfo('name');

}


// MY_EXCERPT > Resumo personalizado
// Ex: ...
// Parametros:
// 	- type > Conta por Palavras ou Caracteres
// 	- max > Numero de palavras ou caracteres
// 	- sufix > O que vira apos o texto
function my_excerpt($text, $type = "words", $max = 55, $sufix = "...")
{
	$text = str_replace('[...]', '', $text);

	if ($type == "words")
	{
		$words = split(" ",$text);
		$str = "";
		for ($i = 0; ($i < count($words) && $i < $max ); $i++)
		{
			$str .= $words[$i] . " ";
		}
	}
	else if ($type == "chars")
	{
		$str = "";
		$word = "";
		for ($i = 0; ($i < strlen($text) && $i < $max ); $i++)	{
			if ($text{$i} == " ") {
				$str .= $word . " ";
				$word = "";
			} else {
				$word .= $text{$i};
			}
		}
	}
	else { return "Erro!"; }

	$str .= ($str != '') ? $sufix : '';
	return $str;
}


//
// PAGINACAO > assim nao eh necessario usar plugin
//
function pagination($pages = '', $param = false, $range = 2, $prefixo = '')
{
	$showitems = ($range * 2)+1;

	global $wp_query;
	global $paged;

	if(isset($_GET['pg']) && $param == true){
		$paged = $_GET['pg'];
	}

	if(empty($paged)) $paged = 1;

	if($pages === '')
	{
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}

	function urlWithPrefix($prefixo, $pageNum){
		if($prefixo){
			return '?'.$prefixo.'&pg='.$pageNum;
		} else {
			return ($pageNum > 1) ? '?pg='.$pageNum : '.';
		}
	}

	if(1 != $pages)
	{
	 echo "<div class=\"pagination row-spacing-10\">";

	 if($paged > 1) {
		if(!$param && $paged-1 == 1){
			echo "<a href='.'>&#10094;</a>";
		} else {
			echo ($param) ? '<a class="arrow" href="'.urlWithPrefix($prefixo, $paged-1).'">&#10094;</a>' : '<a class="arrow" href="'.get_pagenum_link($paged - 1).'">&#10094;</a>';
		}
	 }

	 for ($i=1; $i <= $pages; $i++)
	 {
		 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
		 {
			 if($param && $i == 1 && !$prefixo) {
				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='.'>".$i."</a>";
			 } else if($param && $i == 1 && $prefixo) {
				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='?".$prefixo."'>".$i."</a>";
			 } else if($param && $prefixo) {
				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='?".$prefixo."&pg=".$i."'>".$i."</a>";
			 } else if($param) {
				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='?pg=".$i."'>".$i."</a>";
			 } else {
				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='".get_pagenum_link($i)."'>".$i."</a>";
			 }
		 }
	 }

	 if( $paged+$range+2 < $pages ) echo ($param) ? "<a href='".$prefixo."?pg=".($paged + $range + 1)."'>...</a>" : "<a href=\"".get_pagenum_link($paged + $range + 1)."\">...</a>";

	 if( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) echo ($param) ? "<a href='".$prefixo."?pg=".($pages)."'>".$pages."</a>" : "<a href=\"".get_pagenum_link($paged + 1)."\">".$pages."</a>";

	 if($paged < $pages){
	 	echo ($param) ? '<a class="arrow" href="'.urlWithPrefix($prefixo, $paged+1).'">&#10095;</a>' : '<a class="arrow" href="'.get_pagenum_link($paged + 1).'">&#10095;</a>';
	 }

	 echo "</div>\n";
	}
}


//
// TEMPLATE FUNCTIONS
//
function separateNames($namesArray, $namekey){
	$namesTotal = count($namesArray);
	$namesDivided = '';
	for ($i = 0; $i < count($namesArray); $i++) {
		if($i && $namesTotal > 1){
			$namesDivided .= ($i && $i+1 < $namesTotal) ? ', ' : ' e ';
		}
		$namesDivided .= ($namekey) ? $namesArray[$i][$namekey] : $namesArray[$i];
	}
	echo $namesDivided;
}
function cursoDate($start, $end){
	$date = '';
	if($start){
		$date .= date('d', strtotime($start));
		if(date('m', strtotime($start)) != date('m', strtotime($end))){
			$date .= ' de '.date_i18n('F', strtotime($start));
		}
		$date .= ' a ';
	}
	if($end){
		$date .= date_i18n('d \d\e F', strtotime($end));
		$date .= ' - '.date('Y', strtotime($end));
	}
	return $date;
}

//
// Admin > Lista anuncios > Melhorias
//




?>
