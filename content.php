<acticle id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $comments = get_comments(array('post_id'=>get_the_ID())) ;?>

	<header">
	
		<div class="blog-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></div>
		<?php firstone_blog_info_header ( $comments ); ?>
		
	</header>
	
	<section>	

		<div class="clearfix">
			<?php if( has_post_thumbnail() ): ?>
				<div class="thumbnail-img featured-img">
					<a href="<?php esc_url(the_permalink()); ?>">
						<?php the_post_thumbnail('thumbnail',array('class'=>'img-rounded') ); ?>
					</a>
				</div>
			<?php endif; ?>

			<div class="blog-entry">
				<?php //the_content(); ?>
				<?php the_excerpt(); ?>

				<?php 
					wp_link_pages( array(
						'before' => '<div class="page-links">' . 'Pages:',
						'after'  => '</div>',
					));
				?>

			</div>
		</div>

		<?php echo firstone_social_icon_row ( get_the_title(), 
											  get_the_permalink(), 
											  get_the_post_thumbnail_url() ); ?>

		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">

						<?php if (sizeof($comments)) : ?>

							<a data-toggle="collapse" data-parent="#accordion"
							href="#collapse<?php the_ID();?>">
							<?php echo ( sizeof($comments)); ?> comments <span class="fa fa-arrow-down"></span>
							</a>

						<?php else : ?>

							<span class="panel-title">0 comments</span>

						<?php endif?>
						<a class="add-comment" href="<?php esc_url(the_permalink()); ?>#respond">Add comment</a>
					</h4>
				</div>
				<div id="collapse<?php the_ID();?>" class="panel-collapse-overlay panel-collapse collapse">

					<div class="panel-body panel-body-scroll">
						<ul><?php 
							$args = array( 'callback' => 'firstone_theme_comment', 'editable' => false );
							wp_list_comments($args,$comments); 
						?>

						<button class="add-comment-panel">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php the_ID();?>">Close</a>
						</button>
						<!--
						<button class="add-comment-panel">
							<a href="<?php esc_url(the_permalink()); ?>#respond">Add/Edit</a> 
						</button>
						-->
						</ul>
					</div>

				</div>
			</div>
		</div>

	</section>	
	
</article>
