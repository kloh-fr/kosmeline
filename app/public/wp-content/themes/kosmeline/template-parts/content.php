<?php
/**
 * Fichier partiel pour afficher le contenu des articles
 *
 * C'est le template par défaut pour afficher les articles.
 * Il est utilisé par défaut si aucun template n'est trouvé pour le format d'article.
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
		if ( is_single() ) :
			/* Si on est sur le détail de l'article on affiche un titre de niveau 1 */
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			/* Si on est sur une liste d'articles on afficheu un titre de niveau 2 */
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>

		<div class="entry-meta">
			<?php kosmeline_posted_on(); ?>
		</div>

		<?php
		endif; ?>
	</header>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kosmeline' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

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