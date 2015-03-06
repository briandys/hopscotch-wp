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
        
        $html_markup = '<div ' . $id . 'class="comp article-entry-img_comp wp-caption ' . $align . '" style="width: ' . ( ( int ) $width + $this->xs ) . 'px">';
        $html_markup .= '<div class="cr article-entry-img_cr">';
        $html_markup .= $content;
        $html_markup .= '<div class="comp article-entry-img-caption_comp wp-caption-text">';
        $html_markup .= '<div class="cr article-entry-img-caption_cr">';
        $html_markup .= '<p>' . $caption . '</p>';
        $html_markup .= '</div>';
        $html_markup .= '</div>';
        $html_markup .= '</div>';
        $html_markup .= '</div><!-- article-entry-img_comp -->';
        
        return $html_markup;
    }
}
$hopscotch_fix_img_width = new hopscotch_fix_img_width();