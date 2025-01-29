    <?php
        // Globalize $spark theme options var
        global $spark;
    ?>

        <?php
            if( $spark['ftr_switch'] == true ) :
        ?>

        <!-- ======= 1.09 footer Area ====== -->
        <div class="sectionBar"></div>
        <footer class="secPdngT animated <?php echo spark_footer_theme(); ?>">
            <div class="container">
                <div class="row">
                    <?php

                        // If the sidebar is active
                        if( is_active_sidebar( 'spark_footer_sidebar' ) ) {
                            dynamic_sidebar( 'spark_footer_sidebar' );
                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyrightTxt">

                            <?php
                                if( $spark['footer-copyright'] ) {
                                    echo esc_html( $spark['footer-copyright'] );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php endif; ?>
    </div>

        <!-- ======= /1.09 footer Area ====== -->
        <?php wp_footer(); ?>


    </body>
</html>
