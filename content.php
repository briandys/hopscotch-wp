<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
    <div class="entry-cr">
        <header class="entry-hr">
            <div class="entry-hr-cr">
				
				<?php
                    if ( is_single() || is_page() ) :
                        the_title( '<h1 class="entry-title"><a class="entry-title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                    else :
                        the_title( '<h1 class="entry-title"><a class="entry-title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                    endif;
                ?>
                
                <?php hopscotch_entry_action_edit(); ?>
                
                <?php hopscotch_entry_subtitle(); ?>
            
                <?php if ( ! has_post_format( 'status' ) ) : ?>
                <div class="entry-meta">
                    <?php hopscotch_entry_date(); ?>
                    <?php hopscotch_entry_byline(); ?>
                </div><!-- .entry-meta -->
                
                    <?php if ( ! is_search() ) : ?>
                    <?php hopscotch_entry_action_comment(); ?>
                    <?php endif; ?>
                
                <?php endif; ?>
                
                <?php // Display Entry Thumbnail
                    if ( is_home() || is_archive() || is_search() ) :
                        hopscotch_entry_thumbnail();
                    endif;
                ?>
                
            </div>            
        </header>
        
        <div class="entry-ct<?php if ( is_search() ) : ?> entry-summary<?php endif; ?>">
            <div class="entry-ct-cr">
				
				<?php if ( is_search() || is_author() ) : ?>
                    <?php the_excerpt(); ?>
                <?php else : ?>			
                <?php
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
            
            <?php if ( is_page() ) : ?>
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
        
        <?php if ( has_tag() || has_post_format( 'status' ) ) : ?>
        <footer class="entry-fr">
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