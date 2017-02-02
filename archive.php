<?php get_header();

	$today = date('Ymd');
	$historico = (isset($_GET['l']) && $_GET['l'] == 'historico') ? true : false;
	if($historico){
		$compare = '<';
		$order = 'DESC';
	} else {
		$compare = '>=';
		$order = 'ASC';
	}
	$postsArgs = array(
				'post_type' => 'curso',
				'orderby'   => 'meta_value_num',
				'meta_key'  => 'curso_end',
				'order' 	=> $order,
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key'     => 'curso_end',
						'value'   => $today,
						'compare' => $compare,
					),
				),
				'paged' => $_GET['pg']
			);
	$posts = new WP_Query( $postsArgs );
?>

	<main class="main">

		<article class="row">

			<div class="page-title l-breadcrumb column medium-12">
				<h1 class="page-title-text"><span>Cursos</span> &#10095; <span class="current"><?php echo ($historico) ? 'Histórico' : 'Programação'; ?></span>
			</div>

			<aside class="page-menu column medium-3">
				<ul>
					<li><a href="<?php bloginfo('url'); ?>/cursos/" class="<?php if (!$historico) echo 'is-active'; ?>">Programação</a></li>
					<li><a href="<?php bloginfo('url') ?>/cursos?l=historico" class="<?php if ($historico) echo 'is-active'; ?>">Histórico</a></li>
				</ul>
			</aside>

			<section class="column medium-9">
<?php
		if ($posts->have_posts()) :
			while( $posts->have_posts() ) : $posts->the_post();
				$start 	= get_field('curso_start');
				$end 	= get_field('curso_end'); ?>

				<article class="post-item">
					<h2 class="post-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><strong><?php echo cursoDate($start, $end); ?></strong> <?php if(get_field('curso_edition')){ echo '['.get_field('curso_edition').']'; } ?><br><!--Cristina aletrou regra => p strong-->
						<strong><?php the_field('curso_time'); ?></strong><br>
					</p>

<?php  		$professores = get_field('curso_professores');
					if($professores) { ?>
					<p>com: <b><?php echo separateNames($professores,'professor_name'); ?></b></p>
<?php  				} ?>

					<p class="post-item-text"><?php the_field('curso_excerpt'); ?></p>
<?php 				$photo = get_field('curso_photo');
					if($photo) { ?>
					<span class="post-item-img"><img src="<?php echo $photo['sizes']['medium']; ?>"></span>
<?php 				} ?>
					<p class="post-item-links">
						<a href="<?php the_permalink(); ?>">Saiba mais</a>
<?php  					if(get_field('curso_subscribe')){ ?><a class="l-inscricao" href="<?php the_field('curso_subscribe'); ?>">Inscreva-se</a><?php } ?>
					</p>
				</article>

<?php endwhile;
		else :
			if($historico){
				echo '<p>Não há cursos no histórico até o momento.';
			} else {
				echo '<p>Não há cursos a serem realizados. Verifique nosso <a href="'.get_bloginfo('url').'/cursos/?l=historico">histórico de cursos</a>.</p>';
			}
		endif; ?>
<?php
			if (function_exists("pagination")) {
				$paginationPrefix = ($historico) ? 'l=historico' : '';
				pagination($posts->max_num_pages, true, 2, $paginationPrefix);
			} ?>

			</section>

		</article>

	</main>

<?php get_footer(); ?>
