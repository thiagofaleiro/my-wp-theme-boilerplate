<?php
add_action('init', 'create_taxonomies', 0);
function create_taxonomies() {

    // 1) Subjects
		// $labels = array(
		// 		'name' => _x( 'Subjects', 'taxonomy general name' ),
		// 		'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
		// 		'search_items' =>  __( 'Buscar Subject' ),
		// 		'all_items' => __( 'Todos os Subjects' ),
		// 		'parent_item' => __( 'Subject Superior' ),
		// 		'parent_item_colon' => __( '' ),
		// 		'edit_item' => __( 'Editar Subject' ),
		// 		'update_item' => __( 'Atualizar Subject' ),
		// 		'add_new_item' => __( 'Adicionar Novo' ),
		// 		'new_item_name' => __( '' ),
		// 		'menu_name' => __( 'Subjects' ),
		// );
		// register_taxonomy('subject', array('post'), array(
		// 		'public' => true,
		// 		// 'hierarchical' => true,
		// 		'labels' => $labels,
		// 		'show_ui' => true,
		// 		'query_var' => true,
		// 		'rewrite' =>  false
		// 		// 'rewrite' =>  array( 'slug' => 'subject', 'with_front'=> false)
		// ));

}
?>
