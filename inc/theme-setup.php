<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if( ! function_exists( 'spark_theme_setup' ) ) :

	function spark_theme_setup() {

		// Load the theme text domain
		load_theme_textdomain( 'spark-theme', get_template_directory() . '/lang' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add title tag
		add_theme_support( 'title-tag' );

		// Add post-thumbnails
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'woocommerce' );

	    add_image_size( 'spark-post-img-small', 370, 235, true );
	    add_image_size( 'spark-post-img-medium', 555, 350, true );
	    add_image_size( 'spark-post-img-large', 1140, 600, true );

	    // Set content width
	    if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}


		// Registering menu

		if( function_exists('register_nav_menus') ) {
			register_nav_menus( array(
				'primary' => __('Primany Menu', 'spark-theme'),
				'footer-menu' => __('Footer Menu', 'spark-theme')
			) );
		}

	}

endif;

add_action( 'after_setup_theme', 'spark_theme_setup' );



/**
 * Registers an editor stylesheet for the theme.
 */
function spark_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'spark_theme_add_editor_styles' );


/**
 *
 * Header Styles
 *
 */
function spark_header_styles() {
		global $spark;

		// Get header styles from Theme Options
		$header_style_opt = isset($spark['header_layout']) ? $spark['header_layout'] : 'header-style-1';

		// Get Header Variations
		$headerOptions = headerVariations();

		// Get the  header styles from Page Meta Data
		$pageStyle = get_post_meta(get_the_ID(), 'spark_page_header_style', true);

		// Apply Header Style if the page has any specific styles
		// Priority  Level: 1
		if (  $pageStyle  ) {
				include( locate_template('templates/headers/'. $pageStyle .'.php') );
		} else {

			// If the page has no specific style
			// Then select header style from Theme Options
			// Priority Level: 2
			foreach($headerOptions as $header) {

				if( $header == $header_style_opt ){

						// If the file exists locate the file
						// or include the default one
						if( file_exists( locate_template('templates/headers/'. $header_style_opt .'.php') ) ) {

								include( locate_template('templates/headers/'. $header_style_opt .'.php') );
						} else {
								include( locate_template('templates/headers/header-style-1.php') );
						}
				}

			}
		}
}


function headerVariations() {
		$arr = array(
			'header-style-1',
			'header-style-2',
			'header-style-3'
		);

	  return $arr;
}




/**
 *
 * Check if breadcrumb is active for header
 *
 */
 function spark_has_breadcrumb() {
 		global $spark;

		if( isset( $spark['breadcrumb_on'] ) && $spark['breadcrumb_on'] == true ) {
				// return true;

				$breadcrumb_mb = get_post_meta(get_the_ID(), 'spark_breadcrumb_switch', true);
				if( $breadcrumb_mb ==  'on') {
						return true;
				} else {
						return false;
				}

		} else {
				return false;
		}

		// echo $breadcrumb_mb;


}


/**
 *
 * Check if woo shopping cart is active for header
 *
 */
function spark_has_woo_shopping_cart() {
		global $spark;

		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )  {
				if( isset( $spark['woo_cart_switch'] ) && $spark['woo_cart_switch'] == true ) {
						return true;
				} else {
						return false;
				}
		} else {
				return false;
		}
}

/**
 *
 * Enqueuing Google Maps Script with  API key
 *
 */
function spark_google_maps_js_script() {
	global $spark;


	if( isset( $spark['google-api-key'] ) ) {
		$api_key = $spark['google-api-key'];
		wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=' . $api_key, array(), null, true );
	}
}

/**
 *
 * The WordPress pagination
 *
 */
function spark_pagination()
{
	return the_posts_pagination( array(
            'prev_text' => __('prev', 'spark-theme'),
            'next_text' =>  __('next', 'spark-theme'),
            'screen_reader_text' => ' ',
        ) );
}



/**
 *
 * The posts loop pagination
 *
 */
function spark_page_posts_loop( $template )
{
    if( have_posts() ) :

        while( have_posts() ) : the_post();

            get_template_part('templates/content', $template );

        endwhile;

    else:
        get_template_part('templates/no-post');
    endif;
}


