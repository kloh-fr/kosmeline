<?php
/**
 * Fonction pour désactiver le lien par défaut sur les images
 *
 * @author  Luc Poupard
 *
 * @link    http://www.wpbeginner.com/wp-tutorials/automatically-remove-default-image-links-wordpress
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/**
 * L'ajout automatique du lien vers l'image est inutile voire même incommodante,
 * on désactive donc ce comportement automatique de WordPress.
 */
function kosmeline_link_on_images() {
	$image_set = get_option( 'image_default_link_type' );

	if( $image_set !== 'none' ) {
		update_option( 'image_default_link_type', 'none' );
	}
}
add_action( 'admin_init', 'kosmeline_link_on_images', 10 );