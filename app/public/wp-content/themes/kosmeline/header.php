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

		<div id="mobile-menu-container" class="site-navigation-container">
			<div id="mobile-menu">
				<div id="site-menu">
					<?php /* Cette div sert pour le lien d'évitement vers la navigation. Ne rien mettre entre #site-menu et #site-navigation */ ?>
				</div>
				<nav id="site-navigation" class="site-navigation" role="navigation">
					<?php wp_nav_menu( array(
						'theme_location'  => 'primary',
						'menu_id'         => 'primary-menu',
						'container'       => 'div',
						'container_id'    => 'nav-menu',
						'container_class' => 'primary-menu-container'
					) ); ?>
				</nav>
			</div>
		</div>

		<!-- <div id="site-search" class="site-search">
			<?php // get_search_form() ?>
		</div> -->

		<div id="site-content-wrapper" class="site-content-wrapper">