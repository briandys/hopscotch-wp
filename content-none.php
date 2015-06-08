<?php
// The template part for displaying a message that posts cannot be found
// Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
// @package WordPress
// @subpackage HopScotch
// @since HopScotch 1.0
?>

<!--
Component: Article Entry
Class: article-entry_comp
-->
<article class="comp entry_comp article-entry_comp">
    <div class="cr entry_cr article-entry_cr">
        
        <header class="hr entry_hr article-entry_hr">
            <div class="cr entry-hr_cr article-entry-hr_cr">            
                <div class="hr entry-hr_hr article-entry-hr_hr">                    
                    <h1 class="article-entry-title_name"><?php _e( 'Nothing Found', 'hopscotch' ); ?></h1>                    
                </div>            
            </div>
        </header>

        <div class="ct entry_ct article-entry_ct">        
            
            <div class="cr entry-ct_cr article-entry-ct_cr">
                
                <?php // Blank Home Page (no entries yet)
                if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>    
                <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started</a>.', 'hopscotch' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>        

                <?php // No Search Result
                elseif ( is_search() ) : ?>        
                <p><?php _e( 'Sorry, nothing matched your search terms. Please try again with different keywords.', 'hopscotch' ); ?></p>

                <?php // 404 (page not found)
                else : ?>        
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'hopscotch' ); ?></p>

                <?php endif; ?>
            
            </div>            
            
        </div><!-- article-entry_ct -->
    
    </div>
</article><!-- article-entry_comp -->