<?php
/**
 * Use namespace to avoid conflict
 */
namespace PostType;

/**
 * Class Job
 * @package PostType
 *
 * Use actual name of post type for
 * easy readability.
 *
 * Potential conflicts removed by namespace
 */
class Job {

	/**
	 * @var string
	 *
	 * Set post type params
	 */
	private $type = 'job';
	private $slug = 'job';
	private $name = 'Jobs';
	private $singular_name = 'Job';
	private $icon = 'dashicons-text-page';

	/**
	 * Job constructor.
	 *
	 * When class is instantiated
	 */
	public function __construct() {

		// Register the post type
		add_action( 'init', array( $this, 'register' ) );

		// Admin set post columns
		add_filter( 'manage_edit-' . $this->type . '_columns', array( $this, 'set_columns' ), 10, 1 );

		// Admin edit post columns
		add_action( 'manage_' . $this->type . '_posts_custom_column', array( $this, 'edit_columns' ), 10, 2 );

	}

	/**
	 * Register post type
	 */
	public function register() {
		$slug   = $this->slug;
		$labels = array(
			'name'               => esc_html_x( 'Jobs', 'Post Type General Name', 'hostim-core' ),
			'singular_name'      => esc_html_x( 'Job', 'Post Type Singular Name', 'hostim-core' ),
			'add_new'            => esc_html__( 'Add New', 'hostim-core' ),
			'add_new_item'       => esc_html__( 'Add New', 'hostim-core' ) . $this->singular_name,
			'edit_item'          => esc_html__( 'Edit ', 'hostim-core' ) . $this->singular_name,
			'new_item'           => esc_html__( 'New ', 'hostim-core' ) . $this->singular_name,
			'all_items'          => esc_html__( 'All Jobs', 'hostim-core' ),
			'view_item'          => esc_html__( 'View ', 'hostim-core' ) . $this->singular_name,
			'view_items'         => esc_html__( 'View ', 'hostim-core' ) . $this->name,
			'search_items'       => esc_html__( 'Search ', 'hostim-core' ) . $this->name,
			'not_found'          => esc_html__( 'No ', 'hostim-core' ) . strtolower( $this->name ) . esc_html__( ' found', 'hostim-core' ),
			'not_found_in_trash' => esc_html__( 'No ', 'hostim-core' ) . strtolower( $this->name ) . esc_html__( ' found in Trash', 'hostim-core' ),
			'parent_item_colon'  => '',
			'menu_name'          => $this->name,
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => 20,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'elementor' ),
			'yarpp_support'      => true,
			'menu_icon'          => $this->icon
		);

		register_post_type( $this->type, $args );

		register_taxonomy( $this->type . '_cat', $this->type, array(
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'labels'            => array(
				'name' => esc_html__( 'Categories', 'hostim-core' ),
			)
		) );

		register_taxonomy( $this->type . '_type', $this->type, array(
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'labels'            => array(
				'name' => esc_html__( 'Type', 'hostim-core' ),
			)
		) );
	}

	/**
	 * @param $columns
	 *
	 * @return mixed
	 *
	 * Choose the columns you want in
	 * the admin table for this post
	 */
	public function set_columns( $columns ) {
		// Set/unset post type table columns here

		return $columns;
	}

	/**
	 * @param $column
	 * @param $post_id
	 *
	 * Edit the contents of each column in
	 * the admin table for this post
	 */
	public function edit_columns( $column, $post_id ) {
		// Post type table column content code here
	}

}

/**
 * Instantiate class, creating post type
 */
new Job();
