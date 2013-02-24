<?php
/*
Template Name: Members listing template
*/
?>

<?php get_header(); ?>
<div id="primary" class="content-area">
	<h1 class="fadeIn"><?php the_title();?></h1>
	<ul id="content" role="main">
		<?php
			$args = array('post_type' => 'member', 'posts_per_page' => -1);
			$loop = new WP_Query($args);
			if (have_posts()) : while ($loop->have_posts()) : $loop->the_post();
		?>
			<li>
				<div class="entry-content-circle-member fadeIn">
					<h2><?php the_title();?></h2>
					<?php the_content();?>
				</div>
				<?php
				if (has_post_thumbnail()) {
					//~ the_post_thumbnail(array('class' => 'entry-content-circle'));
					the_post_thumbnail(array(300, 300));
				}
				?>
			</li>
		<?php endwhile; endif;?>
	</ul>
</div>
<?php get_footer(); ?>

