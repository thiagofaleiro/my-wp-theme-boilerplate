<?php
  // CSS Classes to add to body tag
  $utils->body_classes = function(){
    $classes = array();
    if( is_user_logged_in() )
      $classes[] = 'is-user-logged';
    if( is_home() || is_front_page() )
      $classes[] = 'is-home';
    return implode(' ', $classes);
  };
?>
