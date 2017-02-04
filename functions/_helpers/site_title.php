<?php
  $utils->site_title = function( $separator = ' - ' ){
  	global $post;
    $title = '';

  	if ( is_tax() ) {
  		$term  =  get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
  		$tax   = get_taxonomy( get_query_var('taxonomy') );
  		$title = $term->name . $separator . $tax->labels->name . $separator;
  	}
    else if ( is_tag() || is_category() )
    {
      $prefix = (is_tag()) ? 'Tag: ' : '';
  		$title  = $prefix . wp_title($separator, false, 'right');
  	}
    else if ( is_page() && !is_front_page() )
    {
      $title   = get_the_title($post->ID) . $separator;
  		$parents = array_reverse(get_post_ancestors($post->ID));
  		// Adding title of parents pages
  		foreach ($parents as $parent)
  			$title .= get_the_title($parent) . $separator;
  	}
    else if ( is_single() )
    {
  		// Exibir em qual taxonomia aquele post esta inserido - exibe apenas a primeira taxonomia e NAO todas
  		$postTerms = wp_get_post_terms($post->ID, get_taxonomies());
      $postTerm  = ($postTerms) ? $postTerms[0]->name . $separator : '';
      $title     = get_the_title() . $separator . $postTerm;
  	}
    else
    {
  		$title = wp_title($separator, false, 'right');
  	}

  	// Website basic name
  	return $title . get_bloginfo('name');
  }
?>
