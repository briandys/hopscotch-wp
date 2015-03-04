<?php
// http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
// http://blog.scur.pl/2012/08/testing-post-descendant-category-wordpress/
// Usage:

/*
// Post is assigned to "fruit" category or any descendant of "fruit" category?
<?php if ( in_category( 'fruit' ) || post_is_in_descendant_category( 'fruit' ) ) {
	// These are all fruits...
}
?>
*/


if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			if ( is_string( $cat ) ) {
				$cat = get_term_by( 'slug', $cat, 'category' );
				if ( ! isset( $cat, $cat->term_id ) )
					continue;
				$cat = $cat->term_id;
			}
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}