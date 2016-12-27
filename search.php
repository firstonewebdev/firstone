<?php get_header(); ?>

<div id="container" class="container blog-min-height">
	
	<div class="row">

		<?php 
		
		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<?php get_template_part('content', 'search'); ?>
			
			<?php endwhile;
			
		endif;
				
		?>
		
	</div>

	<a class="return-glyph glyphicon glyphicon-arrow-left" href="<?php echo firstone_get_post_page_url(); ?>"></a>

</div>

<?php get_footer(); ?>