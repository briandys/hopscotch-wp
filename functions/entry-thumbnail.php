<?php

//------------------------- Entry Thumbnail
// Custom Field
// The option to use an external image source as Featured Image (instead of from the Media Library)
// Between the Custom Field and Featured Image from the Library, Custom Field is priority
// Usage:
// Key: entry-thumbnail
// Value: Absolute path of image. E.g., http://path/filename.img

if ( ! function_exists( 'hopscotch_entry_thumbnail' ) ) :
    function hopscotch_entry_thumbnail() {
        
        if ( has_post_thumbnail( $post->ID ) ) : ?>
        
            <div class="entry-thumbnail">			
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
                <a class="entry-thumbnail-link" href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" style="background-image: url(<?php echo $image[0]; ?>);">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
        
        <?php
        endif;
    }
endif;