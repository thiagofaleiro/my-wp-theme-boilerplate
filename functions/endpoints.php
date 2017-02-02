<?php

// Endpoint example
// Listing all page > List
add_action( 'rest_api_init', function () {
	register_rest_route( 'theme/v1', '/editoriais', array(
		'methods' => 'GET',
		'callback' => 'news_callback',
	) );
}, 10 );
function news_callback( WP_REST_Request $request ){
  $params   = $request->get_params();
	$page     = $params['page'];
  $per_page = $params['per_page'];
	$search 	= $params['search'];

  $posts = $GLOBALS['utils']->get_posts('news', $page, $per_page, $search);

	// Returning json
  return rest_ensure_response($posts);
}

?>
