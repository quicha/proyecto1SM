<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * Used for masonry blog
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-in-blog '); ?>>
    <div class="post-masonry">
        <?php
        if (get_post_gallery()) :
            $gallery = get_post_gallery(get_the_ID(), false);
            ?>
            <div class="flexslider gallery" data-columns="1">
                <ul class="slides">
                    <?php
                    foreach ($gallery['src'] AS $src) {
                        ?>
                        <li><a href = "<?php the_permalink(); ?>" ><img src="<?php echo $src; ?>" class="post-masonry-gallery-image"/></a></li>
                    <?php }
                    ?>
                </ul>
            </div>
        <?php else: ?>
            <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
                <div class="entry-thumbnail">
                    <a href = "<?php the_permalink(); ?>" ><?php the_post_thumbnail(); ?></a>
                </div>
                <?php
            endif;
        endif;
        ?>
    </div>
</article><!-- #post -->
