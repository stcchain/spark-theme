<?php


// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once DHRUBOK_WIDGETS_DIR . '/about_us_widget.php';

function spark_theme_sidebar() {


	// Registering widgets for sidebar
	$args = array(
		'name'          => esc_html__( 'Spark Theme Sidebar', 'spark-theme' ),
		'id'            => 'spark_sidebar',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="h4">',
		'after_title'   => '</div>'
	);

	register_sidebar($args);


	// Registering widgets for Shop page
	$args = array(
		'name'          => esc_html__( 'Shop sidebar', 'spark-theme' ),
		'id'            => 'spark_shop_sidebar',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div class="widget"><div class="shop-widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="h4">',
		'after_title'   => '</h4>'
	);

	register_sidebar($args);

	// Registering widgets for footer
	$args = array(
		'name'          => esc_html__( 'Footer Widgets', 'spark-theme' ),
		'id'            => 'spark_footer_sidebar',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div class="col-sm-3"><div class="widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="h4">',
		'after_title'   => '</h4>'
	);

	register_sidebar($args);

	// Registering widgets for sidebar
	$args = array(
		'name'          => esc_html__( 'Spark Header bar widgets', 'spark-theme' ),
		'id'            => 'header_bar_sidebar',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div class="header_bar_sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => ''
	);

	register_sidebar($args);


	// Registering Spark About us Widget
	register_widget( 'SparkAboutUsWidget' );
}
add_action('widgets_init', 'spark_theme_sidebar');
