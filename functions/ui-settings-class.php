<?php
// UI Settings Class
// Contains Theme Class and Template Class

// Theme
if ( ! function_exists( 'hopscotch_ui_settings_html_class' ) ) :
	function hopscotch_ui_settings_html_class() {
        
        echo 'hs-theme--hopscotch ';
        
        echo 'hs-template__search--default ';
        // echo 'hs-template__search--lightsaber ';
    
    }
    add_action( 'hopscotch_html_class', 'hopscotch_ui_settings_html_class');
endif;