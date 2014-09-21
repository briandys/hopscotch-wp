<?php

//------------------------- Main Navigation Data Attribute
if ( !function_exists( 'set_ui_type_main_nav' ) ) :
    
    function set_ui_type_main_nav() {
        
        $class_prefix = 'ui-type-main-nav';
        $class_type = 'folding-ladder';
        
        echo $class_prefix.'--'.$class_type.' ';

    }
    add_action( 'hopscotch_main_nav_class', 'set_ui_type_main_nav' );

endif;