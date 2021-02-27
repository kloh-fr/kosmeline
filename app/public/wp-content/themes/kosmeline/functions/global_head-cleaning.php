<?php
/**
 * Fonction pour supprimer les informations inutiles ou sensibles dans <head>
 *
 * @author  Luc Poupard
 *
 * @link    http://www.screenfeed.fr/blog/personnaliser-administration-wordpress-0327/
 *          http://wpcrux.com/disable-emojicons/
 *          https://wordpress.org/support/topic/remove-the-new-dns-prefetch-code/#post-7678189
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/**
 * @note Désactivation des liens et balises inutiles.
 */
if ( ! function_exists( 'kosmeline_head_cleanup' ) ) :
	function kosmeline_head_cleanup() {
		/* Flux des articles et commantaires */
		remove_action( 'wp_head', 'feed_links', 2 );
		/* Flux des catégories */
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		/* Lien vers la catégorie parent */
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		/* start link */
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		/* Liens des articles suivants et précédents */
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
		/* Liens des articles suivants et précédents */
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		/* Lien raccourci */
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
		/* API */
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
		/* DNS Preftech */
		remove_action( 'wp_head', 'wp_resource_hints', 2 );
	}
endif;
add_action( 'after_setup_theme', 'kosmeline_head_cleanup' );

/**
 * @note On supprime la feuille de styles des blocs de l'éditeur
 * @link https://wpassist.me/how-to-remove-block-library-css-from-wordpress/
 */
function kosmeline_remove_block_css() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'kosmeline_remove_block_css', 100 );