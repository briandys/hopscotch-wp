<?php get_header(); ?>
                    
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">                            
                
                <section class="main-content">
                    <div class="main-content-cr">
                        <header class="main-content-hr">
                            <h2 class="assistive-text">Main Content</h2>
                        </header>
                        <div class="main-content-ct">
                            
                            <?php                                
								while ( have_posts() ) : the_post();
									get_template_part( 'content', get_post_format() );
									hopscotch_post_nav();
									if ( comments_open() || get_comments_number() ) {
										comments_template();
									}
								endwhile;
                            ?>
                        
                        </div><!-- .main-content-ct -->
                   </div><!-- .main-content-cr -->
                </section><!-- .main-content -->            
             
            </div><!-- #content -->
        </div><!-- #primary -->
        
        <?php get_sidebar(); ?>

    </div><!-- #main-cr -->
</div><!-- #main -->

<?php get_footer(); ?>