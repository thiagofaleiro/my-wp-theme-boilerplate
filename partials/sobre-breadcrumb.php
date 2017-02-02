<?php
/*
 * The template partial to display breadcrumb on 'Sobre' pages and subpages
 */
			$current_url = get_permalink();
			$current_menu_item = array_filter(wp_get_nav_menu_items('Menu Sobre'), function($item) use ($current_url){
															return ($item->url == $current_url) ? true : false;
														});
			$current_menu_item = array_shift( $current_menu_item ); ?>
			<div class="page-title l-breadcrumb column medium-12">
				<p class="page-title-text">
					<a href="<?php bloginfo('url'); ?>/sobre">Sobre</a>
<?php 		if($current_menu_item) { ?>&#10095; <span class="current"><?php echo $current_menu_item->title; ?></span><?php } ?>
				</p>
			</div>
