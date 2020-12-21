<?php
/**
 * Fichier pour afficher les pages
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */
get_header(); ?>

<div id="site-content" class="site-content">
	<main id="main" class="site-main" role="main">

		<?php
		/* Début de la boucle */
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

			/**
			 * Si les commentaires sont ouverts ou si on a au moins un commentaire,
			 * on charge le template des commentaires
			 */
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>

	</main>
</div>

<?php
get_sidebar();
get_footer();