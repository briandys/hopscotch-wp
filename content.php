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

<article id="<?php hopscotch_post_id(); ?>" <?php post_class( 'comp entry_comp' ); ?> <?php hopscotch_hook_entry_data_att(); ?>>
    <div class="entry_cr <?php hopscotch_slug_class(); ?>-entry_cr">
        
        <header class="entry_hr">
            <div class="entry-hr_cr">
            
                <div class="entry-hr_hr">
                    
                    <?php // Format: Not Status
                    if ( ! has_post_format( 'status' ) ) : ?>

                        <?php // Entry title
                        if ( ! is_page_template( 'template-info-card.php' ) ) :
                            the_title( sprintf( '<h1 class="entry-title_name"><a class="entry-title_axn" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
                        else :
                            the_title( sprintf( '<h1 class="entry-title_name" itemprop="name"><a class="entry-title_axn org" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
                        endif;
                        ?>

                        <?php
                        // Entry Admin Actions
                        hopscotch_entry_admin_actions();
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
                        <h1 class="entry-title_name">Status Message</h1>
                    <?php endif; ?>
                    
                </div>

                <div class="entry-hr_ct">
                    <div class="comp entry-byline_comp">                        
                        <div class="comp entry-byline_cr">
                            <?php // Entry Author
                            hopscotch_entry_author();
                            ?>
                            <?php
                            // Entry Published Timestamp
                            hopscotch_entry_published_timestamp();
                            ?>                        
                        </div>
                    </div><!-- entry-byline_comp -->

                    <?php // Entry Category
                    hopscotch_entry_category();
                    ?>
                    
                    <?php // Entry Comments Action
                    if ( ! is_search() ) :
                        hopscotch_entry_comments_action();
                    endif;
                    ?>
                    
                    <?php // Entry Banner
                    hopscotch_hook_entry_banner();
                    ?>
                </div><!-- entry-hr_ct -->
            
            </div>
        </header>

        <div class="entry_ct <?php hopscotch_hook_entry_content_class(); ?> <?php hopscotch_slug_class(); ?>-entry_ct">
            
            <?php // HopScotch Pre-content Hook
            hopscotch_hook_pre_content();
            ?>            
            
            <div class="entry-ct_cr">
                
                <?php // If Content is Search or Author
                if ( is_search() || is_author() ) : ?>

                    <?php the_excerpt(); ?>

                <?php else : ?>

                    <?php if( $post->post_content !== "" ) : ?>

                        <?php // HopScotch Content Title Hook
                        hopscotch_hook_content_title();
                        ?>

                        <?php // HopScotch Pre the_content Hook
                        hopscotch_hook_pre_the_content();
                        ?>

                        <?php // The Content
                        the_content( sprintf( __( '<div class="comp show-content_comp"><span class="label pred_label">Show More</span> <span class="label subj_label">Content of</span> %s</div><!-- show-content_comp -->', 'hopscotch' ), the_title( '<span class="label entry-title_label">', '</span>', false ) ) );
                        ?>

                        <?php // Entry Page Navigation
                        hopscotch_entry_page_nav();
                        ?>

                    <?php endif; ?>

                <?php endif; ?>
            
            </div>
            
            <?php // HopScotch Extra Content Hook
            hopscotch_hook_extra_content();
            ?>
            
            <?php // Child Page
            // Use Page Template: Solo to display only the main content of that page
            if ( ! is_page_template( 'template-solo.php' ) && ! is_search() ) :
            ?>

                <?php
                $parent = $post->ID;
                $args = array(
                    'post_type'     => 'page',
                    'post_status'   => 'publish',
                    'post_parent'   => $parent,
                    'order'         => 'ASC'
                );
                $the_query = new WP_Query( $args );
                ?>                

                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="comp sub-entry_comp">
                        <div class="sub-entry_comp_cr">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>
                        </div>
                    </div><!-- sub-entry_comp -->
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
            
        </div><!-- entry_ct -->

        <footer class="entry_fr">
            <div class="entry-fr_cr">
                        
                <?php // Entry Modified Timestamp
                hopscotch_entry_modified_timestamp();
                ?>
                
                <?php // Entry Tags
                hopscotch_entry_tags();
                ?>

            </div>
        </footer>
    
    </div>
</article><!-- entry_comp -->