<?php get_header(); ?>
<style>

.header-image-wrapper {
	display: none;
}

</style>

	<!-- Single template -->

	<div id="container" class="container blog-min-height" <?php firstone_background(); ?> >	
	
		<?php 
		
		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<div class="clearfix">
					<div class="blog-title"><?php the_title(); ?></div>
					<div><?php firstone_blog_info_header ( get_comments(array('post_id'=>get_the_ID())) ); ?></div>
					<div class="featured-img featured-img-big"><?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?></div>
				</div>

				<div class="Xrow blog-entry single-entry"><?php the_content(); ?></div>
			
			<?php endwhile;
			
		endif;
				
		?>

		<?php echo firstone_social_icon_row ( get_the_title(), get_the_permalink() ); ?>
		<div class="row">
			<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
			<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
		</div>

		<?php comments_template(); ?>

		<a class="return-glyph glyphicon glyphicon-arrow-left" 
			href="<?php echo firstone_get_post_page_url(); ?>#post-<?php the_ID(); ?>">
		</a>
		
	</div>
		
<?php get_footer(); ?>