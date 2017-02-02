<?php get_header(); ?>
	
		<div class="content">
			
			<div class="page-text">

				<h1 class="page-title">Resultado de Busca</h1>

				<?php if (have_posts()) : ?>

				<div class="search-info">
					<h3>Você buscou por "<?php echo get_search_query(); ?>".</h3>
					<p>Foram encontrados <strong>
						<?php $search_count = 0;		
			                $search = new WP_Query("s=$s & showposts=-1");
			                if($search->have_posts()) : while($search->have_posts()) : $search->the_post();
			                	$search_count++;
			                endwhile; endif;			
			                echo $search_count; ?> resultado<?php if($search_count > 1) echo 's'; ?>.</strong>
			        </p>
				</div>

				<div class="archive-list">
					<?php while( have_posts() ) : the_post(); ?>
					<article class="item">
						<a href="<?php the_permalink(); ?>">
							<h1><?php the_title(); ?></h1>
							<p><?php the_excerpt(); ?></p>
							<p class="link-more"><a href="<?php the_permalink(); ?>">[Leia mais]</a></p>
						</a>
					</article>
					<?php endwhile; ?>
				</div>
				
				<?php else : ?>
				<p>Você buscou por <strong>"<?php echo get_search_query(); ?>"</strong>.</p>
				<p>Infelizmente nenhum item foi encontrado.</p>
				<?php endif; ?>
				
				<!--Paginacao-->
				<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>

			</div>

		</div>
		
		<?php get_sidebar(); ?>
    
<?php get_footer(); ?>
