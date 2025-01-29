<?php
get_header();
?>
    <!-- ======= 2.01 Page Title Area ====== -->
    <?php
        // Globalize $spark option var
        global $spark;

        // Get the page layout option field
        $page_title = isset( $spark['page-single-title'] ) ? $spark['page-single-title'] : '';
        $page_layout = isset( $spark['single-page-layout'] ) ? $spark['single-page-layout'] : '';

        if ( spark_has_breadcrumb() == true ) {
            echo spark_get_the_breadcrumbs( $page_title );
        }


    ?>

    <!-- ======= /2.01 Page Title Area ====== -->
    <?php

    ?>

	<div class="singleBlogArea secPdng">
		<div class="container">
			<div class="row">


				<?php
					// Change the page layout according to users option
					if( $page_layout == 'fullpage' ) : ?>

					<div class="col-md-12">
						 <?php spark_page_posts_loop( 'single' ); ?>
					</div>

				<?php elseif( $page_layout == 'left_sidebar' ) : ?>

					<div class="col-md-4 sidebar_widgets">
						<?php get_sidebar(); ?>
					</div>

					<div class="col-md-8 withSidebar">
						 <?php spark_page_posts_loop( 'single' ); ?>
					</div>

				<?php elseif( $page_layout == 'right_sidebar' ) : ?>

					<div class="col-md-8 withSidebar">
						 <?php spark_page_posts_loop( 'single' ); ?>
					</div>

					<div class="col-md-4 sidebar_widgets">
						<?php get_sidebar(); ?>
					</div>


                <?php else: ?>

                    <div class="col-md-8">
                        <div class="row withSidebar">
                            <?php spark_page_posts_loop( 'single' ); ?>
                        </div>
                    </div>

                    <div class="col-md-4 sidebar_widgets">
                        <?php get_sidebar(); ?>
                    </div>

				<?php endif; ?>

			</div>
		</div>
	</div>

<?php
get_footer();
?>
