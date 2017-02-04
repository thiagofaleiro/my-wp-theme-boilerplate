<?php
	global $utils;

	$site_title = $utils->site_title();
?>
<!DOCTYPE html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php echo $site_title; ?></title>

		<!-- SEO -->
		<meta name="description" content="<?php bloginfo('description'); ?>"/>
		<!-- <meta name="keywords" content=""/> -->

		<!-- Responsive -->
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>

		<!-- CSS -->
		<link href="<?php echo $utils->template_url; ?>/style.css<?php echo '?v='.filemtime(TEMPLATEPATH . '/style.css');  ?>" rel="stylesheet">

		<!-- Facebook - opengraph tags -->
		<!-- <meta property="og:title" content="<?php echo $site_title; ?>" />
		<meta property="og:url" content="<?php echo $utils->site_url; ?>" />
		<meta property="og:image" content="<?php echo $utils->template_url; ?>/assets/img/logo.png" />
		<meta property="og:description" content="" />
		<meta property="og:type" content="website" /> -->

		<?php if(!is_user_logged_in()){ ?>
			<!-- Google Analytics -->
			<!-- <script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				ga('create', 'UA-xxxxx', 'auto');
				ga('require', 'displayfeatures');
				ga('send', 'pageview');
			</script> -->
		<?php } ?>

		<?php wp_head(); ?>

	</head>

	<body class="">

		<header class="header clearfix">
			<div class="row">
				<div class="logo column medium-5">
					<?php if( is_home() || is_front_page() ) { ?>
						<h1><?php bloginfo('title') ?></h1>
					<?php } else { ?>
						<p><a href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a></p>
					<?php } ?>
				</div>

				<nav class="menu column medium-7">
					<?php
						wp_nav_menu( array(
							'theme_location'    => 'primary',
							'container'       	=> false,
							'menu_id'         	=> '',
							'menu_class' 	  	=> '',
							'depth'				=> 1
							)
						);
					?>
					<span class="icon-mobile"><span class="icon"></span></span>
				</nav>
			</div>
		</header>
