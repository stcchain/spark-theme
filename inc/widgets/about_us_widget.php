<?php 


/**
 *
 * About Us Widget For Spark Theme
 *
 */


class SparkAboutUsWidget extends WP_Widget {

	function __construct()
	{

		$widget_opts = array(
			'classname'	 	=> 'spark_custom_widget',
			'description' 	=> __('About us widget helps you to show something about you and your social profiles.', 'spark-theme')
		);

		parent::__construct(
			// base ID of the widget
			'about-us-widget',

			// Title
			__('About Us', 'spark-theme'),

			$widget_opts			
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'uploadScripts' ) );
	}



	/**
	 *
	 * Upload the JavaScript for the media uploader
	 *
	 */
	public function uploadScripts()
	{
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('upload_media_widget', get_template_directory_uri() . '/js/upload-media.js', array( 'jquery' ) );

		wp_enqueue_style('thickbox');
	}


	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance )
	{
		// Check if those values are alrady saved in database
	    if( 
	    	isset($instance['description']) ||
	    	isset($instance['facebook']) ||
	    	isset($instance['twitter']) ||
	    	isset($instance['linkedin']) ||
	    	isset($instance['youtube']) ||
	    	isset($instance['pinterest']) ||
	    	isset($instance['instagram']) ||
	    	isset($instance['google_plus']) ||
	    	isset($instance['image']) ||
	    	isset($instance['skype'])
	    ) {
		    $description = $instance['description'];
		    $facebook = $instance['facebook'];
		    $twitter = $instance['twitter'];
		    $linkedin = $instance['linkedin'];
		    $youtube = $instance['youtube'];
		    $pinterest = $instance['pinterest'];
		    $instagram = $instance['instagram'];
		    $google_plus = $instance['google_plus'];
		    $image = $instance['image'];
		    $skype = $instance['skype'];
	    } else {
		    $description = __("Give your description", "spark-theme");
		    $facebook = esc_url("http://facebook.com", "spark-theme");
		    $twitter = esc_url("http://twitter.com", "spark-theme");
		    $linkedin =esc_url("http://linkedin.com", "spark-theme");
		    $youtube = esc_url("http://youtube.com", "spark-theme");
		    $pinterest = esc_url("http://pinterest.com", "spark-theme");
		    $instagram = esc_url("http://instagram.com", "spark-theme");
		    $google_plus = esc_url("http://plus.google.com", "spark-theme");
		    $skype = esc_url("http://skype.com", "spark-theme");
	    }


	    // Form Markup 
	    ?>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_name('image')); ?>"> <?php _e('Image', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('image')) ?>" name="<?php echo esc_attr($this->get_field_name('image')) ?>" value="<?php echo esc_attr( $image ); ?>"> 
	    	<input type="button" class="upload_image_button button button-primary" value="<?php _e('Upload image', 'spark-theme'); ?>" >
	   	</p>	

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id('description')); ?>"> <?php esc_html_e('Description', 'spark-theme'); ?> </label>

	    	<textarea rows="7" class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_html( $description ); ?></textarea>
	   	</p>	

	   	<p><strong> <?php  esc_html_e( 'Social Profiles' , 'spark-theme' ); ?></strong></p>
	   	<hr>

	   	<p>
	    	<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"> <?php esc_html_e('Facebook URL', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="url" id="<?php echo esc_attr($this->get_field_id( 'facebook' ) ) ; ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php echo esc_attr( $facebook ); ?>"> 
	   	</p>	
	   	<p>
	    	<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"> <?php esc_html_e('Twitter URL', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="url" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')) ?>" value="<?php echo esc_attr( $twitter ); ?>"> 
	   	</p>	
	   	<p>
	    	<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"> <?php esc_html_e('Youtube URL', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="url" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr( $youtube ); ?>"> 
	   	</p>	
	   	<p>
	    	<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"> <?php esc_html_e('Linkedin URL', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="url" id="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" value="<?php echo esc_attr( $linkedin ); ?>"> 
	   	</p>	
	   	<p>
	    	<label for="<?php echo esc_attr($this->get_field_id('skype')); ?>"> <?php esc_html_e('Skype URL', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="url" id="<?php echo esc_attr($this->get_field_id( 'skype' )); ?>" name="<?php echo esc_attr($this->get_field_name('skype')) ?>" value="<?php echo esc_attr( $skype ); ?>"> 
	   	</p>	
	   	<p>
	    	<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"> <?php esc_html_e('Pinterest URL', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="url" id="<?php echo esc_attr($this->get_field_id('pinterest')) ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr( $pinterest ); ?>"> 
	   	</p>	
	   	<p>
	    	<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"> <?php esc_html_e('instagram URL', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="url" id="<?php echo esc_attr($this->get_field_id('instagram')) ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" value="<?php echo esc_attr( $instagram ); ?>"> 
	   	</p>	
	   	<p>
	    	<label for="<?php echo esc_attr($this->get_field_id('google_plus')); ?>"> <?php esc_html_e('Google plus URL', 'spark-theme'); ?> </label>
	    	<input class="widefat" type="url" id="<?php echo esc_attr($this->get_field_id('google_plus')) ?>" name="<?php echo esc_attr($this->get_field_name('google_plus')); ?>" value="<?php echo esc_attr( $google_plus ); ?>"> 
	   	</p>	

	<?php
	}

	public function update( $new_instance, $old_instance )
	{
	    $instance = $old_instance;
	    $instance['description'] = strip_tags( $new_instance['description'] );
	    $instance['facebook'] = strip_tags( $new_instance['facebook'] );
	    $instance['twitter'] = strip_tags( $new_instance['twitter'] );
	    $instance['youtube'] = strip_tags( $new_instance['youtube'] );
	    $instance['skype'] = strip_tags( $new_instance['skype'] );
	    $instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
	    $instance['instagram'] = strip_tags( $new_instance['instagram'] );
	    $instance['google_plus'] = strip_tags( $new_instance['google_plus'] );
	    $instance['image'] = strip_tags( $new_instance['image'] );
	    $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
	    return $instance;
	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance )
	{
	    echo $args['before_widget'];

	    	?>

			<div class="footerInfo">
				<a href="<?php echo esc_url( home_url() )?>" class="footerLogo">
					<?php
						if ( !empty( $instance['image'] ) ) {
							echo '<img src="'. esc_url( $instance['image'] ) .'" alt="">';
						}
					?>
				</a>
				<div class="footerTxt">
					<p> <?php echo esc_html( $instance['description'] ); ?> </p>
				</div>
				<ul class="footerLinkIcon">
		    		<?php 
		    			$arguments = $instance;
		    			foreach($arguments as $key => $value ) :
		    				if( $key !== 'title' && $key !== 'image' && $key !== 'description' ) :

		    					if( !empty( $value ) ) {
		    						echo "<li><a href='". esc_url( $value ) ."'><i class='fa fa-". esc_attr( str_replace('_', '-', $key) ) ."'></i></a></li>";		    						
		    					}
		    					
		    				endif;
		    			endforeach;
		    		?>
				</ul>
			</div>
	    	<?php
	    	

	    echo $args['after_widget'];

	}
}
