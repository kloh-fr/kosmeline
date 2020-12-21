<?php
/**
 * Colonne latérale des pages.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/* On vérifie si la colonne latérale est active ; si elle ne l’est pas, on ne l’affiche pas. */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>

<aside id="site-sidebar" class="site-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>