<?php
// Article Content
// To enable Child Themes to hook up conditionals in displaying single content without duplicating index.php
// Calls content.php

if ( ! function_exists( 'hopscotch_article_content' ) ) :	
    function hopscotch_article_content() {

        // Calls content.php
        get_template_part( 'content', get_post_format() );
    }
endif;