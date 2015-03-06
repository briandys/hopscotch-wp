<?php
// Entry Published Timestamp
// The date and time the entry was published.
// @since HopScotch 1.0
// Called from content.php

if ( ! function_exists( 'hopscotch_article_entry_published_timestamp' ) ) :
	function hopscotch_article_entry_published_timestamp() {
		
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
    
            // Structure
            $timestamp_comp_string = '<div class="comp timestamp_comp article-entry--published--timestamp_comp">';
            $timestamp_comp_string .= '<div class="cr timestamp_cr article-entry--published--timestamp_cr">';
            $timestamp_comp_string .= '<span class="label pred_label">%1$s</span> ';
            $timestamp_comp_string .= '<a class="timestamp_axn" href="%2$s" title="%4$s" rel="bookmark">%3$s</a>';
            $timestamp_comp_string .= '</div>';
            $timestamp_comp_string .= '</div><!-- article-entry--published--timestamp_comp -->';
    
            // Published Timestamp
            $time_string = '<time class="timestamp_datetime" datetime="%1$s">';
            $time_string = '<span class="label subj_label timestamp-date_label">';
            $time_string .= '<span class="label timestamp-day_label">%2$s</span> ';
            $time_string .= '<span class="label timestamp-month_label">%3$s</span> ';
            $time_string .= '<span class="label timestamp-year_label">%4$s</span>';
            $time_string .= '</span>';
            $time_string .= '</time>';

            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( 'c' ) ), // 1: For Published datetime attribute
                get_the_date( 'j' ), // 2: For Published Date
                get_the_date( 'F' ), // 3: For Published Month
				get_the_date( 'Y' ) // 4: For Published Year
            );

            printf( $timestamp_comp_string,
                _x( '<span class="label adj_label">Published</span> <span class="label prep_label">on</span>', 'Used for entry publish date.', 'hopscotch' ),
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
// Called from content.php

if ( ! function_exists( 'hopscotch_article_entry_modified_timestamp' ) ) :
	function hopscotch_article_entry_modified_timestamp() {
		
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
            
            // Structure
            $timestamp_comp_string = '<div class="comp timestamp_comp article-entry--modified--timestamp_comp">';
            $timestamp_comp_string .= '<div class="cr timestamp_cr article-entry--modified--timestamp_cr">';
            $timestamp_comp_string .= '<span class="label pred_label">%1$s</span> ';
            $timestamp_comp_string .= '<a class="timestamp_axn" href="%2$s" title="%4$s" rel="bookmark">%3$s</a>';
            $timestamp_comp_string .= '</div>';
            $timestamp_comp_string .= '</div><!-- article-entry--modified--timestamp_comp -->';
    
            // Modified Timestamp
            $time_string = '<time class="timestamp_datetime" datetime="%1$s">';
            $time_string = '<span class="label subj_label timestamp-date_label">';
            $time_string .= '<span class="label timestamp-day_label">%2$s</span> ';
            $time_string .= '<span class="label timestamp-month_label">%3$s</span> ';
            $time_string .= '<span class="label timestamp-year_label">%4$s</span>';
            $time_string .= '</span>';
            $time_string .= '</time>';

            $time_string = sprintf( $time_string,
                esc_attr( get_the_modified_date( 'c' ) ), // 1: For Modified datetime attribute
                get_the_modified_date( 'j' ), // 2: For Modified Date
                get_the_modified_date( 'F' ), // 3: For Modified Month
				get_the_modified_date( 'Y' ) // 4: For Modified Year
            );

            printf( $timestamp_comp_string,
                _x( '<span class="label adj_label">Modified</span> <span class="label prep_label">on</span>', 'Used for entry modification date.', 'hopscotch' ),
                esc_url( get_permalink() ),
                $time_string,
                get_the_title()
            );
        }
	}
endif;