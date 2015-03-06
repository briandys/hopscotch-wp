<?php
// Text domain

function hopscotch_textdomain() {
	load_theme_textdomain( 'hopscotch', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'hopscotch_textdomain' );