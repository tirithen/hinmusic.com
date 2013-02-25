<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Hin
 * @subpackage Hin
 * @since Hin 1.0
 */

get_header(); ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php shape_content_nav( 'nav-above' ); ?>

                <?php get_template_part( 'content', 'single' ); ?>

                <?php shape_content_nav( 'nav-below' ); ?>

            <?php endwhile; // end of the loop. ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
