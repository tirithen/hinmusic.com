<?php
/*
Template Name: Members listing template
*/
?>

<?php get_header(); ?>
	<h1><?php the_title();?></h1>
	<ul>
		<?php
			$args = array('post_type' => 'member', 'posts_per_page' => -1);
			$loop = new WP_Query($args);
			if (have_posts()) : while ($loop->have_posts()) : $loop->the_post();
		?>
			<li>
				<div class="entry-content-circle-member">
					<h2><?php the_title();?></h2>
					<?php the_content();?>
				</div>
				<?php
				if (has_post_thumbnail()) {
					the_post_thumbnail(array(300, 300));
				}
				?>
			</li>
		<?php endwhile; endif;?>
	</ul>
<?php get_footer(); ?>

