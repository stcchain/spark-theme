	<div class="singleBlogArea ">
		<div class="sBlogCol">
			<article id="post-<?php esc_attr( the_ID() );  ?>" <?php esc_attr( post_class() ); ?> >
				<div class="blogImg animated">
					<?php the_post_thumbnail('spark-post-img-large'); ?>
				</div>
				<div class="postTitle h3 animated"><?php esc_html( the_title() ); ?></div>
				<div class="postMeta animated">
					<div class="postDate">
						<?php esc_html( the_time( get_option('date_format') ) ); ?> 
						<?php esc_html_e('By:', 'spark-theme'); ?>
						<span><?php esc_url( the_author_posts_link() ); ?></span>

						<?php 
			                // Get the category list
			                $categories_list = get_the_category_list( __( ', ', 'spark-theme' ) );
			                if ( $categories_list ) {
                    			echo '<span class="categories-links"> '. esc_html_e('In: ', 'spark-theme')  . $categories_list . '</span> - ';
			                }
			            ?>


		                <?php
		                    edit_post_link(
		                        sprintf(
		                            /* translators: %s: Name of current post */
		                            __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'spark-theme' ),
		                            get_the_title()
		                        ),
		                        '<span class="edit-link">',
		                        '</span>'
		                    );
		                ?>

					</div>
				</div>
				<div class="postText animated">
					<?php 
						// Echo the post content
						the_content(); 

						// Show pagination if split the post into pages
						esc_url( spark_wp_link_pages() );
					?>
				</div>
				<div class="sectionBar"></div>
				<ul class="postTag">
					<?php 
						$posttags = get_the_tags();
							
						if ($posttags) {

						echo '<li>' . esc_html_e('Tags:', 'spark-theme') . '</li>';

						foreach($posttags as $tag) {

						    echo '<li><a href=" '. esc_url( get_term_link($tag) ) . ' ">'. esc_html( $tag->name ) .'</a></li>';
						  }
						}
					?>
				</ul>

				
				<div class="prev-next-posts row">
					<div class="col-md-6">
						<?php esc_url( previous_post_link( ) ); ?>
					</div>
					<div class="col-md-6 text-right">
						<?php esc_url( next_post_link( ) ); ?>
					</div>
				</div>
				
				
				<?php 
					$author_description = get_the_author_meta('description');

					// If the author has any bio
					// Then show the author box
					if( !empty($author_description) ) :
				?>
					<div class="author-row-container">
					
						<?php get_template_part('templates/content', 'author_meta'); ?>
					</div>
				<?php endif; ?>

				
				
				<?php 
					// If comments is open
					if( comments_open() ) {
 						comments_template();
					} 
				?>

			</article>

		</div>
	</div>
