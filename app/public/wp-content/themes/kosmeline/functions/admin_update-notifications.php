<?php
/**
 * Fonction pour cacher les mises à jour aux non administrateurs
 *
 * @author  Luc Poupard
 *
 * @link    http://www.screenfeed.fr/blog/personnaliser-administration-wordpress-0327/
 *
 * @package Kosméline 1.0.9
 * @since   Kosméline 1.0.0
 */

if ( ! current_user_can( 'update_plugins' ) ) {
	add_action( 'admin_init', 'remove_admin_notices' );

	function remove_admin_notices() {
		global $wp_filter;
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}
