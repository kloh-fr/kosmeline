<?php
/**
 * Fichier partiel pour afficher le contenu des pages
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_front_page() ) :
			/* Si on est sur la page d'accueil on affiche un titre de niveau 2… */
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			/* …sinon on affiche un titre de niveau 1 */
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
		?>
	</header>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kosmeline' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php kosmeline_entry_footer(); ?>
	</footer>
</article>