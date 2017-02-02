<?php get_header(); 

	$currentTag = $wp_query->queried_object;
	$postsArgs = array(
				'post_type' => 'portifolio',
				'tag_id' => $currentTag->term_id,
				'paged' => $_GET['pg']
			);
	$posts = new WP_Query( $postsArgs );

	// print_r($posts);
?>

	<main class="main">

		<div class="row">

			<div class="page-title l-breadcrumb column medium-12">
				<p class="page-title-text"><a href="<?php bloginfo('url') ?>/portifolio">Portifólio</a> &#10095; <span class="current"><?php echo $currentTag->name; ?></span></p>
			</div>

			<aside class="portfolio-menu column medium-3">
				<ul>
<?php  				$tags = get_tags();
					foreach ($tags as $t) { ?>
					<li class="<?php if($currentTag->term_id == $t->term_id){ ?>is-active<?php } ?>"><a href="<?php bloginfo('url'); ?>/tag/<?php echo $t->slug; ?>"><?php echo $t->name; ?></a></li>
<?php  				} ?>
				</ul>
			</aside>

			<section class="portfolio-list column medium-9">
<?php 		if ($posts->have_posts()) : while( $posts->have_posts() ) : $posts->the_post(); 
				if(get_the_post_thumbnail()) { ?>
				<article class="item">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<div class="item-info">
						<h2 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="item-tags"><?php the_tags('','<br>'); ?></p>
					</div>						
				</article>
<?php  			}
			endwhile; endif; ?>

			</section>

			<?php if (function_exists("pagination")) { pagination($posts->max_num_pages, true); } ?>
			
		</div>

	</main>
    
<?php get_footer(); ?>
