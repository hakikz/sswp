<?php 

/**
 * Theme Support
 */

function ss_theme_support() {
    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
    add_theme_support( 'post-thumbnails' );
    

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */

    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'ss_theme_support' );
/**
 * Including Scripts
 */

function ss_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // Including Core jQuery
    wp_dequeue_script('jquery');
    wp_dequeue_script('jquery-core');
    wp_dequeue_script('jquery-migrate');
    wp_enqueue_script('jquery', false, array(), false, true);
    wp_enqueue_script('jquery-core', false, array(), false, true);
    wp_enqueue_script('jquery-migrate', false, array(), false, true);

    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', '', '', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', '', '', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', '', '', true );

}
add_action( 'wp_enqueue_scripts', 'ss_scripts' );



/**
 * Register Nav
 */

if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
 
    function ss_register_nav_menu(){
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'ss' ),
        ) );
        register_nav_menus( array(
            'cat_menu' => __( 'Category Menu', 'ss' ),
        ) );
    }
    add_action( 'after_setup_theme', 'ss_register_nav_menu', 0 );
}



/**
 * Option Page Code
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
    ));
    
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}


/**
 * Register Post Type for Projects
 */

function projects_post_type() {
    $args = array(
        'public'    => true,
        'label'     => __( 'Projects', 'ss' ),
        'menu_icon' => 'dashicons-book',
        'show_in_menu'       => true,
        'has_archive'        => true,
        // 'taxonomies'         => array('category'), 
        'rewrite'            => array( 'slug' => 'project' ),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
    );
    register_post_type( 'project', $args );
}
add_action( 'init', 'projects_post_type' );


/**
 * Redirect post type archive page to first post
 *
 * @return void
 */
function redirect_to_first_post_projects() {

    if( is_post_type_archive( 'project' ) ) {

        // Grab the first artist post ID and store it in an array
        $posts = get_posts( array(
            'post_type'         => 'project',
            'posts_per_page'    => 1,
            'fields'            => 'ids',
            'orderby'           => array( 'menu_order' => 'ASC', 'post_date' => 'ASC' ),
        ) );

        // If our array isn't empty, redirect
        if( ! empty( $posts ) ) {
            wp_redirect( get_permalink( $posts[0] ), 301 );     // Variable $posts[0] holds the artist post ID
            exit();
        }

    }

}
add_action( 'template_redirect', 'redirect_to_first_post_projects' );



function wp_nav_parent_class( $classes, $item ) {

    if( 'project' == get_post_type() && $item->title == "Projects" )
        array_push($classes, 'current_page_item');

    return $classes;
}
add_filter('nav_menu_css_class', 'wp_nav_parent_class', 10, 2);
