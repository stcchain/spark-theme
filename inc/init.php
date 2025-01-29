<?php 

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

// Theme Constants
require_once trailingslashit( get_template_directory() ) . 'inc/constants.php' ;

// Theme Setup
require_once DHRUBOK_INC_DIR . '/theme-setup.php';

// Theme Style and Scripts Enqueye
require_once DHRUBOK_INC_DIR . '/theme-style-and-scripts.php';

// Theme Shortcodes
require_once DHRUBOK_INC_DIR . '/nav-menu-walker.php';

// Theme Widgets
require_once DHRUBOK_INC_DIR . '/widgets.php';

// Domain Checker
require_once DHRUBOK_INC_DIR . '/domain-check.php';

// WooCommerce Menu Cart
require_once DHRUBOK_INC_DIR . '/woocommerce-menu-cart.php';

// Plugin Install
require_once DHRUBOK_INC_PLUGINS_DIR . '/install-plugin.php';


require_once DHRUBOK_INC_DIR . '/theme-options/cmb2-meta-box.php';
	

// Redux integration
if ( ! isset( $redux_demo ) ) {
	require_once DHRUBOK_INC_DIR . '/theme-options/theme-options.php';
}



// Load the theme textdomain
load_theme_textdomain('spark-theme');

// Include WPML Ingegration 
require_once DHRUBOK_DIR . '/wpml-integration.php';