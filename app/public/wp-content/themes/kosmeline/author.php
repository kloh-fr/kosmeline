<?php
/**
 * Fichier pour afficher le détail d'un auteur
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
		if ( have_posts() ) : ?>

		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

			<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<p><?php the_author_meta( 'description' ); ?></p>
			<?php endif; ?>
		</header>

		<?php
		/* Début de la boucle */
		while ( have_posts() ) : the_post();

			/**
			 * On utilise des templates partiels en fonction du format d'article
			 * (Post Format : https://wpchannel.com/post-formats-wordpress/).
			 * Pour écraser ce partiel dans le thème enfant, ajouter un fichier
			 * content-___.php (où ___ est le nom du format d'article).
			 */
			get_template_part( 'template-parts/content', get_post_format() );

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