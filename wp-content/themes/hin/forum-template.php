<?php
/*
Template Name: forum
*/
?>

<?php get_header(); ?>
		<?php get_sidebar(); ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'singleguestbook' ); ?>

                    <?php /*comments_template( '', true );*/ ?>

                <?php endwhile;  // end of the loop. ?>
<?php get_footer(); ?>

