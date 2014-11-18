<?php // Content Header hook
hopscotch_content_header();
?>

<?php // Hook above .entry
hopscotch_hook_above_entry();
?>

<article id="<?php hopscotch_post_id(); ?>" <?php post_class('entry'); ?> <?php hopscotch_hook_entry_data_att(); ?>>
    
    <div class="entry-cr <?php hopscotch_slug_class(); ?>--entry-cr">
        <header class="entry-hr <?php hopscotch_slug_class(); ?>--entry-hr">
            <div class="entry-hr-cr">
				
                <?php // Format: Not Status
                if ( ! has_post_format( 'status' ) ) : ?>
                
                    <?php // Entry title
                    if ( ! is_page_template( 'template-info-card.php' ) ) :
                        the_title( '<h1 class="entry-title"><a class="entry-title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                    else :
                        the_title( '<h1 class="entry-title" itemprop="name"><a class="entry-title-link org" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                    endif;
                    ?>
                
                    <?php
                    // Edit Post Action (Edit Post link)
                    hopscotch_entry_action_edit();
                    ?>

                    <?php
                    // Custom Field: entry-subtitle
                    hopscotch_hook_subtitle();
                    ?>

                    <?php
                    // Breadcrumbs
                    hopscotch_breadcrumbs();
                    ?>
                    
                    <div class="entry-meta">
                        <div class="entry-meta-cr">
                            
                        <?php
                        // Entry date and time
                        hopscotch_entry_date();

                        // Hopscotch Meta hook
                        hopscotch_hook_header_meta();

                        // Entry byline (Author and Category)
                        hopscotch_entry_byline();
                        ?>
                        
                        </div>
                    </div>
                    
                    <?php // Comment link
                    if ( ! is_search() ) :
                        hopscotch_entry_action_comment();
                    endif;
                    ?>
                <?php else : ?>
                    <h1 class="entry-title">Status Message</h1>
                <?php endif; ?>
                
                <?php // Entry thumbnail
                hopscotch_hook_entry_thumbnail();
                ?>
                
            </div>            
        </header>
        
        
        <div class="<?php hopscotch_hook_entry_content_class(); ?> <?php hopscotch_slug_class(); ?>--entry-ct">
            
            <?php // HopScotch Pre-content Hook
            hopscotch_hook_pre_content();
            ?>
            
            <div class="entry-ct-cr">
                
            <?php // Entry content
            if ( is_search() || is_author() ) : ?>

                <?php the_excerpt(); ?>

            <?php else : ?>

                <?php // Content
                if( $post->post_content !== "" ) {?>
                    
                    <?php // HopScotch Content Title Hook
                    hopscotch_hook_content_title();
                    ?>
                    
                    <?php // HopScotch Pre the_content Hook
                    hopscotch_hook_pre_the_content();
                    ?>
                
                    <?php // HopScotch the_content Hook
                    hopscotch_hook_the_content();
                    ?>
                
                <?php } ?>
                <?php hopscotch_wp_link_pages(); ?>
            
            <?php endif; ?>
                
            <?php // HopScotch Content Hook
            hopscotch_entry_content();
            ?>
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
                    <div class="child-page child-content">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
        </div><!-- entry-ct -->
        
        <?php // Post Formats: Status, Tag
        if ( has_tag() || has_post_format( 'status' ) ) :
        ?>
        <footer class="entry-fr <?php hopscotch_slug_class(); ?>--entry-fr">
            <div class="entry-fr-cr">
				
            <?php if ( has_post_format( 'status' ) ) : ?>
                <div class="entry-meta">			
                <?php
                hopscotch_entry_date();
                hopscotch_entry_byline();
                ?>
                </div><!-- entry-meta -->
                <?php
                hopscotch_entry_action_edit();
                hopscotch_entry_action_comment();
                ?>
            <?php endif; ?>
                
                <?php hopscotch_the_tags(); ?>
            </div>
        </footer><!-- entry-fr -->
        <?php endif; ?>
    
    </div><!-- entry-cr -->
</article>