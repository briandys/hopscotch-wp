<!--
Component Name: Web Product Header
Class Name: web-product-header_comp

Sub-Components:
1. Name
2. Description
-->
<div class="comp web-product-header_comp">
 
    <h1 class="web-product_name">
        <a class="web-product-name_axn" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="Home">
            <span class="label"><?php bloginfo( 'name' ); ?></span>
        </a>
    </h1>
 
    <?php
    $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() ) : ?>
        
    <p class="web-product_desc"><?php echo $description; ?></p>
    
    <?php
    endif;
    ?>
 
</div><!-- web-product-header_comp -->