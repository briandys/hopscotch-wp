<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage HopScotch
 * @since HopScotch 3.0
 */
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
                    
                    <h1 class="entry-title_name">Title</h1>
                    <p class="entry-subtitle_name">Subtitle</p>
                </div>

                <div class="entry-hr_ct">
                    <div class="comp entry-byline_comp">

                        <div class="comp entry-author_comp">
                            <span class="label">By</span>
                            <a class="entry-author_axn" href="#">
                                <span class="label">Author Name</span>
                                <img alt="Author Avatar">
                            </a>
                        </div><!-- author_comp -->

                        <div class="comp timestamp_comp entry-published-timestamp_comp">
                            <span class="label">Published on</span>
                            <a class="entry-published-timestamp_axn" href="#"><time class="entry-published-timestamp_datetime" datetime="">Date Published</time></a>
                        </div><!-- entry-published-timestamp_comp -->

                    </div><!-- entry-byline_comp -->

                    <div class="comp tag_comp category-tag_comp">
                        <span class="label">Category:</span>
                        <a href="#" rel="category tag">Category 1</a><span class="sep">,</span>
                        <a href="#" rel="category tag">Category 2</a>
                    </div><!-- category-tag_comp -->

                    <div class="comp comments_comp">
                        <span class="label">Show</span>
                        <a class="show-comments_axn" href="#">
                            <span class="comment-count_num">22</span>
                            <span class="label">Comments</span>
                        </a>
                    </div><!-- comments_comp -->

                    <div class="comp entry-banner_comp">
                        <a class="entry-banner_axn" href="#"><img class="attachment-post-thumbnail wp-post-image" alt="Banner Image"></a>
                    </div><!-- entry-banner_comp -->
                </div><!-- entry-hr_ct -->
            
            </div>
        </header>

        <div class="entry_ct">
            <div class="entry-ct_cr">
                <p>Content</p>
                
                <div class="comp show-content_comp">
                    <a class="show-content_axn" href="#">Show Content Action</a>
                </div><!-- show-content_comp -->
                
                <nav class="nav content-nav_nav entry-nav_nav">
                    <h2 class="accessible-name">Entry Navigation</h2>
                    <p class="friendly-name">Pages:</p>
                    <ul class="nav-grp content-nav_nav-grp entry-nav_nav-grp">
                        <li class="nav-item content-nav_nav-item entry-nav_nav-item">
                            <a class="content-nav_axn entry-nav_axn" href="">1</a>
                        <li class="nav-item content-nav_nav-item entry-nav_nav-item">
                            <a class="content-nav_axn entry-nav_axn" href="">2</a>
                        <li class="nav-item content-nav_nav-item entry-nav_nav-item">
                            <a class="content-nav_axn entry-nav_axn" href="">3</a>
                    </ul>
                </nav><!--  entry-nav_nav -->
            </div>
        </div><!-- entry_ct -->

        <footer class="entry_fr">
            <div class="entry-fr_cr">
            
                <div class="comp timestamp_comp entry-modified-timestamp_comp">
                    <span class="label">Modified on</span>
                    <a class="entry-modified-timestamp_axn" href="#"><time class="entry-modified-timestamp_datetime" datetime="">Date Modified</time></a>
                </div><!-- entry-modified-timestamp_comp -->

                <div class="comp timestamp_comp entry-originated-timestamp_comp">
                    <span class="label">Originated on</span>
                    <a class="entry-originated-timestamp_axn" href="#"><time class="entry-originated-timestamp_datetime" datetime="">Date Originated</time></a>
                </div><!-- entry-originated-timestamp_comp -->

                <div class="comp tag_comp tag-tag_comp">
                    <span class="label">Tag:</span>
                    <a href="#" rel="tag">Tag 1</a><span class="sep">,</span>
                    <a href="#" rel="tag">Tag 2</a>
                </div><!-- tag-tag_comp -->

            </div>
        </footer>
    
    </div>
</article><!-- entry_comp -->











<?php // Content Header hook
hopscotch_content_header();
?>

<?php // Hook above .entry
hopscotch_hook_above_entry();
?>

<article  <?php post_class('entry'); ?> >
    
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