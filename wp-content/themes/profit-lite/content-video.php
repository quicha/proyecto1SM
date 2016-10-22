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
    <?php echo mp_profit_get_first_embed_media($post->ID); ?>
    <header class="entry-header">
        <h3 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h3>
    </header> 
    <section class="entry entry-content">
        <?php
        mp_profit_get_content_theme(107, true);
        ?>        
        <div class="clearfix"></div>
    </section>
    <?php mp_profit_post_meta($post); ?>
</article><!-- #post -->