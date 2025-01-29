<?php
get_header();
?>
    <!-- ======= 2.01 Page Title Area ====== -->
    <?php 
        $title = wp_title('', false);
        echo spark_get_the_breadcrumbs( $title ); 
    ?>

    <!-- ======= /2.01 Page Title Area ====== -->

    <div class="errorArea secPdng animated">
    	<div class="container">
    		<div class="row errRow">
    			<div class="col-lg-5 col-md-6 ">
    				<div class="errorContent">
    					<div class="h1 errorTitle"><?php esc_html_e('404 Error!', 'spark-theme'); ?></div>
    					<span>
                            <?php esc_html_e('The page or content you are looking for cannot be found!', 'spark-theme'); ?> <br> 
                            <?php esc_html_e('Please search or go back to home.', 'spark-theme'); ?>
                        </span>
    					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="eSearchForm">
    						<input type="search" name="s" placeholder="<?php esc_attr_e('Type to search here', 'spark-theme'); ?>">
    						<input type="submit" value="<?php esc_attr_e('Search now', 'spark-theme'); ?>">
    					</form>
    					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-angle-left"></i> <?php esc_html_e('Go back to home', 'spark-theme'); ?></a>
    				</div>
    			</div>
    			<div class="col-lg-5 col-md-4 errCol">
    				<div class="eSearchImg">
    					<img src="<?php echo get_template_directory_uri(); ?>/img/icon/search404.png" alt="">
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

<?php 
get_footer();
?>