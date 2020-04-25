<?php

// Include php files
include get_theme_file_path('/includes/shortcodes.php');

// Enqueue needed scripts
function needed_styles_and_scripts_enqueue() {

    // Add-ons


    // Custom script
    wp_enqueue_script( 'wpbs-custom-script', get_stylesheet_directory_uri() . '/assets/javascript/script.js' , array( 'jquery' ) );
    wp_enqueue_script( 'wpbs-custom-owl', get_stylesheet_directory_uri() . '/assets/owlcarousel/owl.carousel.min.js' , array( 'jquery' ) );
    if(is_page( 'blog' )){
      wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/assets/javascript/loadmore.js', array('jquery') );
    }
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/slick/slick.js', array('jquery') );

    // enqueue style
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri() . '/assets/owlcarousel/owl.carousel.min.css' );
    wp_enqueue_style( 'owl-styletheme', get_stylesheet_directory_uri() . '/assets/owlcarousel/owl.theme.default.min.css' );
    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/assets/slick/slick.css' );

    wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/assets/css/app.css' );


}
add_action( 'wp_enqueue_scripts', 'needed_styles_and_scripts_enqueue' );

function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_filter( 'widget_text', 'do_shortcode' );

//Dynamic Year
function site_year(){
	ob_start();
	echo date( 'Y' );
	$output = ob_get_clean();
    return $output;
}
add_shortcode( 'site_year', 'site_year' );

//
// Your code goes below
//
/**
 * Register support for Gutenberg wide images in your theme
 */


function mytheme_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );



add_action( 'after_setup_theme', 'setuplogo2' );
function setuplogo2() {
add_theme_support( 'custom-logo', array(

  'flex-width'  => false,
  'flex-height' => false,
'header-text' => array('site-title', 'site-description')
));}


// Load More

function true_load_posts(){

    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    query_posts( $args );

    if( have_posts() ) :


        while( have_posts() ): the_post();

            get_template_part( 'template-parts/load_more', get_post_format() );

        endwhile;

    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
