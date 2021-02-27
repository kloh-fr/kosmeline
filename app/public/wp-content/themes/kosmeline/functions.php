<?php
/**
 * Kosméline : fonctions du thème.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.0.0
 * @since   Kosméline 1.0.0
 */

/* ----------------------------- */
/* Sommaire */
/* ----------------------------- */
/*
	== Fonctions WordPress
		-- Traductions
		-- Menus de navigation
		-- Images à la Une
		-- Balise <title>
		-- Flux RSS
		-- WooCommerce
		-- Champs de formulaire HTML5
		-- Content width
	== Widgets
	== Ajout des scripts du thème
	== Ajout des styles du thème
	== Fonctions externalisées
		-- Global
		-- Front
		-- Administration
*/

/* == @section Fonctions WordPress ==================== */
/**
 * @note Paramètres et fonctions WordPress du thème.
 *       Adaptation libre du thème Underscores.
 */
function kosmeline_setup() {
	/* -- @subsection Traductions -------------------- */
	/**
	 * Préparer le thème pour traduction.
	 * Les traductions sont placées dans le répertoire /languages/
	 * Pour traduire un terme : esc_html__( 'Terme à traduire', 'kosmeline' )
	 */
	load_theme_textdomain( 'kosmeline', get_template_directory() . '/languages' );

	$locale      = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";

	if ( is_readable( $locale_file ) ) {
		require_once( $locale_file );
	}

	/* -- @subsection Menus de navigation -------------------- */
	/**
	 * Déclaration du menu de navigation principal.
	 */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary menu', 'kosmeline' ),
		'footer'  => esc_html__( 'Footer menu', 'kosmeline' ),
	) );

	/* -- @subsection Images à la Une -------------------- */
	/**
	 * On ajoute le support des Images à la une
	 */
	add_theme_support( 'post-thumbnails' );

	/* Si les Images à la Une sont utilisées, ajouter des tailles personnalisées ici */
	// set_post_thumbnail_size( 400, 9999 ); // (largeur, hauteur) ; 9999 = illimité

	/* -- @subsection Balise <title> -------------------- */
	/**
	 * On gère la balise <title> dans WordPress et pas dans le thème.
	 * Le thème ne doit donc pas contenir de balise <title>
	 */
	add_theme_support( 'title-tag' );

	/* -- @subsection Flux RSS -------------------- */
	/**
	 * On ajoute les adresses de flux dans <head>
	 */
	// add_theme_support( 'automatic-feed-links' );

	/* -- @subsection WooCommerce -------------------- */
	/**
	 * On ajoute le support de WooCommerce
	 * https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/
	 */
	add_theme_support('woocommerce');

	/* -- @subsection Champs de formulaire HTML5 -------------------- */
	/**
	 * Remplacer les champs de formulaire natifs par des champs HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/* -- @subsection Content width -------------------- */
	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}
}
add_action( 'after_setup_theme', 'kosmeline_setup' );

/* == @section Widgets ==================== */
/**
 * @note On déclare une zone de widgets Sidebar par défaut.
 *       Pour ajouter des zone de widgets supplémentaires, passer par le thème enfant.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kosmeline_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kosmeline' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kosmeline' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'kosmeline_widgets_init' );

/* == @section Ajout des scripts du thème ==================== */
/* On insère le scripts pour les commentaires seulement si nécessaire */
function kosmeline_scripts() {
	wp_register_script(
		'custom-scripts',
		get_stylesheet_directory_uri() . '/js/custom.min.js',
		array(),
		'202102131105',
		true
	);

	/* On ajoute les fichiers à la queue */
	wp_enqueue_script( 'custom-scripts' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kosmeline_scripts' );

/* == @section Ajout des styles du thème ==================== */
function kosmeline_styles() {
	wp_register_style(
		'all',
		get_stylesheet_directory_uri() . '/css/styles.min.css',
		false,
		'202102131105',
		'all'
	);

	/* On ajoute les fichiers à la queue */
	wp_enqueue_style( 'all' );
}
add_action( 'wp_enqueue_scripts', 'kosmeline_styles' );

/* == @section Fonctions externalisées ==================== */
/**
 * @note Il s'agit de paramètres par défaut. Pour personnaliser ces fonctions, utiliser le thème enfant.
 */

/* -- @subsection Global -------------------- */
/* Grand ménage dans <head> */
require get_template_directory() . '/functions/global_head-cleaning.php';

/* Cacher des items de la barre d'admin */
require get_template_directory() . '/functions/global_admin-bar.php';

/* Gérer des pages d'erreurs personnalisées */
require get_template_directory() . '/functions/global_error-pages.php';

/* -- @subsection Front -------------------- */
/**
 * Fonctions pour personnaliser les pages publiques.
 */
/* Template tags personnalisé, issu du thème Underscore */
require get_template_directory() . '/functions/front_template-tags.php';

/* Retrait des attributs titles inutiles */
require get_template_directory() . '/functions/front_title-attributes.php';

/* Nettoyage des classes générées de la navigation */
// require get_stylesheet_directory() . '/functions/front_menu-classes.php';

/* Ajustements pour WooCommerce */
require get_template_directory() . '/functions/front_woocommerce.php';

/* -- @subsection Administration -------------------- */
/**
 * Fonctions pour personnaliser l'administration.
 */
if ( is_admin() ) {
	/* Notification de mises à jour du thème */
	require get_template_directory() . '/functions/admin_update-notifier.php';

	/* Cacher les mises à jour aux non administrateurs */
	require get_template_directory() . '/functions/admin_update-notifications.php';

	/* Ajouter des droits à des utilisateurs */
	// require get_stylesheet_directory() . '/functions/admin_capabilities.php';

	/* Cacher des items du menu aux non administrateurs */
	require get_template_directory() . '/functions/admin_menu.php';

	/* Cacher les widgets du dashboard */
	require get_template_directory() . '/functions/admin_dashboard-widgets.php';

	/* Désactiver le lien par défaut sur les images */
	require get_template_directory() . '/functions/admin_img-default-link.php';
}

function svg( $id, $width, $height ) {
	$svg = '<svg width="' . $width . '" height="' . $height .'" viewBox="0 0 50 50" class="svg-sprite" aria-hidden="true" focusable="false">
		<use xlink:href="#' . $id . '" />
	</svg>';

	return $svg;
}
