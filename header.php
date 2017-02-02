<?php
	if(is_page('newsletter') && isset($_GET['nm']) && $_GET['nm'] != 'profile'){ echo json_encode($_GET['nm']); die; }
	$homeID = '5';

	$template_directory = get_bloginfo('template_directory');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" xmlns:fb="http://ogp.me/ns/fb#"> <!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php site_title(); ?></title>

		<!-- SEO -->
		<meta name="description" content="<?php bloginfo('description'); ?>"/>
		<!-- <meta name="keywords" content=""/> -->

		<!-- Responsive -->
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>

		<!-- CSS -->
		<link href="<?php echo $template_directory; ?>/assets/js/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="<?php echo $template_directory; ?>/assets/css/screen.css" rel="stylesheet">

		<!-- Facebook -->
		<meta property="og:title" content="<?php site_title(); ?>" />
		<meta property="og:url" content="<?php bloginfo('url'); ?>" />
		<meta property="og:image" content="<?php echo $template_directory; ?>/assets/img/logo-versalete.png" />
		<!-- <meta property="og:description" content="" /> -->
		<meta property="og:type" content="website" />

		<!-- Modernizr -->
		<script src="<?php echo $template_directory; ?>/assets/js/lib/modernizr-2.6.2.min.js"></script>

		<?php if(!is_user_logged_in()){ ?>
		<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-93514307-1', 'auto');
			ga('require', 'displayfeatures');
			ga('send', 'pageview');
		</script>
		<?php } ?>

		<?php wp_head(); ?>

	</head>

	<body class="<?php if(is_home() || is_front_page() || is_page('home')){ echo 'home'; } ?>">

		<!-- <div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script> -->

		<header class="header clearfix">
			<div class="row">
				<div class="logo column medium-5">
					<?php if(is_home()) { ?>
						<h1><img src="<?php echo $template_directory; ?>/assets/img/logo-versalete.png" width="372" height="110" alt="<?php bloginfo('title'); ?>"></h1>
					<?php } else { ?>
						<p><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $template_directory; ?>/assets/img/logo-versalete.png" width="372" height="110" alt="<?php bloginfo('title'); ?>"></a></h1>
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
