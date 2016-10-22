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
    <?php
    if (get_post_gallery()) :
        $gallery = get_post_gallery(get_the_ID(), false);
        ?>
        <div class="flexslider gallery" data-columns="1">
            <ul class="slides">
                <?php
                foreach ($gallery['src'] AS $src) {
                    ?>
                    <li><a href = "<?php the_permalink(); ?>" ><img src="<?php echo $src; ?>" class="post-gallery-image"/></a></li>
                <?php }
                ?>
            </ul>
        </div>
    <?php else: ?>
        <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
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