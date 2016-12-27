<?php 
/*
	Template Name: Page No Title
*/
get_header(); ?>

	<!-- No title page -->

	<div id="container" class="container blog-min-height"  <?php firstone_background(); ?> >	
	
		<?php 
		
		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<h1>This is my Static Title</h1>
				
				<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
				
				<p><?php the_content(); ?></p>
			
			<?php endwhile;
			
		endif;
				
		?>
	
	</div>	

<?php get_footer(); ?>