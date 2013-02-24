<?php
/*
Template Name: audio-template
*/
?>
<?php get_header(); ?>
        <div id="primary-fixed-large" class="content-area">
            <div id="content" class="site-content" role="main">
	      <h1 class="cliphide"><?php the_title(); ?></h1>
			<?php $args = array( 'post_type' => 'audiopost', 'posts_per_page' => 20 );
				$loop = new WP_Query( $args );
				$c = 0;
				$clastpost = 0;
				while ( $loop->have_posts() ) : $loop->the_post(); $c++; $clastpost = $c; ?>
				<?php if( $c == 1) {?>				
				 <div class="rowfull-medium">				 
				<?php } else if($c == 3){?>				
				<div class="rowsingle-medium">					
				<?php } ?>	
				<?php if( $c == 2) {?>	
					<div align="center" class="entry-content-circle-medium float-left invisible"></div>	
				<?php } ?>
					<div align="center" class="entry-content-circle-medium float-left fadeIn">
							<h2 class="main-entry-title-circle"><?php the_title();?></h2>
					<div class="audiocontainer">
						<?php the_content();?>						
					</div>	
					<div class="entry-meta" style="float:right">
						<?php shape_posted_on(); ?>
					</div><!-- .entry-meta -->
					</div>									
				<?php if( $c == 2) {?>
					</div>				
				<?php } else if($c == 3) { ?>
					</div>
			    <?php $c = 0; }?>
				<?php endwhile;?>				
				<?php if($clastpost != 3 || $clastpost != 4) {?>
					</div>
				<?php } ?>
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->

<?php get_footer(); ?>

