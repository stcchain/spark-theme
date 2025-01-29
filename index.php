<?php 
get_header();

?>

    <!-- ======= 2.01 Page Title Area ====== -->

    <?php 
        $title = wp_title('', false);
        if( is_home() ) {
            $title = __('Blog', 'spark-theme');
        }
        echo spark_get_the_breadcrumbs( $title ); 
    ?>


    <!-- ======= /2.01 Page Title Area ====== -->
    <?php 
        // Globalize $spark option var
        global $spark;

        // Get the page layout option field
        $page_layout = $spark['blog-page-layout'];

    ?>
    <div class="blogArea secPdng">
    	<div class="container">
    		<div class="row">

                <?php if( $page_layout == 'fullpage' ): ?>

                    <?php spark_page_posts_loop( 'one_column' ); ?>

                <?php elseif( $page_layout == 'left_sidebar' ): ?>

                    <div class="col-md-3 sidebar_widgets">
                        <?php get_sidebar(); ?>
                    </div>

                    <div class="col-md-9">
                        <div class="row withSidebar">
                            <?php spark_page_posts_loop( 'one_column' ); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination  animated">
                                    <?php spark_pagination(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif( $page_layout == 'right_sidebar' ): ?>

                    <div class="col-md-9">
                        <div class="row withSidebar">
                            <?php spark_page_posts_loop( 'one_column' ); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination  animated">
                                    <?php spark_pagination(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 sidebar_widgets">
                        <?php get_sidebar(); ?>
                    </div>

                <?php else: ?>

                    <div class="col-md-9">
                        <div class="row withSidebar">
                            <?php spark_page_posts_loop( 'one_column' ); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination  animated">
                                    <?php spark_pagination(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 sidebar_widgets">
                        <?php get_sidebar(); ?>
                    </div>

                <?php endif; ?>


    		</div>

    	</div>
    </div>


<?php 
get_footer();
?>
