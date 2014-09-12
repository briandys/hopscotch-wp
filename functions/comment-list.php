<?php

//------------------------- Comment List
if ( ! function_exists( 'hopscotch_comments' ) ) :
    function hopscotch_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
    ?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent-comment') ?> id="comment-<?php comment_ID() ?>">

        <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-cr">
        <?php endif; ?>

            <header class="comment-hr">            
                <div class="comment-meta">                                                                        
                    <div class="comment-meta-cr">
                        <div class="timestamp comment-timestamp">
                            <span class="label">Commented on</span>
                            <a class="timestamp-link comment-timestamp-link" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" rel="bookmark">
                                <?php printf( __('<time class="comment-time" datetime="%1$s"><span class="comment-date">%1$s</span> <span class="comment-time">%2$s</span></time>'), get_comment_date('m/d/y'),  get_comment_time('H:i')) ?>
                            </a>
                        </div>
                    </div><!-- comment-timestamp -->
                </div><!-- comment-meta -->
                
                <div class="comment-author vcard">
                    <div class="comment-author-name"><span class="assistive-text label">Comment by</span> <?php comment_author_link(); ?></div>
                    <div class="author-avatar">
                        <a href="<?php if ( get_comment_author_url( $comment->comment_ID ) ) { echo get_comment_author_url( $comment->comment_ID ); } else echo '#'; ?>"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
                    </div><!-- author-avatar -->
                </div><!-- comment-author -->
            </header>

            <div class="comment-ct">
                <div class="entry-ct-cr comment-ct-cr comments-ct-cr">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <p class="comment-pending"><?php _e('Your comment is awaiting moderation.', 'hopscotch') ?></p>
                    <?php endif; ?>
                    <blockquote class="comment-message"><?php comment_text() ?></blockquote>
                </div>
            </div><!-- comment-ct -->
            
            <?php if ( is_user_logged_in() || comments_open() ) : ?>
            <div class="action-items comment-action">
                <ul class="action-list comment-action-list">
                    <?php if ( current_user_can('edit_posts') ) : ?>
                    <li class="action-item action-edit comment-action-edit"><?php edit_comment_link(__('Edit', 'hopscotch'),'  ','' ); ?>
                    <?php endif; ?>
                    <?php if ( comments_open() ) : ?>
                    <li class="action-item action-reply comment-action-reply"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => 1, 'max_depth' => $args['max_depth']))) ?>
                    <?php endif; ?>
                </ul>
            </div><!-- action-items -->
            <?php endif; ?>

        <?php if ( 'div' != $args['style'] ) : ?>
        </div><!--.comment-cr-->
        <?php endif; ?>

    <?php }
endif;