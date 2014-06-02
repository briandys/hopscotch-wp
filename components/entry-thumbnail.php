<?php if ( get_post_meta( get_the_ID(), 'entry-thumbnail', true ) ) : ?>
    <div class="entry-thumbnail">
        <a class="entry-thumbnail-link" href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" style="background-image: url(<?php echo get_post_meta( get_the_ID(), 'entry-thumbnail', true ) ?>);"></a>
    </div>                    

    <?php elseif ( has_post_thumbnail( $post->ID ) ) : ?>
    <div class="entry-thumbnail">			
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
        <a class="entry-thumbnail-link" href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" style="background-image: url(<?php echo $image[0]; ?>);"></a>
    </div>
<?php endif; ?>