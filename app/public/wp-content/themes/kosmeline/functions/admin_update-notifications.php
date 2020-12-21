<?php
/**
 * Fonction pour cacher les mises à jour aux non administrateurs
 *
 * @author  Luc Poupard
 *
 * @link    http://www.screenfeed.fr/blog/personnaliser-administration-wordpress-0327/
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

if ( ! current_user_can( 'update_plugins' ) ) {
	add_action( 'admin_init', create_function( false, "remove_action( 'admin_notices', 'update_nag', 3 );" ) );
}