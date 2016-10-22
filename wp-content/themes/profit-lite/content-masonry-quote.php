<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * Used for masonry blog
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-in-blog '); ?>>
    <div class="post-masonry">
        <section class="entry-content">
            <?php
            the_content();
            ?>  
        </section>
    </div>
</article><!-- #post -->
