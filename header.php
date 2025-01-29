<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>


        <?php wp_head(); ?>

    </head>


    <body <?php body_class(); ?>>

    <?php
        // Globalize $spark theme options var
        global $spark;
    ?>

    <?php
    // If preloader is on
    if( isset( $spark['preloader'] ) &&  $spark['preloader'] == '1' ) :

        if( isset( $spark['preloader_logo_set'] ) && $spark['preloader_logo_set'] == '1' ) :

    ?>

        <div class="preloader">
            <div class="spark-preloader-logo">
                <img src="<?php echo esc_url($spark['preloader_logo']['url']); ?>" alt="<?php echo esc_attr( bloginfo('title') ); ?>">
            </div>
        </div>
    <?php

        else: ?>

            <div class="preloader">
                <div class="sk-cube-grid">
                  <div class="sk-cube sk-cube1"></div>
                  <div class="sk-cube sk-cube2"></div>
                  <div class="sk-cube sk-cube3"></div>
                  <div class="sk-cube sk-cube4"></div>
                  <div class="sk-cube sk-cube5"></div>
                  <div class="sk-cube sk-cube6"></div>
                  <div class="sk-cube sk-cube7"></div>
                  <div class="sk-cube sk-cube8"></div>
                  <div class="sk-cube sk-cube9"></div>
                </div>
            </div>


    <?php
        endif;
    endif;
    ?>

    <div class="box_mode <?php if ( isset( $spark['box_layout'] ) && $spark['box_layout'] == true ) echo ' active '; ?> ">


        <!-- ======= 1.01 Header Area ====== -->
        <?php
            // Get header files depending from theme options.
            spark_header_styles();
        ?>
        <!-- ======= /1.01 Header Area ====== -->
