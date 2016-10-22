<?php
/**
 * The sidebar containing the footer widget area
 *
 * If no active widgets in this sidebar, hide it completely.
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
?>
<div  class="footer-sidebar">
    <div class="container" >
        <div class="row">            
            <?php
            $args = array(
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            );
            ?>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php if (is_active_sidebar('sidebar-2')) : ?>                
                    <?php dynamic_sidebar('sidebar-2'); ?>               
                    <?php
                else:                    
                    if (has_action('mp_profit_footer_default_widget_about')) {
                        do_action('mp_profit_footer_default_widget_about');
                    } else {
                        $instance = array();
                        wp_cache_delete('widget_recent_comments', 'widget');
                        the_widget('WP_Widget_Recent_Comments', $instance, $args);
                    }                    
                endif;
                ?>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php if (is_active_sidebar('sidebar-3')) : ?>
                    <?php dynamic_sidebar('sidebar-3'); ?>                
                <?php else: ?>
                    <div class="widget widget_menu">		
                        <h4 class="widget-title"><?php _e('Navigation', 'profit-lite'); ?></h4>		
                        <?php
                        mp_profit_wp_page_short_menu();
                        ?>
                    </div>                     
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php if (is_active_sidebar('sidebar-4')) : ?>
                    <?php dynamic_sidebar('sidebar-4'); ?>                
                <?php else: ?>
                    <?php
                    $instance = array();
                    $instance['show_date'] = true;
                    $instance['number'] = 4;
                    wp_cache_delete('widget_recent_posts', 'widget');
                    the_widget('WP_Widget_Recent_Posts', $instance, $args);
                    ?> 
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php if (is_active_sidebar('sidebar-5')) : ?>
                    <?php dynamic_sidebar('sidebar-5'); ?>                
                    <?php
                else:
                    if (has_action('mp_profit_footer_default_widget_contact')) {
                        do_action('mp_profit_footer_default_widget_contact');
                    } else {
                        $instance = array();
                        wp_cache_delete('widget_meta', 'widget');
                        the_widget('WP_Widget_Meta', $instance, $args);
                    }
                endif;
                ?>
            </div>
        </div><!-- .widget-area -->
    </div>
</div>