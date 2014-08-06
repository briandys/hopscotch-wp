<?php

//------------------------- Page Navigation
if ( ! function_exists( 'hopscotch_paging_nav' ) ) :
function hopscotch_paging_nav() {
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
		'mid_size' => 4,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '<span class="label">Previous Page</span>', 'hopscotch' ),
		'next_text' => __( '<span class="label">Next Page</span>', 'hopscotch' ),
	) );

	if ( $links ) :

	?>
	<nav class="action-items content-navigation content-pagination page-navigation page-navigation-action" role="navigation">
		<div class="content-navigation-cr">
            <h1 class="assistive-text"><?php _e( 'Page Navigation', 'hopscotch' ); ?></h1>
            <div class="acton-list content-navigation-list page-navigation-list">
                <?php echo $links; ?>
            </div>
        </div>
	</nav><!-- action-items -->
	
    <?php
	endif;
}
endif;