<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Hin
 * @since Hin 2.0
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<meta name="author" content="Magnus Rydén &amp; Fredrik Söderström">
		<title><?php
		global $page, $paged;
		bloginfo('name'); ?> ‒ <?php echo is_front_page() ? get_bloginfo('description') : get_the_title() ; ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="icon" href="<?php echo get_template_directory_uri() . '/images/hin.png'?>" type="image/png">
		<link href='http://fonts.googleapis.com/css?family=Junge|Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
		<?php wp_head(); ?>
		<script type="text/javascript">
		/*jQuery(function($) {
			Shadowbox.init();
			$('.entry-content-circle, .entry-content-circle-large, .entry-content-gallery-circle-large').hide().fadeIn(1000);
		});*/
		</script>
	</head>
	<body <?php body_class(); ?>>
		<div id="header-area">
			 <header id="masthead" class="site-header" role="banner" >
				<?php wp_nav_menu( array( 'menu' => 'menu left','sort_column' => 'menu_order', 'container_class' => 'menuleft' ) ); ?>
				<?php echo is_front_page() ? '<h1>' : ''; ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" rel="home"><?php bloginfo('name'); ?></a>
				<?php echo is_front_page() ? '</h1>' : ''; ?>
				<?php wp_nav_menu(array( 'menu' => 'menu right','sort_column' => 'menu_order', 'container_class' => 'menuright' ) ); ?>
			</header><!-- #masthead .site-header -->
		</div>
		<div id="main" class="site-main">
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
					<script type="text/javascript">
						var content = jQuery('#content').addClass('hidden');
						jQuery(window).load(function () {
							content.removeClass('hidden');
						});
					</script>
