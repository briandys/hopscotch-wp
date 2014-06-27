<?php // HopScotch Content Header hook
hopscotch_content_header();
?>

<article id="<?php hopscotch_post_id(); ?>" <?php post_class(); ?>>
    
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
                hopscotch_entry_subtitle();
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
        
        
        <?php // Entry Content opening tags
        echo '<div class="entry-ct ';
        hopscotch_slug_class();
        echo '--entry-ct ';

        if ( is_search() ) :
        echo 'entry-summary';
        endif;

        echo '">';
        ?>
        
        <?php // Entry content
        if ( is_search() || is_author() ) : ?>

            <div class="entry-ct-cr"><?php the_excerpt(); ?></div>

        <?php else : ?>

            <?php // HopScotch Content hook
            hopscotch_entry_content();
            ?>

            <?php // Content
            if( trim( get_the_content() ) !== "" ) {                    
                echo '<div class="entry-ct-cr">';
                the_content( __( 'More', 'hopscotch' ) );
                echo '</div>';
            }
            wp_link_pages( array(
                'before'      => '<div class="page-links"><p class="page-links-title">' . __( 'Pages:', 'hopscotch' ) . '</p>',
                'after'       => '</div>',
                'link_before' => '<span class="label">',
                'link_after'  => '</span>',
            ) );
            ?>                
        <?php endif; ?>

        <?php if ( ! is_page_template( 'templates/solo.php' ) ) : ?>

        <?php  // Display child page
        $parent = $post->ID;
        $args = array(
            'post_type' => 'page',
            'post_parent' => $parent,
            'order' => 'ASC'
        );
        $the_query = new WP_Query( $args );
        ?>                
            <?php if ( $the_query->have_posts() ) : ?>
            <div class="child-page">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
            </div>

            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        <?php endif; ?>
            
        </div><!-- .entry-ct -->
        
        <!-- Format: Status, Tag -->
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