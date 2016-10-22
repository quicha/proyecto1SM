<?php
/**
 * The template for displaying posts in the Audio post format
 *
 * Used for  index/archive/search.
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-in-blog post'); ?>>
       <header class="entry-header">
        <h3 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h3>
    </header> 
    <section class="entry entry-content">
         <?php echo mp_profit_get_first_embed_media($post->ID); ?>
    </section>

    
    <?php mp_profit_post_meta($post); ?>
</article><!-- #post -->