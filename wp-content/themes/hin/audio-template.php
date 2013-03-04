<?php
/*
Template Name: audio-template
*/
?>
<?php get_header(); ?>
		<h1 class="cliphide"><?php the_title(); ?></h1>
		<?php
		$args = array( 'post_type' => 'audiopost', 'posts_per_page' => 20 );
		$loop = new WP_Query( $args );
		$i = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); $i++; $i_modulo_3 = $i % 4; ?>
			<?php
			if($i_modulo_3 === 1) {
				echo '<div class="rowfull-medium">';
			} else if($i_modulo_3 === 3){
				echo '<div class="rowsingle-medium">';
			}
			?>
				<div class="entry-content-circle-medium">
					<h2 class="main-entry-title-circle"><?php the_title();?></h2>
					<div class="audiocontainer"><?php the_content();?></div>
					<div class="entry-meta">
						<?php shape_posted_on(); ?>
					</div><!-- .entry-meta -->
				</div>
		<?php
		if($i_modulo_3 === 2 || $i_modulo_3 === 0) {
			echo '</div>';
		}
		 endwhile; ?>
<?php get_footer(); ?>
