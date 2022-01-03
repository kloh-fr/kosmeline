<?php
/**
 * Pied de page
 *
 * C'est le template qui affiche la fermeture du contenu <div id="content">
 * et tout ce qui suit.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */
?>

</div>

<footer id="site-footer" class="site-footer" role="contentinfo">
	<div class="site-footer_links">
		<?php wp_nav_menu( array(
			'theme_location' => 'footer',
			'menu_id'        => 'footer-menu',
			'container'      => false
		) ); ?>
	</div>

	<div class="site-footer_info">
		&copy; <?php echo date( 'Y' ); ?> Kosméline <span class="site-footer_separator" aria-hidden="true">·</span> Impasse des Perdrix 6 <span class="site-footer_separator" aria-hidden="true">·</span> CH-1563 Dompierre
	</div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>
