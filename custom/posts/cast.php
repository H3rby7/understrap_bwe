<?php

/* Cast Custom Post Type */

if ( ! function_exists('post_type_cast_member') ) {

// Register Custom Post Type
	function post_type_cast_member() {

		$labels = array(
			'name'                  => _x( 'Cast Members', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Cast Member', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Cast Members', 'text_domain' ),
			'name_admin_bar'        => __( 'Cast Members', 'text_domain' ),
			'archives'              => __( 'Cast Member Archives', 'text_domain' ),
			'attributes'            => __( 'Cast Member Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Cast Member:', 'text_domain' ),
			'all_items'             => __( 'All Cast Members', 'text_domain' ),
			'add_new_item'          => __( 'Add New Cast Member', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Cast Member', 'text_domain' ),
			'edit_item'             => __( 'Edit Cast Member', 'text_domain' ),
			'update_item'           => __( 'Update Cast Member', 'text_domain' ),
			'view_item'             => __( 'View Cast Member', 'text_domain' ),
			'view_items'            => __( 'View Cast Members', 'text_domain' ),
			'search_items'          => __( 'Search Cast Member', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Cast Members list', 'text_domain' ),
			'items_list_navigation' => __( 'Cast Members list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Cast Member', 'text_domain' ),
			'description'           => __( 'Member of the Cast', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-id-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
		);
		register_post_type( 'cast_member', $args );

	}
	add_action( 'init', 'post_type_cast_member', 0 );

}

/* Meta Box for Cast Post Type */

function cast_member_meta_box( $meta_boxes ) {
	$prefix = 'cast_member-';

	$meta_boxes[] = array(
		'id' => 'cast_member',
		'title' => esc_html__( 'Cast Member', 'cast_member' ),
		'post_types' => array( 'cast_member' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'role',
				'type' => 'text',
				'name' => esc_html__( 'Rolle', 'cast_member' ),
				'desc' => esc_html__( 'Rolle(n) des Cast Mitgliedes', 'cast_member' ),
				'placeholder' => esc_html__( 'Elisabeth', 'cast_member' ),
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'cast_member_meta_box' );

?>