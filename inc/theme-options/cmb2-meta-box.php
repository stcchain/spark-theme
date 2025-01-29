<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */


/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function yourprefix_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object
 */
function yourprefix_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo $classes; ?>">
		<p><label for="<?php echo $id; ?>"><?php echo $label; ?></label></p>
		<p><input id="<?php echo $id; ?>" type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo $description; ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object
 */
function yourprefix_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo $field->row_classes(); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo $field->args( 'description' ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'spark_page_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function spark_page_metabox() {
	$prefix = 'spark_';

	/**
	 * Metabox for Pages
	 */
	$spark_page_options = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Page Header Options', 'spark-theme' ),
		'object_types'  => array( 'page', ), // Post type
		'classes'    => 'spark-custom-page-options-class', // Extra cmb2-wrap classes
	) );



	$spark_page_options->add_field( array(
	  'name'             	=> __( 'Page header style', 'spark-theme' ),
		'id'   			   	=> $prefix . 'page_header_style',
		'desc' 				=> __( 'Select the page header options', 'spark-theme' ),
	    'type'             => 'radio',
	    'options'          => array(
	        'header-style-1' => ' <span class="radio-text">Header style 1</span><img src="'. get_template_directory_uri() .'/img/header-styles/version1.png" alt="" class="img-responsive">',
	        'header-style-2' => ' <span class="radio-text">Header style 2</span><img src="'. get_template_directory_uri() .'/img/header-styles/version2.png" alt=""  class="img-responsive">',
	        'header-style-3' => ' <span class="radio-text">Header style 2</span><img src="'. get_template_directory_uri() .'/img/header-styles/version3.png" alt=""  class="img-responsive">',
	    ),
	) );


	$spark_page_options->add_field( array(
		'name'       => __( 'Turn Breadcrumb On/Off ', 'spark-theme' ),
		'desc'       => __( 'Check to turn on or off breadcrumb on the page. It can override Theme Options Breadcrumb Settings.', 'spark-theme' ),
		'id'         => $prefix . 'breadcrumb_switch',
		'type'       => 'radio',
		'options'          => array(
			'on' => __( 'Breadcrumb On', 'spark-theme' ),
			'off'   => __( 'Breadcrumb Off', 'spark-theme' ),
		),
		'default'       => 'on',
	) );

	$spark_page_options->add_field( array(
		'name'       => __( 'Breadcrumb Background  Image', 'spark-theme' ),
		'desc'       => __( 'Set Breadcrumb Background Image ', 'spark-theme' ),
		'id'         => $prefix . 'breadcrumb_bg_image',
		'type'       => 'file',
	) );

	$spark_page_options->add_field( array(
		'name'       => __( 'Breadcrumb Background Color', 'spark-theme' ),
		'desc'       => __( 'Set Breadcrumb Area Background Color ', 'spark-theme' ),
		'id'         => $prefix . 'breadcrumb_bg_color',
		'type'       => 'colorpicker',
	) );

	$spark_page_options->add_field( array(
		'name'       => __( 'Footer Theme', 'spark-theme' ),
		'desc'       => __( 'Set footer theme for this specific page.', 'spark-theme' ),
		'id'         => $prefix . 'footer_theme',
		'type'       => 'select',
		'options'          => array(
			'select-option' => __( 'Select Option', 'spark-theme' ),
			'footer-light' => __( 'Footer Light', 'spark-theme' ),
			'footer-dark'   => __( 'Footer Dark', 'spark-theme' ),
		),
		'default'       => 'select-option',
	) );

	/**
	 *
	 * Metabox for Testimonial Post Type
	 *
	 */
	$spark_testimonial = new_cmb2_box( array(
		'id'            => $prefix . 'testimonial_metabox',
		'title'         => __( 'Testimonial options', 'spark-theme' ),
		'object_types'  => array( 'testimonial', ), // Post type
	) );

	$spark_testimonial->add_field( array(
	    'name'             	=> __( 'Author Image', 'spark-theme' ),
		'id'   			   	=> $prefix . 'testimonial_a_img',
		'desc' 				=> __( 'Upload author image', 'spark-theme' ),
	    'type'             	=> 'file'
	) );
	
	$spark_testimonial->add_field( array(
	    'name'             	=> __( 'Testimonial', 'spark-theme' ),
		'id'   			   	=> $prefix . 'testimonial_description',
		'desc' 				=> __( 'Give the testimonial', 'spark-theme' ),
	    'type'             	=> 'textarea'
	) );


	$spark_testimonial->add_field( array(
	    'name'             	=> __( 'URL', 'spark-theme' ),
		'id'   			   	=> $prefix . 'testimonial_url',
		'desc' 				=> __( 'Give the url', 'spark-theme' ),
	    'type'             	=> 'text_url'
	) );

}


add_action( 'cmb2_admin_init', 'spark_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function spark_register_user_profile_metabox() {
	$prefix = 'spark_';

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'user',
		'title'            => __( 'User Profile Metabox', 'spark-theme' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );


	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', 'spark-theme' ),
		'desc' => __( 'field description (optional)', 'spark-theme' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', 'spark-theme' ),
		'desc' => __( 'field description (optional)', 'spark-theme' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', 'spark-theme' ),
		'desc' => __( 'field description (optional)', 'spark-theme' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Youtube URL', 'spark-theme' ),
		'desc' => __( 'field description (optional)', 'spark-theme' ),
		'id'   => $prefix . 'youtubeurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', 'spark-theme' ),
		'desc' => __( 'field description (optional)', 'spark-theme' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Pinterest URL', 'spark-theme' ),
		'desc' => __( 'field description (optional)', 'spark-theme' ),
		'id'   => $prefix . 'pinteresturl',
		'type' => 'text_url',
	) );
}
