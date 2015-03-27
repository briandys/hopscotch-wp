<?php
// Web Product Page Navigation
// Based on Twenty Fourteen's twentyfourteen_paging_nav() function.

if ( ! function_exists( 'hopscotch_web_product_page_nav' ) ) :
    function hopscotch_web_product_page_nav() {
        global $wp_query, $wp_rewrite;

        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }

        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $GLOBALS['wp_query']->max_num_pages,
            'current'  => $paged,
            'mid_size' => 7,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => __( '<span class="label prev-ct_label" rel="prev"><span class="label pred_label">Previous</span> <span class="label subj_label">Page</span></span>', 'hopscotch' ),
            'next_text' => __( '<span class="label next-ct_label" rel="next"><span class="label pred_label">Next</span> <span class="label subj_label">Page</span></span>', 'hopscotch' ),
            'type'      => 'list',
        ) );

        if ( $links ) :

        ?>
            <nav class="nav content_nav web-product-page_nav">
                <div class="cr content-nav_cr web-product-page-nav_cr">
                    <h2 class="accessible-name web-product-page_accessible-name"><?php _e( 'Web Product Page Navigation', 'hopscotch' ); ?></h2>
                    <p class="friendly-name"><?php _e( 'Pages:', 'hopscotch' ); ?></p>
                    <?php echo $links; ?>
                </div>
            </nav><!-- web-product-page_nav -->
        <?php
        endif;
    }
endif;