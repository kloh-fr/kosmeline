<?php
/**
 * Template Name: Revendeurs
 * Template Post Type: page
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.1.0
 * @since   Kosméline 1.1.0
 */
get_header(); ?>

<div id="site-content" class="site-content">
	<main id="main" class="site-main" role="main">

		<h1><?php the_title(); ?></h1>

		<div class="content">
			<?php the_content(); ?>
		</div>

		<?php
			$args = array(
				'posts_per_page' => -1,
				'post_type'      => 'reseller',
				'post_status'    => 'publish',
				'orderby'        => 'title',
				'order'          => 'ASC',
			);
			$resellers = new WP_Query( $args );

			if( $resellers->have_posts() ): ?>

			<ul class="resellers">
				<?php while( $resellers->have_posts() ) : $resellers->the_post();

					$logo = get_field('logo');
					$logo_size = 'full';

					$localisation = get_field('localisation');

					$site = get_field('site_web');
					$site_aria_label = sprintf(
						esc_html_x( '%s website', 'Reseller website', 'kosmeline' ),
						get_the_title()
					);
					?>

					<li>
						<h2 class="h3"><?php the_title(); ?></h2>

						<?php if( $logo ) {
							echo wp_get_attachment_image( $logo, $logo_size );
						} ?>

						<address>
						<?php echo $localisation['adresse']; ?><br />
						<?php if( $localisation['adresse_complement'] ): ?>
							<?php echo $localisation['adresse_complement']; ?><br />
						<?php endif; ?>
						<?php echo $localisation['code_postal']; ?>
						<?php echo $localisation['ville']; ?>
						</address>

						<?php if( $site ) : ?>
							<a href="<?php echo $site ?>" rel="noopener noreferrer" aria-label="<?php echo $site_aria_label ?>">
								<?php esc_html_e( 'Website', 'kosmeline' ); ?>
							</a>
						<?php endif; ?>
					</li>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<?php endif; ?>
	</main>
</div>

<?php
get_sidebar();
get_footer();
