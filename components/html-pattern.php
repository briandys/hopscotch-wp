<style id="html-pattern-style" type="text/css">
<?php $key="css"; echo get_post_meta($post->ID, $key, true); ?>
</style>

<?php $key="html"; echo get_post_meta($post->ID, $key, true); ?>



<div id="html-pattern" class="html-pattern">
    <div class="html-pattern-cr">
        <p class="text-heading">HTML Pattern</p>
        
        <div class="html-pattern-ct">
            <?php // HTML
            if ( get_post_meta( $post->ID, 'html', true ) ) {?>
            <div id="html-pattern-field" class="field">
                <label for="html-pattern-textarea">HTML</label>
                <a class="select-all-action" href="#"><span class="label"></span>Select All</span></a>
                <div class="sudo-input-text">
                    <textarea id="html-pattern-textarea" class="html-pattern-textarea" autocomplete="off">
                    <?php $key="html"; echo get_post_meta($post->ID, $key, true); ?>
                    </textarea>
                </div>
            </div>
            <?php } ?>


            <?php // CSS
            if ( get_post_meta( $post->ID, 'css', true ) ) {?>

            <div id="html-pattern-style-field" class="field">
                <label for="html-pattern-style-textarea">CSS</label>
                <a class="select-all-action" href="#"><span class="label"></span>Select All</span></a>
                <div class="sudo-input-text">
                    <textarea id="html-pattern-style-textarea" class="html-pattern-style-textarea" autocomplete="off">
                        <?php $key="css"; echo esc_textarea( get_post_meta($post->ID, $key, true) ); ?>
                    </textarea>
                </div>
            </div>

            <?php } ?>
        </div>
    
    </div>
</div><!-- html-pattern -->