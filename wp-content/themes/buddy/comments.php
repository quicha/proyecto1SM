<?php if ( post_password_required() ) {
	return;
}
	

/////////////////////////////////////// Comment Template ///////////////////////////////////////

function ghostpool_comment_template( $comment, $gp_args, $depth ) { 

	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :

	?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" itemscope itemtype="http://schema.org/Comment">

		<div id="comment-<?php comment_ID(); ?>" class="comment_container">
			<p><?php esc_html_e( 'Pingback:', 'buddy' ); ?> <?php comment_author_link(); ?></p>
		</div>
	
	<?php break; default : ?>
	
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
	
		<div id="comment-<?php comment_ID(); ?>" class="comment_container">

			<?php echo get_avatar( $comment, 60 ); ?>
		
			<div class="gp-comment-content">
			
				<?php if ( $comment->comment_approved == '0' ) { ?>
				
					<p class="gp-comment-meta"><em><?php esc_html_e( 'Your comment is awaiting approval.', 'buddy' ); ?></em></p>
			
				<?php } else { ?>
				
					<p class="gp-comment-meta">

						<strong itemprop="author">	
							<?php printf( '%s', comment_author_link() ); ?>
						</strong>
		
						<time itemprop="datePublished" datetime="<?php echo get_comment_date( 'c' ); ?>">
							<?php comment_time( get_option( 'date_format' ) ); ?>, <?php comment_time( get_option( 'time_format' ) ); ?>
						</time>
					
						<?php comment_reply_link( array_merge( $gp_args, array( 'reply_text' => esc_html__( 'Reply', 'buddy' ), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $gp_args['max_depth'] ) ) ); ?>	
					
					</p>
									
				<?php } ?>	

				<div itemprop="description" class="gp-comment-description"><?php comment_text(); ?></div>
			
			</div>	
		
		</div>

	<?php break; endswitch;

} ?>

<?php if ( comments_open() OR have_comments() ) { ?>
 
	<div id="comments">

		<?php if ( have_comments() ) { ?>
		
			<h3><?php comments_number( esc_html__( 'No Comments', 'buddy' ), esc_html__( '1 Comment', 'buddy' ), esc_html__( '% Comments', 'buddy' ) ); ?></h3>
				
			<ol class="commentlist">
				<?php wp_list_comments( 'callback=ghostpool_comment_template' ); ?>
			</ol>
							
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
				<?php paginate_comments_links( array( 'type' => 'list', 'next_text' => '&raquo;', 'prev_text' => '&laquo;' ) ); ?>
			<?php } ?>	

			<?php if ( ! comments_open() && get_comments_number() ) { ?>
				<h4><?php esc_html_e( 'Comments are now closed for this post.', 'buddy' ); ?></h4>
			<?php } ?>
	
		<?php } ?>

		<?php

		$aria_req = ( $req ? " aria-required='true'" : '' );
		$required_text = sprintf( '' . esc_html__( 'Required fields are marked %s', 'buddy' ), '<span class="required">*</span>' );
			
		// Login link
		global $dirname;
		if ( get_option( $dirname . '_login_url' ) ) { 
			$gp_login_link = esc_url( get_option( $dirname . '_login_url' ) );
		} else {
			$gp_login_link = wp_login_url( apply_filters( 'the_permalink', get_permalink() ) );
		}
		
		$comment_args = array( 

			'title_reply'       => esc_html__( 'Leave a Reply', 'buddy' ),
			'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'buddy' ),
			'cancel_reply_link' => esc_html__( 'Cancel Reply', 'buddy' ),
			'label_submit'      => esc_html__( 'Post Comment', 'buddy' ),

			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'buddy' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

			'must_log_in' => '<p class="must-log-in">' . sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'socialize' ), array( 'a' => array( 'href' => array() ) ) ), $gp_login_link ) . '</p>',
			
			'logged_in_as' => '<p class="logged-in-as">' .  sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'buddy' ), array( 'a' => array( 'href' => array(), 'title' => array() ) ) ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',

			'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Your email address will not be published. ', 'buddy' ) . ( $req ? $required_text : '' ) . '</p>',

			'comment_notes_after' => '<p class="form-allowed-tags">' . sprintf( wp_kses( esc_html__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'buddy' ), array( 'abbr' => array( 'title' => array() ) ) ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',

			'fields' => apply_filters( 'comment_form_default_fields', array( 

				'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_html__( 'Name', 'buddy' ) . ' ' . ( $req ? '*' : '' ) . '" ' . $aria_req . ' /></p>',

				'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_html__( 'Email', 'buddy' ) . ' ' . ( $req ? '*' : '' ) . '" ' . $aria_req . ' /></p>',

				'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_html__( 'Website', 'buddy' ) . '" /></p>'

			 ) ),
	
		 );
			
		comment_form( $comment_args );

		?>

	</div>
	
<?php } ?>