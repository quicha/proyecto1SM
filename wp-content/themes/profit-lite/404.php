<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
get_header();
?>
<div class="wrapper-404">
    <div class="container main-container">
        <article id="page-404" <?php post_class(); ?>>
            <div class="entry-content">
                <h2 class="page-title"><?php _e('404', 'profit-lite'); ?></h2>
                <h3><?php _e("Oops! That page can&#39;t be found &#058;&#040;", 'profit-lite'); ?></h3>
                <p><?php _e('It looks like nothing was found at this location.<br/> Maybe try one of the links below or a search?', 'profit-lite'); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->  
        </article>    
    </div>
</div>
<div class="container">
    <?php get_sidebar('404'); ?>
</div>
<?php get_footer(); ?>
