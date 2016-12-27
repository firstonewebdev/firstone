<?php $comments = get_comments(array('post_id'=>get_the_ID())) ;?>

<?php if ( comments_open() ) 
{
	$fields = array ( 	'author' =>	'<p class="comment-form-author">' . '<label for="author">' . 
									'Name' . '</label> ' .
									( $req ? '<span class="required">*</span>' : '' ) .
									'<input id="author" name="author" type="text" value="' . 
									esc_attr( $commenter['comment_author'] ) .
									'" size="30" /></p>',

					    'email' =>	'<p class="comment-form-email"><label for="email">' . 
									'Email' . '</label> ' .
									( $req ? '<span class="required">*</span>' : '' ) .
									'<input id="email" name="email" type="text" value="' . 
									esc_attr(  $commenter['comment_author_email'] ) .
									'" size="30" /></p>'
					);

	$args = array ( 'title_reply' 	=>	'Leave a Comment',
					'label_submit'  =>  'Submit',
					'comment_field' =>	'<p class="comment-form-comment"><label for="comment">Comment</label>' .
										( $req ? '<span class="required">*</span>' : '' ) .
										'<textarea id="comment" name="comment" cols="45" rows="15" aria-required="true">
										</textarea></p>',
					'fields' =>			apply_filters('comment_form_default_fields',$fields) );

	comment_form ( $args );
	//comment_form ( array( 'title_reply' => 'Leave a Comment',) );
}
else
{
	echo '<h5 class="comments-closed-msg Xtext-center">Comments are closed :(</h5>';
}?>

<div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">

				<?php if (sizeof($comments)) : ?>

					<?php echo ( sizeof($comments) . ' comment(s) on ' . get_the_title() ); ?>

				<?php else : ?>

					0 comments

				<?php endif?>

			</h2>
		</div>
		<div id="collapse<?php the_ID();?>" class="panel-collapse collapse <?php if (sizeof($comments)) : echo 'in'; endif?>" >

			<div class="panel-body">

				<ul><?php 
					$args = array( 'callback' => 'firstone_theme_comment', 'editable' => true );
					wp_list_comments($args); 
				?></ul>

			</div>

		</div>
	</div>
</div>

