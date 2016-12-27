<?php get_header(); ?>

	<!-- Default page -->
				
	<div id="container" class="container blog-min-height" <?php firstone_background(); ?>>

		<div class="row">
		
			<div class="content-container col-md-9 col-sm-push-3"">	
				<?php 
			
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>

						<h1 class="title-banner"><?php the_title();?></h1>
						<div class="default-content"><?php the_content();?></div>

					<?php endwhile;
				endif;
			
				?>

			</div>
			
			<div class="col-md-3 col-sm-pull-9">	
				<?php get_sidebar(); ?>
			</div>
		</div>
		
	</div>
	
<?php get_footer(); ?>
