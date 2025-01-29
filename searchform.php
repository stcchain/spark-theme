<?php
/**
 * Template for displaying search forms in Spark
 *
 * @package WordPress
 * @subpackage Spark
 * @since Spark 1.3.4
 */
?>


 <section class="spark-search-form">
     <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
    	<label class="screen-reader-text" for="s"><?php esc_html_e('Search',  'spark-theme') ?></label>
     	<input type="search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type to search here...', 'spark-theme'); ?>" />
     	<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
     </form>
</section>
