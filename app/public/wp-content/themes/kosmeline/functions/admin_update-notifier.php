<?php
/**
 * Notification de mises à jour du thème
 *
 * @author  Luc Poupard
 *
 * Basé sur le code de Xpark Media :
 * @link    https://xparkmedia.com/blog/add-update-notification-selfhosted-premium-themes-plugins/
 *
 * Mais on utilise wp_remote_get() au lieu de curl_init() :
 * @link    https://pippinsplugins.com/using-wp_remote_get-to-parse-json-from-remote-apis/
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

function kosmeline_update_notifier ( $transient ) {
	if( empty( $transient->checked['kosmeline'] ) )
	return $transient;

	$response = wp_remote_get( 'https://archives.kloh.ch/wordpress/kosmeline/update.json' );

	if( is_wp_error( $response ) ) {
		return false;
	}

	$result = wp_remote_retrieve_body( $response );
	$data = json_decode( $result );

	/* On vérifie la version sur le serveur par rapport à la version installée */
	if( ! empty( $data ) ) {
		if( version_compare( $transient->checked['kosmeline'], $data->new_version, '<' ) )
		$transient->response['kosmeline'] = (array) $data;
	}

	return $transient;
}
add_filter ( 'pre_set_site_transient_update_themes', 'kosmeline_update_notifier' );