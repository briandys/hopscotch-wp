<?php
// HopScotch Single Content
// To enable Child Themes to hook up conditionals in displaying single content without duplicating index.php

if ( ! function_exists( 'hopscotch_single_content' ) ) :	
    function hopscotch_single_content() {

        // Calls content.php
        get_template_part( 'content', get_post_format() );
    }
endif;