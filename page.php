<?php get_header(); ?>

		<main class="main">

			<div class="row">

				<!-- <div class="page-title l-breadcrumb column medium-12">
					<p class="page-title-text"><a href="textos.html">Textos e Reflexões</a>  &#10095; <span class="current"><?php the_title(); ?></span></p>
				</div> -->

<?php 		if (have_posts()) : while (have_posts()) : the_post(); ?>
				<section class="column medium-12">

					<article class="post-item l-page textos-page <?php if(!get_the_post_thumbnail()){ echo 'l-no-thumb'; } ?>">
						
						<h1 class="post-item-title"><?php the_title(); ?></h1>
						
						<span class="post-item-img"><?php the_post_thumbnail(); ?></span>

						<div class="post-item-content">
							<?php the_content(); ?>
						</div>

					</article>

				</section>
<?php  			endwhile; endif; ?>

			</div>

		</main>

<?php get_footer(); ?>