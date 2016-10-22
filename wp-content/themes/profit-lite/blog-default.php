<?php
/**
 * Right sidebar (Blog)
 * The template file for pages without right sidebar.
 * @package Profit
 * @since Profit 1.0
 */
if (!(is_front_page())) {
    $GLOBALS['mpProfitPageTemplate'] = 'default';
}
?>
<div class="container main-container list-posts">
    <div class="row clearfix">   
        <div class=" col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <?php if (have_posts()) : ?>
                <?php /* The loop */ ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('content', get_post_format()); ?>
                <?php endwhile; ?>
                <?php
                $args = array(
                    'prev_next' => true
                );
                ?>
                <nav class="navigation paging-navigation">
                    <?php echo paginate_links($args); ?>
                </nav><!-- .navigation -->
            <?php endif; ?>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php 
