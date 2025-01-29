<div class="col-sm-6">
    <div class="singlePost">
       
       <h2><?php echo __('Sorry, no posts found.', 'spark-theme'); ?></h2>
		
		<br>
		<br>
		<p>
			<?php esc_html_e('The page or content you are looking for cannot be found!', 'spark-theme'); ?> 
			<br> 
			<?php esc_html_e('Please search or go back to home.', 'spark-theme'); ?> </p>

		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="no-posts eSearchForm">
			<input type="search" name="s" placeholder="<?php esc_attr_e('Type to search here', 'spark-theme'); ?>">
			<input type="submit" value="<?php esc_attr_e('Search now', 'spark-theme'); ?>">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-angle-left"></i> <?php esc_html_e('Go back to home', 'spark-theme'); ?></a>
			
		</form>

    </div>
</div>