<?php get_header(); ?>
                    
            <div id="primary-content" class="primary-content">
                <div class="primary-content-cr" role="main">

                    <div class="main-content">
                        <div class="main-content-cr">
                            <header class="main-content-hr">
                                <div class="main-content-hr-cr">                            
                                    <h2 class="main-content-heading">

                                    <!-- Home -->
                                    <?php if ( is_home() ) : ?>									
                                        <span class="label">Primary Content:</span> <span class="label-value">Home</span>

                                    <!-- Search -->
                                    <?php elseif ( is_search() ) : ?>                                
                                        <?php
                                        $entrySearch = new WP_Query( array(
                                            's'         => $s,
                                            'showposts' => -1,
                                        ) );
                                        $key = get_search_query();
                                        $count = $entrySearch->post_count;
                                        echo '<span class="label-value counter search-results--count">' . $count . '</span>';
                                        echo '&nbsp;';
                                        echo '<span class="label">';
                                        if ($count == 0 || $count == 1)
                                            echo __( 'Search Result for', 'hopscotch' );
                                        else
                                            echo __( 'Search Results for', 'hopscotch' );
                                        echo '</span>';
                                        echo '&nbsp;';                                        
                                        echo '<span class="label-value search-results--term">' . $key . '</span>';
                                        wp_reset_query();
                                    ?>

                                    <!-- Category -->
                                    <?php elseif ( is_category() ) : ?>
                                        <?php printf( __( '<span class="label">Category:</span> <span class="label-value">%s</span>', 'hopscotch' ), single_cat_title( '', false ) ); ?>

                                    <?php elseif ( is_tag() ) : ?>
                                        <?php printf( __( '<span class="label">Tag Archives:</span> <span class="label-value">%s</span>', 'hopscotch' ), single_tag_title( '', false ) ); ?>

                                    <!-- Archives -->
                                    <?php elseif ( is_archive() && ! is_author() ) : ?>
                                        <?php echo '<span class="label">'; ?>
                                        <?php
                                        if ( is_day() ) :
                                            printf( __( 'Daily Archives:</span> <span class="label-value">%s</span>', 'hopscotch' ), get_the_date() );
                                        elseif ( is_month() ) :
                                            printf( __( 'Monthly Archives:</span> <span class="label-value">%s</span>', 'hopscotch' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'hopscotch' ) ) );
                                        elseif ( is_year() ) :
                                            printf( __( 'Yearly Archives:</span> <span class="label-value">%s</span>', 'hopscotch' ), get_the_date( _x( 'Y', 'yearly archives date format', 'hopscotch' ) ) );
                                        else :
                                            _e( 'Archives</span>', 'hopscotch' );
                                        endif;
                                    ?>

                                    <!-- Author -->
                                     <?php elseif ( is_author() ) : ?>									
                                       <span class="label">All Posts by</span> <span class="label-value"><?php the_author_meta( 'display_name' ); ?></span>

                                    <?php else : ?>

                                    <!-- Regular -->
                                        <span class="label">Content:</span> <span class="label-value">Main</span>

                                    <?php endif; ?>
                                    </h2>

                                    <?php if ( category_description() ) : ?>
                                    <p class="main-content-meta description category-description"><?php echo category_description(); ?></p>
                                    <?php endif; ?>

                                    <?php if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
                                    <p class="main-content-meta description author-description"><?php the_author_meta( 'description' ); ?></p>
                                    <?php endif; ?>

                                    <?php if ( is_tag() ) : ?>                                
                                    <?php
                                        $term_description = term_description();
                                        if ( ! empty( $term_description ) ) :
                                            printf( '<p class="main-content-meta taxonomy-description">%s</p>', $term_description );
                                        endif;
                                    ?>
                                    <?php endif; ?>
                                </div>
                            </header>
                            <div class="main-content-ct">                                    

                                <?php if ( have_posts() ) :                                   
                                        while ( have_posts() ) : the_post();
                                            get_template_part( 'content', get_post_format() );
                                        endwhile;
                                        hopscotch_paging_nav();
                                    else :
                                        get_template_part( 'content', 'none' );
                                    endif;
                                ?>

                            </div>
                       </div>
                    </div><!-- main-content -->            

                </div>
            </div><!-- primary-content -->

            <?php get_sidebar(); ?>

        </div><!-- main-cr -->
    </div><!-- main -->

<?php get_footer(); ?>