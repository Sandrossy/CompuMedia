<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('corporate_plus_sidebar_selection') ) :
	function corporate_plus_sidebar_selection( ) {
		wp_reset_postdata();
		$corporate_plus_customizer_all_values = corporate_plus_get_theme_options();
		global $post;
		if(
			isset( $corporate_plus_customizer_all_values['corporate-plus-sidebar-layout'] ) &&
			(
				'left-sidebar' == $corporate_plus_customizer_all_values['corporate-plus-sidebar-layout'] ||
				'both-sidebar' == $corporate_plus_customizer_all_values['corporate-plus-sidebar-layout'] ||
				'middle-col' == $corporate_plus_customizer_all_values['corporate-plus-sidebar-layout'] ||
				'no-sidebar' == $corporate_plus_customizer_all_values['corporate-plus-sidebar-layout']
			)
		){
			$corporate_plus_body_global_class = $corporate_plus_customizer_all_values['corporate-plus-sidebar-layout'];
		}
		else{
			$corporate_plus_body_global_class= 'right-sidebar';
		}

		if ( corporate_plus_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'corporate_plus_sidebar_layout', true );
				$corporate_plus_wc_single_product_sidebar_layout = $corporate_plus_customizer_all_values['corporate-plus-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$corporate_plus_body_classes = $post_class;
					} else {
						$corporate_plus_body_classes = $corporate_plus_wc_single_product_sidebar_layout;
					}
				}
				else{
					$corporate_plus_body_classes = $corporate_plus_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $corporate_plus_customizer_all_values['corporate-plus-wc-shop-archive-sidebar-layout'] ) ){
					$corporate_plus_archive_sidebar_layout = $corporate_plus_customizer_all_values['corporate-plus-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $corporate_plus_archive_sidebar_layout ||
						'left-sidebar' == $corporate_plus_archive_sidebar_layout ||
						'both-sidebar' == $corporate_plus_archive_sidebar_layout ||
						'middle-col' == $corporate_plus_archive_sidebar_layout ||
						'no-sidebar' == $corporate_plus_archive_sidebar_layout
					){
						$corporate_plus_body_classes = $corporate_plus_archive_sidebar_layout;
					}
					else{
						$corporate_plus_body_classes = $corporate_plus_body_global_class;
					}
				}
				else{
					$corporate_plus_body_classes= $corporate_plus_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $corporate_plus_customizer_all_values['corporate-plus-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $corporate_plus_customizer_all_values['corporate-plus-front-page-sidebar-layout'] ||
					'left-sidebar' == $corporate_plus_customizer_all_values['corporate-plus-front-page-sidebar-layout'] ||
					'both-sidebar' == $corporate_plus_customizer_all_values['corporate-plus-front-page-sidebar-layout'] ||
					'middle-col' == $corporate_plus_customizer_all_values['corporate-plus-front-page-sidebar-layout'] ||
					'no-sidebar' == $corporate_plus_customizer_all_values['corporate-plus-front-page-sidebar-layout']
				){
					$corporate_plus_body_classes = $corporate_plus_customizer_all_values['corporate-plus-front-page-sidebar-layout'];
				}
				else{
					$corporate_plus_body_classes = $corporate_plus_body_global_class;
				}
			}
			else{
				$corporate_plus_body_classes= $corporate_plus_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'corporate_plus_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$corporate_plus_body_classes = $post_class;
				} else {
					$corporate_plus_body_classes = $corporate_plus_body_global_class;
				}
			}
			else{
				$corporate_plus_body_classes = $corporate_plus_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $corporate_plus_customizer_all_values['corporate-plus-archive-sidebar-layout'] ) ){
				$corporate_plus_archive_sidebar_layout = $corporate_plus_customizer_all_values['corporate-plus-archive-sidebar-layout'];
				if(
					'right-sidebar' == $corporate_plus_archive_sidebar_layout ||
					'left-sidebar' == $corporate_plus_archive_sidebar_layout ||
					'both-sidebar' == $corporate_plus_archive_sidebar_layout ||
					'middle-col' == $corporate_plus_archive_sidebar_layout ||
					'no-sidebar' == $corporate_plus_archive_sidebar_layout
				){
					$corporate_plus_body_classes = $corporate_plus_archive_sidebar_layout;
				}
				else{
					$corporate_plus_body_classes = $corporate_plus_body_global_class;
				}
			}
			else{
				$corporate_plus_body_classes= $corporate_plus_body_global_class;
			}
		}
		else {
			$corporate_plus_body_classes = $corporate_plus_body_global_class;
		}
		return $corporate_plus_body_classes;
	}
endif;