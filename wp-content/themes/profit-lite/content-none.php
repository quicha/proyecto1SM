<?php
/**
 * The default template for displaying content
 *
 * Used for  index/archive/search.
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
global $mpProfitPageTemplate;
?>
<article class="no-results not-found">

    <header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'profit-lite' ); ?></h1>
	</header> 
    
	<section class="entry entry-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'profit-lite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'profit-lite' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'profit-lite' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
    </section>

</article><!-- #post -->