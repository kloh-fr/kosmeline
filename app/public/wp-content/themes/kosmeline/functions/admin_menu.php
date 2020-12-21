<?php
/**
 * Fonction pour cacher des items du menu aux non-administrateurs
 *
 * @author  Luc Poupard
 *
 * @link    http://codex.wordpress.org/Function_Reference/remove_menu_page
 *          http://codex.wordpress.org/Function_Reference/remove_submenu_page
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/* ----------------------------- */
/* Sommaire */
/* ----------------------------- */
/*
	== Tous les utilisateurs sauf admin
		-- Menu
	== Page Personnaliser
 */

/**
 * On teste si la fonction est déjà déclarée dans le thème enfant.
 * Si ce n'est pas le cas, on applique cette configuration par défaut.
 */
if ( ! function_exists( 'kosmeline_delete_menu_items' ) ) :
	function kosmeline_delete_menu_items() {
		/* == @section Tous les utilisateurs sauf admin ==================== */
		/**
		 * Par défaut, on masque certains menus à tous les utilisateurs non admins.
		 * Si cette configuration ne convient pas, il suffit d'utiliser le fichier éponyme
		 * se trouvant dans le répertoire 'functions' du thème enfant.
		 */
		if( ! current_user_can( 'add_users' ) ) {
			/* -- @subsection Menu -------------------- */

			/* Tools */
			remove_menu_page( 'tools.php' );
		}
	}
endif;
add_action( 'admin_menu', 'kosmeline_delete_menu_items', 9999 ); // 9999 permet d'outrepasser les paramètres d'extensions


/* == @section Page Personnaliser ==================== */
/**
 * L'URL du lien Personnaliser étant différent en fonction de la page où on se trouve,
 * on ne peut pas simplement utiliser remove_menu_page (qui se base sur l'URL exacte).
 */
if ( ! function_exists( 'kosmeline_customize_page' ) ) :
	function kosmeline_customize_page() {
		global $submenu;

		unset( $submenu['themes.php'][6] );
	}
endif;
add_action( 'admin_menu', 'kosmeline_customize_page' );