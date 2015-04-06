<?php
// Fix Image Width
// Makes the width of images with caption exact to the size of the actual image.
// by Justin Adie, Version: 0.1.0
// Source: http://rathercurious.net

class hopscotch_fix_img_width{
    public $xs = 0; //change this to change the amount of extra spacing

    public function __construct(){
        add_filter( 'img_caption_shortcode', array( &$this, 'fixme' ), 10, 3 );
    }
    
    public function fixme( $x=null, $attr, $content ){

        extract( shortcode_atts( array(
                'id'    => '',
                'align'    => 'alignnone',
                'width'    => '',
                'caption' => ''
            ), $attr ) );

        if ( 1 > ( int ) $width || empty( $caption ) ) {
            return $content;
        }

        if ( $id ) $id = 'id="' . $id . '" ';
        
        $html_markup = '<div ' . $id . 'class="comp article-entry-image_comp wp-caption ' . $align . '" style="width: ' . ( ( int ) $width + $this->xs ) . 'px">';
        $html_markup .= '<div class="cr article-entry-image_cr">';
        $html_markup .= $content;
        $html_markup .= '<div class="comp article-entry-image-caption_comp wp-caption-text">';
        $html_markup .= '<div class="cr article-entry-image-caption_cr">';
        $html_markup .= '<p>' . $caption . '</p>';
        $html_markup .= '</div>';
        $html_markup .= '</div>';
        $html_markup .= '</div>';
        $html_markup .= '</div><!-- article-entry-image_comp -->';
        
        return $html_markup;
    }
}
$hopscotch_fix_img_width = new hopscotch_fix_img_width();


// Add class to plain images (the ones without caption)

function hopscotch_plain_image_add_class( $content ) {
    return preg_replace('/<p[^>]*>\\s*?(<a.*?><img.*?><\\/a>|<img.*?>)?\\s*<\/p>/', '<div class="comp article-entry-image_comp"><div class="cr article-entry-image_cr">$1</div></div>', $content);
}
add_filter('the_content', 'hopscotch_plain_image_add_class');