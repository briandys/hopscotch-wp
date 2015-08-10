<?php // Auto Copyright Year

function hopscotch_copyright_range($year = 'auto'){
	if (intval($year) == 'auto'){ $year = date('Y'); }
	elseif (intval($year) == date('Y')){ echo intval($year); }
	elseif (intval($year) < date('Y')){ echo intval($year) . ' &ndash; ' . date('Y'); }
	elseif (intval($year) > date('Y')){ echo date('Y'); }
}
add_action( 'hopscotch_auto_copyright_year', 'hopscotch_copyright_range');