/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */
function spark_link_to_menu_editor( $args )
{
    if ( ! current_user_can( 'manage_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before
        . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_attr( $before ) . esc_attr__('Create a menu', 'spark-theme') . esc_attr($after) . '</a>'
        . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li>" . $link ."</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) )
    {
        $output  = "<". esc_attr($container) ." class='". esc_attr($container_class) ."' id='". esc_attr($container_id) ."'>$output</". esc_attr($container) .">";
    }

    if ( $echo )
    {
        echo $output;
    }

    return $output;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'spark_loop_columns');

if (!function_exists('spark_loop_columns')) {
	function spark_loop_columns() {
		return 3; // 3 products per row
	}
}


/**
 *
 * WordPress link pages
 *
 */
function spark_wp_link_pages() {

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'spark-theme' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );

}


/**
 *
 * Add classes to post class by filting
 * @return $classes
 */

add_filter('post_class', 'spark_post_class');

function spark_post_class( $classes ) {

	// Is single post page
	if( is_single() ) {
		$classes[] = 'singleBlog';
	}


	$classes[] = 'singlePost singleLargePost';

	return $classes;
}


/**
 *
 * Building Comments Lists
 *
 */
function spark_comments_list( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'tracback' :
        case 'pingback' : ?>

        <li <?php esc_attr( comment_class() ); ?> id="comment-<?php esc_attr( comment_ID() ); ?>">
		<p><span class="title"><?php esc_html_e( 'Pingback:', 'spark-theme' ); ?></span> <?php esc_url( comment_author_link() ); ?> <?php esc_url ( edit_comment_link( __( '(Edit)', 'spark-theme' ), '<span class="edit-link">', '</span>' ) ); ?></p>

        <?php break;
        default : ?>

			<article <?php esc_attr( comment_class() ); ?>  id="comment-<?php esc_attr( comment_ID() ); ?>" style="opacity: 1;">
				<div class="commentLeft">
					<div class="commentImg">
						<?php echo get_avatar( $comment, 100 ); ?>
					</div>
				</div>
				<div class="commentRight">
					<div class="h5 dt_name"><?php esc_html( comment_author() ); ?></div>
					<div class="dt_time"><?php echo esc_html( the_time( get_option('date_format') ) );?> <?php  esc_html( comment_time() ); ?> </div>
					<div class="commentTxt dt_txt">
						<p><?php comment_text(); ?></p>
					</div>
					<span class="dt_edit"><?php esc_url( edit_comment_link( esc_html__('Edit', 'spark-theme') ) ); ?></span> |
					<span  class="dt_reply">
					<?php
				        comment_reply_link( array_merge( $args, array(
				            'reply_text' => __('Reply', 'spark-theme'),
				            'after' => ' <span> &#8595; </span>',
				            'depth' => $depth,
				            'max_depth' => $args['max_depth']
				        ) ) );
				    ?>
					</span>
				</div>
			</article>

        <?php // End the default styling of comment
        break;
    endswitch;
}



/**
 *
 * Custom Comment Form
 *
 */

add_filter('comment_form_defaults', 'spark_custom_comment_form');

function spark_custom_comment_form( $defaults ) {
	$defaults['title_reply'] = esc_attr__('Share your thoughts', 'spark-theme');
	$defaults['comment_notes_before'] = esc_attr__('share what&#44;s happening in your mind about this post', 'spark-theme');
	$defaults['comment_notes_after'] = '';
	$defaults['class_form'] = 'commentForm animated fadeInUp';
	$defaults['comment_field'] = '<textarea name="comment" placeholder="'. esc_attr__('Leave a comment', 'spark-theme') .'"></textarea>';

	return $defaults;
}


/**
 *
 * Spark custom comments field
 *
 */

add_filter('comment_form_default_fields', 'spark_custom_comment_form_fields');

function spark_custom_comment_form_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('required_name_email');
	$aria_req = ($req ? " aria-required='true'" : ' ');

	$yourNamePlaceholder  = $aria_req ? esc_attr__('Your name *', 'spark-theme') : esc_attr__('Your name ', 'spark-theme');
	$yourEmailPlaceholder = $aria_req ? esc_attr__('Your email *', 'spark-theme') : esc_attr__('Your email ', 'spark-theme');

	$fields = array(
		'author' => '<div class="row"><div class="col-md-6"><input
						type="text"
						id="author"
						name="author"
						placeholder="'. $yourNamePlaceholder .'"
						value="'. esc_attr( $commenter['comment_author'] ) .'"
						'. $aria_req .'
					></div>',

		'email' => '<div class="col-md-6"><input
						type="email"
						id="email"
						name="email"
						placeholder="'. $yourEmailPlaceholder .'"
						value="'. esc_attr( $commenter['comment_author_email'] ) .'"
						'. $aria_req .'
					></div></div>',

	);

	return $fields;
}





