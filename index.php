<?php get_header(); ?>

            <div class="content_hr">

                <div class="content_hr-cr">

                    <h2 class="accessible-name">

                    <?php // Home
                    if ( is_home() ) : ?>									
                        <span class="label">Content:</span> <span class="label-value">Home</span>

                    <?php // Search
                    elseif ( is_search() ) : ?>                                

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

                    <?php // Category
                    elseif ( is_category() ) : ?>
                        <?php printf( __( '<span class="label">Category:</span> <span class="label-value">%s</span>', 'hopscotch' ), single_cat_title( '', false ) ); ?>

                    <?php // Tag
                    elseif ( is_tag() ) : ?>
                        <?php printf( __( '<span class="label">Tag Archives:</span> <span class="label-value">%s</span>', 'hopscotch' ), single_tag_title( '', false ) ); ?>

                    <?php // Archive
                    elseif ( is_archive() && ! is_author() ) : ?>
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

                    <?php // Author
                    elseif ( is_author() ) : ?>
                        <?php printf( __( '<span class="label">All posts by</span> <span class="label-value">%s</span>', 'hopscotch' ), get_the_author() ); ?>

                    <?php // Regular
                    else : ?>
                        <span class="label">Content:</span> <span class="label-value">Main</span>

                    <?php endif; ?>
                    </h2>

                    <?php // Category or Tag description
                    $term_description = term_description();
                    if( !empty( $term_description ) ) :
                        printf( '<p class="primary-content_desc">%s</p>', $term_description );
                    endif;
                    ?>

                    <?php // Author description
                    if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
                        <p class="primary-content_desc">
                            <?php the_author_meta( 'description' ); ?>
                        </p>
                    <?php endif; ?>

                </div>

            </div><!-- content_hr -->

            <div class="content_ct">

                <!-- Sub-Constructor: Primary Content -->
                <div class="comp primary-content_comp">

                    <section class="primary-content_cr">

                        <h3 class="accessible-name">Primary Content</h3>
                        
                        <div class="primary-content_ct">

                        <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                get_template_part( 'content', get_post_format() );
                            endwhile;
                            hopscotch_paging_nav();
                        else :
                            get_template_part( 'content', 'none' );
                        endif;
                        ?>

                        </div><!-- primary-content_ct -->

                    </section>

                </div><!-- primary-content_comp -->

                <div class="comp secondary-content_comp">

                    <section class="secondary-content_cr">

                        <h3 class="accessible-name">Secondary Content</h3>
                        
                        <div class="secondary-content_ct">
                            <?php get_sidebar(); ?>                    
                        </div><!-- secondary-content_ct -->

                    </section>

                </div><!-- secondary-content_comp -->
                
            </div><!-- content_ct -->

        </section>
    
    </main><!-- content -->

<?php get_footer(); ?>