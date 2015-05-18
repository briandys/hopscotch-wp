<?php
// The default template for displaying content
// Used for both single and index/archive/search.
// @package WordPress
// @subpackage HopScotch
// @since HopScotch 1.0
?>

<!--
Component: Article Entry
Class: article-entry_comp
-->
<article <?php post_class( 'comp entry_comp article-entry_comp' ); ?>>
    <div class="cr entry_cr article-entry_cr">
        
        <header class="hr entry_hr article-entry_hr">
            <div class="cr entry-hr_cr article-entry-hr_cr">
            
                <div class="hr entry-hr_hr article-entry-hr_hr">
                    
                    <?php // Format: Not Status
                    if ( ! has_post_format( 'status' ) ) : ?>

                        <?php // Entry title
                        if ( ! is_page_template( 'hopscotch-info-card.php' ) ) :
                            the_title( sprintf( '<h1 class="article-entry-title_name"><a class="axn article-entry-title_axn" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
                        
                        // For Info Card Template with Microformats
                        // Location: hopscotch-info-card.php
                        else :
                            the_title( sprintf( '<h1 class="article-entry-title_name fn"><a class="axn article-entry-title_axn" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
                        endif;
                        ?>

                        <?php
                        // HopScotch Hook: After the_title()
                        // Users: hopscotch-enhancer.php (WP Plug-in)
                        hopscotch_hook_after_the_title();
                        ?>

                        <?php
                        // Article Entry Admin Actions
                        // Location: functions > entry-admin-actions.php
                        hopscotch_article_entry_admin_actions();
                        ?>

                        <?php
                        // Breadcrumb Navigation
                        // Location: functions > breadcrumb-navigation.php
                        hopscotch_breadcrumb_nav();
                        ?>
                    <?php else : ?>
                        <h1 class="article-entry-title_name"><?php _e( 'Status Message', 'hopscotch' ); ?></h1>
                    <?php endif; ?>
                    
                </div>

                <div class="ct entry-hr_ct article-entry-hr_ct">
                    
                    <!--
                    Component: Article Entry Byline
                    Class: article-entry-byline_comp
                    -->
                    <div class="comp entry-byline_comp article-entry-byline_comp">                        
                        <div class="cr entry-byline_cr article-entry-byline_cr">
                            
                            <?php
                            // Article Entry Author
                            // Location: functions > article-entry-author.php
                            hopscotch_article_entry_author();
                            ?>
                            
                            <?php
                            // Article Entry Published Timestamp
                            // Location: functions > article-entry-timestamp.php
                            hopscotch_article_entry_published_timestamp();
                            ?>
                        
                        </div>
                    </div><!-- article-entry-byline_comp -->

                    <?php
                    // Article Entry Category
                    // Location: functions > article-entry-banner.php
                    hopscotch_article_entry_category();
                    ?>
                    
                    <?php
                    // Article Entry Comments Action
                    // Location: functions > article-entry-comments-actions.php
                    hopscotch_article_entry_comments_actions();
                    ?>
                    
                    <?php
                    // Article Entry Banner
                    // Location: functions > article-entry-banner.php
                    // Can be overridden by HopScotch Enhancer Plug-in
                    hopscotch_hook_article_entry_banner();
                    ?>
                
                </div><!-- article-entry-hr_ct -->
            
            </div>
        </header>
        
        <div class="ct entry_ct article-entry_ct">
            <div class="cr entry-ct_cr article-entry-ct_cr">
            
            <?php            
            if ( is_category() || is_archive() || is_author() ):
                the_excerpt();
                
            else :
                // With Post
                if ( $post->post_content !== "" ) :

                    // Without Excerpt
                    if ( ! has_excerpt() ) :
                        the_content( sprintf( __(
                        '<span class="comp show-more-content_comp">' .
                        '<span class="cr show-more-content_cr">' .
                        '<span class="axn show-more-content_axn">' .
                        '<span class="label pred_label">' .
                        '<span class="label verb_label">Show</span> ' .
                        '<span class="label noun_label">Content</span> ' .
                        '<span class="label prep_label">of</span> ' .
                        '</span>' .
                        '<span class="label subj_label article-entry-title_label">%s</span>' .
                        '<span class="friendly-name show-more-content_friendly-name"><span class="label slash_label">/</span> Read More</span>' .
                        '</span>' .
                        '</span>' .
                        '</span><!-- show-more-content_comp -->', 'hopscotch' ),
                            the_title( '<span class="label subj_label entry-title_label">', '</span>', false ) ) );
                        hopscotch_article_entry_page_nav();

                    // With Excerpt
                    else :
                        the_excerpt();
                    endif;

                // Without Post
                else : ?>

                    <?php // Without Excerpt
                    if ( ! has_excerpt() ) : ?>
                        <div class="notice blank_notice article-entry-blank_notice">
                            <div class="cr notice_cr">
                                <p><?php _e( 'Blank', 'hopscotch' ); ?></p>
                            </div>
                        </div>

                    <?php // With Excerpt
                    else :
                        the_excerpt();
                    endif;
                endif;
            endif;
            
            // HopScotch Hook: After the_content()
            hopscotch_hook_after_the_content();
            ?>
            </div>
            
            <?php
            // Article Sub-Entry
            // Use Template Solo to display only the main content of that page
            // By default, HopScotch displays all the child pages if the user is on a parent page
            // Location: hopscotch-solo.php
            if ( ! is_page_template( 'hopscotch-solo.php' ) && ! is_search() ) :
                $parent = $post->ID;
                $args = array(
                    'post_type'     => 'page',
                    'post_status'   => 'publish',
                    'post_parent'   => $parent,
                    'order'         => 'ASC'
                );
                $the_query = new WP_Query( $args ); ?>                

                <?php if ( $the_query->have_posts() ) : ?>
                    
                    <!--
                    Component: Article Sub-Entry
                    Class: article-sub-entry_comp
                    -->
                    <div class="comp sub-entry_comp article-sub-entry_comp">
                        <div class="cr sub-entry_cr article-sub-entry_cr">
                        
                            <?php while ( $the_query->have_posts() ) :
                                $the_query->the_post();
                                get_template_part( 'content', get_post_format() );
                            endwhile; ?>
                        
                        </div>
                    </div><!-- article-sub-entry_comp -->
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
            
        </div><!-- article-entry_ct -->

        <?php if ( ! is_page() ) : ?>
            
            <footer class="fr entry_fr article-entry_fr">
                <div class="cr entry-fr_cr article-entry-fr_cr">

                    <?php
                    // Article Entry Modified Timestamp
                    // Location: functions > article-entry-timestamp.php
                    hopscotch_article_entry_modified_timestamp();
                    ?>
                    
                    <?php
                    // HopScotch Hook: After Modified Timestamp
                    hopscotch_hook_after_modified_timestamp();
                    ?>

                    <?php
                    // Article Entry Tags
                    // Location: functions > article-entry-tag.php
                    hopscotch_article_entry_tags();
                    ?>

                </div>
            </footer>
        
        <?php endif; ?>
    
    </div>
</article><!-- article-entry_comp -->