<?php
/**
 * Custom Post Type pour événements
 *
 * @author  Luc Poupard
 *
 * @package Kosméline 1.1.0
 * @since   Kosméline 1.1.0
 */

function event_post_type() {
	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'kosmeline' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'kosmeline' ),
		'menu_name'             => __( 'Events', 'kosmeline' ),
		'name_admin_bar'        => __( 'Event', 'kosmeline' ),
		'archives'              => __( 'Event Archives', 'kosmeline' ),
		'attributes'            => __( 'Event Attributes', 'kosmeline' ),
		'parent_item_colon'     => __( 'Parent Event:', 'kosmeline' ),
		'all_items'             => __( 'All Events', 'kosmeline' ),
		'add_new_item'          => __( 'Add New Event', 'kosmeline' ),
		'add_new'               => __( 'Add New', 'kosmeline' ),
		'new_item'              => __( 'New Event', 'kosmeline' ),
		'edit_item'             => __( 'Edit Event', 'kosmeline' ),
		'update_item'           => __( 'Update Event', 'kosmeline' ),
		'view_item'             => __( 'View Event', 'kosmeline' ),
		'view_items'            => __( 'View Events', 'kosmeline' ),
		'search_items'          => __( 'Search Event', 'kosmeline' ),
		'not_found'             => __( 'Not found', 'kosmeline' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kosmeline' ),
		'featured_image'        => __( 'Featured Image', 'kosmeline' ),
		'set_featured_image'    => __( 'Set featured image', 'kosmeline' ),
		'remove_featured_image' => __( 'Remove featured image', 'kosmeline' ),
		'use_featured_image'    => __( 'Use as featured image', 'kosmeline' ),
		'insert_into_item'      => __( 'Insert into event', 'kosmeline' ),
		'uploaded_to_this_item' => __( 'Uploaded to this event', 'kosmeline' ),
		'items_list'            => __( 'Events list', 'kosmeline' ),
		'items_list_navigation' => __( 'Events list navigation', 'kosmeline' ),
		'filter_items_list'     => __( 'Filter events list', 'kosmeline' ),
	);

	$args = array(
		'label'                 => __( 'Event', 'kosmeline' ),
		'description'           => __( 'Events', 'kosmeline' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag', 'custom-fields', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => false,
	);

	register_post_type( 'event', $args );
}
add_action( 'init', 'event_post_type', 0 );
