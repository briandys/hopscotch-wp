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

            printf( '<div class="comp entry-timestamp_comp article-entry-timestamp_comp article-entry-published-timestamp_comp"><div class="entry-timestamp_cr article-entry-published-timestamp_cr"><span class="label pred_label">%1$s</span> <a class="article-entry-published-timestamp_axn" href="%2$s" title="Permalink to %4$s" rel="bookmark">%3$s</a></div></div><!-- article-entry-published-timestamp_comp -->',
                _x( 'Published on', 'Used for entry publish date.', 'hopscotch' ),
                esc_url( get_permalink() ),
                $time_string,
                get_the_title()
            );
        }
	}
endif;


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

            printf( '<div class="comp entry-timestamp_comp article-entry-modified-timestamp_comp"><div class="entry-timestamp_cr article-entry-modified-timestamp_cr"><span class="label pred_label">%1$s</span> <a class="article-entry-modified-timestamp_axn" href="%2$s" title="Permalink to %4$s" rel="bookmark">%3$s</a></div></div><!-- article-entry-modified-timestamp_comp -->',
                _x( 'Modified on', 'Used for entry modification date.', 'hopscotch' ),
                esc_url( get_permalink() ),
                $time_string,
                get_the_title()
            );
        }
	}
endif;


// Entry Modified Timestamp
// The date and time the entry was modified.
// @since HopScotch 3.0

if ( ! function_exists( 'hopscotch_comment_entry_published_timestamp' ) ) :
	function hopscotch_comment_entry_published_timestamp() {
        
        // Published timestamp
        $time_string = '<time class="timestamp_datetime comment-entry-timestamp_datetime" datetime="%1$s">';
        $time_string .= '<span class="label subj_label">';
        $time_string .= '<span class="label timestamp-date_label">%2$s</span> ';
        $time_string .= '<span class="label timestamp-month_label">%3$s</span> ';
        $time_string .= '<span class="label timestamp-year_label">%4$s</span>';
        $time_string .= '<span class="label comma_label">,</span> ';
        $time_string .= '<span class="label timestamp-time_label">%5$s</span>';
        $time_string .= '</span>';
        $time_string .= '</time>';

        $time_string = sprintf( $time_string,
            esc_attr( get_comment_date( 'c' ) ), // 1: For Published datetime attribute
            get_comment_date( 'j' ), // 2: For Published Date
            get_comment_date( 'F' ), // 3: For Published Month
            get_comment_date( 'Y' ), // 4: For Published Year
            get_comment_time( 'H:i' ) // 5: For Published Time
        );

        printf( '%1$s', $time_string );
	}
endif;