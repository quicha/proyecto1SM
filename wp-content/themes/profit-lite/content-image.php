<?php
/**
 * The template for displaying posts in the Image post format
 *
 * Used for  index/archive/search.
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
global $mpProfitPageTemplate;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-in-blog post'); ?>>
    <?php
    $img = mp_profit_get_post_image();
    if (!empty($img)): ?>
        <div class="entry-thumbnail">              
            <a href = "<?php the_permalink(); ?>"><img src="<?php echo $img ?>" class="attachment-post-thumbnail wp-post-image" alt="<?php the_title(); ?>"></a>
        </div>
        <?php
    else:
        if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
            <div class="entry-thumbnail">
                <?php if ($mpProfitPageTemplate == 'template-full-width-blog.php'): ?>
                    <a href = "<?php the_permalink(); ?>" ><?php the_post_thumbnail('mp-profit-thumb-large'); ?></a>
                <?php else: ?>               
                    <a href = "<?php the_permalink(); ?>" ><?php the_post_thumbnail(); ?></a>
                <?php endif; ?>
            </div>
            <?php
        endif;
    endif;
    ?>        
    
    <?php mp_profit_post_meta($post); ?>
</article><!-- #post -->