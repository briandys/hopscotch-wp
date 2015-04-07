<!--
Component: Web Product Info
Class: web-product-info_comp
-->
<div class="comp web-product-info_comp">
    <div class="cr web-product-info_cr">
        
        <!--
        Component: Web Designer
        Class: web-product-info_comp
        -->
        <div class="comp web-designer-info_comp">
            <div class="cr web-designer-info_cr">
                <p class="label web-designer-info_label">
                    <span class="label subj_label">
                        <?php $url = 'http://designdrive.co/hopscotch/'; echo sprintf( __( '<a class="axn web-designer-name_axn" href="%s">HopScotch</a>', 'hopscotch'), esc_url( $url ) ); ?>
                        <?php _e( 'WordPress Theme', 'hopscotch' ); ?>
                    </span>
                    <span class="label pred_label">
                        <span class="label phrase_label"><?php _e( 'is made in', 'hopscotch' ); ?></span>
                        <abbr class="label made-in-location_label" title="<?php _e( 'Manila, Philippines', 'hopscotch' ); ?>">PH</abbr>
                    </span>
                </p>
            </div>
        </div><!-- web-designer_comp -->
        
        <!--
        Component: Copyright
        Class: copyright_comp
        -->
        <div class="comp copyright-info_comp">
            <div class="cr copyright-info_cr">
                <p class="label copyright-info_label">
                    <span class="label copyright_label">&copy; <?php do_action( 'hopscotch_auto_copyright_year', '2015' ); ?></span>
                    <span class="label web-product-name_label"><?php bloginfo( 'name' ); ?>.</span>
                    <span class="label olrayt_label"><?php _e( 'All rights reserved.', 'hopscotch' ); ?></span>
                </p>
            </div>
        </div><!-- copyright_comp -->
    
    </div>
</div><!-- web-product-info_comp -->