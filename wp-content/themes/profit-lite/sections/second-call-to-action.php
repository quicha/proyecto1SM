<?php
/*
 * Accent section
 */
?>
	<section id="second-action" class="second-action-section section-dark">
		<div class="container">
			<div class="section-content">
				<?php
				$mp_profit_second_action_title        = esc_html( get_theme_mod( 'mp_profit_second_action_title' ) );
				$mp_profit_second_action_subtitle     = esc_html( get_theme_mod( 'mp_profit_second_action_subtitle' ) );
				$mp_profit_second_action_description  = esc_html( get_theme_mod( 'mp_profit_second_action_description' ) );
				$mp_profit_second_action_button_label = esc_html( get_theme_mod( 'mp_profit_second_action_brandbutton_label', __( 'Know More', 'profit-lite' ) ) );
				$mp_profit_second_action_button_url   = esc_url( get_theme_mod( 'mp_profit_second_action_brandbutton_url', '#second-action' ) );
				?>
				<div class="section-subcontent">
					<?php
					if ( get_theme_mod( 'mp_profit_second_action_title', false ) === false ) :
						?>
						<h2 class="section-title"><?php _e( 'Boost your business right now', 'profit-lite' ); ?></h2>
						<?php
					else:
						if ( ! empty( $mp_profit_second_action_title ) ):
							?>
							<h2 class="section-title"><?php echo $mp_profit_second_action_title; ?></h2>
							<?php
						endif;
					endif;
					if ( get_theme_mod( 'mp_profit_second_action_subtitle', false ) === false ) :
						?>
						<div class="section-subtitle"><?php _e( 'Focus on your business and leave all money questions to us.', 'profit-lite' ); ?></div>
						<?php
					else:
						if ( ! empty( $mp_profit_second_action_title ) ):
							?>
							<div class="section-subtitle"><?php echo $mp_profit_second_action_subtitle; ?></div>
							<?php
						endif;
					endif;

					if ( get_theme_mod( 'mp_profit_second_action_description', false ) === false ) :
						?>
						<div
							class="section-description"><?php _e( 'Our company has more than 20 years of experience in trading market and knows what exactly our customers and partners need to succeed in business. Just give us a try and we&rsquo;ll provide you with high level service and professional solutions.', 'profit-lite' ); ?></div>
						<?php
					else:
						if ( ! empty( $mp_profit_second_action_description ) ):
							?>
							<div class="section-description"><?php echo $mp_profit_second_action_description; ?></div>
							<?php
						endif;
					endif;
					?>
				</div>
				<div class="section-buttons">
					<?php
					if ( ! empty( $mp_profit_second_action_button_label ) && ! empty( $mp_profit_second_action_button_url ) ):
						?>
						<a href="<?php echo $mp_profit_second_action_button_url; ?>"
						   title="<?php echo $mp_profit_second_action_button_label; ?>"
						   class="button"><?php echo $mp_profit_second_action_button_label; ?></a>
						<?php
					endif;
					?>
				</div>

			</div>
		</div>
	</section>
<?php

