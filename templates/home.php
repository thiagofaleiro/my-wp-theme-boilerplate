<?php
/* Template Name: Home */
get_header();
?>

	<main class="main">

			<div class="home-list row clearfix">

<?php $posts = get_field('posts');
			foreach ($posts as $post) {
				$postSize = $post['post_size'];
				$post = $post['post'][0];
				$thumbSize = ($postSize == "medium-12") ? 'xlarge' : 'large';
				$thumb = get_the_post_thumbnail($post->ID, $thumbSize);
				if($thumb || $post->post_type != 'curso') :
					$tags = get_the_tags($post->ID); ?>
				<article class="item column <?php echo $postSize; ?> <?php if($post->post_type == 'historico') echo 'l-caption'; ?>">
					<a class="item-wrap" href="<?php echo get_the_permalink($post->ID); ?>">
						<?php echo $thumb; ?>
						<div class="item-info">
							<h2 class="item-title"><?php echo $post->post_title; ?></h2>
<?php  				if($tags): $count = 0?><p class="item-tags"><?php
								foreach ($tags as $t) {
									echo ($count < 2) ? $t->name.'<br>' : '';
									$count++;
								}
							?></p><?php endif; ?>
						</div>
					</a>
				</article>
<?php elseif ($post->post_type == 'curso'): ?>
				<article class="item l-text column medium-4">
					<a class="item-wrap" href="<?php echo get_the_permalink($post->ID); ?>">
						<h2 class="item-title"><?php echo $post->post_title; ?></h2>
						<p class="item-type">Cursos</p>
						<p class="item-date"><?php echo cursoDate(get_field('curso_start', $post->ID), get_field('curso_end', $post->ID));?></p>
						<p class="item-text" data-more="Continuar lendo"><?php the_field('curso_excerpt', $post->ID); ?></p>
					</a>
				</article>
<?php endif;
		} ?>

			</div>

		</main>

<?php get_footer(); ?>
