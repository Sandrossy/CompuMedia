<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'corporate-plus-wc-panel', array(
	'priority'       => 100,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'WooCommerce Options', 'corporate-plus' )
) );

/*
* file for shop archive
*/
require_once corporate_plus_file_directory('acmethemes/customizer/wc-options/shop-archive.php');

/*
* file for single product
*/
require_once corporate_plus_file_directory('acmethemes/customizer/wc-options/single-product.php');