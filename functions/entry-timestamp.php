<?php
// Entry Published Timestamp
// The date and time the entry was published.
// @since HopScotch 1.0

if ( ! function_exists( 'hopscotch_entry_timestamp' ) ) :
	function hopscotch_entry_timestamp( $echo = true ) {
		
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
    
            // Published timestamp
            $time_string = '<div class="comp timestamp_comp entry-published-timestamp_comp">';
            $time_string .= '<div class="entry-published-timestamp_cr">';
            $time_string .= '<span class="label">Published on</span>';
            $time_string .= '<a class="entry-published-timestamp_axn" href="#">';
            $time_string .= '<time class="entry-published-timestamp_datetime" datetime="%1$s">';
            $time_string .= '<span class="label timestamp-date_label">%2$s</span>';
            $time_string .= '<span class="label timestamp-month_label">%3$s</span>';
            $time_string .= '<span class="label timestamp-year_label">%4$s</span>';
            $time_string .= '</time>';
            $time_string .= '</a>';
            $time_string .= '</div>';
            $time_string .= '</div><!-- entry-published-timestamp_comp -->';

            // If entry was modified
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                
                // Published timestamp
                $time_string = '<div class="comp timestamp_comp entry-published-timestamp_comp">';
                $time_string .= '<div class="entry-published-timestamp_cr">';
                $time_string .= '<span class="label">Published on</span>';
                $time_string .= '<a class="entry-published-timestamp_axn" href="#">';
                $time_string .= '<time class="entry-published-timestamp_datetime" datetime="%1$s">';
                $time_string .= '<span class="label timestamp-date_label">%2$s</span>';
                $time_string .= '<span class="label timestamp-month_label">%3$s</span>';
                $time_string .= '<span class="label timestamp-year_label">%4$s</span>';
                $time_string .= '</time>';
                $time_string .= '</a>';
                $time_string .= '</div>';
                $time_string .= '</div><!-- entry-published-timestamp_comp -->';
            }

            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( 'c' ) ), // 1: For Published datetime attribute
                get_the_date( 'j' ), // 2: For Published Date
                get_the_date( 'F' ), // 3: For Published Month
				get_the_date( 'Y' ), // 4: For Published Year
                esc_attr( get_the_modified_date( 'c' ) ), // 5: For Modified datetime attribute
                get_the_modified_date( 'j' ), // 6: For Modified Date
                get_the_modified_date( 'F' ), // 7: For Modified Month
				get_the_modified_date( 'Y' ) // 8: For Modified Year
            );

            printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
                _x( 'Posted on', 'Used before publish date.', 'twentyfifteen' ),
                esc_url( get_permalink() ),
                $time_string
            );
        }
	}
endif;