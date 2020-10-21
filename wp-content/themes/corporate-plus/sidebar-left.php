<?php
/**
 * The sidebar containing the left widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Corporate Plus
 */
if ( ! is_active_sidebar( 'corporate-plus-sidebar-left' ) ) {
	return;
}
$sidebar_layout = corporate_plus_sidebar_selection();
?>
<?php if( $sidebar_layout == "left-sidebar" || $sidebar_layout == "both-sidebar"  ) : ?>
    <div id="secondary-left" class="widget-area sidebar secondary-sidebar float-right" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
			<?php dynamic_sidebar( 'corporate-plus-sidebar-left' );; ?>
        </div>
    </div>
<?php endif;