<?php
/**
 * Callback functions for comments
 *
 * @since Corporate Plus 1.0.0
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 */
if ( !function_exists('corporate_plus_commment_list') ) :

    function corporate_plus_commment_list($comment, $args, $depth) {

        extract($args, EXTR_SKIP);
        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        }
        else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?>
        <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, '64'); ?>
            <?php printf(__('<cite class="fn">%s</cite>', 'corporate-plus' ), get_comment_author_link()); ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'corporate-plus'); ?></em>
            <br/>
        <?php endif; ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                <i class="fa fa-clock-o"></i>
                <?php
                /* translators: 1: date, 2: time */
                printf(__('%1$s at %2$s', 'corporate-plus'), get_comment_date(), get_comment_time()); ?>
            </a>
            <?php edit_comment_link(__('(Edit)', 'corporate-plus'), '  ', ''); ?>
        </div>
        <?php comment_text(); ?>
        <div class="reply">
            <?php comment_reply_link( array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
        <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif;
    }
endif;

/**
 * BreadCrumb Settings
 */
if( ! function_exists( 'corporate_plus_breadcrumbs' ) ):
    function corporate_plus_breadcrumbs() {
	    if ( ! function_exists( 'breadcrumb_trail' ) ) {
		    require_once get_template_directory() . '/acmethemes/library/breadcrumbs/breadcrumbs.php';

	    }
	    $breadcrumb_args = array(
		    'container'   => 'div',
		    'show_browse' => false
	    );
	    echo "<div class='breadcrumbs init-animate clearfix'><span class='breadcrumb'><i class='fa fa-home'></i></span><div id='corporate-plus-breadcrumbs' class='clearfix'>";
	    breadcrumb_trail( $breadcrumb_args );
	    echo "</div></div>";
    }
endif;

/**
 * More Text
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('corporate_plus_blog_archive_more_text') ) :
	function corporate_plus_blog_archive_more_text( ) {
		global $corporate_plus_customizer_all_values;
		$corporate_plus_blog_archive_read_more = $corporate_plus_customizer_all_values['corporate-plus-blog-archive-more-text'];
		$corporate_plus_blog_archive_read_more = esc_html( $corporate_plus_blog_archive_read_more );
		return $corporate_plus_blog_archive_read_more;
	}
endif;