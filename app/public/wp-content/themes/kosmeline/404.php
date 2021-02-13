<?php
/**
 * Fichier pour afficher la page d'erreur 404 (page non trouvée)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */
get_header(); ?>

<div id="site-content" class="site-content">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kosmeline' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'kosmeline' ); ?></p>
			</div>
		</section>

	</main>
</div>

<?php
get_footer();