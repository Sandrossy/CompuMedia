<?php
/**
 * The template for woocommerce pages.
 *
 * @package Acme Themes
 * @subpackage Corporate Plus
 */

get_header();
global $corporate_plus_customizer_all_values;
?>
    <div class="wrapper inner-main-title">
        <header class="entry-header">
			<?php
			if ( is_shop() ) {
				$name = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
				echo '<h1 class="entry-title">'.$name.'</h1>';
			}
			else{
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
			?>
        </header><!-- .entry-header -->
    </div>
    <div id="content" class="site-content">
		<?php
		if( 1 == $corporate_plus_customizer_all_values['corporate-plus-show-breadcrumb'] ){
			corporate_plus_breadcrumbs();
		}
		$sidebar_layout = corporate_plus_sidebar_selection(get_the_ID());
		if( 'both-sidebar' == $sidebar_layout ) {
			echo '<div id="primary-wrap" class="clearfix">';
		}
		?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
				<?php if ( have_posts() ) :
					woocommerce_content();
				endif;
				?>
            </main><!-- #main -->
        </div><!-- #primary -->
		<?php
		get_sidebar( 'left' );
		get_sidebar();
		if( 'both-sidebar' == $sidebar_layout ) {
			echo '</div>';
		}
		?>
    </div><!-- #content -->
<?php get_footer();