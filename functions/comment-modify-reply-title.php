<?php
// Modifies the <h3> tag of #reply-title to <h5>
// Source: http://wordpress.stackexchange.com/a/168879/59838

function hopscotch_modify_reply_title_before() {
    ob_start();
}
add_action( 'comment_form_before', 'hopscotch_modify_reply_title_before' );

function hopscotch_modify_reply_title_after() {
    $html = ob_get_clean();
    $html = preg_replace(
        '/<h3 id="reply-title"(.*)>(.*)<\/h3>/',
        '<h5 id="reply-title"\1>\2</h5>',
        $html
    );
    echo $html;
}
add_action( 'comment_form_after', 'hopscotch_modify_reply_title_after' );