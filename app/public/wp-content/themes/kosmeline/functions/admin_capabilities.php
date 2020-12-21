<?php
/**
 * Fonction pour ajouter des droits à des utilisateurs
 *
 * @author 	Luc Poupard
 *
 * @link 	https://codex.wordpress.org/Roles_and_Capabilities
 *			https://codex.wordpress.org/Function_Reference/add_cap
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/* ----------------------------- */
/* Sommaire */
/* ----------------------------- */
/*
	== Ajout de droits par rôle
	== Ajout de droits par utilisateur
 */

function kosmeline_theme_caps() {
	/* == @section Ajout de droits par rôle ==================== */
	/* On récupère le rôle Éditeur */
	$role = get_role( 'editor' );

	/* On lui donne le droit d'éditer les options du thème */
	$role->add_cap( 'edit_theme_options' );


	/* == @section Ajout de droits par utilisateur ==================== */
	/* On récupère l'utilisateur à partir de son ID */
	// $user = new WP_User( '1' );

	/* On lui donne le droit d'éditer les options du thème */
	// $user->add_cap( 'edit_theme_options' );
}
add_action( 'admin_init', 'kosmeline_theme_caps' );