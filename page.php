<?php get_header(); ?>

		<main class="main">
			<div class="row">
<?php 	if (have_posts()) : while (have_posts()) : the_post();
				$thumb = get_the_post_thumbnail($post->ID, 'medium'); ?>

				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>

<?php  	endwhile; endif; ?>
			</div>
		</main>

<?php get_footer(); ?>
