<?php
/**
 * Retrait des attributs title inutiles
 *
 * En plus d'être inutiles, les attributs title sur les liens peuvent être fortement redondants
 * pour les utilisateurs de synthèse vocale. On les supprime donc.
 *
 * @author  Luc Poupard
 *
 * @link    https://github.com/ffoodd/ffeeeedd
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

add_filter( 'wp_nav_menu', 'kosmeline_title_attr' );
add_filter( 'wp_list_pages', 'kosmeline_title_attr' );
add_filter( 'wp_list_categories', 'kosmeline_title_attr' );
add_filter( 'get_archives_link', 'kosmeline_title_attr' );
add_filter( 'wp_tag_cloud', 'kosmeline_title_attr' );
add_filter( 'the_category', 'kosmeline_title_attr' );
add_filter( 'edit_post_link', 'kosmeline_title_attr' );
add_filter( 'edit_comment_link', 'kosmeline_title_attr' );

function kosmeline_title_attr( $output ) {
	$output = preg_replace( '/\s*title\s*=\s*(["\']).*?\1/', '', $output );

	return $output;
}