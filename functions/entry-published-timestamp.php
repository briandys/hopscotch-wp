<?php
// Entry Published Timestamp
// The date and time the entry was published.
// @since HopScotch 1.0

if ( ! function_exists( 'hopscotch_entry_published_timestamp' ) ) :
	function hopscotch_entry_published_timestamp() {
		
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
    
            // Published timestamp
            $time_string = '<time class="entry-published-timestamp_datetime" datetime="%1$s">';
            $time_string .= '<span class="label timestamp-date_label">%2$s</span> ';
            $time_string .= '<span class="label timestamp-month_label">%3$s</span> ';
            $time_string .= '<span class="label timestamp-year_label">%4$s</span>';
            $time_string .= '</time>';

            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( 'c' ) ), // 1: For Published datetime attribute
                get_the_date( 'j' ), // 2: For Published Date
                get_the_date( 'F' ), // 3: For Published Month
				get_the_date( 'Y' ) // 4: For Published Year
            );

            printf( '<div class="comp timestamp_comp entry-published-timestamp_comp"><div class="entry-published-timestamp_cr"><span class="label">%1$s</span> <a class="entry-published-timestamp_axn" href="%2$s" rel="bookmark">%3$s</a></div></div><!-- entry-published-timestamp_comp -->',
                _x( 'Published on', 'Used for entry publish date.', 'hopscotch' ),
                esc_url( get_permalink() ),
                $time_string
            );
        }
	}
endif;