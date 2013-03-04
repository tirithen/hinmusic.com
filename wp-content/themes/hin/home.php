<?php
/*
Template Name: home-template
*/
?>

<?php get_header(); ?>
<?php
$i = 0;
while ( have_posts() ) : the_post(); $i++; $i_modulo_5 = $i % 5; ?>
	<?php if($i_modulo_5 === 1) {?>
	<div class="rowfull">
	<?php } else if($i_modulo_5 === 4){?>
	<div class="rowpair">
		<?php } ?>
		<div class="entry-content-circle float-left">
			<h2 class="main-entry-title-circle"><?php hin_linked_title(); ?></h2>
			<?php hin_linked_excerpt(); ?>
			<?php shape_posted_on(); ?>
		</div>
		<?php
		if($i_modulo_5 === 3 || $i_modulo_5 === 0) {
			echo '</div>';
		}
endwhile;?>
<?php get_footer(); ?>

