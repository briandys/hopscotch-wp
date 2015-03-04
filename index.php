<?php
// The main template file
// This is the most generic template file in a WordPress theme
// and one of the two required files for a theme (the other being style.css).
// It is used to display a page when nothing more specific matches a query.
// e.g., it puts together the home page when no home.php file exists.
// Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
// @package WordPress
// @subpackage HopScotch
// @since HopScotch 1.0
?>

<?php get_header(); ?>

            <div class="content_hr">
                <div class="content-hr_cr">
                    <h2 class="accessible-name">
                        
                    <?php // Singular (is_single, is_page, is_attachment)
                    // If Front Page is customized
                    // If Single Content
                    if ( is_singular() ) : ?>
                        <span class="label pred_label"><?php _e( 'Content', 'hopscotch' ); ?></span><span class="label colon_label">:</span>
                        <span class="label subj_label"><?php _e( 'Main', 'hopscotch' ); ?></span>

                    <?php // Front Page
                    // If Latest Posts are displayed (default)
                    elseif ( is_front_page() ) : ?>
                        <span class="label pred_label"><?php _e( 'Content', 'hopscotch' ); ?></span><span class="label colon_label">:</span>
                        <span class="label subj_label"><?php _e( 'Front Page', 'hopscotch' ); ?></span>

                    <?php // Home
                    // If Posts Page is customized
                    elseif ( is_home() ) : ?>
                        <span class="label pred_label"><?php _e( 'Content', 'hopscotch' ); ?></span><span class="label colon_label">:</span>
                        <span class="label subj_label"><?php _e( 'Home', 'hopscotch' ); ?></span>

                    <?php // Search Results
                    elseif ( is_search() ) :
                        $entrySearch = new WP_Query( array(
                            's'         => $s,
                            'showposts' => -1,
                        ) );
                        $key = get_search_query();
                        $count = $entrySearch->post_count;
                        echo '<span class="label search-results-count_label">' . $count . '</span> ';
                        echo '<span class="label pred_label">';
                        if ($count == 0 || $count == 1)
                            _e( 'Search Result for', 'hopscotch' );
                        else
                            _e( 'Search Results for', 'hopscotch' );
                        echo '</span> ';                                     
                        echo '<span class="label subj_label">' . $key . '</span>';
                        wp_reset_postdata();
                    ?>

                    <?php // Category
                    elseif ( is_category() ) : ?>
                        <?php printf( __( '<span class="label pred_label">Category</span><span class="label colon_label">:</span> <span class="label subj_label">%s</span>', 'hopscotch' ), single_cat_title( '', false ) ); ?>

                    <?php // Tag
                    elseif ( is_tag() ) : ?>
                        <?php printf( __( '<span class="label pred_label">Tag</span><span class="label colon_label">:</span> <span class="label subj_label">%s</span>', 'hopscotch' ), single_tag_title( '', false ) ); ?>

                    <?php // Archive
                    elseif ( is_archive() && ! is_author() ) : ?>
                        <?php echo '<span class="label pred_label">'; ?>
                        <?php
                        if ( is_day() ) :
                            printf( __( 'Daily Archives</span><span class="label colon_label">:</span> <span class="label subj_label">%s</span>', 'hopscotch' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( __( 'Monthly Archives</span><span class="label colon_label">:</span> <span class="label subj_label">%s</span>', 'hopscotch' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'hopscotch' ) ) );
                        elseif ( is_year() ) :
                            printf( __( 'Yearly Archives</span><span class="label colon_label">:</span> <span class="label subj_label">%s</span>', 'hopscotch' ), get_the_date( _x( 'Y', 'yearly archives date format', 'hopscotch' ) ) );
                        else :
                            _e( 'Archives</span>', 'hopscotch' );
                        endif;
                    ?>

                    <?php // Author
                    elseif ( is_author() ) : ?>
                        <?php printf( __( '<span class="label pred_label">All Entries by</span> <span class="label subj_label">%s</span>', 'hopscotch' ), get_the_author() ); ?>

                    <?php // Other
                    else : ?>
                        <span class="label pred_label"><?php _e( 'Content', 'hopscotch' ); ?></span><span class="label colon_label">:</span>
                        <span class="label subj_label"><?php _e( 'Other', 'hopscotch' ); ?></span>
                    <?php endif; ?>
                    </h2>

                    <?php // Category or Tag Description
                    $term_description = term_description();
                    if( ! empty( $term_description ) ) :
                        printf( __( '<p class="primary-content_desc">%s</p>', 'hopscotch' ), $term_description );
                    endif;
                    ?>

                    <?php // Author Description
                    if ( is_author() && get_the_author_meta( 'description' ) ) :
                        printf( __( '<p class="primary-content_desc">%s</p>', 'hopscotch' ), get_the_author_meta( 'description' ) );    
                    endif; ?>

                </div>

            </div><!-- content_hr -->

            <div class="content_ct">

                <!-- Sub-Constructor: Primary Content -->
                <div class="comp primary-content_comp">
                    <section class="primary-content_cr">
                        <h3 class="accessible-name"><?php _e( 'Primary Content', 'hopscotch' ); ?></h3>
                        <div class="primary-content_ct">

                        <?php // Function as single.php (is_single, is_page, is_attachment)
                        if ( is_singular() ) : ?>
                            
                            <?php                                
                            while ( have_posts() ) : the_post();
                                
                                // Called from functions > single-content.php
                                hopscotch_single_content();
                            endwhile;
                            ?>
                            
                        <?php // Function as index.php
                        else : ?>

                            <?php
                            if ( have_posts() ) :
                                while ( have_posts() ) : the_post();
                                    
                                    // Calls content.php
                                    get_template_part( 'content', get_post_format() );
                                endwhile;
                                
                                // Called from functions > web-product-page-navigation.php
                                hopscotch_web_product_page_nav();
                            else :
                                
                                // Calls content-none.php
                                get_template_part( 'content', 'none' );
                            endif;
                            ?>
                            
                        <?php endif; ?>

                        </div><!-- primary-content_ct -->
                    </section>
                </div><!-- primary-content_comp -->

                <?php get_sidebar(); ?>
                
            </div><!-- content_ct -->
        </section>
    </main><!-- content -->

<?php get_footer(); ?>