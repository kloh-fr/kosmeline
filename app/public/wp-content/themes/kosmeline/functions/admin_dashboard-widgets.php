<?php
/**
 * Fonction pour cacher les widgets du dashboard
 *
 * @author  Luc Poupard
 *
 * @link    https://digwp.com/2014/02/disable-default-dashboard-widgets/
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/* ----------------------------- */
/* Sommaire */
/* ----------------------------- */
/*
	== Widgets natifs
	== Widgets d'extensions
 */

/**
 * On teste si la fonction est déjà déclarée dans le thème enfant.
 * Si ce n'est pas le cas, on applique cette configuration par défaut.
 */
if ( ! function_exists( 'kosmeline_dashboard_widgets' ) ) :
	/**
	 * On masque une partie des widgets du dashboard par défaut.
	 * Si cette configuration ne convient pas, il suffit d'utiliser le fichier éponyme
	 * se trouvant dans le répertoire 'functions' du thème enfant.
	 */
	function kosmeline_dashboard_widgets() {
		global $wp_meta_boxes;

		/* == @section Widgets natifs ==================== */
		/* At a Glance */
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );

		/* Comments */
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );

		/* Incoming Links */
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );

		/* Plugins */
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );

		/* Quick Draft */
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );

		/* WordPress News */
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );

		/* */
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );


		/* == @section Widgets d'extensions ==================== */
		/* Postman SMTP */
		// unset( $wp_meta_boxes['dashboard']['normal']['core']['example_dashboard_widget'] );
	}
endif;
add_action( 'wp_dashboard_setup', 'kosmeline_dashboard_widgets', 999 );