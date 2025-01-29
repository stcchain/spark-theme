<div class="col-md-12 col-sm-6">
    <div <?php post_class(); ?>>
            <div class="postImg">
                <a href="<?php esc_url( the_permalink() ); ?>">
                    <?php the_post_thumbnail('spark-post-img-large'); ?>
                </a>
            </div>
            
        <div class="postContent">
            <a href="<?php esc_url( the_permalink() ); ?>" class="postTitle h4">
                <?php esc_html( the_title() ); ?>   
            </a>
            <div class="postDate">
                <?php 
                     // If the post is sticky
                    if( is_sticky() && is_home() && ! is_paged() ) {
                        echo '<span class="featured-post"><i class="fa fa-thumb-tack"></i> '. __('Sticky -', 'spark-theme') .'</span>';
                    }
                ?>

                <?php 
                // Show the time
                esc_html( the_time( get_option('date_format') )); ?> - 

                <?php 
                esc_html_e('By: ', 'spark-theme');
                // Get the author posts link
                esc_url(the_author_posts_link()); ?> - 


                <?php 
                // Get the category list
                $categories_list = get_the_category_list( __( ', ', 'spark-theme' ) );
                if ( $categories_list ) {
                    echo '<span class="categories-links"> '. esc_html_e('In: ', 'spark-theme')  . $categories_list . '</span> - ';
                }

                // Get the tag list
                $tag_list = get_the_tag_list( '', __( ', ', 'spark-theme' ) );
                if ( $tag_list ) {
                    echo '<span class="tags-links">' . __('Tags: ', 'spark-theme') . $tag_list . '</span> - ';
                }

                ?>
                
                <?php comments_popup_link(
                    __('No comments', 'spark-theme'), 
                    __('1 Comments', 'spark-theme'), 
                    __('% comments', 'spark-theme')
                ); ?>  

                <?php
                    edit_post_link(
                        sprintf(
                            /* translators: %s: Name of current post */
                            __( '- Edit<span class="screen-reader-text"> "%s"</span>', 'spark-theme' ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                ?>
            </div>
            <div class="postExcerpt">

                <?php 
                     the_excerpt(); 
                ?>
            </div>
        </div>
    </div>
</div>