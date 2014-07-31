<?php
// http://wordpress.stackexchange.com/a/41819

// get all blogs
$blogs = get_blog_list( 0, 'all' );

if ( 0 < count( $blogs ) ) : ?>

    <div class="com multisite-category">
        <div class="com-cr multisite-category--cr">
            <div class="com-hr multisite-category--hr">
                <h2 class="com-title multisite-category--title">Multisite Category</h2>
            </div>
            <div class="com-ct multisite-category--ct">
                <ul class="multisite-category-list">

                <?php foreach( $blogs as $blog ) : 
                    switch_to_blog( $blog[ 'blog_id' ] );

                    if ( get_theme_mod( 'show_in_home', 'on' ) !== 'on' ) {
                        continue;
                    }

                    $description  = get_bloginfo( 'description' );
                    $blog_details = get_blog_details( $blog[ 'blog_id' ] );
                    $header_image = get_header_image();
                    ?>

                    <li class="multisite-category-item">
                        <div class="multisite-category-item--cr">
                            <div class="multisite-category-item--ct">
                                <div class="thumbnail"><a class="thumbnail-link" href="<?php echo $blog_details->path ?>" style="background-image: url( <?php echo $header_image; ?> )"></a></div>
                                <p class="multisite-title">
                                    <a href="<?php echo $blog_details->path ?>" target="_blank">
                                        <?php echo  $blog_details->blogname; ?>
                                    </a>
                                </p>
                                <div class="multisite-description">
                                    <?php echo $description; ?>
                                </div>
                                <?php if ( current_user_can('edit_posts') ) : ?>
                                    <a class="dashboard-link" href="<?php echo $blog_details->path ?>wp-admin" target="_blank">Dashboard</a>
                                <?php endif; ?>
                            </div>
                        </div>

                <?php restore_current_blog(); ?>

                <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div><!-- multisite-category -->

<?php endif; ?>