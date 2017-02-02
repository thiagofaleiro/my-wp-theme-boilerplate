<?php
/* Template Name: Equipe */
get_header(); ?>

	<main class="main">
<?php if (have_posts()) : the_post(); ?>

		<div class="row">

<?php include( locate_template('partials/sobre-breadcrumb.php') ); ?>

			<div class="page-menu column medium-3">
				<?php include( locate_template('partials/sobre-submenu.php') ); ?>
			</div>

			<section class="page-content column medium-8 medium-offset-1">

<?php 	if( get_field('equipe') ) : ?>
				<h2 class="page-section-title" style="margin-top: 0">Equipe</h2>

<?php 	$count = 0;
				while( has_sub_field('equipe') ) : $i++; $img = get_sub_field('equipe_photo'); ?>
				<article class="item-equipe">
					<?php if($img){ ?>
					<span class="item-equipe-thumb"><img src="<?php echo $img['sizes']['thumbnail']; ?>"></span>
					<?php } ?>

					<h2 class="item-equipe-title"><?php the_sub_field('equipe_title'); ?></h2>

					<?php if(get_sub_field('equipe_subtitle')){ ?>
					<p class="item-equipe-subtitle"><?php the_sub_field('equipe_subtitle'); ?></p>
					<?php } ?>

					<p class="item-equipe-text"><?php the_sub_field('equipe_text'); ?></p>
				</article>
<?php 	$count++;
				if (is_int($count / 2)) { echo '<span class="items-divisor"></span>'; }
?>
<?php 	endwhile;
			endif; ?>

			</section>

		</div>
		<?php endif; ?>
	</main>

<?php get_footer(); ?>
