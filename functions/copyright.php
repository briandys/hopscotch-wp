<?php

//------------------------- HopScotch Copyright
if (!function_exists('hopscotch_site_info_olrayt')) :
	function hopscotch_site_info_olrayt() {
		?>
		<span class="olrayt">All rights reserved.</span>
		<?php
	}
	add_action( 'hopscotch_copyright', 'hopscotch_site_info_olrayt');
endif;