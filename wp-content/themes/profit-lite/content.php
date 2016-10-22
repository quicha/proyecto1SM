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
<article id="post-<?php the_ID(); ?>" <?php post_class('post-in-blog post'); ?>>
    <?php mp_profit_post_thumbnail($post, $mpProfitPageTemplate); ?>
    <header class="entry-header">
        <h3 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h3>
    </header> 
    <section class="entry entry-content">
        <?php
        the_content(sprintf(
                        __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'profit-lite'), the_title('<span class="screen-reader-text">', '</span>', false)
        ));?>
        <div class="clearfix"></div>
        <?php wp_link_pages(array('before' => '<nav class="navigation paging-navigation wp-paging-navigation"', 'after' => '</nav>', 'link_before' => '', 'link_after' => ''));
        ?>          
    </section>
    <?php mp_profit_post_meta($post); ?>
</article><!-- #post -->