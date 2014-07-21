<?php

//------------------------- Enables PHP execution in Text Widgets
function text_widget_php( $html ){
    if( strpos( $html, "<"."?php" ) !== false ) {
        ob_start();
        eval( "?".">".$html );
        $html = ob_get_contents();
        ob_end_clean();
    }
    return $html;
}

add_filter( 'widget_text', 'text_widget_php', 100 );