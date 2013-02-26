<?php
/**
 * @package Hin
 * @since Hin 1.0
 */
?>

<div class="entry-content-circle-large">
	<h1 class="main-entry-title-circle"><?php the_title();?></h1>
	<?php the_content(); ?>
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'shape' ), 'after' => '</div>' ) ); ?>
	<div class="entry-meta">
	<?php shape_posted_on(); ?>
	</div><!-- .entry-meta -->
</div><!-- .entry-content -->
