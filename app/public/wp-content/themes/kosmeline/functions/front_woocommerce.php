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

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

/**
 * Affichage de la description au lieu de la description courte
 */
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_description', 20 );
function woocommerce_template_single_description() {
	the_content();
}

/**
 * Affichage du volume ou du poids sur le détail du produit
 */
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_volume', 20 );
function woocommerce_template_single_volume() {
	$produit_poids = get_field( 'produit_poids' );
	$produit_volume = get_field( 'produit_volume' );

	if( $produit_poids ) {
		echo '<dl class="product-capacity">';
		echo '<dt>' . __( 'Weight: ', 'kosmeline' ) . '</dt>';
		echo '<dd>' . sprintf( __( '%1$s&nbsp;<abbr title="grammes">g</abbr>', 'kosmeline' ), $produit_poids  ) . '</dd>';
		echo '</dl>';
	}

	if( $produit_volume ) {
		echo '<dl class="product-capacity">';
		echo '<dt>' . __( 'Volume: ', 'kosmeline' ) . '</dt>';
		echo '<dd>' . sprintf( __( '%1$s&nbsp;<abbr title="millilitres">ml</abbr>', 'kosmeline' ), $produit_volume  ) . '</dd>';
		echo '</dl>';
	}
}

/**
 * Affichage de la description courte sur la liste des produits
 */
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 1 );


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

/**
 * Remove product data tabs
 * @link https://docs.woocommerce.com/document/editing-product-data-tabs/
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] ); // Remove the description tab
    // unset( $tabs['reviews'] ); // Remove the reviews tab
    unset( $tabs['additional_information'] ); // Remove the additional information tab

    return $tabs;
}

/**
 * Add a custom product data tab
 * Default tabs priority
 * - Description: 10
 * - Additional information: 20
 * - Reviews: 30
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
// Adds the new tab
function woo_new_product_tab( $tabs ) {
	$tabs['advice_tab'] = array(
		'title'    => __( 'Advice use', 'kosmeline' ),
		'priority' => 10,
		'callback' => 'woo_advice_product_tab_content'
	);

	$tabs['composition_tab'] = array(
		'title'    => __( 'Composition', 'kosmeline' ),
		'priority' => 20,
		'callback' => 'woo_composition_product_tab_content'
	);

	return $tabs;
}

// The new tab content
function woo_advice_product_tab_content() {
	echo '<h2 class="screen-reader-text">' . __( 'Advice use', 'kosmeline' ) . '</h2>';
	the_field( 'produit_utilisation' );
}

function woo_composition_product_tab_content() {
	echo '<h2 class="screen-reader-text">' . __( 'Composition', 'kosmeline' ) . '</h2>';
	the_field( 'produit_composition' );
}