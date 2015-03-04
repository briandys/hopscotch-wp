            <footer id="colophon" class="colophon" role="contentinfo">
                <section class="colophon_cr">
                    <h2 class="accessible-name"><?php _e( 'Colophon', 'hopscotch' ); ?></h2>
                    <div class="colophon_ct">
                        
                        <div class="comp show-top_comp">    
                            <div class="show-top_cr">
                                <a class="show-top_axn" href="#html" title="Show Top">
                                    <span class="label"><?php _e( 'Show Top', 'hopscotch' ); ?></span>
                                </a>
                            </div>
                        </div><!-- show-top_comp -->
                        
                        <?php if ( is_active_sidebar( 'colophon-sidebar' ) ) : ?>
                        <aside class="sidebar colophon-sidebar_sidebar" role="complementary">
                            <div class="colophon-sidebar_cr">
                                <h3 class="accessible-name"><?php _e( 'Colophon Sidebar', 'hopscotch' ); ?></h3>
                                <div class="colophon-sidebar_ct widget-area">
                                    <?php dynamic_sidebar( 'colophon-sidebar' ); ?>
                                </div><!-- colophon-sidebar_ct -->
                            </div>
                        </aside><!-- colophon-sidebar_sidebar -->
                        <?php endif; ?>
                        
                        <?php get_template_part( 'components/web-product-info' ); ?>
                        
                    </div><!-- colophon_ct -->
                </section>
            </footer><!-- colophon -->
        </div><!-- ui-cr--screen -->
        
        <?php wp_footer(); ?>
    
    </body>
</html>