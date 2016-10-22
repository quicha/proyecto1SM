<?php
/**
 * The template for displaying Forum pages
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
get_header();
?>
<?php
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
<div class="container main-container">
    <div>
        <?php if (have_posts()) : ?>
            <?php /* The loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php get_footer(); ?>
   