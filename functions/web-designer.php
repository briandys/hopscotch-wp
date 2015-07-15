<?php

//------------------------- HopScotch Credits
if (!function_exists('hopscotch_web_designer_info')) :
	function hopscotch_web_designer_info() {
        get_template_part( 'components/web-designer' );
    }
    add_action( 'hopscotch_web_designer', 'hopscotch_web_designer_info');
endif;