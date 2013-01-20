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
<meta name="author" content="Magnus Rydén">
<title><?php
global $page, $paged;

?>Hin  <?php wp_title( '|', true, 'right' )?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" href="<?php echo get_template_directory_uri() . '/images/hin.png'?>" type="image/png">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script type="text/javascript">
jQuery(document).ready(function($){
	Shadowbox.init();
	$('.entry-content-circle').fadeIn(1000);
	$('.entry-content-circle-large').fadeIn(1000);
	$('.entry-content-gallery-circle-large').fadeIn(1000);
});
</script>
</head>

<body <?php body_class(); ?> style="margin-top:-15px;">
<img src="<?php echo get_template_directory_uri() . '/images/backgroundfuzzy.png'?>" class="bg">
<div id="header-area">
     <header id="masthead" class="site-header" role="banner" >
		<br />
		<div class="headercontainer-left">
		<div class="headersection-stripe-filler-top"></div>
		  <div class="headersection-left-stripe">
			<div class="site-navigation main-navigation">
				<?php wp_nav_menu( array( 'menu' => 'menu left','sort_column' => 'menu_order', 'container_class' => 'menuleft' ) ); ?>
			</div>
		 </div>
		</div>
		<div class="headercontainer-right">
		<div class="headersection-stripe-filler-top"></div>
		  <div class="headersection-right-stripe">
			<div class="site-navigation main-navigation">
				<?php wp_nav_menu(array( 'menu' => 'menu right','sort_column' => 'menu_order', 'container_class' => 'menuright' ) ); ?>
			</div>
		  </div>
		</div>
		<div class ="headersection-center">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<img src="<?php echo get_template_directory_uri() . '/images/headers/HEADERlogga2.png'?>">
        </a>
        </div>

     </header><!-- #masthead .site-header -->
	 </div>
<div id="main" class="site-main">
