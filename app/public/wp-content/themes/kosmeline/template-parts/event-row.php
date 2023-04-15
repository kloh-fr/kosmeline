<?php
/**
 * Fichier partiel pour afficher un événement
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.1.0
 * @since   Kosméline 1.1.0
 */

$dates = get_field('dates');
$date_debut = strtotime( $dates['date_debut'] );
$date_fin = strtotime( $dates['date_fin'] );

$lien = get_field('lien')
?>

<tr>
	<td>
	<?php if( $dates ): ?>
		<?php if ( $date_fin ) : ?><?php esc_html_e( 'From', 'kosmeline' ); ?><?php endif; ?>
		<time datetime="<?php echo date_i18n( 'Y-m-j', $date_debut );?>"><?php echo date_i18n( 'j F Y', $date_debut );?></time>
		<?php if ( $date_fin ) : ?>
		<?php esc_html_e( 'to', 'kosmeline' ); ?>
		<time datetime="<?php echo date_i18n( 'Y-m-j', $date_fin );?>"><?php echo date_i18n( 'j F Y', $date_fin );?></time>
		<?php endif; ?>
	<?php endif; ?>
	</td>
	<td>
		<?php if( $lien ): ?>
		<a href="<?php echo $lien;?>" rel="noopener noreferrer"><?php the_title(); ?></a>
		<? else:
			the_title();
		endif; ?>
	</td>
</tr>
