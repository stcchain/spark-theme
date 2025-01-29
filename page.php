<?php
get_header();

?>
<!-- ======= 2.01 Page Title Area ====== -->
<?php
    $title = wp_title('', false);
    if ( spark_has_breadcrumb() == true ) {
        echo spark_get_the_breadcrumbs( $title );
    }
    
?>
<div class="d">

<div class="container page_single">

    <?php
        if( have_posts() ) :
            while( have_posts() ) :
                the_post(); ?>

        <div class="row">
            <div class="col-md-12">

                <?php the_content(); ?>
            </div>
        </div>

    <?php
                    // If comments is open
                    if( comments_open() ) {
                        comments_template();
                    }

            endwhile;
        endif;
    ?>

</div>
</div>

<?php
get_footer();

?>
