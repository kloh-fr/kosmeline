<?php
/**
 * ichier partiel pour afficher le contenu des pages
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
		?>
		<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
		<?php
		else :
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
</article>