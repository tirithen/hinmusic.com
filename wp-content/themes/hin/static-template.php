<?php
/*
Template Name: Static-Template
*/
?>

<?php get_header(); ?>
<script type="text/javascript">
	jQuery.noConflict();
	jQuery(document).ready(function(jQuery){
		jQuery(function($) {		
			$('.entry-content-circle-large').fadeIn(1000);
		});	
	});
</script>
<div id="primary" class="content-area">
	<div id="content" class="entry-content-circle-large" role="main" >
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<h1 class="main-entry-title-circle"><?php the_title();?></h1>
			<?php the_content();?>
		<?php endwhile; endif;?>
	</div><!-- #content .static-site-content -->
</div><!-- #primary .content-area -->
<?php get_footer(); ?>

