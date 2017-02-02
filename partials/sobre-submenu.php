<?php
/*
 * The template partial to display breadcrumb on 'Sobre' pages and subpages
 */
	wp_nav_menu( array(
		'theme_location'	=> 'sobre_menu',
		'container'    		=> false,
		'menu_id'      		=> '',
		'menu_class' 	  	=> '',
		'depth'						=> 1
		)
	);
?>
<!-- <ul>
	<li><a href="<?php bloginfo('url'); ?>/sobre">Estúdio & Equipe</a></li>
	<li><a href="<?php bloginfo('url'); ?>/sobre/historico">Histórico & Registros</a></li>
</ul> -->
