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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">         
    </header><!-- .entry-header -->
 
    <div class="entry-content-circle-large" style="display:none">
	    <div class="main-entry-title-circle">
				<?php the_title();?>		
		</div>
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'shape' ), 'after' => '</div>' ) ); ?>
		<?php //if ( comments_open()) : // Comments and trackbacks open ?>
             <?php //printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a>'); ?>
	    <?php if ( comments_open()) : // Comments and trackbacks open ?>                          
            <?php _e( '<a class="comment-link" href="#respond" title="Post a comment">post a comment</a> ', 'shape' ); ?>                       
        <?php endif; ?>  
		<?php //endif; ?>
		<?php edit_post_link( __( 'Edit', 'shape' ), ' <span class="edit-link">', '</span>' ); ?>
		<div class="entry-meta" style="float:right">
					<?php shape_posted_on(); ?>
		</div><!-- .entry-meta -->		
    </div><!-- .entry-content -->
  
    <!-- <footer class="entry-meta">-->                                
        	
        <?php
            /* translators: used between list items, there is a space after the comma */
            //$category_list = get_the_category_list( __( ', ', 'shape' ) );
 
            /* translators: used between list items, there is a space after the comma */
            //$tag_list = get_the_tag_list( '', ', ' );
 
            /*if ( ! shape_categorized_blog() ) {
                // This blog only has 1 category so we just need to worry about tags in the meta text
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'shape' );
                } else {
                    $meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'shape' );
                }
 
            } else {
                // But this blog has loads of categories so we should probably display them here
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'shape' );
                } else {
                    $meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'shape' );
                }
 
            } // end check for categories on this blog
 
            printf(
                $meta_text,
                $category_list,
                $tag_list,
                get_permalink(),
                the_title_attribute( 'echo=0' )
            );*/
        ?>	
        
    <!--</footer> .entry-meta -->
	<?php //comments_template( '', true ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
