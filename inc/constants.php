<?php 

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

// Define the DHRUBOK Folder
if( ! defined( 'DHRUBOK_DIR' ) ) {
	define('DHRUBOK_DIR', get_template_directory() );
}

// Define the DHRUBOK Partials Folder
if( ! defined( 'DHRUBOK_PARTIALS_DIR' ) ) {
	define('DHRUBOK_PARTIALS_DIR', trailingslashit( DHRUBOK_DIR ) . 'partials' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'DHRUBOK_INC_DIR' ) ) {
	define('DHRUBOK_INC_DIR', trailingslashit( DHRUBOK_DIR ) . 'inc' );
}

// Define the Libs Folder of the DHRUBOK Directory
if( ! defined( 'DHRUBOK_LIBS_DIR' ) ) {
	define('DHRUBOK_LIBS_DIR', trailingslashit( DHRUBOK_DIR ) . 'libs' );
}

// Define the Shortcodes Folder of the DHRUBOK Directory
if( ! defined( 'DHRUBOK_SHORTCODES_DIR' ) ) {
	define('DHRUBOK_SHORTCODES_DIR', trailingslashit( DHRUBOK_INC_DIR ) . 'shortcodes' );
}

// Define the Classes Folder of the DHRUBOK Directory
if( ! defined( 'DHRUBOK_CLASSES_DIR' ) ) {
	define('DHRUBOK_CLASSES_DIR', trailingslashit( DHRUBOK_INC_DIR ) . 'classes' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'DHRUBOK_WIDGETS_DIR' ) ) {
	define('DHRUBOK_WIDGETS_DIR', trailingslashit( DHRUBOK_INC_DIR ) . 'widgets' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'DHRUBOK_INC_VC_DIR' ) ) {
	define('DHRUBOK_INC_VC_DIR', trailingslashit( DHRUBOK_INC_DIR ) . 'visual_composer' );
}

// Define the PLUGINS Folder of the DHRUBOK Directory
if( ! defined( 'DHRUBOK_INC_PLUGINS_DIR' ) ) {
	define('DHRUBOK_INC_PLUGINS_DIR', trailingslashit( DHRUBOK_INC_DIR ) . 'plugins' );
}

// Define the Domain Availability Checker Folder of the DHRUBOK Directory
if( ! defined( 'DHRUBOK_DAC_DIR' ) ) {
	define('DHRUBOK_DAC_DIR', trailingslashit( DHRUBOK_INC_DIR ) . 'domain-checker' );
}