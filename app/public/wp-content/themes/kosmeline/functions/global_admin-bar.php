<?php
/**
 * Fonction pour cacher des items de la barre d'admin
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
	== Suppression des liens natifs
		-- WordPress
		-- Site
		-- Commentaires
		-- Mises à jour
		-- Créer
	== Lien Personnaliser
 */

/* == @section Suppression des liens natifs ==================== */
/**
 * On teste si la fonction est déjà déclarée dans le thème enfant.
 * Si ce n'est pas le cas, on applique cette configuration par défaut.
 */
if ( ! function_exists( 'kosmeline_admin_bar' ) ) :
	/**
	 * On masque une partie des liens de la barre d'admin par défaut.
	 * Si cette configuration ne convient pas, il suffit d'utiliser le fichier éponyme
	 * se trouvant dans le répertoire functions du thème enfant.
	 */
	function kosmeline_admin_bar() {
		global $wp_admin_bar;

		/* -- @subsection WordPress -------------------- */
		/* Menu complet */
		$wp_admin_bar->remove_menu( 'wp-logo' );


		/* -- @subsection Site -------------------- */
		/* Visit Site */
		$wp_admin_bar->remove_menu( 'view-site' );

		/* Dashboard */
		$wp_admin_bar->remove_menu( 'dashboard' );

		/* Themes */
		$wp_admin_bar->remove_menu( 'themes' );

		/* Widgets */
		$wp_admin_bar->remove_menu( 'widgets' );

		/* Menus */
		$wp_admin_bar->remove_menu( 'menus' );


		/* -- @subsection Commentaires -------------------- */
		/* Menu complet */
		$wp_admin_bar->remove_menu( 'comments' );


		/* -- @subsection Mises à jour -------------------- */
		/* Menu complet */
		$wp_admin_bar->remove_menu( 'updates' );


		/* -- @subsection Créer -------------------- */
		/* Menu complet */
		$wp_admin_bar->remove_menu( 'new-content' );
	}
endif;
add_action( 'wp_before_admin_bar_render', 'kosmeline_admin_bar' );

/* == @section Lien Personnaliser ==================== */
if ( ! function_exists( 'kosmeline_admin_bar_customize' ) ) :
	function kosmeline_admin_bar_customize( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'customize' );
	}
endif;
add_action( 'admin_bar_menu', 'kosmeline_admin_bar_customize', 999 );