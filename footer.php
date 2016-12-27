

			<div class="footer-container">

				<?php if ( ! is_front_page() ) :?>
					<div class="row">

						<div class="footer-widget-container col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">

							<div class="widgets-area Xadd-border col-xs-12 col-sm-12 col-md-12 col-lg-6 clearfix">
			    				<?php dynamic_sidebar('footer-widget-left-outside') ?>
			    			</div>
							<div class="widgets-area Xadd-border col-xs-12 col-sm-12 col-md-12 col-lg-6 clearfix">
			    				<?php dynamic_sidebar('footer-widget-left-inside') ?>
			    			</div>

		    			</div>

						<div class="footer-widget-container col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">

							<div class="widgets-area Xadd-border col-xs-12 col-sm-12 col-md-12 col-lg-6 clearfix">
			    				<?php dynamic_sidebar('footer-widget-right-inside') ?>
			    			</div>
							<div class="widgets-area Xadd-border col-xs-12 col-sm-12 col-md-12 col-lg-6 clearfix">
			    				<?php dynamic_sidebar('footer-widget-right-outside') ?>
			    			</div>

		    			</div>

					</div>
				<?php endif;?>

			</div>

			<footer>
				<div class="row footer-row" style="margin: 0;">
					<div class="tech-logo-row col-xs-12 col-sm-4 col-md-4 col-lg-4">

						<?php firstone_footer_left(); ?>

					</div>

					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">	

						<?php firstone_footer_center(); ?>

					</div>

					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

						<?php firstone_footer_right(); ?>

					</div>
				</div>
			</footer>

		<?php wp_footer(); ?>

	</body>
</html>