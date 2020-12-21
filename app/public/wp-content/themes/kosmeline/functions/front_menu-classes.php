<?php
/**
 * Nettoyage des classes générées de la navigation
 *
 * De multiples classes CSS sont ajoutées dans le menu et sont foncièrement inutiles.
 *
 * @author  Luc Poupard
 *
 * @link    https://github.com/ffoodd/ffeeeedd
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/**
 * Retire les classes générées - sauf les 'current_page' - par WordPress sur la navigation
 */
add_filter( 'nav_menu_css_class', 'kosmeline_nav_css_attr', 100, 1 );
add_filter( 'nav_menu_item_id', 'kosmeline_nav_css_attr', 100, 1 );
add_filter( 'page_css_class', 'kosmeline_nav_css_attr', 100, 1 );

if ( ! function_exists( 'kosmeline_nav_css_attr' ) ) {
	function kosmeline_nav_css_attr( $var ) {
		return is_array( $var ) ? array_intersect(
			$var, array(
				'current_page_item',
				'current-page-ancestor',
				'current_page_parent',
				'current-menu-parent',
				'current-menu-item',
				'inbl'
			)
		) : '';
	}
}