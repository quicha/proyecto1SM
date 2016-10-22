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
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <?php mp_profit_post_thumbnail($post, $mpProfitPageTemplate); ?>
    <header class="entry-header">
        <h3 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h3>
    </header> 
    <section class="entry entry-content">
        <p>
            <?php
            mp_profit_get_content_theme(250, false);
            ?>
        </p>
    </section>
    <?php mp_profit_post_meta($post); ?>
</article><!-- #post -->

