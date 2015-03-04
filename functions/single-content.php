<?php
// HopScotch Single Content
// To enable Child Themes to hook up conditionals in displaying single content without duplicating index.php

if ( ! function_exists( 'hopscotch_single_content' ) ) :	
    function hopscotch_single_content() {

        // Calls content.php
        get_template_part( 'content', get_post_format() );
        
        // Entry Navigation
        // Location: functions > entry-navigation.php
        hopscotch_entry_nav();
        
        if ( comments_open() || get_comments_number() ) {
            
            // Calls comments.php
            comments_template();
        }

    }
endif;