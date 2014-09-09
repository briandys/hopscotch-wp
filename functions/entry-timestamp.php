<?php

/*------------------------- Entry Date -------------------------*/
if ( ! function_exists( 'hopscotch_entry_date' ) ) :
	function hopscotch_entry_date( $echo = true ) {
		
		if ( has_post_format( array( 'chat', 'status' ) ) )
			$format_prefix = _x( '%2$s', '1: post format name. 2: date', 'hopscotch' );
		else
			$format_prefix = '%2$s';
	
			$date = sprintf( '<div class="timestamp entry-timestamp"><span class="label">Published on</span> <a class="timestamp-link entry-timestamp-link" href="%1$s" title="%2$s" rel="bookmark"><time class="entry-timestamp-time" datetime="%3$s" title="%2$s"><span class="entry-date"><span class="date-month">%4$s</span> <span class="date-day">%5$s</span><span class="punctuation">,</span> <span class="date-year">%6$s</span></span></time></a></div><!-- .entry-timestamp -->',
				esc_url( get_permalink() ),
				esc_attr( sprintf( __( 'Permalink to %s', 'hopscotch' ), the_title_attribute( 'echo=0' ) ) ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date( 'F' ) ) ),
				esc_html( sprintf( get_the_date('j') ) ),
				esc_html( sprintf( get_the_date('Y') ) )
			);
	
		if ( $echo )
			echo $date;
	
		return $date;
	}
endif;