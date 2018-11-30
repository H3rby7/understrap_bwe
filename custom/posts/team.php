<?php

/* Cast Custom Post Type */

if ( ! function_exists('post_type_team') ) {

// Register Custom Post Type
	function post_type_team() {

		$labels = array(
			'name'                  => _x( 'Kreativ-Teams', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Kreativ-Team', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Kreativ-Teams', 'text_domain' ),
			'name_admin_bar'        => __( 'Kreativ-Teams', 'text_domain' ),
			'archives'              => __( 'Kreativ-Team Archives', 'text_domain' ),
			'attributes'            => __( 'Kreativ-Team Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Kreativ-Team:', 'text_domain' ),
			'all_items'             => __( 'All Kreativ-Teams', 'text_domain' ),
			'add_new_item'          => __( 'Add New Kreativ-Team', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Kreativ-Team', 'text_domain' ),
			'edit_item'             => __( 'Edit Kreativ-Team', 'text_domain' ),
			'update_item'           => __( 'Update Kreativ-Team', 'text_domain' ),
			'view_item'             => __( 'View Kreativ-Team', 'text_domain' ),
			'view_items'            => __( 'View Kreativ-Teams', 'text_domain' ),
			'search_items'          => __( 'Search Kreativ-Team', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Teams list', 'text_domain' ),
			'items_list_navigation' => __( 'Teams list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Kreativ-Team', 'text_domain' ),
			'description'           => __( 'Kreativ-Team', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
		);
		register_post_type( 'team', $args );

	}
	add_action( 'init', 'post_type_team', 0 );

}

?>