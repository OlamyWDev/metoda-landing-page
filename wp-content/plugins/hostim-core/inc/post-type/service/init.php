<?php
/**
 * Hostim_Services custom post type.
 *
 * @package Hostim Core
 * @since   1.0.0
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class Hostim_Services {
	/**
	 * Construct function.
	 *
	 * @return  void
	 */
	function __construct() {
		add_action( 'init', array( __CLASS__, 'hostim_services_init' ) );
		add_filter( 'single_template', array( $this, 'portfolio_single' ) );
	}

	/**
	 * Register a Hostim_Services post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	public static function hostim_services_init() {
		if ( function_exists( 'hostim_option' ) ) {
			$slug_text = hostim_option( 'services_slug' );
		}

		$slug = ! empty( $slug_text ) ? $slug_text : 'services';

		register_post_type( 'services', array(
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'show_in_rest'       => true,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-images-alt2',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'comments', 'elementor' ),
			'labels'             => array(
				'name'               => _x( 'Service', 'hostim-core' ),
				'singular_name'      => _x( 'Service', 'hostim-core' ),
				'menu_name'          => _x( 'Service', 'hostim-core' ),
				'name_admin_bar'     => _x( 'Services', 'hostim-core' ),
				'add_new'            => _x( 'Add New', 'hostim-core' ),
				'add_new_item'       => __( 'Add New Service', 'hostim-core' ),
				'new_item'           => __( 'New Service', 'hostim-core' ),
				'edit_item'          => __( 'Edit Services', 'hostim-core' ),
				'view_item'          => __( 'View Service', 'hostim-core' ),
				'all_items'          => __( 'All Services', 'hostim-core' ),
				'search_items'       => __( 'Search Services', 'hostim-core' ),
				'parent_item_colon'  => __( 'Parent Services:', 'hostim-core' ),
				'not_found'          => __( 'No Services found.', 'hostim-core' ),
				'not_found_in_trash' => __( 'No Services found in Trash.', 'hostim-core' )
			),
		) );

		// Register Services category
		register_taxonomy( 'services_cat', array( 'services' ), array(
			'hierarchical' => true,
			'show_ui'      => true,
			'show_in_rest' => true,

			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'services_cat' ),
			'labels'            => array(
				'name'              => _x( 'Categories', 'hostim-core' ),
				'singular_name'     => _x( 'Category', 'hostim-core' ),
				'search_items'      => __( 'Search Categories', 'hostim-core' ),
				'all_items'         => __( 'All Categories', 'hostim-core' ),
				'parent_item'       => __( 'Parent Category', 'hostim-core' ),
				'parent_item_colon' => __( 'Parent Category:', 'hostim-core' ),
				'edit_item'         => __( 'Edit Category', 'hostim-core' ),
				'update_item'       => __( 'Update Category', 'hostim-core' ),
				'add_new_item'      => __( 'Add New Category', 'hostim-core' ),
				'new_item_name'     => __( 'New Category Name', 'hostim-core' ),
				'menu_name'         => __( 'Categories', 'hostim-core' ),
			),
		) );


		//Register Services tag
		register_taxonomy( 'services_tag', 'services', array(
			'hierarchical'          => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'services_tag' ),
			'labels'                => array(
				'name'                       => _x( 'Tags', 'hostim-core' ),
				'singular_name'              => _x( 'Tag', 'hostim-core' ),
				'search_items'               => __( 'Search Tags', 'hostim-core' ),
				'popular_items'              => __( 'Popular Tags', 'hostim-core' ),
				'all_items'                  => __( 'All Tags', 'hostim-core' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => __( 'Edit Tag', 'hostim-core' ),
				'update_item'                => __( 'Update Tag', 'hostim-core' ),
				'add_new_item'               => __( 'Add New Tag', 'hostim-core' ),
				'new_item_name'              => __( 'New Tag Name', 'hostim-core' ),
				'separate_items_with_commas' => __( 'Separate tag with commas', 'hostim-core' ),
				'add_or_remove_items'        => __( 'Add or remove tag', 'hostim-core' ),
				'choose_from_most_used'      => __( 'Choose from the most used tag', 'hostim-core' ),
				'not_found'                  => __( 'No tag found.', 'hostim-core' ),
				'menu_name'                  => __( 'Tags', 'hostim-core' ),
			),
		) );
	}

	/**
	 * Load single item template file for the Services custom post type.
	 *
	 * @param string $template Current template file.
	 *
	 * @return  string
	 */
	function portfolio_single( $template ) {
		global $post;

		if ( $post->post_type == 'services' ) {
			$template = HOSTIM_CORE_DIR . 'inc/post-type/service/views/single.php';
		}

		return $template;
	}


}

$portfolio = new Hostim_Services;