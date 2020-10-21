<?php

/**
 * Corporate Plus functions.
 * @package Corporate Plus
 * @since 2.0.0
 */

/**
 * check if WooCommerce activated
 */
function corporate_plus_is_woocommerce_active() {
	return class_exists( 'WooCommerce' ) ? true : false;
}
add_action( 'init', 'corporate_plus_remove_wc_breadcrumbs' );
function corporate_plus_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}


/**
 * Woo Commerce Number of row filter Function
 */
if (!function_exists('corporate_plus_loop_columns')) {
	function corporate_plus_loop_columns() {
		$corporate_plus_customizer_all_values = corporate_plus_get_theme_options();
		$corporate_plus_wc_product_column_number = $corporate_plus_customizer_all_values['corporate-plus-wc-product-column-number'];
		if ($corporate_plus_wc_product_column_number) {
			$column_number = $corporate_plus_wc_product_column_number;
		}
		else {
			$column_number = 3;
		}
		return $column_number;
	}
}
add_filter('loop_shop_columns', 'corporate_plus_loop_columns');

function corporate_plus_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$corporate_plus_customizer_all_values = corporate_plus_get_theme_options();
	$corporate_plus_wc_product_total_number = $corporate_plus_customizer_all_values['corporate-plus-wc-shop-archive-total-product'];
	if ($corporate_plus_wc_product_total_number) {
		$cols = $corporate_plus_wc_product_total_number;
	}
	return $cols;
}
add_filter( 'loop_shop_per_page', 'corporate_plus_loop_shop_per_page', 20 );


/*https://gist.github.com/mikejolley/2044109*/
add_filter( 'woocommerce_add_to_cart_fragments', 'corporate_plus_header_add_to_cart_fragment' );
function corporate_plus_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<a class="cart-contents cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'corporate-plus'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'corporate-plus'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}