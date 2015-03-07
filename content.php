<?php
// The default template for displaying content
// Used for both single and index/archive/search.
// @package WordPress
// @subpackage HopScotch
// @since HopScotch 1.0
?>

<?php // Content Header hook
hopscotch_content_header();
?>

<?php // Hook above .entry
hopscotch_hook_above_entry();
?>

<article <?php post_class( 'comp entry_comp article-entry_comp' ); ?>>
    <div class="cr entry_cr article-entry_cr">
        
        <header class="hr entry_hr article-entry_hr">
            <div class="cr entry-hr_cr article-entry-hr_cr">
            
                <div class="hr entry-hr_hr article-entry-hr_hr">
                    
                    <?php // Format: Not Status
                    if ( ! has_post_format( 'status' ) ) : ?>

                        <?php // Entry title
                        if ( ! is_page_template( 'hopscotch-info-card.php' ) ) :
                            the_title( sprintf( '<h1 class="article-entry-title_name"><a class="article-entry-title_axn" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
                        
                        // For Info Card Template with Microformats
                        // Location: hopscotch-info-card.php
                        else :
                            the_title( sprintf( '<h1 class="article-entry-title_name fn"><a class="article-entry-title_axn" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
                        endif;
                        ?>

                        <?php
                        // Article Entry Admin Actions
                        // Location: functions > entry-admin-actions.php
                        hopscotch_article_entry_admin_actions();
                        ?>

                        <?php
                        // WP Plugin: HopScotch Enhancer
                        hopscotch_hook_subtitle();
                        ?>

                        <?php
                        // Breadcrumb Navigation
                        hopscotch_breadcrumb_nav();
                        ?>
                    <?php else : ?>
                        <h1 class="article-entry-title_name"><?php _e( 'Status Message', 'hopscotch' ); ?></h1>
                    <?php endif; ?>
                    
                </div>

                <div class="ct entry-hr_ct article-entry-hr_ct">
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
                    // Entry Banner
                    // Location: functions > article-entry-banner.php
                    // Can be overridden by HopScotch Enhancer Plug-in
                    hopscotch_hook_article_entry_banner();
                    ?>
                
                </div><!-- entry-hr_ct -->
            
            </div>
        </header>

        <div class="ct entry_ct article-entry_ct">
            
            <?php // HopScotch Pre-content Hook
            hopscotch_hook_pre_content();
            ?>            
            
            <div class="cr entry-ct_cr article-entry-ct_cr">
                
                <?php

                // If Search or Author
                if ( is_search() || is_author() ) :
                    the_excerpt();
                
                // If Attachment
                elseif ( is_attachment() ) :
                    the_content();
                
                // Else
                else :

                    if( $post->post_content !== "" ) : ?>

                        <?php // HopScotch Content Title Hook
                        hopscotch_hook_content_title();
                        ?>

                        <?php // HopScotch Pre the_content Hook
                        hopscotch_hook_pre_the_content();
                        ?>

                        <?php
                        
                        if ( ! has_excerpt() ) {
                            
                            // The Content
                            the_content( sprintf( __(
                                '<span class="comp show-more-content_comp">' .
                                '<span class="label pred_label">' .
                                '<span class="label verb_label">Show</span> ' .
                                '<span class="label noun_label">Content</span> ' .
                                '<span class="label prep_label">of</span> ' .
                                '</span>' .
                                '<span class="label subj_label article-entry-title_label">%s</span>' .
                                '</span><!-- show-more-content_comp -->', 'hopscotch' ),
                                    the_title( '<span class="label subj_label entry-title_label">', '</span>', false ) ) );
                        } else {
                            
                            // The Excerpt
                            // Location: functions > article-excerpt.php
                            the_excerpt();
                        }
                        ?>

                        <?php
                        // Article Entry Page Navigation
                        hopscotch_article_entry_page_nav();
                        ?>

                    <?php endif; ?>

                <?php endif; ?>
            
            </div>
            
            <?php // HopScotch Extra Content Hook
            hopscotch_hook_extra_content();
            ?>
            
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
            
        </div><!-- entry_ct -->

        <footer class="fr entry_fr article-entry_fr">
            <div class="cr entry-fr_cr article-entry-fr_cr">
                        
                <?php // Entry Modified Timestamp
                hopscotch_article_entry_modified_timestamp();
                ?>
                
                <?php
                // Article Entry Tags
                hopscotch_article_entry_tags();
                ?>

            </div>
        </footer>
    
    </div>
</article><!-- entry_comp -->