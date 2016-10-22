<?php

if ( ! function_exists( 'ghostpool_statistics' ) ) {
	function ghostpool_statistics() {
		register_widget( 'GhostPool_Statistics' );
	}
}
add_action( 'widgets_init', 'ghostpool_statistics' );

class GhostPool_Statistics extends WP_Widget {

	function GhostPool_Statistics() {
		$widget_ops = array( 'classname' => 'gp-statistics', 'description' => esc_html__( 'Display a list of site statistics.', 'buddy' ) );
		parent::__construct( 'gp-statistics-widget', esc_html__( 'GP Statistics', 'buddy' ), $widget_ops );
	}	

	function widget( $args, $instance ) {

		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
        $posts = $instance['posts'] ? '1' : '0';
        $comments = $instance['comments'] ? '1' : '0';
        $blogs = $instance['blogs'] ? '1' : '0';
        $activity = $instance['activity'] ? '1' : '0';
        $members = $instance['members'] ? '1' : '0';
        $groups = $instance['groups'] ? '1' : '0';
        $forums = $instance['forums'] ? '1' : '0';
        $topics = $instance['topics'] ? '1' : '0';
        $icon_color = $instance['icon_color'];
	
		echo html_entity_decode( $before_widget );	

		?>
		
		<?php if ( $title ) { echo html_entity_decode( $before_title . $title . $after_title ); } ?>
		
		<?php
		
		// Get activity count	
		if ( ! function_exists( 'ghostpool_bp_activity_updates' ) ) {
			function ghostpool_bp_activity_updates() {
				global $bp, $wpdb;
				if ( ! $gp_count = wp_cache_get( 'gp_bp_activity_updates', 'bp' ) ) {
					$gp_count = $wpdb->get_var( $wpdb->prepare( "SELECT count(a.id) FROM {$bp->activity->table_name} a WHERE type = %s AND a.component = '{$bp->activity->id}'", 'activity_update' ) );
					if ( ! $gp_count ) {
						$gp_count == 0;
					}	
					if ( ! empty( $gp_count ) ) {
						wp_cache_set( 'gp_bp_activity_updates', $gp_count, 'bp' );
					}	
				}
				return $gp_count;
			}
		}	
		
		if ( ! function_exists( 'ghostpool_bp_activity_updates_delete_clear_cache' ) ) {
			function ghostpool_bp_activity_updates_delete_clear_cache( $gp_args ) {
				if ( $gp_args['type'] && $gp_args['type'] == 'activity_update' )
					wp_cache_delete( 'gp_bp_activity_updates' );
			}
		}	
		add_action( 'bp_activity_delete', 'ghostpool_bp_activity_updates_delete_clear_cache' );

		if ( ! function_exists( 'ghostpool_bp_activity_updates_add_clear_cache' ) ) {
			function ghostpool_bp_activity_updates_add_clear_cache() {
				wp_cache_delete( 'gp_bp_activity_updates' );
			}
		}
		add_action( 'bp_activity_posted_update', 'ghostpool_bp_activity_updates_add_clear_cache' );
		
		// Statistics icon background color
		if ( $icon_color ) {
			echo '<style>#' . $this->id . ' .gp-stats > div{background-color: ' . esc_attr( $icon_color ) . '}</style>';
		}
		
		?>

		<div class="gp-stats">
		
			<?php if ( $posts == '1' ) { ?>
				<div class="gp-post-stats">
					<?php $gp_count_posts = wp_count_posts(); ?>
					<span class="gp-stat-details">
						<span class="gp-stat-title"><?php esc_html_e( 'Posts', 'buddy' ); ?></span>
						<span class="gp-stat-count"><?php echo absint( $gp_count_posts->publish ); ?></span>
					</span>	
				</div>	
			<?php } ?>

			<?php if ( $comments == '1' ) { ?>
				<div class="gp-comment-stats">
					<?php $gp_comments_count = wp_count_comments(); ?>
					<span class="gp-stat-details">
						<span class="gp-stat-title"><?php esc_html_e( 'Comments', 'buddy' ); ?></span>
						<span class="gp-stat-count"><?php echo absint( $gp_comments_count->approved ); ?></span>
					</span>		
				</div>	
			<?php } ?>

			<?php if ( is_multisite() && $blogs == '1' ) { ?>
				<div class="gp-blog-stats">
					<span class="gp-stat-details">
						<span class="gp-stat-title"><?php esc_html_e( 'Blogs', 'buddy' ); ?></span>
						<span class="gp-stat-count"><?php echo absint( get_blog_count() ); ?></span>
					</span>		
				</div>	
			<?php } ?>

			<?php if ( function_exists( 'bp_is_active' ) && bp_is_active( 'activity' ) && $activity == '1' ) { ?>
				<div class="gp-activity-update-stats">
					<span class="gp-stat-details">
						<span class="gp-stat-title"><?php esc_html_e( 'Activity', 'buddy' ); ?></span>
						<span class="gp-stat-count"><?php echo absint( ghostpool_bp_activity_updates() ); ?></span>
					</span>		
				</div>	
			<?php } ?>
														
			<?php if ( function_exists( 'bp_is_active' ) && $members == '1' ) { ?>
				<div class="gp-member-stats">
					<span class="gp-stat-details">
						<span class="gp-stat-title"><?php esc_html_e( 'Members', 'buddy' ); ?></span>
						<span class="gp-stat-count"><?php echo absint( bp_get_total_site_member_count() ); ?></span>
					</span>	
				</div>	
			<?php } ?>

			<?php if ( function_exists( 'bp_is_active' ) && bp_is_active( 'groups' ) && $groups == '1' ) { ?>
				<div class="gp-group-stats">
					<span class="gp-stat-details">
						<span class="gp-stat-title"><?php esc_html_e( 'Groups', 'buddy' ); ?></span>
						<span class="gp-stat-count"><?php echo absint( groups_get_total_group_count() ); ?></span>
					</span>	
				</div>	
			<?php } ?>

			<?php if ( class_exists( 'bbPress' ) && $forums == '1' ) { ?>
				<div class="gp-forum-stats">
					<span class="gp-stat-details">
						<?php $gp_count_posts = wp_count_posts( 'forum' ); ?>
						<span class="gp-stat-title"><?php esc_html_e( 'Forums', 'buddy' ); ?></span>
						<span class="gp-stat-count"><?php echo absint( $gp_count_posts->publish ); ?></span>
					</span>		
				</div>	
			<?php } ?>

			<?php if ( class_exists( 'bbPress' ) && $topics == '1' ) { ?>
				<div class="gp-topic-stats">
					<span class="gp-stat-details">
						<?php $gp_count_posts = wp_count_posts( 'topic' ); ?>
						<span class="gp-stat-title"><?php esc_html_e( 'Topics', 'buddy' ); ?></span>
						<span class="gp-stat-count"><?php echo absint( $gp_count_posts->publish ); ?></span>
					</span>	
				</div>	
			<?php } ?>

		</div>
						
		<?php echo html_entity_decode( $after_widget );

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['posts'] = $new_instance['posts'];
		$instance['comments'] = $new_instance['comments'];	
		$instance['blogs'] = $new_instance['blogs'];
		$instance['activity'] = $new_instance['activity'];
		$instance['members'] = $new_instance['members'];
		$instance['groups'] = $new_instance['groups'];
		$instance['forums'] = $new_instance['forums'];
		$instance['topics'] = $new_instance['topics'];
		$instance['icon_color'] = $new_instance['icon_color'];
		return $instance;
	}

