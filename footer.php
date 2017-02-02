<?php
	$homeID = get_page_by_path('home')->ID;
	$template_directory = get_bloginfo('template_directory');
?>
		<footer class="footer">
			<div class="row">

				<ul class="f-menu l-main column medium-3 small-6">
					<?php
						wp_nav_menu( array(
							'theme-location'    => 'primary',
							'container'       	=> false,
							'menu_id'         	=> '',
							'menu_class' 	  	=> '',
							'depth'				=> 1,
							'items_wrap' 		=> '%3$s'
							)
						);
					?>
				</ul>

				<ul class="f-menu column medium-4 small-6">
<?php  				$tags = get_tags();
					foreach ($tags as $t) { ?>
					<li><a href="<?php bloginfo('url'); ?>/tag/<?php echo $t->slug; ?>"><?php echo $t->name; ?></a></li>
<?php  				} ?>
				</ul>

				<div class="column medium-4 medium-offset-1 small-12">
					<?php the_field('footer_text', $homeID); ?>
					<p class="f-socialmedia">
<?php  				if(get_field('footer_fb', $homeID)){ ?><a href="<?php the_field('footer_fb', $homeID); ?>" target="_blank" class="icons-facebook">Facebook</a><?php } ?>
<?php  				if(get_field('footer_ig', $homeID)){ ?><a href="<?php the_field('footer_ig', $homeID); ?>" target="_blank" class="icons-instagram">Instagram</a><?php } ?>
<?php  				if(get_field('footer_lk', $homeID)){ ?><a href="<?php the_field('footer_lk', $homeID); ?>" target="_blank" class="icons-linkedin">Linkedin</a><?php } ?>
					</p>
				</div>

			</div>
		</footer>


		<!-- Javascript -->
		<script src="<?php echo $template_directory; ?>/build/js/libs.min.js"></script>
		<script src='<?php echo $template_directory; ?>/build/js/main.js'></script>

		<?php wp_footer(); ?>

	</body>

</html>
