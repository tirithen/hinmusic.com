<?php
/*
Template Name: home-template
*/
?>

<?php get_header(); ?>
				<?php
				$c = 0;
				$clastpost = 0;
				while ( have_posts() ) : the_post(); $c++; $clastpost = $c; ?>
					<?php if( $c == 1) {?>
					<div class="rowfull">
					<?php } else if($c == 4){?>
					<div class="rowpair">
						<?php } ?>
						<div align="center" class="entry-content-circle float-left" ">
							<h2 class="main-entry-title-circle"><?php hin_linked_title(); ?></h2>
							<?php hin_linked_excerpt(); ?>
							<?php shape_posted_on(); ?>
						</div>
						<?php if($c == 3) {
							echo '</div>';
						}
						else if($c == 5){
							echo '</div>';
							$c = 0;
						}
				endwhile;?>
				<?php
				if($clastpost != 3 || $clastpost != 5) {
					echo '</div>';
				}
				?>
<?php get_footer(); ?>

