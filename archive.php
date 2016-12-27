<?php get_header(); ?>
<style>

.header-image-wrapper {
	display: none;
}

</style>

	<!-- Archive template -->

	<div id="container" class="container blog-min-height" <?php firstone_background(); ?>>
		

		<?php if( have_posts() ): ?>
			
			<header class="page-header">
				<?php 
					the_archive_title ( '<h1 class="page-title">', '</h1>' );
					the_archive_description ( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
			
			<?php while( have_posts() ): the_post(); ?>
				
				<?php get_template_part('content', 'archive'); ?>
			
			<?php endwhile; ?>
				
			<div class="Xcol-xs-12 text-center">
				<?php the_posts_navigation(); ?>
			</div>
			
			<?php endif; ?>
			
			<a class="return-glyph glyphicon glyphicon-arrow-left" 
				href="<?php echo firstone_get_post_page_url(); ?>#post-<?php the_ID(); ?>">
			</a>

		
	</div>

<?php get_footer(); ?>