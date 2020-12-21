<?php
/**
 * Fichier pour afficher les commentaires
 *
 * Ce template affiche à la fois la liste des commentaires
 * et le formulaire de commentaire.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/**
 * Si la page est protégée par mot de passe et
 * que le visiteur ne l'a pas encore saisi,
 * on n'affiche pas la zone des commentaires.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	/* On affiche la liste des commentaires s'il y en a */
	if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
			printf( // WPCS: XSS OK.
				esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'kosmeline' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
		?>
	</h2>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
		?>
	</ol>

	<?php
		/* On affiche la navigation des commentaires si nécessaire */
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

	<nav id="comment-nav" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'kosmeline' ); ?></h2>
		<div class="nav-links">

			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kosmeline' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kosmeline' ) ); ?></div>

		</div>
	</nav>

	<?php
		endif;

	endif;

	/* Si les commentaires sont fermés et qu'il y a des commentaires, on indique que les commentaires sont fermés */
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kosmeline' ); ?></p>

	<?php endif;

	/* On affiche le formulaire */
	comment_form();
	?>

</div>