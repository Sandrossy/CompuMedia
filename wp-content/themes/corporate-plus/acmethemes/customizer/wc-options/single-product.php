<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'corporate-plus-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'corporate-plus' ),
	'panel'          => 'corporate-plus-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'corporate_plus_sanitize_select'
) );
$choices = corporate_plus_sidebar_layout();
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'corporate-plus' ),
	'section'   => 'corporate-plus-wc-single-product-options',
	'settings'  => 'corporate_plus_theme_options[corporate-plus-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );