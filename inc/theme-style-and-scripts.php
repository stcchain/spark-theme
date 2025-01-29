<?php 

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

/**
 *
 * Enqueue style and scripts 
 *
 */
function spark_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css' );
	
	wp_enqueue_style( 'webfonts', get_template_directory_uri() . '/fonts/webfonts/fonts.css' );
	
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/css/nice-select.css' );

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );

	wp_enqueue_style( 'spark-css', get_template_directory_uri() . '/css/custom/style.css' );
	
	wp_enqueue_style( 'spark-responsive', get_template_directory_uri() . '/css/responsive/responsive.css' );

	wp_enqueue_style( 'spark-style', get_stylesheet_uri() );



	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'nice-select-js', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/js/fastclick.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'prism', get_template_directory_uri() . '/js/prism.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), null, true );

	wp_enqueue_script( 'domain-check', get_template_directory_uri() . '/js/domain-check.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'active', get_template_directory_uri() . '/js/active.js', array('jquery'), null, true );


 	wp_localize_script( 'domain-check', 'wdc_ajax', array(
        'ajaxurl'       => admin_url( 'admin-ajax.php' ),
        'wdc_nonce'     => wp_create_nonce( 'wdc_nonce' ),
        'siteUrl'     	=> home_url('/'),
        'whmcsBridgeUrl'     	=> spark_whmcs_bridge_url(),
        'domainCheckerUrl'     	=> spark_whmcs_bridge_url() . 'domainchecker',
    ));

	if( is_singular() && comments_open() && get_option( 'thread_comment' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	spark_google_maps_js_script();

}
add_action( 'wp_enqueue_scripts', 'spark_scripts' );




/**
 *
 * Admin Enqueue styles and scripts
 *
 */

function spark_admin_scripts() {

	wp_enqueue_style( 'spark_admin_style', get_template_directory_uri() . '/css/spark_admin.css');
}
add_action( 'admin_enqueue_scripts', 'spark_admin_scripts' );