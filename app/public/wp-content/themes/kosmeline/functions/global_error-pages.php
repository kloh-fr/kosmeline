<?php
/**
 * Fonction pour gérer des pages d'erreurs personnalisées
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/* ----------------------------- */
/* Sommaire */
/* ----------------------------- */
/*
	== Erreurs 403 et 401 personnalisées
	== Remplacer la page d'erreur WordPress
 */

/* == @section Erreurs 403 et 401 personnalisées ==================== */
/**
 * On redirige les erreurs 403 et 401 vers des templates personnalisés.
 * @see http://websistent.com/wordpress-custom-403-401-error-page/
 */
function kosmeline_error_pages() {
	global $wp_query;

	if( isset( $_REQUEST['status'] ) && $_REQUEST['status'] == 403 ) {
		$wp_query->is_404 = FALSE;
		$wp_query->is_page = TRUE;
		$wp_query->is_singular = TRUE;
		$wp_query->is_single = FALSE;
		$wp_query->is_home = FALSE;
		$wp_query->is_archive = FALSE;
		$wp_query->is_category = FALSE;

		add_filter( 'wp_title', 'kosmeline_error_title', 65000, 2 );
		add_filter( 'body_class', 'kosmeline_error_class' );
		status_header( 403 );
		get_template_part( '403' );

		exit;
	}

	if( isset( $_REQUEST ['status'] ) && $_REQUEST['status'] == 401 ) {
		$wp_query->is_404 = FALSE;
		$wp_query->is_page = TRUE;
		$wp_query->is_singular = TRUE;
		$wp_query->is_single = FALSE;
		$wp_query->is_home = FALSE;
		$wp_query->is_archive = FALSE;
		$wp_query->is_category = FALSE;

		add_filter( 'wp_title', 'kosmeline_error_title', 65000, 2 );
		add_filter( 'body_class', 'kosmeline_error_class' );
		status_header( 401 );
		get_template_part( '401' );

		exit;
	}
}

function kosmeline_error_title( $title = '', $sep = '' ) {
	if( isset( $_REQUEST['status'] ) && $_REQUEST['status'] == 403 ) {
		return "Forbidden " . $sep . " " . get_bloginfo( 'name' );

	}

	if( isset( $_REQUEST['status'] ) && $_REQUEST['status'] == 401 ) {
		return "Unauthorized " . $sep . " " . get_bloginfo( 'name' );
	}
}

function kosmeline_error_class( $classes ) {
	if( isset( $_REQUEST['status'] ) && $_REQUEST['status'] == 403 ) {
		$classes[] = 'error403';

		return $classes;
	}

	if( isset( $_REQUEST['status'] ) && $_REQUEST['status'] == 401 ) {
		$classes[] = 'error401';

		return $classes;
	}
}

add_action( 'wp', 'kosmeline_error_pages' );

/* == @section Remplacer la page d'erreur WordPress ==================== */
/**
 * On affiche la page d'erreur 404 au lieu de l'erreur par défaut.
 * @see http://www.binarynote.com/hide-wordpress-error-messages.html
 */
function kosmeline_die_handler() {
	global $wp;

	$wp->handle_404();

	load_template( get_404_template() );

	die();
}
add_filter( 'wp_die_handler', 'kosmeline_die_handler' );