<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since Corporate Plus 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('corporate_plus_file_directory') ){

	function corporate_plus_file_directory( $file_path ){
		$located = locate_template( $file_path );
		if( '' != $located ){
			return $located;
		}
		return false;
	}
}
/**
 * Check empty or null
 *
 * @since  Corporate Plus 1.0.0
 *
 * @param string $str, string
 * @return boolean
 *
 */
if( !function_exists('corporate_plus_is_null_or_empty') ){
	function corporate_plus_is_null_or_empty( $str ){
		return ( !isset($str) || trim($str)==='' );
	}
}
/*file for library*/
require_once get_template_directory() . '/acmethemes/library/tgm/class-tgm-plugin-activation.php';

/*
* file for customizer theme options
*/
require_once get_template_directory() . '/acmethemes/customizer/customizer.php';

/*
* file for additional functions files
*/
require_once get_template_directory() . '/acmethemes/functions.php';

require_once get_template_directory().'/acmethemes/functions/sidebar-selection.php';


/*WooCommerce*/
require_once get_template_directory().'/acmethemes/woocommerce/functions-woocommerce.php';
/*
* files for hooks
*/
require_once get_template_directory() . '/acmethemes/hooks/tgm.php';

require_once get_template_directory() . '/acmethemes/hooks/front-page.php';

require_once get_template_directory() . '/acmethemes/hooks/slider-selection.php';

require_once get_template_directory() . '/acmethemes/hooks/header.php';

require_once get_template_directory() . '/acmethemes/hooks/social-links.php';

require_once get_template_directory() . '/acmethemes/hooks/dynamic-css.php';

require_once get_template_directory() . '/acmethemes/hooks/footer.php';

require_once get_template_directory() . '/acmethemes/hooks/comment-forms.php';

require_once get_template_directory() . '/acmethemes/hooks/excerpts.php';

require_once get_template_directory() . '/acmethemes/hooks/acme-demo-setup.php';

/*
* file for sidebar and widgets
*/
require_once get_template_directory() . '/acmethemes/sidebar-widget/acme-about.php';

require_once get_template_directory() . '/acmethemes/sidebar-widget/acme-featured.php';

require_once get_template_directory() . '/acmethemes/sidebar-widget/acme-service.php';

require_once get_template_directory() . '/acmethemes/sidebar-widget/acme-contact.php';

require_once get_template_directory() . '/acmethemes/sidebar-widget/acme-col-posts.php';

require_once get_template_directory() . '/acmethemes/sidebar-widget/sidebar.php';

/*file for metaboxes*/
require_once get_template_directory() . '/acmethemes/metabox/metabox.php';

require_once get_template_directory() . '/acmethemes/metabox/metabox-defaults.php';

/*
* file for core functions imported from functions.php while downloading Underscores
*/
require_once get_template_directory() . '/acmethemes/core.php';
require_once get_template_directory() . '/acmethemes/gutenberg/gutenberg-init.php';

/*themes info*/
if ( is_admin() ) {
    require_once get_template_directory() . '/acmethemes/at-theme-info/class-at-theme-info.php';
    require_once get_template_directory() . '/acmethemes/admin-notice/class-admin-notice-handler.php';
}