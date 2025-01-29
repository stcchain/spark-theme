<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "spark";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'spark-theme' ),
        'page_title'           => __( 'Theme Options', 'spark-theme' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 2,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'spark-theme' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'spark-theme' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'spark-theme' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'spark-theme' ),
            'content' => '<p>' . __( 'This is the tab content, HTML is allowed.', 'spark-theme' ) . '</p>'
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'spark-theme' ),
            'content' => '<p>' . __( 'This is the tab content, HTML is allowed.', 'spark-theme' ) . '</p>'
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content =  '<p>' . __( 'This is the sidebar content, HTML is allowed.', 'spark-theme' ) . '</p>';
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START General Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'General Settings', 'spark-theme' ),
        'id'               => 'general',
        'desc'             => __( 'Spark theme general settings!', 'spark-theme' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );



    Redux::setSection( $opt_name, array(
        'title'            => __( 'general settings', 'spark-theme' ),
        'id'               => 'general-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => __( 'Logo', 'spark-theme' ),
                'subtitle' => __( 'Choose the site logo', 'spark-theme' ),
                'default'  => array(
                    'url'=>  get_template_directory_uri() . '/img/logo.png'
                ),
            ),
            array(
                'id'       => 'logo-height',
                'type'     => 'text',
                'title'    => __( 'Logo Height', 'spark-theme' ),
                'subtitle' => __( 'Set the logo height', 'spark-theme' ),
                'default'  => '37px',
            ),
            array(
                'id'       => 'logo-width',
                'type'     => 'text',
                'title'    => __( 'Logo Width', 'spark-theme' ),
                'subtitle' => __( 'Set the logo width', 'spark-theme' ),
                'default'  => '140px',
            ),
            array(
                'id'       => 'preloader',
                'type'     => 'switch',
                'title'    => __( 'Preloader', 'spark-theme' ),
                'subtitle' => __( 'Show or hide preloader', 'spark-theme' ),
                'default'  => true
            ),
            array(
                'id'       => 'preloader_logo_set',
                'type'     => 'switch',
                'title'    => __( 'Use Preloader Logo', 'spark-theme' ),
                'subtitle' => __( 'Turn on or off to use your own logo or default preloader.', 'spark-theme' ),
                'default'  => false
            ),
            array(
                'id'       => 'preloader_logo',
                'type'     => 'media',
                'title'    => __( 'Preloader Logo', 'spark-theme' ),
                'subtitle' => __( 'Personalize your own preloader logo.', 'spark-theme' ),
                'default'  => array(
                    'url'=>  ''
                ),
            ),
            array(
                'id'       => 'primary-theme-color',
                'type'     => 'color_rgba',
                'title'    => __( 'Primary theme color', 'spark-theme' ),
                'subtitle' => __( 'Set the primary theme color.', 'spark-theme' ),
                'default'  => array(
                    'color' => '#288FEB',
                    'alpha' => 1,
                ),
            ),
            array(
                'id'       => 'secondary-theme-color',
                'type'     => 'color_rgba',
                'title'    => __( 'Secondary theme color', 'spark-theme' ),
                'subtitle' => __( 'Set the secondary theme color.', 'spark-theme' ),
                'default'  => array(
                    'color' => '#3FA5FF',
                    'alpha' => 1,
                ),
            ),
        )
    ) );





    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header settings', 'spark-theme' ),
        'id'               => 'header-settings',
        'subsection'       => true,
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'header_layout',
                'type'     => 'radio',
                'title'    => __( 'Header layout', 'spark-theme' ),
                'subtitle' => __( 'Select the header navigation layout', 'spark-theme' ),
                'desc' => __( 'This settings can be override from page header settings.', 'spark-theme' ),
                'options'          => array(
                    'header-style-1' => '<img src="'. get_template_directory_uri() .'/img/header-styles/version1.png" alt="" class="radio-img">',
                    'header-style-2' => '<img src="'. get_template_directory_uri() .'/img/header-styles/version2.png" alt="" class="radio-img">',
                    'header-style-3' => '<img src="'. get_template_directory_uri() .'/img/header-styles/version3.png" alt="" class="radio-img">'
                ),
                'default'  => 'header-style-1',
            ),
            array(
                'id'       => 'spark_header_widgets',
                'type'     => 'textarea',
                'title'    => __( 'Header Lists', 'spark-theme' ),
                'subtitle' => __( '', 'spark-theme' ),
                'default'     => '[spark_list icon="fa-phone" text="+214-5212-829" link="tel:+214-5212-829"]',
            ),
            array(
                'id'       => 'whmcs_client_area',
                'type'     => 'switch',
                'title'    => __( 'WHMCS Client area button', 'spark-theme' ),
                'subtitle' => __( 'Turn on / off for WHMCS client area on top header bar.', 'spark-theme' ),
                'default'  => true
            ),
            array(
                'id'       => 'woo_cart_switch',
                'type'     => 'switch',
                'title'    => __( 'Show/Hide WooCommerce Shopping Cart', 'spark-theme' ),
                'subtitle' => __( 'Turn on / off for WooCommerce Shopping on header bar.', 'spark-theme' ),
                'default'  => true
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer settings', 'spark-theme' ),
        'id'               => 'footer-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'footer-copyright',
                'type'     => 'textarea',
                'title'    => __( 'Footer copyright text', 'spark-theme' ),
                'subtitle' => __( 'Enter footer copyright text', 'spark-theme' ),
                'default'  => __( '&copy; Copyright 2016 Spark, All Rights Reserved', 'spark-theme' )
            ),
        )
    ) );


    // - Start Layout Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Layout', 'spark-theme' ),
        'id'               => 'layout-settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'box_layout',
                'type'     => 'switch',
                'title'    => __( 'Box Layout', 'spark-theme' ),
                'subtitle' => __( 'Turn on to activate box mood', 'spark-theme' ),
                'default'  => false
            ),
            array(
                'id'       => 'body_background',
                'type'     => 'background',
                'output'    => array( 'body' ),
                'title'    => __('Background', 'spark-theme'),
                'desc'     => __('Set the width for box layout mode.', 'spark-theme'),
                'required'   => array( 'box_layout', 'equals', true ),
            ),
            array(
                'id'       => 'box_layout_width',
                'type'     => 'dimensions',
                'height'     => false,
                'units'    => array('em','px','%'),
                'output'    => array( '.box_mode.active' ),
                'title'    => __('Box layout width', 'spark-theme'),
                'desc'     => __('Set the width for box layout mode.', 'spark-theme'),
                'required'   => array( 'box_layout', 'equals', true ),
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Breadcrumbs', 'spark-theme' ),
        'id'               => 'breadcrumb_settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'breadcrumb_on',
                'type'     => 'switch',
                'title'    => __( 'Breadcrumb On/Off ', 'spark-theme' ),
                'subtitle'    => __( 'Show/hide the breadcrumb.', 'spark-theme' ),
                'desc'      => __( 'This setting can be override by page breatdcrumb settings.', 'spark-theme' ),
                'default'     => true,
            ),
            array(
                'id'        => 'breadcrumb_background',
                'type'      => 'background',
                'output'    => array('.pageTitleArea'),
                'title'     => __( 'Breadcrumb Background', 'spark-theme' ),
                'subtitle'  => __( 'Customize your breadcrumb background area.', 'spark-theme' ),
                'desc'      => __( 'This setting can be override by page breatdcrumb settings.', 'spark-theme' ),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
                'default'   => array(
                    'background-color' => '#EFEFEE',
                )
            ),
            array(
                'id'                => 'breadcrumb_spacing',
                'type'              => 'spacing',
                'output'            => array('.pageTitle'),
                'mode'              => 'padding',
                'units'             => array('em', 'px'),
                'units_extended'    => 'false',
                'title'             => __('Breadcrumb Area Padding', 'spark-theme'),
                'subtitle'          => __('Please specify breadcrumb area padding.', 'spark-theme'),
                'required'          => array( 'breadcrumb_on', 'equals', true ),
                'default'            => array(
                    'padding-top'     => '40px',
                    'padding-right'   => '0px',
                    'padding-bottom'  => '40px',
                    'padding-left'    => '0px',
                    'units'          => 'px',
                )
            ),
            array(
                'id'          => 'breadcrumb_typography',
                'type'        => 'typography',
                'title'       => __('Breadcrumb Title Typography', 'spark-theme'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'output'      => array('.pageTitle .h2'),
                'units'       =>'px',
                'subtitle'    => __('Set typography for breadcrumb title', 'spark-theme'),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
                'default'     => array(
                    'color'       => '#233141',
                    'font-style'  => '700',
                    'font-family' => 'Roboto',
                    'google'      => true,
                    'font-size'   => '26px',
                    'line-height' => '32px'
                ),
            ),
            array(
                'id'          => 'breadcrumb_pages_typography',
                'type'        => 'typography',
                'title'       => __('Breadcrumb Pages Link Typography', 'spark-theme'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'output'      => array('.spark-breadcrumb li a'),
                'units'       =>'px',
                'subtitle'    => __('Set typography for breadcrumb pages link', 'spark-theme'),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
                'default'     => array(
                    'color'       => '#8ba1b9',
                    'font-style'  => '400',
                    'font-family' => 'Roboto',
                    'google'      => true,
                    'font-size'   => '14px',
                    'line-height' => '18px'
                ),
            ),
        )
    ) );



    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'spark-theme' ),
        'id'               => 'typography',
        'desc'             => esc_html__( 'Choose typography for your site', 'spark-theme' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
    ) );

    // -> START General Typography
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Typography', 'spark-theme' ),
        'id'               => 'general_typography',
        'desc'             => esc_html__( 'Choose typography for your site', 'spark-theme' ),
        'customizer_width' => '400px',
        'subsection'       => true,
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'type'     => 'typography',
                'id'       => 'body_typography',
                'title'    => esc_html__( 'Body Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for body', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body', '.priceTitle', '.currency', '.singlePrice ul > li', 'footer .widget ul li a'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'h1_typography',
                'title'    => esc_html__( 'H1 Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for Heading tag H1', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body h1', 'body .h1'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'h2_typography',
                'title'    => esc_html__( 'H2 Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for Heading tag H2', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body h2', 'body .h2'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'h3_typography',
                'title'    => esc_html__( 'H3 Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for Heading tag H3', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body h3', 'body .h3'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'h4_typography',
                'title'    => esc_html__( 'H4 Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for Heading tag H4', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body h4', 'body .h4'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'h5_typography',
                'title'    => esc_html__( 'H5 Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for Heading tag H5', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body h5', 'body .h5'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'h6_typography',
                'title'    => esc_html__( 'H6 Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for Heading tag H6', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body h6', 'body .h6'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'paragraph_typography',
                'title'    => esc_html__( 'Paragraph Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for Paragraph tag P', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body p', 'p'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'a_typography',
                'title'    => esc_html__( 'Link Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for anchor/link tag a', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('body a', 'a', 'a.spark-btn', 'body a.spark-btn', '.Btn', '.domainTop > button.submit', '.select-domain form input[type="submit"]', '.domainchecker button.dc_style2', '#commentform input[type=submit]', 'header .topInfo li'),
                'units'       =>'px',
            ),
        )
    ) );

    // -> START General Typography
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Typography', 'spark-theme' ),
        'id'               => 'blog_typography',
        'desc'             => esc_html__( 'Choose typography for your blog page', 'spark-theme' ),
        'customizer_width' => '400px',
        'subsection'       => true,
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'type'     => 'typography',
                'id'       => 'body_typography',
                'title'    => esc_html__( 'Post Title', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography post title', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('.singlePost .postTitle.h4', '.postTitle.h3'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'post_meta_typography',
                'title'    => esc_html__( 'Post Meta Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for post meta', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('.singlePost .postDate'),
                'units'       =>'px',
            ),
            array(
                'type'     => 'typography',
                'id'       => 'post_content_typography',
                'title'    => esc_html__( 'Post Content Typography', 'spark-theme' ),
                'subtitle' => esc_html__( 'Set the typography for post content', 'spark-theme' ),
                'google'      => true,
                'font-backup' => true,
                'output'      => array('.postExcerpt p', '.postText', '.postText p'),
                'units'       =>'px',
            ),
        )
    ) );





    // - Start Page Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Google API Key', 'spark-theme' ),
        'id'               => 'google-api',
        'desc'             => __( 'Your Google JavaScript API key', 'spark-theme' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'id'       => 'google-api-key',
                'type'     => 'text',
                'title'    => __( 'Google API Key', 'spark-theme' ),
                'subtitle' => __( 'Enter your Google JavaScript API key here', 'spark-theme' ),
                'desc' => __( 'Create your API key from  ', 'spark-theme' ) .  '<a href="https://console.developers.google.com/apis/library">'. __('here', 'spark-theme') .'</a>',
            ),
        )
    ) );


    // - Start Page Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Page Settings', 'spark-theme' ),
        'id'               => 'page',
        'desc'             => __( 'Spark theme page settings!', 'spark-theme' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog page', 'spark-theme' ),
        'id'               => 'blog-page',
        'subsection'       => true,
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'blog-page-layout',
                'type'     => 'radio',
                'title'    => __( 'Page layout', 'spark-theme' ),
                'subtitle' => __( 'Select the page layout', 'spark-theme' ),
                'options'          => array(
                    'fullpage' => '<img src="'. get_template_directory_uri() .'/img/layouts/fullpage.png" alt="" class="radio-img"> <span class="radio-text">Full page</span>',
                    'left_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/left-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Left sidebar</span>',
                    'right_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/right-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Right sidebar</span>'
                ),
                'default'  => 'right_sidebar',
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Single page', 'spark-theme' ),
        'id'               => 'single-blog-page',
        'subsection'       => true,
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'page-single-title',
                'type'     => 'text',
                'title'    => __( 'Single page title', 'spark-theme' ),
                'subtitle' => __( 'Enter your title for single page', 'spark-theme' ),
                'default' => __( 'Single: Post', 'spark-theme' ),
            ),
            array(
                'id'       => 'single-page-layout',
                'type'     => 'radio',
                'title'    => __( 'Page layout', 'spark-theme' ),
                'subtitle' => __( 'Select the single page layout', 'spark-theme' ),
                'options'          => array(
                    'fullpage' => '<img src="'. get_template_directory_uri() .'/img/layouts/fullpage.png" alt="" class="radio-img"> <span class="radio-text">Full page</span>',
                    'left_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/left-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Left sidebar</span>',
                    'right_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/right-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Right sidebar</span>'
                ),
                'default'  => 'right_sidebar',
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Search page', 'spark-theme' ),
        'id'               => 'search-page',
        'subsection'       => true,
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'search-page-layout',
                'type'     => 'radio',
                'title'    => __( 'Search Page layout', 'spark-theme' ),
                'subtitle' => __( 'Select the search page layout', 'spark-theme' ),
                'options'          => array(
                    'fullpage' => '<img src="'. get_template_directory_uri() .'/img/layouts/fullpage.png" alt="" class="radio-img"> <span class="radio-text">Full page</span>',
                    'left_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/left-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Left sidebar</span>',
                    'right_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/right-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Right sidebar</span>'
                ),
                'default'  => 'right_sidebar',
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Archive page', 'spark-theme' ),
        'id'               => 'archive-blog-page',
        'subsection'       => true,
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'archive-page-layout',
                'type'     => 'radio',
                'title'    => __( 'Page layout', 'spark-theme' ),
                'subtitle' => __( 'Select the archive page layout', 'spark-theme' ),
                'options'          => array(
                    'fullpage' => '<img src="'. get_template_directory_uri() .'/img/layouts/fullpage.png" alt="" class="radio-img"> <span class="radio-text">Full page</span>',
                    'left_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/left-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Left sidebar</span>',
                    'right_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/right-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Right sidebar</span>'
                ),
                'default'  => 'right_sidebar',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Author page', 'spark-theme' ),
        'id'               => 'author-page',
        'subsection'       => true,
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'author-page-layout',
                'type'     => 'radio',
                'title'    => __( 'Page layout', 'spark-theme' ),
                'subtitle' => __( 'Select the author page layout', 'spark-theme' ),
                'options'          => array(
                    'fullpage' => '<img src="'. get_template_directory_uri() .'/img/layouts/fullpage.png" alt="" class="radio-img"> <span class="radio-text">Full page</span>',
                    'left_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/left-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Left sidebar</span>',
                    'right_sidebar' => '<img src="'. get_template_directory_uri() .'/img/layouts/right-sidebar.jpg" alt="" class="radio-img"> <span class="radio-text">Right sidebar</span>'
                ),
                'default'  => 'right_sidebar',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer', 'spark-theme' ),
        'id'               => 'footer',
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'        => 'ftr_switch',
                'type'      => 'switch',
                'title'     => __( 'Footer Show/Hide', 'spark-theme' ),
                'subtitle'  => __( 'Turn on/off to show show/hide footer.', 'spark-theme' ),
                'default'      => true,
            ),
            array(
                'id'        => 'footer_theme',
                'type'      => 'select',
                'options'   => array(
                    'footer-light' => 'Footer Light',
                    'footer-dark' => 'Footer Dark',
                ),
                'title'     => __( 'Footer Theme', 'spark-theme' ),
                'subtitle'  => __( 'Customize your footer background area.', 'spark-theme' ),
                'default'   => 'footer-light'
            ),
            array(
                'id'        => 'ftr_bg',
                'type'      => 'background',
                'output'    => array('footer'),
                'title'     => __( 'Footer Background', 'spark-theme' ),
                'subtitle'  => __( 'Customize your footer background area.', 'spark-theme' ),
                'default'   => array(
                    'background-color' => '#fff',
                )
            ),
            array(
                'id'        => 'ftr_wdt_title',
                'type'      => 'color',
                'output'    => array('footer .widget .h4, footer .contactInfo .h4'),
                'title'     => __( 'Footer Widget Title', 'spark-theme' ),
                'subtitle'  => __( 'Choose color for footer widget title.', 'spark-theme' ),
                'default'   => array(
                    'background-color' => '#fff',
                )
            ),
        )
    ) );




    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'spark-theme' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'spark-theme' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
