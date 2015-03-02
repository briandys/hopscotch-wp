<?php
// The template part for displaying a message that posts cannot be found
// Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
// @package WordPress
// @subpackage HopScotch
// @since HopScotch 1.0
?>

<article class="comp entry_comp">
    <div class="entry_cr">
        
        <header class="entry_hr">
            <div class="entry-hr_cr">            
                <div class="entry-hr_hr">                    
                    <h1 class="entry-title_name"><?php _e( 'Nothing Found', 'hopscotch' ); ?></h1>                    
                </div>            
            </div>
        </header>

        <div class="entry_ct">
            
            <?php // HopScotch Pre-content Hook
            hopscotch_hook_pre_content();
            ?>            
            
            <div class="entry-ct_cr">
                
                <?php // Blank Home Page (no entries yet)
                if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>    
                <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started</a>.', 'hopscotch' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>        

                <?php // Search Result
                elseif ( is_search() ) : ?>        
                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'hopscotch' ); ?></p>

                <?php // 404
                else : ?>        
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'hopscotch' ); ?></p>

                <?php endif; ?>
            
            </div>            
            
        </div><!-- entry_ct -->
    
    </div>
</article><!-- entry_comp -->