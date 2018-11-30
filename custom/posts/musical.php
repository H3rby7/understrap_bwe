<?php

/* Musical Custom Post Type */

if ( ! function_exists('post_type_musical') ) {

// Register Custom Post Type
	function post_type_musical() {

		$labels = array(
			'name'                  => _x( 'Musicals', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Musical', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Musicals', 'text_domain' ),
			'name_admin_bar'        => __( 'Musicals', 'text_domain' ),
			'archives'              => __( 'Musical Archives', 'text_domain' ),
			'attributes'            => __( 'Musical Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Musical:', 'text_domain' ),
			'all_items'             => __( 'All Musicals', 'text_domain' ),
			'add_new_item'          => __( 'Add New Musical', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Musical', 'text_domain' ),
			'edit_item'             => __( 'Edit Musical', 'text_domain' ),
			'update_item'           => __( 'Update Musical', 'text_domain' ),
			'view_item'             => __( 'View Musical', 'text_domain' ),
			'view_items'            => __( 'View Musicals', 'text_domain' ),
			'search_items'          => __( 'Search Musical', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Musicals list', 'text_domain' ),
			'items_list_navigation' => __( 'Musicals list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Musical', 'text_domain' ),
			'description'           => __( 'A musical Project', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-star-filled',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
		);
		register_post_type( 'musical', $args );

	}
	add_action( 'init', 'post_type_musical', 0 );

}

/* Meta Box for Musical Post Type */

function musical_meta_box( $meta_boxes ) {
	$prefix = 'musical-';

	$meta_boxes[] = array(
		'id' => 'musical',
		'title' => esc_html__( 'Musical', 'musical' ),
		'post_types' => array( 'musical' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'date_start',
				'type' => 'date',
				'name' => esc_html__( 'Date Picker', 'musical' ),
				'desc' => esc_html__( 'Datum der ersten Musical (zur Sortierung)', 'musical' ),
			),
			array(
				'id' => $prefix . 'link_landing',
				'type' => 'post',
				'name' => esc_html__( 'Landing Page', 'musical' ),
				'desc' => esc_html__( 'zugehörige Landing Page', 'musical' ),
				'post_type' => 'page',
				'field_type' => 'select',
			),
			array(
				'id' => $prefix . 'no_link',
				'name' => esc_html__( 'No Page', 'musical' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Falls kein Content vorhanden und einfach nur in der Liste von Musicals anzuzeigen.', 'musical' ),
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'musical_meta_box' );

/* Link to Musical Meta-Box for Posts and Pages */

function musical_link_meta_box( $meta_boxes ) {
	$prefix = 'musical-';

	$meta_boxes[] = array(
		'id' => 'musical',
		'title' => esc_html__( 'Musical', 'musical' ),
		'post_types' => array( 'page', 'post', 'cast_member', 'orchester', 'team', 'show'),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'link_musical',
				'type' => 'post',
				'name' => esc_html__( 'Musical', 'musical' ),
				'desc' => esc_html__( 'zugehöriges Musical', 'musical' ),
				'post_type' => 'musical',
				'field_type' => 'select',
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'musical_link_meta_box' );

?>