	function form( $instance ) {
	
		$defaults = array( 
			'title' => 'Statistics',
			'posts' => 1,
			'comments' => 1,
			'blogs' => 0,
			'activity' => 1,
			'members' => 1,
			'groups' => 1,
			'forums' => 1,
			'topics' => 1,
			'icon_color' => '#C12F6C',
		 ); $instance = wp_parse_args( ( array ) $instance, $defaults );

		// Load color picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		
		?>
				
		<script>
		( function( $ ) {
			$( function() {
				$( '.gp-colorpicker' ).wpColorPicker();
			});
		})( jQuery );
		</script>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'buddy' ); ?></label>
			<br/><input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
			
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts' ) ); ?>" value="1" <?php checked( $instance['posts'], 1 ); ?> /><label for="<?php echo esc_attr( $this->get_field_id( 'posts' ) ); ?>"><?php esc_html_e( 'Posts', 'buddy' ); ?></label>
		</p>

		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'comments' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'comments' ) ); ?>" value="1" <?php checked( $instance['comments'], 1 ); ?> /><label for="<?php echo esc_attr( $this->get_field_id( 'comments' ) ); ?>"><?php esc_html_e( 'Comments', 'buddy' ); ?></label>
		</p>

		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'blogs' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blogs' ) ); ?>" value="1" <?php checked( $instance['blogs'], 1 ); ?> /><label for="<?php echo esc_attr( $this->get_field_id( 'blogs' ) ); ?>"><?php esc_html_e( 'Blogs', 'buddy' ); ?></label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'activity' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'activity' ) ); ?>" value="1" <?php checked( $instance['activity'], 1 ); ?> /><label for="<?php echo esc_attr( $this->get_field_id( 'activity' ) ); ?>"><?php esc_html_e( 'Activity', 'buddy' ); ?></label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'members' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'members' ) ); ?>" value="1" <?php checked( $instance['members'], 1 ); ?> /><label for="<?php echo esc_attr( $this->get_field_id( 'members' ) ); ?>"><?php esc_html_e( 'Members', 'buddy' ); ?></label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'groups' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'groups' ) ); ?>" value="1" <?php checked( $instance['groups'], 1 ); ?> /><label for="<?php echo esc_attr( $this->get_field_id( 'groups' ) ); ?>"><?php esc_html_e( 'Groups', 'buddy' ); ?></label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'forums' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'forums' ) ); ?>" value="1" <?php checked( $instance['forums'], 1 ); ?> /><label for="<?php echo esc_attr( $this->get_field_id( 'forums' ) ); ?>"><?php esc_html_e( 'Forums', 'buddy' ); ?></label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'topics' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'topics' ) ); ?>" value="1" <?php checked( $instance['topics'], 1 ); ?> /><label for="<?php echo esc_attr( $this->get_field_id( 'topics' ) ); ?>"><?php esc_html_e( 'Topics', 'buddy' ); ?></label>
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>"><?php esc_html_e( 'Icon Color:', 'buddy' ); ?></label>
			<br/><input type="text" class="gp-colorpicker" id="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_color' ) ); ?>" value="<?php echo esc_attr( $instance['icon_color'] ); ?>" />
		</p>
															
		<input type="hidden" name="widget-options" id="widget-options" value="1" />

		<?php

	}
}

?>