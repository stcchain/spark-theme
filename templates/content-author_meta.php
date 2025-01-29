<?php 
	// Author 
	$authorId =  get_the_author_meta('ID');
	$authorURL = get_the_author_meta('url');
	$facebookurl = get_user_meta($authorId, 'spark_facebookurl', true);
	$twitterurl = get_user_meta($authorId, 'spark_twitterurl', true);
	$googleplusurl = get_user_meta($authorId, 'spark_googleplusurl', true);
	$youtubeurl = get_user_meta($authorId, 'spark_youtubeurl', true);
	$linkedinurl = get_user_meta($authorId, 'spark_linkedinurl', true);
	$pinteresturl = get_user_meta($authorId, 'spark_pinteresturl', true);
?>

<div class="author-row author-row-single-post">					
	<div class="author-left">
		<img src="<?php echo esc_url(get_avatar_url( $authorId )); ?>" alt="" class="img-circle">
	</div>
	<div class="author-right">
		<h3><?php esc_html(the_author()); ?> </h3> 
		<span> <a href="<?php echo esc_url($authorURL); ?>"> <?php echo  esc_url($authorURL); ?> </a> </span>
		<p><?php  esc_html( the_author_meta('description') ); ?></p>

		<div class="social-proifles">
			<ul class="list-inline">
				<?php if( !empty( $facebookurl ) ) : ?>
					<li><a href="<?php echo esc_url($facebookurl); ?>"><i class="fa fa-facebook"></i></a></li>
				<?php endif; ?>

				<?php if( !empty( $twitterurl ) ) : ?>
					<li><a href="<?php echo esc_url($twitterurl); ?>"><i class="fa fa-twitter"></i></a></li>
				<?php endif; ?>

				<?php if( !empty( $googleplusurl ) ) : ?>
					<li><a href="<?php echo esc_url($googleplusurl); ?>"><i class="fa fa-google-plus"></i></a></li>
				<?php endif; ?>

				<?php if( !empty( $youtubeurl ) ) : ?>
					<li><a href="<?php echo esc_url($youtubeurl); ?>"><i class="fa fa-youtube"></i></a></li>
				<?php endif; ?>

				<?php if( !empty( $linkedinurl ) ) : ?>
					<li><a href="<?php echo esc_url($linkedinurl); ?>"><i class="fa fa-linkedin"></i></a></li>
				<?php endif; ?>

				<?php if( !empty( $pinteresturl ) ) : ?>
					<li><a href="<?php echo esc_url($pinteresturl); ?>"><i class="fa fa-pinterest"></i></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>