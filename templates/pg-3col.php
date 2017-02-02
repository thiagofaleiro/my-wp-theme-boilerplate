<?php
/* Template Name: PG 3 Colunas */
get_header(); ?>

	<main class="main">
<?php if (have_posts()) : the_post(); ?>

		<div class="row">

<?php include( locate_template('partials/sobre-breadcrumb.php') ); ?>

			<div class="page-menu column medium-3">
				<?php include( locate_template('partials/sobre-submenu.php') ); ?>
			</div>

			<section class="page-content column medium-9">

<?php 	if (get_field('page_subtitle')) { ?>
				<h2 class="page-subtitle"><?php the_field('page_subtitle'); ?></h2>
<?php 	} ?>

				<div class="column medium-4 item-sobre">
					<h2 class="item-sobre-title <?php the_field('coluna1_color'); ?>"><?php the_field('coluna1_title'); ?></h2>
					<div class="item-sobre-text"><?php the_field('coluna1_text'); ?></div>
				</div>

				<div class="column medium-4 item-sobre">
					<h2 class="item-sobre-title <?php the_field('coluna2_color'); ?>"><?php the_field('coluna2_title'); ?></h2>
					<div class="item-sobre-text"><?php the_field('coluna2_text'); ?></div>
				</div>

				<div class="column medium-4 item-sobre">
					<h2 class="item-sobre-title <?php the_field('coluna3_color'); ?>"><?php the_field('coluna3_title'); ?></h2>
					<div class="item-sobre-text"><?php the_field('coluna3_text'); ?></div>
				</div>

<?php 	if ( $post->post_content ) : ?>
				<div class="column medium-12 item-sobre">
					<div class="item-sobre-text">
						<?php the_content(); ?>
					</div>
				</div>
<?php  	endif; ?>

			</section>

		</div>
		<?php endif; ?>
	</main>

<?php get_footer(); ?>
