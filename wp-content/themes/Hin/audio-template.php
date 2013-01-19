<?php
/*
Template Name: audio-template
*/
?>
<?php get_header(); ?>

<script type="text/javascript">
jQuery(document).ready(function($){	
generateGrid(3);
appendToGrid();
});

function generateGrid(columns){
var test =  jQuery('.entry-content-circle').length;
var rows = parseInt(test/2 + 1);
var grid = jQuery('<table>').addClass('randomGrid');
 for(i=0;i<rows;i++){
   var row = jQuery('<tr>').addClass('randomGrid-row'); 
   for(j=0;j<columns;j++){
	var column = jQuery('<td>').addClass('randomGrid-column');
	row.append(column);
   }
   grid.append(row);
   }
   jQuery('#content').append(grid);
   appendToGrid();
}
function appendToGrid(){
var content =  jQuery('.entry-content-circle').clone();
jQuery('.randomGrid tr').each( function(){
	jQuery(this).children('td').each(function() {
	
	//jQuery(this).append(post);	
	});
});

}

</script>		
        <div id="primary-fixed-large" class="content-area">
            <div id="content" class="site-content" role="main">				
				<?php $args = array( 'post_type' => 'audiopost', 'posts_per_page' => 20 );
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

