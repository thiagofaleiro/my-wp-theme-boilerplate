<?php get_header();

	$template_directory = get_bloginfo('template_directory');
?>

		<main class="main">

			<?php if( get_field('destaques_texto') ) : while( has_sub_field('destaques_texto') ) : $i++; ?>
				<div class="grid-3 <?php if($i % 2 == 0) { echo 'middle'; } ?>">
					<h2 class="headline"><?php the_sub_field('destaque_titulo'); ?></h2>
					<p>
						<?php if ( get_sub_field('destaque_link') ) { ?><a href="<?php the_sub_field('destaque_link'); ?>"><?php } ?>
						<?php the_sub_field('destaque_texto'); ?>
						<?php if ( get_sub_field('destaque_link') ) { ?></a><?php } ?>
					</p>
				</div>
			<?php endwhile; endif; ?>

			<div class="home-list row clearfix">

				<article class="item column medium-4">
					<a class="item-wrap" href="portfolio-item.html">
						<img src="<?php echo $template_directory; ?>/assets/img/test/portfolio1.jpg">
						<div class="item-info">
							<h2 class="item-title">Contos ao redor da fogueira</h2>
							<p class="item-tags">Projeto gráfico<br></p>
						</div>
					</a>
				</article>

				<article class="item l-caption column medium-4">
					<a class="item-wrap" href="sobre-historico-item.html">
						<img src="<?php echo $template_directory; ?>/assets/img/test/bienal_lendo.jpg">
						<div class="item-info">
							<h2 class="item-title">Versalete na Bienal</h2>
						</div>
					</a>
				</article>

				<article class="item column medium-4">
					<a class="item-wrap" href="portfolio-item.html">
						<img src="<?php echo $template_directory; ?>/assets/img/test/portfolio2.jpg">
						<div class="item-info">
							<div class="item-info-wrap">
								<h2 class="item-title">Um dente de leite, um saco de ossinhos</h2>
								<p class="item-tags">Projeto gráfico<br> Ilustração</p>
							</div>
						</div>
					</a>
				</article>

				<article class="item l-text column medium-4">
					<a class="item-wrap" href="#">
						<h2 class="item-title">Elementos do estilo tipográfico</h2>
						<p class="item-type">Cursos</p>
						<p class="item-date">2 a 30 de Setembro</p>
						<p class="item-text" data-more="Continuar lendo">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
					</a>
				</article>

				<article class="item column medium-4">
					<a class="item-wrap" href="portfolio-item.html">
						<img src="<?php echo $template_directory; ?>/assets/img/test/ptf_08_pePraca_02.jpg">
						<div class="item-info">
							<h2 class="item-title">A pedra na praça</h2>
							<p class="item-tags">Projeto gráfico<br></p>
						</div>
					</a>
				</article>

				<article class="item column medium-4">
					<a class="item-wrap" href="portfolio-item.html">
						<img src="<?php echo $template_directory; ?>/assets/img/test/ptf_anjo_119.png">
						<div class="item-info">
							<h2 class="item-title">O anjo rebelde</h2>
							<p class="item-tags">Projeto gráfico</p>
						</div>
					</a>
				</article>

				<article class="item l-text column medium-4">
					<a class="item-wrap" href="#">
						<h2 class="item-title">Elementos do estilo tipográfico</h2>
						<p class="item-type">Cursos</p>
						<p class="item-date">2 a 30 de Setembro</p>
						<p class="item-text" data-more="Continuar lendo">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
					</a>
				</article>

			</div>

		</main>

<?php get_footer(); ?>
