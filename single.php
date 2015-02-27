<?php get_header(); ?>

            <div class="content_hr">

                <div class="content-hr_cr">
                    <h2 class="accessible-name">
                        <span class="label pred_label">Content:</span>
                        <span class="label subj_label">Main</span>
                    </h2>
                </div>

            </div><!-- content_hr -->

            <div class="content_ct">

                <!-- Sub-Constructor: Primary Content -->
                <div class="comp primary-content_comp">

                    <section class="primary-content_cr">

                        <h3 class="accessible-name">Primary Content</h3>
                        
                        <div class="primary-content_ct">

                        <?php                                
                        while ( have_posts() ) : the_post();
                            hopscotch_hook_single_content();
                        endwhile;
                        ?>

                        </div><!-- primary-content_ct -->

                    </section>

                </div><!-- primary-content_comp -->

                <?php get_sidebar(); ?>
                
            </div><!-- content_ct -->

        </section>
    
    </main><!-- content -->

<?php get_footer(); ?>