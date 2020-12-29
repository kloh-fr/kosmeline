<?php
/**
 * Ajustements pour WooCommerce
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/**
 * Supprimer les styles par défaut de Woocommerce
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Supprimer les styles des blocs Woocommerce
 */
/*
function slug_disable_woocommerce_block_styles() {
	wp_dequeue_style( 'wc-block-style' );
}
add_action( 'wp_enqueue_scripts', 'slug_disable_woocommerce_block_styles' );
*/

/**
 * Supprimer photoswipe et flexslider
 * @link https://wordpress.org/support/topic/disable-photoswipe-and-flexslider-globally/
 */
/*
// Supprimer le JS flexslider
function flex_dequeue_script() {
	wp_dequeue_script( 'flexslider' );
}
add_action( 'wp_print_scripts', 'flex_dequeue_script', 100 );

// Supprimer le JS zoom jquery
function zoom_dequeue_script() {
	wp_dequeue_script( 'zoom' );
}
add_action( 'wp_print_scripts', 'zoom_dequeue_script', 100 );

// Supprimer le JS photoswipe
function photoswipe_dequeue_script() {
	wp_dequeue_script( 'photoswipe-ui-default' );
}
add_action( 'wp_print_scripts', 'photoswipe_dequeue_script', 100 );
*/

/**
 * Désactiver Zoom, Lightbox etGallery Slider sur le détail d'un produit
 * @link https://createandcode.com/how-to-disable-zoom-lightbox-and-gallery-slider-on-woocommerce-product-pages/
 */
/*
remove_theme_support( 'wc-product-gallery-zoom' );
remove_theme_support( 'wc-product-gallery-lightbox' );
remove_theme_support( 'wc-product-gallery-slider' );
*/

/**
 * Supprimer les produits associés
 * @link https://docs.woocommerce.com/document/remove-related-posts-output/
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Supprimer le lien sur la photo du produit
 * @link https://gist.github.com/rynaldos/0a54362495c35a1850e80234350d2d5a
 */
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'wc_remove_link_on_thumbnails' );
function wc_remove_link_on_thumbnails( $html ) {
	return strip_tags( $html, '<div><img>' );
}

/**
 * Changement de l'ordre des parties de templates
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

/**
 * Montrer le panier (contenu + mise à jour AJAX)
 * @link https://docs.woocommerce.com/document/show-cart-contents-total/
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
function woo_cart_but_count( $fragments ) {
	ob_start();
	$cart_count = WC()->cart->cart_contents_count;
	?>

<span class="cart-contents-count">
	<?php echo sprintf( _n( '%d <span>item</span>', '%d <span>items</span>', $cart_count, 'kosmeline' ), $cart_count ); ?>
</span>

<?php
	$fragments['.cart-contents-count'] = ob_get_clean();
	return $fragments;
}