<?php
  global $utils;

  $utils->get_posts = function($post_type, $page = 1, $per_page, $search = '', $order = 'DESC') use ($set_per_page_by_post_type)
  {
    global $post;

    $args = array(
  		'post_type' 			=> $post_type,
  		'order'						=> $order,
  		'posts_per_page' 	=> $per_page,
      'paged'           => $page,
      's'               => $search
  	);

    $query = new WP_Query($args);
    $posts = $query->posts;

    $posts = array_map( function($post){
      $post_excerpt = ($post->post_excerpt) ? $post->post_excerpt : $post->post_content;
      return (object)array(
        'ID'           => $post->ID,
        'post_title'   => $post->post_title,
        'post_excerpt' => $GLOBALS['utils']->text_cut($post_excerpt, 220, 'chars'),
        'post_content' => apply_filters('the_content', $post->post_content),
        'post_date'    => $post->post_date,
        'post_date_formated' => $GLOBALS['utils']->date_format($post->post_date, '%d de %B de %Y')
      );
    }, $posts);

    $posts = (object)array(
      'posts' => $posts,
      'page'  => $page,
      'max_num_pages' => $query->max_num_pages,
      'total' => intval($query->found_posts),
      'search_query' => $search
    );

    return $posts;
  };
?>
