<?php get_header(); ?>
                    
        <div id="primary-content" class="primary-content">
            <div class="primary-content-cr" role="main">
                
                <section class="main-content">
                    <div class="main-content-cr">
                        <header class="main-content-hr">
                            <h2 class="assistive-text">Main Content</h2>
                        </header>
                        <div class="main-content-ct">
                            
                            <?php                                
								while ( have_posts() ) : the_post();
									
                                    hopscotch_hook_single_content();
									
								endwhile;
                            ?>
                        
                        </div><!-- .main-content-ct -->
                   </div><!-- .main-content-cr -->
                </section><!-- .main-content -->
             
            </div>
        </div><!-- primary-content -->
        
        <?php get_sidebar(); ?>

    </div><!-- #main-cr -->
</div><!-- #main -->

<?php get_footer(); ?>