<?php
// Entry Modified Timestamp
// The date and time the entry was modified.
// @since HopScotch 3.0

if ( ! function_exists( 'hopscotch_entry_modified_timestamp' ) ) :
	function hopscotch_entry_modified_timestamp() {
		
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
    
            // Published timestamp
            $time_string = '<time class="entry-modified-timestamp_datetime" datetime="%1$s">';
            $time_string .= '<span class="label timestamp-date_label">%2$s</span> ';
            $time_string .= '<span class="label timestamp-month_label">%3$s</span> ';
            $time_string .= '<span class="label timestamp-year_label">%4$s</span>';
            $time_string .= '</time>';

            $time_string = sprintf( $time_string,
                esc_attr( get_the_modified_date( 'c' ) ), // 1: For Modified datetime attribute
                get_the_modified_date( 'j' ), // 2: For Modified Date
                get_the_modified_date( 'F' ), // 3: For Modified Month
				get_the_modified_date( 'Y' ) // 4: For Modified Year
            );

            printf( '<div class="comp timestamp_comp entry-modified-timestamp_comp"><div class="entry-modified-timestamp_cr"><span class="label">%1$s</span> <a class="entry-modified-timestamp_axn" href="%2$s" rel="bookmark">%3$s</a></div></div><!-- entry-modified-timestamp_comp -->',
                _x( 'Modified on', 'Used for entry modification date.', 'hopscotch' ),
                esc_url( get_permalink() ),
                $time_string
            );
        }
	}
endif;