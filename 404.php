<?php get_header(); ?>
<style>

.header-image-wrapper {
	display: none;
}

</style>

	<!-- 404 template -->

	<div id="container" class="container" <?php firstone_background(); ?>>
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
			
				<head class="page-header">
					<h1 class="page-title title-banner">Ooops, page not found !</h1>
				</head>
				
				<div class="default-content">
					
					<h4 style="margin-top:50px; margin-bottom:30px;">It looks like nothing was found at this location. Maybe try one of the links below or a search?</h4>
					
					<?php   
						$args = array (	'before_title'  => '<h3 class="widget-title-404">',
        								'after_title'   => '</h3>', );
					?>

					<?php the_widget('WP_Widget_Recent_Posts',array(),$args); ?>
					
					<div class="widget widget_categories">
						<h3 class="widget-title-404">Most used categories</h3>
						<ul>
							<?php 
								wp_list_categories ( array(	'orderby' => 'count',
															'order' => 'DESC',
															'show_count' => 1,
															'title_li' => '',
															'number' => 5, ) );
							?>
						</ul>
					</div>
					
					<?php the_widget('WP_Widget_Archives',array(),$args); ?>
					
				</div>
				
				<a class="return-glyph glyphicon glyphicon-arrow-left" href="<?php echo firstone_get_post_page_url(); ?>"></a>
				
			</section>
		</main>
	</div>

<?php get_footer(); ?>