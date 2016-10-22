<?php
/**
 * The default template for displaying content
 *
 * Used for  index/archive/search.
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-in-blog post'); ?>>
    <section class="entry entry-content">
        <?php
        the_content();
        ?>         
        <div class="clearfix"></div>
    </section>
    <?php mp_profit_post_meta($post); ?>
</article><!-- #post -->