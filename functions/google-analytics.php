<?php

//------------------------- Google Analytics
function hopscotch_google_analytics() {
	$options_main = get_option( 'hopscotch_customize_main' );
	?>
	<script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','<?php echo $options_main['google_analytics']; ?>');ga('send','pageview');
    </script>
    <?php
}
add_action( 'wp_footer', 'hopscotch_google_analytics' );