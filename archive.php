<?php 
get_header(); 
?>

    <?php 
        $title = get_the_archive_title();
        echo spark_get_the_breadcrumbs( $title ); 
    ?>

    <?php 
        // Globalize $spark option var
        global $spark;

        // Get the page layout option field
        $page_layout = $spark['archive-page-layout'];

    ?>

    <div class="blogArea secPdng">
    	<div class="container">
    		<div class="row">

                <?php 
                    // Change the page layout according to users option
                    if( $page_layout == 'fullpage' ) : ?>

                        <div class="col-md-12">
                            <div class="row">
                                <?php spark_page_posts_loop( 'one_column' ); ?>
                            </div>
                        </div>

                <?php elseif( $page_layout == 'left_sidebar' ) : ?>

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

                <?php elseif( $page_layout == 'right_sidebar' ) : ?>

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