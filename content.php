<?php hopscotch_content_header(); ?>

<article id="<?php hopscotch_post_id(); ?>"
    <?php if ( ! is_page_template( 'templates/info-card.php' ) ) : ?>         
         <?php post_class(); ?>
    <?php else : ?>
         <?php post_class('entry vcard'); ?>
         itemscope itemtype="http://schema.org/Organization"
    <?php endif; ?>
>
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
                
                <?php // Edit entry action
                hopscotch_entry_action_edit();
                ?>
                
                <?php // Breadcrumb navigation
                hopscotch_breadcrumbs();
                ?>
                
                <?php // Subtitle
                hopscotch_entry_subtitle();
                ?>
            
                <?php // Format: Status
                if ( ! has_post_format( 'status' ) ) : ?>
                    
                    <div class="entry-meta">
                        <?php hopscotch_entry_date(); ?>
                        <?php hopscotch_entry_byline(); ?>
                    </div><!-- .entry-meta -->
                    
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
        
        <div class="entry-ct  <?php hopscotch_slug_class(); ?>--enry-ct <?php if ( is_search() ) : ?>entry-summary<?php endif; ?>">
            <div class="entry-ct-cr">
				
				<!--  -->
                <?php // Entry content
                if ( is_search() || is_author() ) : ?>
                    
                    <?php // Excerpt
                    the_excerpt();
                    ?>
                
                <?php else : ?>

                    <?php // HopScotch Content hook
                    hopscotch_entry_content();
                    ?>

                    <?php // Content
                    the_content( __( 'More', 'hopscotch' ) );
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><p class="page-links-title">' . __( 'Pages:', 'hopscotch' ) . '</p>',
                        'after'       => '</div>',
                        'link_before' => '<span class="label">',
                        'link_after'  => '</span>',
                    ) );
                    ?>                
                <?php endif; ?>
            </div>
            
            <?php if ( ! is_page_template( 'templates/parent.php' ) ) : ?>
                <?php  // Display child page
                $parent = $post->ID;
                $args = array(
                    'post_type' => 'page',
                    'post_parent' => $parent,
                    'order' => 'ASC'
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                
                    <div class="child-page">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>
                    </div>

                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                <?php endif; ?>
            <?php endif; ?>
            
        </div><!-- .entry-ct -->
        
        <!-- Format: status, Tag -->
        <?php if ( has_tag() || has_post_format( 'status' ) ) : ?>
        <footer class="entry-fr <?php hopscotch_slug_class(); ?>--entry-fr">
            <div class="entry-fr-cr">
				
				<?php if ( has_post_format( 'status' ) ) : ?>
                <div class="entry-meta">			
                    <?php hopscotch_entry_date(); ?>
                    <?php hopscotch_entry_byline(); ?>
                </div><!-- .entry-meta -->
                
                <?php hopscotch_entry_action_comment(); ?>
                
				<?php endif; ?>
                
				<?php the_tags( '<div class="entry-tags"><div class="tag-list"><span class="label">Tags:</span> ', '<span class="separator">,</span> ', '</div></div>' ); ?>        
            </div>
        </footer><!-- .entry-fr -->
        <?php endif; ?>
    
    </div><!-- .post-cr -->
</article>