<?php

//------------------------- Custom Field Thumbnail or Post Thumbnail
// Uses an image URL as thumbnail
// Usage:
// Key: entry-thumbnail
// Value: image URL

if ( ! function_exists( 'hopscotch_enhancer_entry_thumbnail' ) ) :	

    function hopscotch_entry_thumbnail() {

        global $post;

        if ( has_post_thumbnail( $post->ID ) ) : ?>

            <div class="entry-thumbnail entry-thumbnail--native">			
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
                <a class="entry-thumbnail-link" href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" style="background-image: url(<?php echo $image[0]; ?>);">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>

        <?php
        endif;
    }
    add_action('hopscotch_hook_entry_thumbnail', 'hopscotch_entry_thumbnail');

endif;