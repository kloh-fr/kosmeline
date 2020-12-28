<?php
/**
 * Entête de page
 *
 * C'est le template qui affiche la balise <head> et tout le contenu
 * jusqu'au contenu <div id="content">.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Fabrication artisanale de cosmétiques naturels en Suisse romande" />
	<?php wp_head(); ?>
	<script>
	document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');
	</script>
	<meta name="format-detection" content="telephone=no">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo( 'template_directory' ); ?>/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo( 'template_directory' ); ?>/img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo( 'template_directory' ); ?>/img/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo( 'template_directory' ); ?>/img/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php bloginfo( 'template_directory' ); ?>/img/favicons/safari-pinned-tab.svg" color="#000000">
	<meta name="apple-mobile-web-app-title" content="Kosméline">
	<meta name="application-name" content="Kosméline">
	<meta name="msapplication-TileColor" content="#000000">
	<meta name="theme-color" content="#ffffff">
	<meta property="og:url" content="https://kosmeline.ch" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Kosméline – Cosmétiques naturels" />
	<meta property="og:description" content="Fabrication artisanale de cosmétiques naturels en Suisse" />
	<meta property="og:image" content="<?php bloginfo( 'template_directory' ); ?>/img/og-kosmeline.jpg" />
	<meta property="og:locale" content="fr_CH" />
</head>

<body <?php body_class(); ?> role="document">
	<?php wp_body_open(); ?>
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" aria-hidden="true">
		<symbol id="fleche">
			<path d="M47.1 13c-.1.1-.4.3-20.8 15.7l-1.3 1-1.3-1C5.4 14.9 3.1 13.1 2.9 13 1.4 11.8.5 11.7.3 11.7H.1c.1.2.3.5.6 1C16.6 35.4 21 38.1 22 38.4h6c1-.2 5.3-2.9 21.4-25.7.3-.5.5-.8.6-1h-.2c-.3-.1-1.2.1-2.7 1.3z" />
		</symbol>
	</svg>

	<div class="site-background"><canvas id="sky"></canvas></div>

	<div id="site-top" class="site-wrapper">
		<a href="#site-menu" class="screen-reader-text"><span><?php esc_html_e( 'Skip to navigation', 'kosmeline' ); ?></span></a>
		<a href="#site-content" class="screen-reader-text"><span><?php esc_html_e( 'Skip to content', 'kosmeline' ); ?></span></a>
		<!-- <a href="#site-search" class="screen-reader-text"><span><?php esc_html_e( 'Skip to search', 'kosmeline' ); ?></span></a> -->

		<header id="site-header" class="site-header" role="banner">
			<div class="site-header_title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php bloginfo( 'template_directory' ); ?>/img/logo.svg" width="370" height="77" alt="<?php bloginfo( 'name' ); ?>" class="site-header_logo" />
				</a>
			</div>

			<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) :
			?>
			<div class="site-header_description"><?php echo $description; /* WPCS: xss ok. */ ?></div>
			<?php endif; ?>
		</header>

		<div id="site-menu"">
			<nav id=" site-navigation" class="site-navigation" role="navigation">
			<button type="button" id="mobile-menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
				<span><?php esc_html_e( 'Menu', 'kosmeline' ); ?></span>
			</button>
			<div id="mobile-menu">
				<?php wp_nav_menu( array(
					'theme_location'  => 'primary',
					'menu_id'         => 'primary-menu',
					'container'       => ''
				) ); ?>
			</div>
			</nav>
		</div>

		<!-- <div id="site-search" class="site-search">
			<?php // get_search_form() ?>
		</div> -->

		<div id="site-content-wrapper" class="site-content-wrapper">
