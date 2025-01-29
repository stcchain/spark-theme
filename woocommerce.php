<?php 
get_header();

?>
<!-- ======= 2.01 Page Title Area ====== -->
<?php 
    $title = wp_title('', false);
    echo spark_get_the_breadcrumbs( $title ); 
?>

<div class="container page_single">

    <div class="row">
        <div class="col-md-9 col-md-push-3">
            <div class="spark-shop">
                <?php 
                    if( have_posts() ) :

                            woocommerce_content();

                    endif;
                ?>
            </div>
        </div>

        <div class="col-md-3  col-md-pull-9">
            <div class="sidebar_widgets">
                <?php 
                    // If the sidebar is active
                    if( is_active_sidebar( 'spark_shop_sidebar' ) ) {
                        dynamic_sidebar('spark_shop_sidebar');                         
                    }
                ?>
            </div>
        </div>
    </div>
	

</div>

<?php 
get_footer();

?>
