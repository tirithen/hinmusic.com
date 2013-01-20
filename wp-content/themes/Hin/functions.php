<?php
/**
 * Shape functions and definitions
 *
 * @package Hin
 * @since Hin 1.0
 */

 /**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Hin 1.0
 */



if ( ! isset( $content_width ) )
    $content_width = 950; /* pixels */

	if ( ! function_exists( 'hin_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Shape 1.0
 */
function hin_setup() {

    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );

    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );

    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on Shape, use a find and replace
     * to change 'shape' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'hin', get_template_directory() . '/languages' );

    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'aside' ) );

    /**
     * This theme uses wp_nav_menu() in one location.
     */
    /*register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'shape' ),
    ) );*/
}

function register_hin_menus() {
  register_nav_menus( array(
	'menu_left' => 'Menu Left',
	'menu_right' => 'Menu Right'
) );
}
add_action( 'init', 'register_hin_menus' );
endif;
add_action( 'after_setup_theme', 'hin_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Hin 1.0
 */
function hin_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'hin' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'hin' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'hin_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function hin_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'shadowbox', get_template_directory_uri() . '/js/shadowbox-3.0.3/shadowbox.css');
	wp_enqueue_style( 'codaslider', get_template_directory_uri() . '/js/codaslider/css/coda-slider.css');
	wp_enqueue_style( 'basicslider', get_template_directory_uri() . '/js/basicslider/bjqs.css');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );    }

    wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'shadowbox', get_template_directory_uri() . '/js/shadowbox-3.0.3/shadowbox.js', array( 'jquery' ), '20120206', true );
    wp_enqueue_script( 'codaslider', get_template_directory_uri() . '/js/codaslider/js/jquery.coda-slider-3.0.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'basicslider', get_template_directory_uri() . '/js/basicslider/js/bjqs-1.3.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'flippy', get_template_directory_uri() . '/js/flippy/jquery.flippy.js', array( 'jquery' ), '20130101', true );


    /*if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }*/
}
add_action( 'wp_enqueue_scripts', 'hin_scripts' );

if ( ! function_exists( 'shape_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Hin 1.0
 */
function shape_posted_on() {
    printf( __( '<a title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', 'shape' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'shape' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );
}
endif;

/**
 * Returns true if a blog has more than 1 category
 *
 * @since Hin 1.0
 */
function shape_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
        // Create an array of all the categories that are attached to posts
        $all_the_cool_cats = get_categories( array(
            'hide_empty' => 1,
        ) );

        // Count the number of categories that are attached to the posts
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'all_the_cool_cats', $all_the_cool_cats );
    }

    if ( '1' != $all_the_cool_cats ) {
        // This blog has more than 1 category so shape_categorized_blog should return true
        return true;
    } else {
        // This blog has only 1 category so shape_categorized_blog should return false
        return false;
    }
}

/**
 * Flush out the transients used in shape_categorized_blog
 *
 * @since Hin 1.0
 */
function shape_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'shape_category_transient_flusher' );
add_action( 'save_post', 'shape_category_transient_flusher' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * Hooks into the after_setup_theme action.
 *
 */
function shape_register_custom_background() {
    $args = array(
        'default-color' => 'e9e0d1',
    );

    $args = apply_filters( 'shape_custom_background_args', $args );

    if ( function_exists( 'wp_get_theme' ) ) {
        add_theme_support( 'custom-background', $args );
    } else {
        define( 'BACKGROUND_COLOR', $args['default-color'] );
        if (isset($args['default-image'])) {
            define( 'BACKGROUND_IMAGE', $args['default-image'] );
        } else {
            define( 'BACKGROUND_IMAGE', '' );
        }

        add_custom_background();
    }
}
add_action( 'after_setup_theme', 'shape_register_custom_background' );

add_action( 'init', 'create_article' );
function create_article() {
  $labels = array(
    'name' => _x('Articles', 'post type general name'),
    'singular_name' => _x('Article', 'post type singular name'),
    'add_new' => _x('Add New', 'Article'),
    'add_new_item' => __('Add New Article'),
    'edit_item' => __('Edit Article'),
    'new_item' => __('New Article'),
    'view_item' => __('View Article'),
    'search_items' => __('Search Articles'),
    'not_found' =>  __('No Articles found'),
    'not_found_in_trash' => __('No Articles found in Trash'),
    'parent_item_colon' => '',
	//'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  );

  $supports = array('title', 'editor','author', 'custom-fields', 'revisions', 'excerpt','comments');
  register_post_type( 'article',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports
    )
  );
}

add_action( 'init', 'create_imagelibrary' );
function create_imagelibrary() {
  $labels = array(
    'name' => _x('ImageLibraries', 'post type general name'),
    'singular_name' => _x('ImageLibrary', 'post type singular name'),
    'add_new' => _x('Add New', 'ImageLibrary'),
    'add_new_item' => __('Add New ImageLibrary'),
    'edit_item' => __('Edit ImageLibrary'),
    'new_item' => __('New ImageLibrary'),
    'view_item' => __('View ImageLibrary'),
    'search_items' => __('Search ImageLibraries'),
    'not_found' =>  __('No ImageLibraries found'),
    'not_found_in_trash' => __('No ImageLibraries found in Trash'),
    'parent_item_colon' => '',
	//'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  );

  $supports = array('title', 'editor','author', 'custom-fields', 'revisions', 'excerpt','comments');
  register_post_type( 'imagelibrary',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports
    )
  );
}

add_action( 'init', 'create_audiopost' );
function create_audiopost() {
  $labels = array(
    'name' => _x('Audioposts', 'post type general name'),
    'singular_name' => _x('Audiopost', 'post type singular name'),
    'add_new' => _x('Add New', 'Audiopost'),
    'add_new_item' => __('Add New Audiopost'),
    'edit_item' => __('Edit Audioposts'),
    'new_item' => __('New Audiopost'),
    'view_item' => __('View Audiopost'),
    'search_items' => __('Search Audioposts'),
    'not_found' =>  __('No Audioposts found'),
    'not_found_in_trash' => __('No Audioposts found in Trash'),
    'parent_item_colon' => '',
	);

  $supports = array('title', 'editor','author', 'custom-fields', 'revisions', 'excerpt','comments');
  register_post_type( 'audiopost',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports
    )
  );
}

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
return 230; }
