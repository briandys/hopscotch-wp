<?php
// Entry Banner
// This is used by setting a Featured Image in WP Admin Dashboard.
// HopScotch Enhancer overrides this function.
// By default, HopScotch attaches a CSS background-image to .entry-banner_axn so that the user has the option to control the display of the Featured Image.

if ( ! function_exists( 'hopscotch_enhancer_entry_banner' ) ) :
    function hopscotch_entry_banner() {
        global $post;
        if ( has_post_thumbnail( $post->ID ) ) : ?>
            <div class="comp entry-banner_comp">			
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
                <a class="entry-banner_axn" href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" style="background-image: url(<?php echo $image[0]; ?>);">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div><!-- entry-banner_comp -->
        <?php
        endif;
    }
    add_action('hopscotch_hook_entry_banner', 'hopscotch_entry_banner');
endif;