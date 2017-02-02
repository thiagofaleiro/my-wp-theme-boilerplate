<?php

// START A SESSION
add_action('init', 'startSession', 1);
function startSession() {
  if(!session_id()) {
    session_start();
  }
	// date_default_timezone_set('America/Sao_Paulo');
}

// POST TYPES
require_once( TEMPLATEPATH . '/functions/_config/post_types.php');

// TAXONOMIES
require_once( TEMPLATEPATH . '/functions/_config/taxonomies.php');

// SETUP
require_once( TEMPLATEPATH . '/functions/basic_setup.php');

// CUSTOMIZE ADMIN INTERFACE
require_once( TEMPLATEPATH . '/functions/customize_admin.php');


// HELPERS
//---------------------------------------------------------------

// Creating an object to attach theme helper methods on it
global $utils;
class utils {
	public function __call($method, $args)
	{
		if (isset($this->$method) === true) {
			$func = $this->$method;
			return call_user_func_array($func, $args);
		}
	}
}
$utils = new utils();

// Global helper variables
require_once( TEMPLATEPATH . '/functions/globals.php');

// Date format
require_once( TEMPLATEPATH . '/functions/_helpers/date_format.php');

// Site title
require_once( TEMPLATEPATH . '/functions/_helpers/site_title.php');

// Body tag classes
require_once( TEMPLATEPATH . '/functions/_helpers/body_classes.php');

// Text cut - most used on post excerpts (resumes)
require_once( TEMPLATEPATH . '/functions/_helpers/text_cut.php');

// Pagination without plugins
require_once( TEMPLATEPATH . '/functions/_helpers/pagination.php');

// Relative date (Human time - Months and Years)
require_once( TEMPLATEPATH . '/functions/_helpers/human_time.php');

// Slugify - transform a title into slug
require_once( TEMPLATEPATH . '/functions/_helpers/slugify.php');

// Page with the same slug of the current post type
require_once( TEMPLATEPATH . '/functions/_helpers/page_of_current_post_type.php');

// Get posts
require_once( TEMPLATEPATH . '/functions/_helpers/get_posts.php');


// AJAX REQUESTS ENDPOINTS
//---------------------------------------------------------------

// Send Contact
require_once( TEMPLATEPATH . '/functions/_endpoints/send_contact.php');

?>
