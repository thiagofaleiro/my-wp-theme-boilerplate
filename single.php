<?php get_header(); ?>

		<main class="main">

			<div class="row">

				<div class="page-title l-breadcrumb column medium-12">
					<p class="page-title-text"><a href="<?php bloginfo('url') ?>/textos-e-reflexoes">Textos e Reflexões</a>  &#10095; <span class="current"><?php the_title(); ?></span></p>
				</div>

<?php 	if (have_posts()) : while (have_posts()) : the_post(); $thumb = get_the_post_thumbnail($post->ID, 'medium'); ?>
				<section class="column medium-12">

					<article class="post-item l-page textos-page <?php if(!$thumb){ echo 'l-no-thumb'; } ?>">

						<h1 class="post-item-title"><?php the_title(); ?></h1>

<?php  		$authors = get_field('texto_authors');
					if($authors) { ?>
						<p><strong><?php echo separateNames($authors,'author_name'); ?></strong></p>
<?php  		} ?>

						<span class="post-item-img"><?php echo $thumb; ?></span>

						<p class="post-item-text"><?php the_field('texto_excerpt'); ?></p>

<?php  					if(get_field('texto_file')){ ?>
						<p class="post-item-links"><a href="<?php the_field('texto_file'); ?>"><span class="icons-pdf"></span>Texto em aquivo PDF</a></p>
<?php 					} ?>

						<div class="post-item-content">
							<?php the_content(); ?>
						</div>

						<p class="post-item-foot">
							<a href="<?php bloginfo('url'); ?>/textos-e-reflexoes"> <span class="icon">&#10094;</span> índice de Textos & Reflexões disponíveis</a>
						</p>

					</article>

				</section>
<?php  			endwhile; endif; ?>

			</div>

		</main>

<?php get_footer(); ?>
