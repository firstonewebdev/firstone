<?php
	session_start();
?>
<!doctype html>

<html <?php language_attributes(); ?> >
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="Frontend &amp; Backend development → JavaScript • jQuery • PHP • HTML5 • CSS3 • MySQL">
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
	</head>

	<?php 
		if ( is_front_page() ) :
			$firstone_classes = array( 'frontpage-class', 'firstone-class' );
		else :
			$firstone_classes = array( 'no-frontpage-class' );
		endif;
	?> 
	
	<body <?php body_class ( $firstone_classes ); ?>>
<!--	
		<nav id=header_nav>
			<?php /*wp_nav_menu ( array('theme_location'=>'primary') )*/ ?>
		</nav>
-->

		<span id="arrow-up" class="fixed-arrow-btn icon-shadow"><a href="#"><i class="fa fa-chevron-circle-up"></i></a></span>


		<div class="header-image-wrapper">
			<img id="header-image" src="<?php header_image(); ?>" class='header-image img-responsive' />
			<?php firstone_header_img_title(); ?>
		</div>


		<nav id="navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->

			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only"><?php the_title(); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			 	</button>

				<a class="navbar-brand" href="<?php echo esc_url(site_url()) ?>">
					<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
					<?php //bloginfo('name')?>
				</a>

				<?php if ( get_option('is_staging') ) : ?>
					<span class="fo-staging-warning">STAGING</span>
				<?php endif ?>

			</div>
			
			<!-- display search form only on blog page -->
			<?php if ( is_home()) : ?>
			<form class="navbar-search navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query();?>" name="s" />
				</div>
			</form>
			<?php endif; ?>
			
			<!-- display primary menu -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php 
					wp_nav_menu(array(	'theme_location'	=> 'primary',
										'container' 		=> false,
 										'depth'             => 2,		
 										'container_id'      => 'bs-example-navbar-collapse-1',
										'menu_class' 		=> 'nav navbar-nav navbar-right top-menu-item',
 										'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                						'walker'            => new wp_bootstrap_navwalker()) );
				?>
			</div>
			
		  </div><!-- /.container-fluid -->
		</nav>

		<!-- <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" 
											width="<?php echo get_custom_header()->width; ?>" alt="" />	-->
