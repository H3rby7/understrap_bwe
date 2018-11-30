<?php

if ( ! function_exists('post_type_show') ) {

// Register Custom Post Type
	function post_type_show() {

		$labels = array(
			'name'                  => _x( 'Shows', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Show', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Shows', 'text_domain' ),
			'name_admin_bar'        => __( 'Shows', 'text_domain' ),
			'archives'              => __( 'Show Archives', 'text_domain' ),
			'attributes'            => __( 'Show Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Show:', 'text_domain' ),
			'all_items'             => __( 'All Shows', 'text_domain' ),
			'add_new_item'          => __( 'Add New Show', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Show', 'text_domain' ),
			'edit_item'             => __( 'Edit Show', 'text_domain' ),
			'update_item'           => __( 'Update Show', 'text_domain' ),
			'view_item'             => __( 'View Show', 'text_domain' ),
			'view_items'            => __( 'View Shows', 'text_domain' ),
			'search_items'          => __( 'Search Show', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Shows list', 'text_domain' ),
			'items_list_navigation' => __( 'Shows list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Show', 'text_domain' ),
			'description'           => __( 'Performance of a Musical', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-tickets-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
		);
		register_post_type( 'show', $args );

	}
	add_action( 'init', 'post_type_show', 0 );

}

function show_meta_box( $meta_boxes ) {
	$prefix = 'show-';

	$meta_boxes[] = array(
		'id' => 'show',
		'title' => esc_html__( 'Show', 'show' ),
		'post_types' => array( 'show' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'date',
				'type' => 'date',
				'name' => esc_html__( 'Datum', 'show' ),
				'desc' => esc_html__( 'Datum der Show', 'show' ),
			),
			array(
				'id' => $prefix . 'time',
				'name' => esc_html__( 'Uhrzeit', 'show' ),
				'type' => 'time',
				'desc' => esc_html__( 'Startzeit der Show', 'show' ),
			),
			array(
				'id' => $prefix . 'ticket_link',
				'type' => 'url',
				'name' => esc_html__( 'Ticket Link', 'show' ),
				'desc' => esc_html__( 'URL zur Ticket Seite der Show', 'show' ),
				'add_button' => esc_html__( 'Ticket-Link für weitere Show hinzufügen', 'show' ),
			),
			array(
				'id' => $prefix . 'annotation',
				'type' => 'text',
				'name' => esc_html__( 'Bemerkung', 'show' ),
				'desc' => esc_html__( 'Feld für kurze Bemerkungen', 'show' ),
				'placeholder' => esc_html__( 'Zusatzvorstellung', 'show' ),
			),
			array(
				'id' => $prefix . 'state',
				'name' => esc_html__( 'Status', 'show' ),
				'type' => 'select',
				'desc' => esc_html__( 'In welchem Stadium befindet sich der Termin', 'show' ),
				'options' => array(
					1 => 'Aktiv (Verkauf läuft)',
					'Ausverkauft',
					'Deaktiviert (Kein Link)',
					'Verborgen (Termin wird nicht angezeigt)',
				),
				'std' => '3',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'show_meta_box' );

?>