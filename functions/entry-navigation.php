<?php

//------------------------- Post Navigation
if (!function_exists('hopscotch_post_nav')) :
	function hopscotch_post_nav() {
        ?>
		<?php get_template_part( 'components/entry-navigation' ); ?>
		<?php
	}
endif;