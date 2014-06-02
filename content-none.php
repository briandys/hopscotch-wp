<article class="page nothing-found entry">
    <div class="entry-cr">
        <header class="entry-hr">            
            <h1 class="entry-title"><?php _e( 'Nothing Found', 'hopscotch' ); ?></h1>            
        </header>
        
        <section class="entry-ct">            
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>    
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started</a>.', 'hopscotch' ), admin_url( 'post-new.php' ) ); ?></p>        
            
			<?php elseif ( is_search() ) : ?>        
            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'hopscotch' ); ?></p>
        
            <?php else : ?>        
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hopscotch' ); ?></p>
        
            <?php endif; ?>            
        </section><!-- .entry-ct -->
    
    </div><!-- .post-cr -->
</article>