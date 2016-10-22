<?php

if ( ! function_exists( 'ghostpool_custom_content' ) ) {
	function ghostpool_custom_content() {
		register_widget( 'Custom_Content' );
	}
}
add_action( 'widgets_init', 'ghostpool_custom_content' );

class Custom_Content extends WP_Widget {

	function Custom_Content() {
		$widget_ops = array( 'classname' => 'gp-custom-content', 'description' => esc_html__( 'Display custom content such as Google ads, flash and javascript.', 'buddy' ) );
		$control_ops = array( 'width' => 300 );
		parent::__construct( 'gp-custom_content-widget', esc_html__( 'GP Custom Content', 'buddy' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$content = $instance['content']; ?>
		
		<?php echo html_entity_decode( $before_widget ); ?>
		<?php if ( $title ) { echo html_entity_decode( $before_title . $title . $after_title ); } ?>
		<div class="textwidget">
			<?php echo do_shortcode( $content ); ?>
		</div>
		
	<?php echo html_entity_decode( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['content'] = $new_instance['content'];
		return $instance;
	}

	function form( $instance ) {

		$defaults = array( 
			'title' => '', 
			'content' => '',
		);
		$instance = wp_parse_args( ( array ) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'buddy' ); ?></label>
			<br/><input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php esc_html_e( 'Content:', 'buddy' ); ?></label>
			<textarea style="width: 300px; height: 250px;" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content' ) ); ?>"><?php echo wp_kses_post( $instance['content'] ); ?></textarea>
		</p>
		
		<input type="hidden" name="widget-options" id="widget-options" value="1" />

		<?php
		
	}

}

?>