/**
 *
 * Remove Redux Framework Notices
 *
 */

function spark_remove_demo_redux_notice() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}
add_action('init', 'spark_remove_demo_redux_notice');


/**
 * Get blog posts page URL.
 *
 * @return string The blog posts page URL.
 */
function spark_get_blog_posts_page_url() {
	// If front page is set to display a static page, get the URL of the posts page.
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return esc_url( get_permalink( get_option( 'page_for_posts' ) ));
	}
	// The front page IS the posts page. Get its URL.
	return esc_url(get_home_url('/'));
}



/**
 *
 * Breadcrumb
 * @return breadcrumb
 */
function spark_get_the_breadcrumbs( $title )
{
	$breadcrumb_image = get_post_meta( get_the_ID(), 'spark_breadcrumb_bg_image', true );
	$breadcrumb_color = get_post_meta( get_the_ID(), 'spark_breadcrumb_bg_color', true );

	$styles = '';

	if( $breadcrumb_image ) {
		$styles .= "background-image: url($breadcrumb_image);";
	}

	if( $breadcrumb_color ) {
		$styles .= "background-color: $breadcrumb_color;";
	}


	return '<div class="pageTitleArea animated"  style="'. $styles .'">
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-md-12">
		    				<div class="pageTitle">
		    					<div class="h2">'.  esc_html( $title )  .'</div>' . spark_breadcrumbs() . '
		    				</div>
		    			</div>
		    		</div>
		    	</div>
		    </div>';
}


/**
 * Breadcrumbs
 */

