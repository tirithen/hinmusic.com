<?php
/*
Template Name: home-template
*/
?>
 
<?php get_header(); ?>		
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">				
				<?php $args = array( 'post_type' => 'article', 'posts_per_page' => 20 );
				$loop = new WP_Query( $args );
				$c = 0;
				$clastpost = 0;
				while ( $loop->have_posts() ) : $loop->the_post(); $c++; $clastpost = $c; ?>
				<?php if( $c == 1) {?>				
				 <div class="rowfull">				 
				<?php } else if($c == 4){?>				
				<div class="rowpair">					
				<?php } ?>				
					<div align="center" class="entry-content-circle float-left">
						<div class="main-entry-title-circle">				
						 <?php the_title();?>		
					    </div>
				 <?php the_excerpt();?>				
				 <a class="comment-link" href="<?php comments_link(); ?>">
				   Mer..
				 </a>
				 <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				 <div class="entry-meta" style="float:right">
					<?php shape_posted_on(); ?>
				 </div><!-- .entry-meta -->				
				</div>				
				<?php if( $c == 3) {				
					    echo '</div>'; }
					  else if($c == 5){
			            echo '</div>'; 
			            $c = 0; }
				endwhile;?>			
				<?php
				if($clastpost != 3 || $clastpost != 5) {				
					    echo '</div>'; }					  
				?>				
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area --> 

<?php get_footer(); ?>

