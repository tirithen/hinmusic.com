<?php
/**
 * @package Hin
 * @since Hin 1.0
 */
?> 
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function(jQuery){
	jQuery(function($) {		
		$('.entry-content-circle-large').fadeIn(1000);
	});	
});
</script>		

<div class="entry-content-circle-large">
    <h1 class="main-entry-title-circle"><?php the_title();?></h1>
    <?php the_content(); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'shape' ), 'after' => '</div>' ) ); ?>
    <?php edit_post_link( __( 'Redigera', 'shape' ), ' <span class="edit-link">', '</span>' ); ?>
    <div class="entry-meta" style="float:right">
    <?php shape_posted_on(); ?>
    </div><!-- .entry-meta -->
</div><!-- .entry-content -->
