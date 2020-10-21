<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'corporate-plus-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'corporate-plus' ),
	'panel'          => 'corporate-plus-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'corporate_plus_sanitize_select'
) );
$choices = corporate_plus_sidebar_layout();
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'corporate-plus' ),
	'section'   => 'corporate-plus-wc-shop-archive-option',
	'settings'  => 'corporate_plus_theme_options[corporate-plus-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'corporate-plus' ),
	'section'   => 'corporate-plus-wc-shop-archive-option',
	'settings'  => 'corporate_plus_theme_options[corporate-plus-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'corporate-plus' ),
	'section'   => 'corporate-plus-wc-shop-archive-option',
	'settings'  => 'corporate_plus_theme_options[corporate-plus-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );