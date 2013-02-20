<?php
/*
Template Name: imagelibrary-template
*/
?>
 
<?php get_header(); ?>	
        <div id="primary-full " class="content-area">
           <div id="content" class="site-content" role="main">
				<?php $args = array( 'post_type' => 'imagelibrary', 'posts_per_page' => 10 );
				$loop = new WP_Query( $args );
				?>							
			 <div id="slider" class="slider fadeIn" style="width:100%">
				<ul class="bjqs">				
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>				
				<li>
				<div class="entry-content-gallery-circle-large">
				<div class="main-entry-title-circle">
				<h2><?php the_title();?><h2><br /><br />		
				</div>
				<?php //remove_filter (‘the_content’, ‘wpautop’); ?>
				<div class="gallerycollection ">
				<?php the_content();?>
				</div>
				<br />				
				<?php edit_post_link( __( 'Redigera', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				<div class="entry-meta" style="float:right">
					<?php shape_posted_on(); ?>
				</div><!-- .entry-meta -->
				</div>				
				</li><!-- .basic-slider-item -->
				<?php endwhile;?>
				<ul>
			 </div> 
					
          </div><!-- #content .site-content -->
        </div><!-- #primary .content-area --> 

<?php get_footer(); ?>

