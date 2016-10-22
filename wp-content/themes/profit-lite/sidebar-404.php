<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
?>
<aside id="sidebar">
    <div class="widget-area row">
        <?php if (is_active_sidebar('sidebar-404')) : ?>
            <?php dynamic_sidebar('sidebar-404'); ?>
        <?php else: ?>
            <div class="widget widget_menu col-xs-12 col-sm-4 col-md-4 col-lg-4">		
                <h3 class="widget-title"><?php _e('Navigation', 'profit-lite'); ?></h3>		
                <?php
                mp_profit_wp_page_short_menu();
                ?>
            </div>   
            <?php
            $instance = array(
                'title' => ''
            );
            $args = array(
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
                'before_widget' => '<div id="%1$s" class="widget %1$s col-xs-12 col-sm-4 col-md-4 col-lg-4">',
                'after_widget' => '</div>'
            );
            wp_cache_delete('widget_archive', 'widget');
            the_widget('WP_Widget_Archives', $instance, $args);

            
            wp_cache_delete('widget_tag_cloud', 'widget');
            the_widget('WP_Widget_Tag_Cloud', $instance, $args);
            ?> 
        <?php endif; ?>
    </div><!-- .widget-area -->
</aside>