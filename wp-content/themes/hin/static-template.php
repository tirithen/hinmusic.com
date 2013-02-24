<?php
/*
Template Name: Static-Template
*/
?>

<?php get_header(); ?>
	<div class="entry-content-circle-large fadeIn" role="main" >
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<h1 class="main-entry-title-circle"><?php the_title();?></h1>
			<?php the_content();?>
		<?php endwhile; endif;?>
	</div>
<?php get_footer(); ?>

