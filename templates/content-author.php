<?php 
	$author_description = get_the_author_meta('description');

	// If the author has any bio
	// Then show the author box
	if( !empty($author_description) ) :
?>
				<div class="author-row-container author-page">
					<?php get_template_part('templates/content', 'author_meta'); ?>
				</div>
				
<?php endif; ?>

<div>
    <?php spark_page_posts_loop( 'one_column' ); ?>
</div>