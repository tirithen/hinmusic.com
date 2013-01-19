<?php
/*
Template Name: Static-Template
*/
?>
 
<?php get_header(); ?>		
        <div id="primary" class="content-area">
            <div id="content" class="entry-content-circle-large" role="main" > 
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<div class="main-entry-title-circle">
				<?php the_title();?>		
			</div>
			<?php the_content();?>
			<?php endwhile; endif;?>
           </div><!-- #content .static-site-content -->
        </div><!-- #primary .content-area --> 

<?php get_footer(); ?>

