<?php
/**
 * Custom Post Type pour revendeurs
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.1.0
 * @since   Kosméline 1.1.0
 */

function reseller_post_type() {
	$labels = array(
		'name'                  => _x( 'Resellers', 'Post Type General Name', 'kosmeline' ),
		'singular_name'         => _x( 'Reseller', 'Post Type Singular Name', 'kosmeline' ),
		'menu_name'             => __( 'Resellers', 'kosmeline' ),
		'name_admin_bar'        => __( 'Reseller', 'kosmeline' ),
		'archives'              => __( 'Reseller Archives', 'kosmeline' ),
		'attributes'            => __( 'Reseller Attributes', 'kosmeline' ),
		'parent_item_colon'     => __( 'Parent Reseller:', 'kosmeline' ),
		'all_items'             => __( 'All Resellers', 'kosmeline' ),
		'add_new_item'          => __( 'Add New Reseller', 'kosmeline' ),
		'add_new'               => __( 'Add New', 'kosmeline' ),
		'new_item'              => __( 'New Reseller', 'kosmeline' ),
		'edit_item'             => __( 'Edit Reseller', 'kosmeline' ),
		'update_item'           => __( 'Update Reseller', 'kosmeline' ),
		'view_item'             => __( 'View Reseller', 'kosmeline' ),
		'view_items'            => __( 'View Resellers', 'kosmeline' ),
		'search_items'          => __( 'Search Reseller', 'kosmeline' ),
		'not_found'             => __( 'Not found', 'kosmeline' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kosmeline' ),
		'featured_image'        => __( 'Featured Image', 'kosmeline' ),
		'set_featured_image'    => __( 'Set featured image', 'kosmeline' ),
		'remove_featured_image' => __( 'Remove featured image', 'kosmeline' ),
		'use_featured_image'    => __( 'Use as featured image', 'kosmeline' ),
		'insert_into_item'      => __( 'Insert into reseller', 'kosmeline' ),
		'uploaded_to_this_item' => __( 'Uploaded to this reseller', 'kosmeline' ),
		'items_list'            => __( 'Resellers list', 'kosmeline' ),
		'items_list_navigation' => __( 'Resellers list navigation', 'kosmeline' ),
		'filter_items_list'     => __( 'Filter resellers list', 'kosmeline' ),
	);

	$args = array(
		'label'                 => __( 'Reseller', 'kosmeline' ),
		'description'           => __( 'Resellers', 'kosmeline' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag', 'custom-fields', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-store',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => false,
	);

	register_post_type( 'reseller', $args );
}
add_action( 'init', 'reseller_post_type', 0 );
