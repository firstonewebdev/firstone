<?php
/*
	Template Name: Full Width
*/
get_header(); ?>

	<div id="container" class="container blog-min-height" <?php firstone_background(); ?> >	

		<?php 
		
		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<h1 class="title-banner"><?php the_title(); ?></h1>
				<div class="default-content"><?php the_content(); ?></div>
							
			<?php endwhile;
			
		endif;

		// add contact page
		$post = get_page_by_path('contact'); ?>
		<!--
		<div id="contact-page"></div>
		<h1 class="title-banner"><?php echo get_the_title($post); ?></h1>
		<div class="default-content"><?php echo apply_filters('the_content', $post->post_content); ?></div>
		-->
	</div>
	
<?php get_footer(); ?>