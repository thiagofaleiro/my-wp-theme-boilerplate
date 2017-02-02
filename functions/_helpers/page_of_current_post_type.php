<?php
  // Retrieve the page that has the same slug of the current post type
  $utils->current_post_type_page_id = function($post){
    $post_type_not_in   = array('post','page');
    $current_post_type  = ( !in_array($post->post_type, $post_type_not_in) ) ? $post->post_type : false;
    return ($current_post_type) ? get_page_by_path($current_post_type) : null;
  };
?>
