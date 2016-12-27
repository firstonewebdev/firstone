<?php get_header(); ?>

	<!-- Index template -->
	
	<script type="text/javascript">

		jQuery(document).ready(function() {
			jQuery('#banner-close').on('click',function(){
				jQuery('#theme-banner').addClass('zoomOutUp');
				jQuery('#theme-banner').fadeOut(800);
			});
		});

	</script>

	<?php if ( get_option('Xis-theme-developer') ) : ?>
		<div id="theme-banner" style="color:yellow; text-align:center; padding-top: 20px; padding-bottom: 20px;" class="well animated">
			<div class="animated fadeInRightBig"><a href="">Download first one theme !</a>
				<span id="banner-close" style="color:white; display:block; float:right; cursor:pointer;" class="fa fa-close"></span>
			</div>
			<div style="font-size: 0.5em; color: white;">first one is a light and fully responsive wordpress theme. Like it ? Just grab it - it's FREE !</div>
		</div>
	<?php endif ?>

	<div id="container" class="container firstone-blog" <?php firstone_background(); ?> >	
		<div class="row">

			<div class="content-container col-sm-9 col-sm-push-3">	
			
				<?php 

				if ( have_posts() ) :
					while ( have_posts() ) : the_post();

							get_template_part ( 'content', get_post_format() );

					endwhile;
				endif;
			
				?>
				
			</div>

			<div class="col-sm-3 col-sm-pull-9">	
				<?php get_sidebar(); ?>
			</div>
			
		</div>
	
	</div>
	
<?php get_footer(); ?>
