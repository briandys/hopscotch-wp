<?php
//  wp_link_pages
// Displays the pages of a post (done by <!--nextpage-->)
// http://codex.wordpress.org/Function_Reference/wp_link_pages
// http://bavotasan.com/2012/a-better-wp_link_pages-for-wordpress

function hopscotch_entry_page_nav( $args = '' ) {
	$defaults = array(
		'before' => '<nav class="nav content-nav_nav entry-page-nav_nav"><h2 class="accessible-name">' . __( 'Entry Page Navigation' ) . '</h2><p class="friendly-name">' . __( 'Pages:' ) . '</p><ul class="nav-grp content-nav_nav-grp entry-page-nav_nav-grp">', 
		'after' => '</ul></nav><!--  entry-page-nav_nav -->',
		'text_before' => '',
		'text_after' => '',
		'next_or_number' => 'number', 
		'nextpagelink' => __( 'Next Page' ),
		'previouspagelink' => __( 'Previous Page' ),
		'pagelink' => '%',
		'echo' => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
				$j = str_replace( '%', $i, $pagelink );
				$output .= '';
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= '<li class="nav-item content-nav_nav-item entry-page-nav_nav-item">' . _wp_link_page( $i );
				else
					$output .= '<li class="nav-item content-nav_nav-item entry-page-nav_nav-item ui-state__nav-item--inactive"><span class="label">';

				$output .= $text_before . $j . $text_after;
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= '</a>';
				else
					$output .= '</span>';
			}
			$output .= $after;
		} else {
			if ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $previouspagelink . $text_after . '</a>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $nextpagelink . $text_after . '</a>';
				}
				$output .= $after;
			}
		}
	}

	if ( $echo )
		echo $output;

	return $output;
}