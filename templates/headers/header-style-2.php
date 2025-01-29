<header class="hs-2">
    <div class="headerTopArea">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-2 col-xs-5">

                    <?php
                        // Load the header bar siderbar
                        // If the sidebar is active
                        if( is_active_sidebar( 'header_bar_sidebar' ) ) {
                            dynamic_sidebar( 'header_bar_sidebar' );
                        }
                    ?>

                </div>
                <div class="col-md-7 col-sm-10 col-xs-7">
                    <ul class="topInfo">

                        <?php
                            // It will echo lists on top header right
                            echo do_shortcode( $spark['spark_header_widgets'] );
                        ?>


                        <?php
                        // If whmcs_client_area is turned on from Theme options
                        if( isset( $spark['whmcs_client_area'] ) && $spark['whmcs_client_area'] == true ) : ?>
                            <li class="clientAreaLi"><span><i class="fa fa-user"></i><?php echo esc_html_e('Client area', 'spark-theme'); ?></span></li>
                        <?php endif; ?>


                    </ul>


                    <?php
                        // If whmcs_client_area is turned on from Theme options
                        if( isset( $spark['whmcs_client_area'] ) && $spark['whmcs_client_area'] == true ) : ?>
                        <div class="clientLogin">
                            <?php
                                // Get the site home url
                                $home_url = esc_url( home_url('/') );
                            ?>
                            <form action="<?php echo spark_whmcs_bridge_url(); ?>?ccce=dologin" method="post">
                                <div class="closeBtn"><i class="icofont icofont-close"></i></div>
                                <div class="h5"><?php echo esc_html_e('sign in', 'spark-theme'); ?></div>
                                <div class="userName"><input name="username" placeholder="Username" type="text"></div>
                                <div class="password"><input name="password" placeholder="Password" type="password"></div>
                                <input type="submit" value="sign in">
                                <div class="h5"><?php echo esc_html_e('Forgot Passsword?', 'spark-theme'); ?> <a href="<?php echo spark_whmcs_bridge_url(); ?>/?ccce=pwreset"><?php echo esc_html_e('Click here', 'spark-theme'); ?></a></div>
                                <div class="logBtm">
                                    <div class="h5"><?php esc_html_e('Don’t have an account yet?', 'spark-theme'); ?></div>
                                    <a href="<?php echo spark_whmcs_bridge_url(); ?>?ccce=register" class="signUp"><?php esc_html_e('Click here to sign up.', 'spark-theme'); ?></a>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
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
