<?php
/**
 * Template Name: With Left Sidebar
 * The template file for pages with left sidebar.
 * @package Profit
 * @since Profit 1.0
 */
get_header();
if (!(is_front_page())) :
    ?>
    <div class="page-header">
        <div class="container">
            <h2 class="page-title"><?php the_title(); ?></h2>
            <div class="breadcrumb-wrapper">
                <?php mp_profit_the_breadcrumb(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="main-container container">    
    <div class="row clearfix">
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <?php get_sidebar(); ?>
        </div>
        <div class=" col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <?php if (have_posts()) : ?>
                <?php /* The loop */ ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="entry-content">
                            <?php the_content(); ?>                            
                        </div><!-- .entry-content -->
                    </article><!-- #post -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>