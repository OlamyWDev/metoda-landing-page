<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Hostim_Header' ) ) {
	class Hostim_Header {
		private $type = 'mega_menu';
		private $slug = 'mega_menu';
		private $name;
		private $tem;
		private $singular_name;
		private $plural_name;

		function __construct() {
			$this->name = __( 'Mega Menu', 'hostim-core' );
			$this->singular_name = __( 'Item', 'hostim-core' );
			$this->plural_name = __( 'Items', 'hostim-core' );


			add_action( 'init', array( $this, 'register_post_types' ), 1 );
//			add_action( 'init', array( $this, 'register_mega_menu_taxonomy' ), 1 );
		}

		function register_post_types() {
			$labels = array(
				'name'                  => esc_html__( 'Mega Menu', 'hostim-core' ),
				'singular_name'         => esc_html__( 'Mega Menu', 'hostim-core' ),
				'all_items'             => esc_html__( 'All Menus', 'hostim-core' ),
				'menu_name'             => _x( 'Mega Menu', 'Admin menu name', 'hostim-core' ),
				'add_new'               => esc_html__( 'Add New', 'hostim-core' ),
				'add_new_item'          => esc_html__( 'Add new Menu', 'hostim-core' ),
				'edit'                  => esc_html__( 'Edit', 'hostim-core' ),
				'edit_item'             => esc_html__( 'Edit Footer', 'hostim-core' ),
				'new_item'              => esc_html__( 'New Menu', 'hostim-core' ),
				'view'                  => esc_html__( 'View Menu', 'hostim-core' ),
				'view_item'             => esc_html__( 'View Menu', 'hostim-core' ),
				'search_items'          => esc_html__( 'Search Menus', 'hostim-core' ),
				'not_found'             => esc_html__( 'No Menus found', 'hostim-core' ),
				'not_found_in_trash'    => esc_html__( 'No Menus found in trash', 'hostim-core' ),
				'parent'                => esc_html__( 'Parent Menu', 'hostim-core' ),
				'filter_items_list'     => esc_html__( 'Filter Menus', 'hostim-core' ),
				'items_list_navigation' => esc_html__( 'Menus navigation', 'hostim-core' ),
				'items_list'            => esc_html__( 'Menu list', 'hostim-core' ),
			);

			$supports = array(
				'title',
				'editor',
				'elementor',
			);

			register_post_type( $this->type, array(
				'labels'      => $labels,
				'supports'    => $supports,
				'public'=>true,
				'show_in_nav_menus' => true,
				'show_admin_column' => false,
				'hierarchical'      => true,
				'show_tagcloud'     => false,
				'show_ui'           => true,
				'rewrite'     => array(
					'slug' => $this->slug,
				),
				'can_export'  => true,
				'menu_icon'   => 'dashicons-download',
			) );

			flush_rewrite_rules( true );
		}

		function register_mega_menu_taxonomy() {
			$category = 'category'; // Second part of taxonomy name

			$labels = array(
				'name' => sprintf( __( '%s Categories', 'hostim-core' ), $this->name ),
				'menu_name' => sprintf( __( '%s Categories','hostim-core' ), $this->name ),
				'singular_name' => sprintf( __( '%s Category', 'hostim-core' ), $this->name ),
				'search_items' =>  sprintf( __( 'Search %s Categories', 'hostim-core' ), $this->name ),
				'all_items' => sprintf( __( 'All %s Categories','hostim-core' ), $this->name ),
				'parent_item' => sprintf( __( 'Parent %s Category','hostim-core' ), $this->name ),
				'parent_item_colon' => sprintf( __( 'Parent %s Category:','hostim-core' ), $this->name ),
				'new_item_name' => sprintf( __( 'New %s Category Name','hostim-core' ), $this->name ),
				'add_new_item' => sprintf( __( 'Add New %s Category','hostim-core' ), $this->name ),
				'edit_item' => sprintf( __( 'Edit %s Category','hostim-core' ), $this->name ),
				'update_item' => sprintf( __( 'Update %s Category','hostim-core' ), $this->name ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => $this->slug.'-'.$category ),
			);
			register_taxonomy( $this->type.'-'.$category, array($this->type), $args );
		}
	}

	new Hostim_Header;
}
