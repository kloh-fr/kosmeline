<?php
/**
 * Fichier pour afficher la page d'erreur 401 (authentication requise)
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

		<section class="error-401 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! You haven&rsquo;t right to see this page.', 'kosmeline' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like you need to be authenticated.', 'kosmeline' ); ?></p>

				<?php
				get_search_form();

				the_widget( 'WP_Widget_Recent_Posts' );

				/* On affiche la liste des catégories s'il y en a plusieurs. */
				if ( kosmeline_categorized_blog() ) :
				?>

				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'kosmeline' ); ?></h2>
					<ul>
						<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
						?>
					</ul>
				</div>

				<?php
				endif;

				/* Pour les traducteurs : %1$s: smiley */
				$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'kosmeline' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', 'after_title=</h2>$archive_content' );

				the_widget( 'WP_Widget_Tag_Cloud' );
				?>

			</div>
		</section>

	</main>
</div>

<?php
get_footer();