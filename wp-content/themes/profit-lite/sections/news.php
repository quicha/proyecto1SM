<?php
/*
 * news section
 */
?>
	<section id="news" class="news-section grey-section default-section">
		<div class="container">
			<div class="section-content">
				<?php
				$mp_profit_news_title        = esc_html( get_theme_mod( 'mp_profit_news_title' ) );
				$mp_profit_news_subtitle     = esc_html( get_theme_mod( 'mp_profit_news_subtitle' ) );
				$mp_profit_news_button_url   = esc_url( get_theme_mod( 'mp_profit_news_button_url', '#news' ) );
				$mp_profit_news_button_label = esc_html( get_theme_mod( 'mp_profit_news_button_label', __( 'Read all news', 'profit-lite' ) ) );
				if ( get_theme_mod( 'mp_profit_news_title', false ) === false ) :
					?>
					<h2 class="section-title"><?php _e( 'Financial news', 'profit-lite' ); ?></h2>
					<?php
				else:
					if ( ! empty( $mp_profit_news_title ) ):
						?>
						<h2 class="section-title"><?php echo $mp_profit_news_title; ?></h2>
						<?php
					endif;
				endif;
				if ( get_theme_mod( 'mp_profit_news_subtitle', false ) === false ) :
					?>
					<div
						class="section-subtitle"><?php _e( 'All the latest financial news', 'profit-lite' ); ?></div>
					<?php
				else:
					if ( ! empty( $mp_profit_news_subtitle ) ):
						?>
						<div class="section-subtitle"><?php echo $mp_profit_news_subtitle; ?></div>
						<?php
					endif;
				endif;
				?>
				<?php
				$args   = array(
					'post_type'           => 'post',
					'posts_per_page'      => 2,
					'post_status'         => 'publish',
					'orderby'             => 'date',
					'ignore_sticky_posts' => 1,
				);
				$prizes = new WP_Query( $args );
				if ( $prizes->have_posts() ) {
					?>
					<div class="news-list">
						<?php
						while ( $prizes->have_posts() ) {
							$prizes->the_post();
							?>
							<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
								<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
									<div class="thumb-related">
										<div class="thumb">
											<a rel="external" alt="<?php the_title(); ?>"
											   href="<?php the_permalink() ?>">
												<?php the_post_thumbnail(); ?>
											</a>
										</div>
									</div>
								<?php else: ?>
									<div class="thumb-related">
										<div class="thumb thumb-default">
											<a class="date-post h6" rel="external" title="<?php the_title(); ?>"
											   href="<?php the_permalink() ?>">
												<span><?php the_time( 'F j, Y' ); ?></span>
											</a>
										</div>
									</div>
								<?php endif; ?>
								<div class="wpapper-content">
									<div class="entry-header">
										<div class="date-post "><?php the_time( 'j M. Y' ); ?></div>
										<h4 class="entry-title">
											<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
										</h4>
									</div>
									<div class="entry entry-content">
										<?php
										mp_profit_get_content_theme( 262, true );
										?>
									</div>
								</div>
							</div>
						<?php }
						?>
						<div class="clearfix"></div>
					</div>
					<?php
				} else {
					echo 'No news!';
				}
				?>
				<div class="section-buttons">
					<?php
					if ( ! empty( $mp_profit_news_button_label ) && ! empty( $mp_profit_news_button_url ) ):
						?>
						<a href="<?php echo $mp_profit_news_button_url; ?>"
						   title="<?php echo $mp_profit_news_button_label; ?>"
						   class="button white-button"><?php echo $mp_profit_news_button_label; ?></a>
						<?php
					endif;
					?>
				</div>

			</div>
		</div>
	</section>
<?php 

