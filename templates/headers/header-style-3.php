<header>

    <div class="headerBottomArea">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-9">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                        <?php
                            $logo = $spark['logo'];

                            if( $logo ) {
                                echo '<img src="'. esc_url( $logo['url'] ) .'" alt="'. get_bloginfo('title') .'">';
                            } else {
                                echo '<img src="'. get_template_directory_uri() .'/img/logo.png" alt="'. get_bloginfo('title') .'">';
                            }
                        ?>

                    </a>
                </div>
                <?php
                    // Check if woo-commerce  plugin is installed
                    if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                        echo '<div class="col-md-10 menuCol col-sm-9 col-xs-0 no-cart-btn">';
                    } else {
                        echo '<div class="col-md-9 menuCol col-sm-9 col-xs-0">';
                    }

                ?>

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only"></span>
                            <i class="fa fa-navicon"></i>
                        </button>
                    </div>
                    <nav id="navbar" class="collapse navbar-collapse">

                        <?php
                            // get wordpress navigation menu
                            wp_nav_menu( array(
                                'theme_location'    =>  'primary',
                                'menu_id'           =>  'nav',
                                'walker'            => new Spark_Nav_Menu_Walker,
                                'fallback_cb'       => 'spark_link_to_menu_editor'
                            ) );
                        ?>

                    </nav>
                </div>



                <?php
                    // After menu item action
                    do_action ( '__after_menu_items' );
                ?>
            </div>
        </div>
    </div>
</header>
