<?php
/**
 * Fichier pour afficher la page d'erreur 403 (accès non authorisé)
 *
 * @link    http://websistent.com/wordpress-custom-403-401-error-page/
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */
get_header(); ?>

<div id="site-content" class="site-content">
	<main id="main" class="site-main" role="main">

		<section class="error-403 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! You haven&rsquo;t right to see this page.', 'kosmeline' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like you have to go elsewhere.', 'kosmeline' ); ?></p>
			</div>
		</section>

	</main>
</div>

<?php
get_footer();