<?php // Content Header hook
hopscotch_content_header();
?>

<article id="<?php hopscotch_post_id(); ?>" <?php post_class(); ?> <?php if ( is_page_template( 'templates/info-card.php' ) ) : echo 'itemscope itemtype="http://schema.org/Organization"'; endif; ?>>
    
    <div class="entry-cr <?php hopscotch_slug_class(); ?>--entry-cr">
        <header class="entry-hr <?php hopscotch_slug_class(); ?>--entry-hr">
            <div class="entry-hr-cr">
				
                <?php // Entry title
                if ( ! is_page_template( 'templates/info-card.php' ) ) :
                    the_title( '<h1 class="entry-title"><a class="entry-title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                else :
				    the_title( '<h1 class="entry-title" itemprop="name"><a class="entry-title-link org" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                endif;
                ?>
                
                <?php // Edit Post Action
                hopscotch_entry_action_edit();
                ?>
                
                <?php // Custom Field: Subtitle
                hopscotch_entry_subtitle();
                ?>
                
                <?php // Breadcrumbs
                hopscotch_breadcrumbs();
                ?>
            
                <?php // Format: Not Status
                if ( ! has_post_format( 'status' ) ) : ?>
                    
                    <div class="entry-meta">
                        <?php hopscotch_entry_date(); ?>
                        <?php hopscotch_entry_byline(); ?>
                    </div>
                    
                    <?php // Comment link
                    if ( ! is_search() ) :
                        hopscotch_entry_action_comment();
                    endif;
                    ?>
                <?php endif; ?>
                
                <?php // Entry thumbnail
                hopscotch_entry_thumbnail();
                ?>
                
            </div>            
        </header>
        
        
        <div class="entry-ct <?php hopscotch_slug_class(); ?>--entry-ct <?php if( is_search() ) echo 'entry-summary'; ?>">
            <div class="entry-ct-cr">
            <?php // Entry content
            if ( is_search() || is_author() ) : ?>

                <?php the_excerpt(); ?>

            <?php else : ?>

                <?php // Content
                if( trim( get_the_content() ) !== "" ) {                    
                    the_content( __( 'More', 'hopscotch' ) );
                }
                ?>
                <?php hopscotch_wp_link_pages(); ?>
            <?php endif; ?>
                
            <?php // HopScotch Content hook
            hopscotch_entry_content();
            ?>
            </div>
            
            <?php // Child Page
            // Use Page Template: Solo to display only the main content of that page
            if ( ! is_page_template( 'templates/solo.php' ) && ! is_search() ) :
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
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

            <?php endif; ?>
        </div><!-- entry-ct -->
        
        <?php // Post Formats: Status, Tag
        if ( has_tag() || has_post_format( 'status' ) ) :
        ?>
        <footer class="entry-fr <?php hopscotch_slug_class(); ?>--entry-fr">
            <div class="entry-fr-cr">
				
				<?php if ( has_post_format( 'status' ) ) : ?>
                <div class="entry-meta">			
                    <?php hopscotch_entry_date(); ?>
                    <?php hopscotch_entry_byline(); ?>
                </div><!-- .entry-meta -->                
                <?php hopscotch_entry_action_comment(); ?>
				<?php endif; ?>
                
                <?php hopscotch_the_tags(); ?>
            </div>
        </footer><!-- entry-fr -->
        <?php endif; ?>
    
    </div><!-- entry-cr -->
</article>