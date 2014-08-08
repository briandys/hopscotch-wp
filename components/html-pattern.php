<div class="html-pattern">
    <div class="sudo-input-text">
        
        <?php
            $post_id = $post->ID;
            global $post;
            $post = &get_post($post_id);
            setup_postdata( $post );
            echo '<textarea class="hehe" readonly autocomplete="off">';
            the_content();
            echo'</textarea>';
            wp_reset_postdata( $post );
        ?>
        
    </div>
</div>