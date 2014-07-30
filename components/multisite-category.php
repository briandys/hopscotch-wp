<div class='multisite-category'>
    <h2>Multisite Category</h2>
    <ul class='multisite-category-list'>

    <?php
    // http://wordpress.stackexchange.com/a/41819

    // get all blogs
    $blogs = get_blog_list( 0, 'all' );

    if ( 0 < count( $blogs ) ) :
        foreach( $blogs as $blog ) : 
            switch_to_blog( $blog[ 'blog_id' ] );

            if ( get_theme_mod( 'show_in_home', 'on' ) !== 'on' ) {
                continue;
            }

            $description  = get_bloginfo( 'description' );
            $blog_details = get_blog_details( $blog[ 'blog_id' ] );
            ?>
            <li class="multisite-category-item">

                <p class="multisite-title">
                    <a href="<?php echo $blog_details->path ?>">
                        <?php echo  $blog_details->blogname; ?>
                    </a>
                </p>

                <div class="multisite-description">
                    <?php echo $description; ?>
                </div>

                <?php restore_current_blog(); ?>
            </li>
    <?php endforeach;
    endif; ?>
    </ul>
</div><!-- multisite-category -->