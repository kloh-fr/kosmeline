<?php
/**
 * Template Name: Plan du site
 *
 * Fichier pour afficher les pages
 *
 * @author  Luc Poupard
 *
 * @note    Inspiré d'un tutoriel :
 * @author  Rémi Corson
 * @link    http://www.remicorson.com/create-a-simple-wordpress-sitemap/
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */
get_header(); ?>

<div id="site-content" class="site-content">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<h1><?php the_title(); ?></h1>

		<h2><?php esc_html_e( 'Pages', 'kosmeline' ); ?></h2>

		<ul>
			<?php wp_list_pages( 'title_li=' ); ?>
		</ul>

		<h2><?php esc_html_e( 'Feeds', 'kosmeline' ); ?></h2>

		<ul>
			<li><a href="<?php bloginfo( 'rss2_url' ); ?>" target="_blank"><?php esc_html_e( 'Posts RSS feed', 'kosmeline' ); ?></a></li>
			<li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>" target="_blank"><?php esc_html_e( 'Comments RSS feed', 'kosmeline' ); ?></a></li>
		</ul>

		<h2><?php esc_html_e( 'Categories', 'kosmeline' ); ?></h2>
		<ul>
			<?php wp_list_categories( 'show_count=1' ); ?>
		</ul>

		<?php
		$archive_query = new WP_Query( array(
			'post_type' => 'post',
			'nopaging'  => 'true',
			'orderby'   => 'date'
		) );
		if ( $archive_query->have_posts() ) : ?>

		<h2><?php esc_html_e( 'Posts', 'kosmeline' ); ?></h2>

		<ul>
			<?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); ?>

			<li>
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
				(<?php comments_number( '0', '1', '%' ); ?>)
			</li>

			<?php endwhile; ?>
		</ul>

		<?php endif; ?>

		<h2>Archives</h2>
		<ul>
			<?php wp_get_archives( 'type=monthly&show_post_count=true' ); ?>
		</ul>

		<?php endwhile; ?>

	</main>
</div>

<?php
get_sidebar();
get_footer();