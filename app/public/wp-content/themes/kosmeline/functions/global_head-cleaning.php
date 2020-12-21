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
		/* Lien Windows Live Writer */
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'rsd_link' );
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
		/* Version de WP */
		remove_action( 'wp_head', 'wp_generator' );
		/* Emojis */
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' ); // RSS
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); // Commentaires
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' ); // E-mails
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // Head
		remove_action( 'wp_print_styles', 'print_emoji_styles' ); // CSS print
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // Admin scripts
		remove_action( 'admin_print_styles', 'print_emoji_styles' ); // Admin CSS
		/* API */
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
		/* DNS Preftech */
		remove_action( 'wp_head', 'wp_resource_hints', 2 );
	}
endif;
add_action( 'after_setup_theme', 'kosmeline_head_cleanup' );

/**
 * @note On supprime la version de WordPress dans les URL CSS et JavaScript.
 * @link http://b-website.com/nettoyer-les-numeros-de-versions-dans-le-header-de-wordpress
 */
if ( ! function_exists( 'kosmeline_remove_wp_ver_css_js' ) ) :
	function kosmeline_remove_wp_ver_css_js( $src ) {
		global $wp_version;

		parse_str( parse_url( $src, PHP_URL_QUERY ), $query );

		if ( ! empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
			$src = remove_query_arg( 'ver', $src );
		}

		return $src;
	}
endif;
add_filter( 'style_loader_src', 'kosmeline_remove_wp_ver_css_js', 9999 ); // Version de WP dans les URL CSS
add_filter( 'script_loader_src', 'kosmeline_remove_wp_ver_css_js', 9999 ); // Version de WP dans les URL JS

/**
 * @note On supprime la feuille de styles des blocs de l'éditeur
 * @link https://wpassist.me/how-to-remove-block-library-css-from-wordpress/
 */
function kosmeline_remove_block_css() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'kosmeline_remove_block_css', 100 );