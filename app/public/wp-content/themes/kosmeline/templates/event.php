<?php
/**
 * Template Name: Événements
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
			$today = date('Ymd');

			$future_events_args = array(
				'posts_per_page' => -1,
				'post_type'      => 'event',
				'post_status'    => 'publish',
				'meta_query'     => array(
					array(
						'key'     => 'dates_date_debut',
						'compare' => '>=',
						'value'   => $today,
					),
				),
				'meta_key'       => 'dates_date_debut',
				'orderby'        => 'meta_value',
				'order'          => 'ASC',
			);
			$future_events = new WP_Query( $future_events_args );

			$old_events_args = array(
				'posts_per_page' => -1,
				'post_type'      => 'event',
				'post_status'    => 'publish',
				'meta_query'     => array(
					array(
						'key'     => 'dates_date_debut',
						'compare' => '<',
						'value'   => $today,
					),
				),
				'meta_key'       => 'dates_date_debut',
				'orderby'        => 'meta_value',
				'order'          => 'DESC',
			);
			$old_events = new WP_Query( $old_events_args ); ?>

			<h2><?php esc_html_e( 'Upcoming events', 'kosmeline' ); ?></h2>

			<?php if( $future_events->have_posts() ): ?>

				<figure class="wp-block-table event-table">
					<table>
						<thead>
							<tr>
								<th scope="col"><?php esc_html_e( 'Date', 'kosmeline' ); ?></th>
								<th scope="col"><?php esc_html_e( 'Event', 'kosmeline' ); ?></th>
							</tr>
						</thead>
						<tbody>
						<?php while( $future_events->have_posts() ) : $future_events->the_post();

							get_template_part( 'template-parts/event', 'row' );

						endwhile; ?>
						</tbody>
					</table>
				</figure>

				<?php wp_reset_postdata(); ?>
			<?php else: ?>
				<p><?php esc_html_e( 'No upcoming event planned so far.', 'kosmeline' ); ?></p>
			<?php endif; ?>

		<h2><?php esc_html_e( 'Past events', 'kosmeline' ); ?></h2>

		<?php if( $old_events->have_posts() ): ?>

		<figure class="wp-block-table event-table">
			<table>
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Date', 'kosmeline' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Event', 'kosmeline' ); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php while( $old_events->have_posts() ) : $old_events->the_post();

					get_template_part( 'template-parts/event', 'row' );

				endwhile; ?>
				</tbody>
			</table>
		</figure>

		<?php
		wp_reset_postdata();

		endif;
		?>
	</main>
</div>

<?php
get_sidebar();
get_footer();
