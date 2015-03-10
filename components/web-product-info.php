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
        <div class="comp web-designer_comp">
            <div class="cr web-designer-info_cr">
                <?php $url = 'http://designdrive.co/hopscotch/'; echo sprintf( __( '<a class="axn web-designer-name_axn" href="%s">HopScotch</a>', 'hopscotch'), esc_url( $url ) ); ?>
                <span class="label">
                    <span class="label subj_label">WordPress Theme</span>            
                    <span class="label pred_label">is made in</span>
                    <abbr class="label made-in-location_label" title="Manila, Philippines">PH</abbr>
                </span>
            </div>
        </div><!-- web-designer_comp -->
        
        <!--
        Component: Copyright
        Class: copyright_comp
        -->
        <div class="comp copyright_comp">
            <div class="cr copyright-info_cr">
                <p>
                    <span class="label copyright_label">&copy; <?php do_action( 'hopscotch_auto_copyright_year', '2015' ); ?></span>
                    <span class="label web-product-name_label"><?php bloginfo( 'name' ); ?>.</span>
                    <span class="label olrayt_label"><?php echo __( 'All rights reserved.', 'hopscotch' ); ?></span>
                </p>
            </div>
        </div><!-- copyright_comp -->
    
    </div>
</div><!-- web-product-info_comp -->