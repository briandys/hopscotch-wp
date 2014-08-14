<?php

//------------------------- HopScotch Credits
if (!function_exists('hopscotch_site_info')) :
	function hopscotch_site_info() {
		?>
		<?php get_template_part( 'components/web-designer' ); ?>
		<?php
	}
	add_action( 'hopscotch_web_designer', 'hopscotch_site_info');
endif;

if (!function_exists('hopscotch_site_info_olrayt')) :
	function hopscotch_site_info_olrayt() {
		?>
		<span class="olrayt">All rights reserved.</span>
		<?php
	}
	add_action( 'hopscotch_copyright', 'hopscotch_site_info_olrayt');
endif;