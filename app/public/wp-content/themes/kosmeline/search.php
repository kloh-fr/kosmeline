<?php
/**
 * Fichier pour afficher les résultats de recherche
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'kosmeline' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header>

		<?php
			/* Début de la boucle */
			while ( have_posts() ) : the_post();

				/**
				 * On utilise des templates partiels pour afficher les résultats
				 * Pour écraser ce partiel dans le thème enfant, ajouter un fichier
				 * content-___.php (où ___ est le nom du format d'article).
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</main>
</div>

<?php
get_sidebar();
get_footer();