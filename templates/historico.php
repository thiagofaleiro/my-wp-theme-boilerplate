<?php
/* Template Name: Historico */
get_header();

	function getMonthObj($year, $month){
		$month = $year.'-'.$month.'-01';
		$month = strtotime($month);
		$monthObj = array(
					'name' 		=> date_i18n('F', $month),
					'number' 	=> date('m', $month),
					'year' 		=> date('Y', $month),
					'url' 		=> date('?\a\n\o=Y&\m\e\s=m', $month)
				);
		return $monthObj;
	}
	function getMonth($posts = '', $direction = 'before'){
		$order = ($direction == 'after') ? 'ASC' : 'DESC';
		$args = array(
				'post_type' => 'historico',
				'posts_per_page' => 1,
				'order' => $order
			);
		if($posts){
			$postDate = $posts[0]->post_date;
			$args['date_query'] = array(
				array(
					$direction => array(
						'year'  => date('Y', strtotime($postDate)),
						'month' => date('m', strtotime($postDate))
					)
				)
			);
		}
		$firstPostofMonth = new WP_Query( $args );
		$firstPostofMonth = $firstPostofMonth->posts;

		if($firstPostofMonth){
			$postDate = $firstPostofMonth[0]->post_date;
			$month = getMonthObj(date('Y', strtotime($postDate)),date('m', strtotime($postDate)));
			return $month;
		} else {
			return false;
		}

	}

	if(isset($_GET['ano']) && isset($_GET['mes'])){
		$year 	= $_GET['ano'];
		$month 	= $_GET['mes'];
		$currentMonth = getMonthObj($year, $month);
	} else {
		$currentMonth = getMonth();
		$year = $currentMonth['year'];
		$month = $currentMonth['number'];
	}

	// Get Posts for the Current Month
	$postType = 'historico';
	$postsArgs = array(
				'post_type' => $postType,
				'posts_per_page' => '-1',
				'year' => $year,
				'monthnum' => $month
			);
	$posts = new WP_Query( $postsArgs );

	// Get Next and Previous Month Objects
	$monthBefore = getMonth($posts->posts);
	$monthAfter = getMonth($posts->posts, 'after');

?>
	<main class="main">
		<div class="row">

			<?php include( locate_template('partials/sobre-breadcrumb.php') ); ?>

			<div class="page-menu column medium-3">
				<?php include( locate_template('partials/sobre-submenu.php') ); ?>
			</div>

			<section class="page-content column medium-8 medium-offset-1">

				<div class="page-date-nav">
					<?php if($monthBefore) { ?><a class="arrow" href="<?php echo $monthBefore['url']; ?>">&#10094;</a><?php } ?>
					<p><?php echo $currentMonth['name'].' '.$currentMonth['year']; ?></p>
					<?php if($monthAfter) { ?><a class="arrow" href="<?php echo $monthAfter['url']; ?>">&#10095;</a><?php } ?>
				</div>

<?php if ($posts->have_posts()) :
				while ($posts->have_posts()) : $posts->the_post(); ?>
				<article class="item-historico">
					<h2 class="item-historico-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo strtolower(get_the_time('d/M/Y')); ?></p>
				</article>
<?php  	endwhile;
			else :
				echo '<br><br><p>Nenhum item publicado até o momento</p>';
			endif; ?>

			</section>

		</div>

		<?php if (function_exists("pagination")) { pagination($posts->max_num_pages,true); } ?>

	</main>

<?php get_footer(); ?>