function spark_breadcrumbs() {

    $output = '<ul id="crumbs" class="spark-breadcrumb">';

    if ( ! is_home() ) {
        $output .= '<li><a href="';
        $output .= esc_url( home_url('/') );
        $output .= '" class="spark-txt-p">';
        $output .= __('home', 'spark-theme');
        $output .= "</a></li>";
        if (is_category() || is_single()) {

            if (is_single()) {

                $output .= "<li>";
                $output .= '<a href="'.esc_url( get_the_permalink() ).'" class="spark-txt-p"> / ';
                $output .= esc_html(get_the_title());
                $output .= '</a> </li>';

            }
        } elseif (is_page()) {
            $output .= '<li>';
            $output .= '<a href="'.esc_url(get_the_permalink()).'" class="spark-txt-p"> / ';
            $output .= esc_html(get_the_title());
            $output .= '</a> </li>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {$output .="<li>" . esc_html__('Archive for', 'spark-theme'); the_time('F jS, Y'); $output .='</li>';}
    elseif (is_month()) {$output .="<li>" . esc_html__('Archive for', 'spark-theme'); the_time('F, Y'); $output .='</li>';}
    elseif (is_year()) {$output .="<li>" . esc_html__('Archive for', 'spark-theme'); the_time('Y'); $output .='</li>';}
    elseif (is_author()) {$output .="<li>" . esc_html__('Author Archive', 'spark-theme'); $output .='</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {$output .= "<li>".esc_html__('Blog Archives', 'spark-theme'); $output .='</li>';}
    elseif (is_search()) {$output .="<li>" . esc_html__('Search Results', 'spark-theme'); $output .='</li>';}
    $output .= '</ul>';


	return $output;
}




/**
 *
 * Spark Theme custom style to add internal stylesheet
 *
 */
function spark_custom_style() {

	wp_enqueue_style( 'spark-custom-style', get_template_directory_uri() . '/css/custom/custom_style.css' );

	global $spark;

	// Get all the necessary CSS selector
    $spark_primary_bg = '.domainTop > button.submit, .select-domain form input[type="submit"], header .topInfo li.clientAreaLi span, .homeArea, header .lang li:hover, .domainTop > input[type="submit"], .Btn, .ctaTwo, .domainCheck span > input:checked + label, .clientLogin input[type="submit"], .preloader, .v2 header .langTxt, .v2 header .topInfo li a, header a.cart .count, .v2 .homeBtn a.btnOne, .v2 .domainArea:before, .tstSlider .owl-nav div, .aboutServiceArea, .inputWrep > input[type="submit"], .domainSearchArea .domainSearchForm input.submit, .active .h4.singleDomainName::before, .domainCtaArea, .singleTst::before, .boardMenu, .boardMenu li a:hover, .submitBtn > input, .wpcf7-form .contactSubmit input[type=submit], .cartTable > li.cartHead, .duration > span:hover, .cartOpt > li, .totalBtn, .bill::before, .pagination a:hover, .pagination li.active a, .commentInput > input[type="submit"], .serachForm > input[type="search"], .supportInput > input[type="submit"], .eSearchForm > input[type="submit"], .subsForm > input[type="submit"], #commentform input[type=submit], .theme-bg-background, .widget .shop-widget .price_slider_amount button, .spark-shop  ul.products li a.add_to_cart_button, .woocommerce nav.woocommerce-pagination ul li span.crrent, .ui-slider .ui-slider-range, .woocommerce a.button, .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover, .spark-shop  ul.products li a.add_to_cart_button,  .woocommerce #respond input#submit, .woocommerce div.product form.cart .button, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce div.product form.cart .button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .wc-proceed-to-checkout, .woocommerce-message a, .button.wc-backward, .checkout_coupon input[type="submit"], #order_review  .woocommerce-checkout-payment .place-order input[type="submit"], .tparrows, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .spark_tst_slider2 .owl-dot.active, .spark_slider2 .owl-nav div:hover';

    // Get all necessary selectors for secondary background color
    $spark_secondary_bg =  '.woocommerce span.onsale, .widget .shop-widget .price_slider_amount button:hover, .spark-shop  ul.products li a.add_to_cart_button:hover, .woocommerce-account .woocommerce-MyAccount-navigation ul, .spark-shop  ul.products li a.add_to_cart_button:hover, .woocommerce #respond input#submit:hover, .woocommerce div.product form.cart .button:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce .shop_table thead tr, header .topInfo li.clientAreaLi span:hover, .contactBtn.Btn:hover, .Btn:hover, .domainTop > input[type="submit"]:hover, .inputWrep > input[type="submit"]:hover, .domainSearchArea .domainSearchForm input.submit:hover, .submitBtn > input:hover, .supportInput > input[type="submit"]:hover, .wpcf7-form .contactSubmit input:hover, .totalBtn:hover, .commentInput > input[type="submit"]:hover, .eSearchForm > input[type="submit"]:hover, .subsForm > input[type="submit"]:hover ';



	// Get all the necessary CSS selector for border styling
    $spark_primary_border = '#nav > li ul.sub-menu li, .singlePrice.active, .inputWrep, .woocommerce form.woocommerce-checkout input, .woocommerce form .form-row input.input-text:hover, .woocommerce form .form-row textarea:hover,
.woocommerce form .form-row input.input-text:focus, .woocommerce form .form-row textarea:focus';

    $spark_primary_border_bottom = '#nav > li ul.sub-menu li:last-child, #nav > li ul.sub-menu li:last-child, .subPar > a::before, .availableDomain.clearfix';

    $spark_secondary_border_bottom = '#nav > li ul.sub-menu li:last-child';

    $spark_primary_color = '.section_title strong, footer .widget ul li a:hover, .textwidget a.link, .spark-shop  ul.products li.product h3, .woocommerce div.product .product_title, .summary.entry-summary a, .woocommerce-account .woocommerce-MyAccount-content > p >  a, .sectionTitle .h2 span, .ctaBtn .btnTwo.Btn, .footerLinkIcon li a:hover, .mMenuCol .menuDiscount .h3, .menuDiscount > a, .clientLogin input[type="submit"] + .h5 a, .v2 .homeContent span.topTxt, .v2 .homeBtn a.btnTwo, .footerLink > li a:hover, .contactInfo span a:hover, h4.price, .singleTst > a:hover, .boardTitle .h4, ul.regDomains .domainName a:hover, .contactInfoCell .h4, span.closeIcon, .checkTitle > a, .author > span, .dt_reply:hover, .supportTitle.h3 span, .fileInput:hover:before, .h1.errorTitle, .errorContent > a:hover, .woocommerce .product_meta  .posted_in  a, .woocommerce div.product .product_title, .woocommerce-info a, #order_review .shop_table tfoot tr th, .woocommerce-account .woocommerce-MyAccount-content > p >  a, .woocommerce-account .addresses .title h3, .woocommerce-MyAccount-content form h3,.woocommerce form fieldset legend, .woocommerce-auth-page h2, .textwidget a.link ';

    $styler_css = '';

    if( isset( $spark['primary-theme-color']['color'] ) ) :
	    $styler_css .= "

	            $spark_primary_bg
	            {
	                background-color: ". esc_attr( $spark['primary-theme-color']['color'] ) ." !important;
	            }


	            $spark_primary_color
	            {
	            	color: ". esc_attr( $spark['primary-theme-color']['color'] ) ." !important;
	            }

	            $spark_primary_border
	            {
	                border-color: ". esc_attr( $spark['primary-theme-color']['color'] ) ." !important;
	            }

	            $spark_primary_border_bottom{
	                border-bottom-color: ". esc_attr( $spark['primary-theme-color']['color'] ) ." !important;
	            }


	            $spark_primary_color{
	            	color: ". esc_attr( $spark['primary-theme-color']['color'] ) ." !important
	            }

	            ";

    endif;



    // if isset secondary-theme-color from theme options
    if( isset( $spark['secondary-theme-color']['color'] ) ) :

	    $styler_css .= "


	            $spark_secondary_bg
	            {
	                background-color: ". esc_attr( $spark['secondary-theme-color']['color'] ) ." !important;
	            }


	            $spark_secondary_border_bottom{
	                border-bottom-color: ". esc_attr( $spark['secondary-theme-color']['color'] ) ." !important;
	            }

	            ";


    endif;



    // if isset logo-height from theme options
    if( isset( $spark['logo-height'] ) ) :

	    $styler_css .= "
            header .logo
            {
                height: ". esc_attr( $spark['logo-height'] ) ." !important;
            }

	    ";


    endif;


    // if isset logo-width from theme options
    if( isset( $spark['logo-width'] ) ) :

	    $styler_css .= "
            header .logo
            {
                width: ". esc_attr( $spark['logo-width'] ) ." !important;
            }

	    ";


    endif;


    // if isset logo-width from theme options
    if( isset( $spark['custom-css-box'] ) ) :

    	$styler_css .= $spark['custom-css-box'];

    endif;


	wp_add_inline_style( 'spark-custom-style', $styler_css );

}
add_action( 'wp_enqueue_scripts', 'spark_custom_style' );



/**
 *
 * WHMCS Bridge Page URL
 *
 */
function spark_whmcs_bridge_url() {

	if( function_exists( 'cc_whmcs_bridge_home' ) ) {
		return cc_whmcs_bridge_home($home,$pid);
	} else {
		return home_url('/') . 'whmcs-bridge';
	}
}


function spark_footer_theme() {
	global $spark;

	$output = '';

	$page_footer_theme = get_post_meta(get_the_ID(), 'spark_footer_theme', true);



	if( isset( $spark['footer_theme'] ) ) {
		if( $page_footer_theme && $page_footer_theme !== 'select-option' ) {
			$output = $page_footer_theme;
		} else {
			$output = $spark['footer_theme'];
		}
	}

	return $output;
}


/**
 *
 * One click demo Installation for Spark theme
 *
 */

function spark_import_files() {
  return array(
    array(
      'import_file_name'           => 'Demo Import 1',
      'local_import_file'            => DHRUBOK_INC_DIR . '/demo-contents/spark_data.xml',
      'local_import_widget_file'     => DHRUBOK_INC_DIR . '/demo-contents/spark_widgets.wie',
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.dhrubok.website/theme-demos/spark/demo-contents/spark_theme_option.json',
          'option_name' => 'spark',
        ),
      ),
      'import_preview_image_url'   => DHRUBOK_DIR . 'screenshot.png' ,
      'import_notice'              => __( 'After importing the demo, you need set your preferred homepage layout from ', 'spark-theme') .
      		'<a href="'. trailingslashit(home_url('/')) .'wp-admin/options-reading.php">'. __('here', 'spark-theme') .'</a>',
    )
  );
}
add_filter( 'pt-ocdi/import_files', 'spark_import_files' );
