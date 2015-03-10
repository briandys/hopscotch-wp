            <!--
            Constructor: Colophon
            Class: colophon
            -->
            <footer id="colophon" class="comp colophon" role="contentinfo">
                <section class="cr colophon_cr">
                    <h2 class="accessible-name"><?php _e( 'Colophon', 'hopscotch' ); ?></h2>
                    <div class="ct colophon_ct">
                        
                        <!--
                        Component: Show Top
                        Class: show-top_comp
                        -->
                        <div class="comp show-top_comp">    
                            <div class="cr show-top_cr">
                                <a class="axn show-top_axn" href="#html" title="Show Top">
                                    <span class="label"><?php _e( 'Show Top', 'hopscotch' ); ?></span>
                                </a>
                            </div>
                        </div><!-- show-top_comp -->
                        
                        <?php if ( is_active_sidebar( 'colophon-sidebar' ) ) : ?>
                        <!--
                        Sub-Constructor: Colophon Sidebar
                        Class: colophon_sidebar
                        -->
                        <aside id="colophon_sidebar" class="sidebar colophon_sidebar" role="complementary">
                            <div class="cr colophon-sidebar_cr">
                                <h3 class="accessible-name"><?php _e( 'Colophon Sidebar', 'hopscotch' ); ?></h3>
                                <div class="ct colophon-sidebar_ct widget-area">
                                    <?php dynamic_sidebar( 'colophon-sidebar' ); ?>
                                </div><!-- colophon-sidebar_ct -->
                            </div>
                        </aside><!-- colophon_sidebar -->
                        <?php endif; ?>
                        
                        <?php get_template_part( 'components/web-product-info' ); ?>
                        
                    </div><!-- colophon_ct -->
                </section>
            </footer><!-- colophon -->
        </div><!-- ui-cr--screen -->
        
        <?php wp_footer(); ?>
    
    </body>
</html>