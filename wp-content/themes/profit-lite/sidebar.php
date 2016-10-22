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
    <div class="widget-area">
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
        <?php else: ?>
            <?php
            $args = array(
                'before_title' => '<h3 class="widget-title h2">',
                'after_title' => '</h3>',
            );
            $instance = array();
            wp_cache_delete('widget_search', 'widget');
            the_widget('WP_Widget_Search', $instance, $args);

            wp_cache_delete('widget_recent_posts', 'widget');
            the_widget('WP_Widget_Recent_Posts', $instance, $args);

            wp_cache_delete('widget_tag_cloud', 'widget');
            the_widget('WP_Widget_Tag_Cloud', $instance, $args);

            wp_cache_delete('widget_meta', 'widget');
            the_widget('WP_Widget_Meta', $instance, $args);
            ?> 
        <?php endif; ?>
    </div><!-- .widget-area -->
</aside>
