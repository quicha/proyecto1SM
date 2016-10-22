<?php
/**
 * The default template for displaying content
 *
 * Used for two columns blog
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-in-blog col-lg-6 col-md-6 col-sm-6 col-xs-12'); ?>>
    <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
        <div class="entry-thumbnail">
            <a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail('mp-profit-thumb-medium-column'); ?></a>
        </div>
    <?php endif; ?>
    <header class="entry-header">
        <h2 class="entry-title h5">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
        <?php if (get_theme_mod('mp_profit_show_meta', '1') === '1' || get_theme_mod('mp_profit_show_meta')): ?>
            <div class="meta">
                <span class="date-post h6"><?php the_time('F j, Y'); ?></span>
                <?php if (comments_open()) : ?>
                    <span class="delimiter">|</span>
                    <a class="blog-icon underline" href="<?php if ( ! is_single() ): the_permalink(); endif; ?>#comments" >
                        <span><?php comments_number('0', '1', '%'); ?> <?php _e('Comments', 'profit-lite'); ?></span>
                    </a>
                <?php endif; ?>
                <?php edit_post_link(__('Edit', 'profit-lite'), '<span class="delimiter">|</span> ', ''); ?>
            </div> 
        <?php endif; ?>
    </header> 
    <section class="entry-content">
        <p>
            <?php
            the_excerpt();
            ?>   
        </p>
        <p><a class="more-link underline" href="<?php the_permalink(); ?>"><?php _e('Read More', 'profit-lite'); ?></a></p>
    </section>
</article><!-- #post -->
