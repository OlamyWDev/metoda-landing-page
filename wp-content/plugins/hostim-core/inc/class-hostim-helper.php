<?php


if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


/**
 * Class Hostim_Helper.
 */

if ( ! class_exists( 'Hostim_Helper' ) ) {
	class Hostim_Helper {

		protected static $instance  = null;
		protected static $post_type = 'job';
		protected static $tag       = 'portfolio_tags';
		protected static $category  = 'portfolio_category';

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function initialize() {
			add_filter('upload_mimes', [ $this, 'hostim_svg_mime_types' ]);
		}

		protected function build_extra_terms_query( $query_args, $taxonomies ) {
			if ( empty( $taxonomies ) ) {
				return $query_args;
			}

			$terms       = explode( ', ', $taxonomies );
			$tax_queries = array(); // List of taxonomies.

			if ( ! isset( $query_args['tax_query'] ) ) {
				$query_args['tax_query'] = array();

				foreach ( $terms as $term ) {
					$tmp       = explode( ':', $term );
					$taxonomy  = $tmp[0];
					$term_slug = $tmp[1];
					if ( ! isset( $tax_queries[ $taxonomy ] ) ) {
						$tax_queries[ $taxonomy ] = array(
							'taxonomy' => $taxonomy,
							'field'    => 'slug',
							'terms'    => array( $term_slug ),
						);
					} else {
						$tax_queries[ $taxonomy ]['terms'][] = $term_slug;
					}
				}
				$query_args['tax_query'] = array_values( $tax_queries );
				$query_args['tax_query']['relation'] = 'AND';
			} else {
				foreach ( $terms as $term ) {
					$tmp       = explode( ':', $term );
					$taxonomy  = $tmp[0];
					$term_slug = $tmp[1];

					foreach ( $query_args['tax_query'] as $key => $query ) {
						if ( is_array( $query ) ) {
							if ( $query['taxonomy'] == $taxonomy ) {
								$query_args['tax_query'][ $key ]['terms'][] = $term_slug;
								break;
							} else {
								$query_args['tax_query'][] = array(
									'taxonomy' => $taxonomy,
									'field'    => 'slug',
									'terms'    => array( $term_slug ),
								);
							}
						}
					}
				}
			}

			return $query_args;
		}

		static public function hostim_category_list( $cat ) {
			$query_args = array(
				'orderby'    => 'ID',
				'order'      => 'DESC',
				'hide_empty' => 1,
				'taxonomy'   => $cat
			);

			$categories  = get_categories( $query_args );
//			$options     = array( esc_html__( '0', 'hostim-core' ) => 'All Category' );
			$options = [];

			if ( is_array( $categories ) && count( $categories ) > 0 ) {
				foreach ( $categories as $cat ) {
					$options[ $cat->slug   ] = $cat->name;
				}
				return $options;
			}
		}

		/**
		 * @param $taxonomy
		 * @param $helper
		 *
		 * @since 1.0
		 */
		public static function get_term_parents_list($term_id, $taxonomy, $args = []) {
			$list = '';
			$term = get_term( $term_id, $taxonomy );

			if (is_wp_error($term)) {
				return $term;
			}

			if (! $term) {
				return $list;
			}

			$term_id = $term->term_id;

			$defaults = [
				'format' => 'name',
				'separator' => '/',
				'inclusive' => true,
			];

			$args = wp_parse_args( $args, $defaults );

			foreach (['inclusive'] as $bool) {
				$args[ $bool ] = wp_validate_boolean( $args[ $bool ] );
			}

			$parents = get_ancestors( $term_id, $taxonomy, 'taxonomy' );

			if ($args['inclusive']) {
				array_unshift( $parents, $term_id );
			}

			$a = count($parents) - 1;
			foreach (array_reverse( $parents ) as $index => $term_id) {
				$parent = get_term( $term_id, $taxonomy );
				$temp_sep = $args['separator'];
				$lastElement = reset($parents);
				$first = end($parents);

				if ($index == $a - 1) {
					$temp_sep = '';
				}

				if ($term_id != $lastElement) {
					$name = $parent->name;
					$list .= $name . $temp_sep;
				}
			}

			return $list;
		}

		/**
		 * @param $categories
		 * @param $helper
		 *
		 * @since 1.0
		 */
		public static function categories_suggester() {
			$content = [];

			foreach (get_categories() as $cat) {
				$args = [
				  'separator' => ' > ',
				  'format' => 'name',
				];
				$parent = self::get_term_parents_list( $cat->cat_ID, 'category', [] );

				$content[(string) $cat->slug] = $cat->cat_name.(! empty($parent) ? esc_html__( ' (Parent categories: (', 'hostim-core') .$parent.'))' : "");
			}

			return $content;
		}


		/**
		 * Check if the Elementor is updated.
		 *
		 * @return boolean if Elementor updated.
		 * @since 1.16.1
		 *
		 */
		static public function is_elementor_updated() {
			if (class_exists('Elementor\Icons_Manager')) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Return the new icon name.
		 *
		 * @param string $control_name name of the control.
		 * @return string of the updated control name.
		 * @since 1.16.1
		 *
		 */
		static public function get_new_icon_name($control_name)	{
			if (class_exists('Elementor\Icons_Manager')) {
				return 'new_' . $control_name . '[value]';
			} else {
				return $control_name;
			}
		}

		public static function get_grid_metro_size() {
			return [
				'1:1'   => esc_html__( 'Width 1 - Height 1', 'hostim-core' ),
				'1:2'   => esc_html__( 'Width 1 - Height 2', 'hostim-core' ),
				'1:0.7' => esc_html__( 'Width 1 - Height 70%', 'hostim-core' ),
				'1:1.3' => esc_html__( 'Width 1 - Height 130%', 'hostim-core' ),
				'2:1'   => esc_html__( 'Width 2 - Height 1', 'hostim-core' ),
				'2:2'   => esc_html__( 'Width 2 - Height 2', 'hostim-core' ),
			];
		}

		public static function paging_nav( $query = false ) {
			global $wp_query, $wp_rewrite;

			if ( $query === false ) {
				$query = $wp_query;
			}

			// Don't print empty markup if there's only one page.
			if ( $query->max_num_pages < 2 ) {
				return;
			}

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}

			$page_num_link = html_entity_decode( get_pagenum_link() );
			$query_args    = array();
			$url_parts     = explode( '?', $page_num_link );

			if ( isset( $url_parts[1] ) ) {
				wp_parse_str( $url_parts[1], $query_args );
			}

			$page_num_link = esc_url( remove_query_arg( array_keys( $query_args ), $page_num_link ) );
			$page_num_link = trailingslashit( $page_num_link ) . '%_%';

			$format = '';
			if ( $wp_rewrite->using_index_permalinks() && ! strpos( $page_num_link, 'index.php' ) ) {
				$format = 'index.php/';
			}
			if ( $wp_rewrite->using_permalinks() ) {
				$format .= user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' );
			} else {
				$format .= '?paged=%#%';
			}

			// Set up paginated links.

			$args  = array(
				'base'      => $page_num_link,
				'format'    => $format,
				'total'     => $query->max_num_pages,
				'current'   => max( 1, $paged ),
				'mid_size'  => 1,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_text' => '<span class="fas fa-chevron-left">',
				'next_text' => '<span class="fas fa-chevron-right"></span>',
				'type'      => 'array',
			);
			$pages = paginate_links( $args );

			if ( is_array( $pages ) ) {
				echo '<ul class="page-pagination">';
				foreach ( $pages as $page ) {
					printf( '<li>%s</li>', $page );
				}
				echo '</ul>';
			}
		}

		/**
		 * Enqueue svg to the media.
		 * @return void
		 */
		function hostim_svg_mime_types($mimes) {
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}


		public static function image_placeholder( $width, $height ) {
			echo '<img src="http://via.placeholder.com/' . $width . 'x' . $height . '?text=' . esc_attr__( 'No+Image', 'hostim-core' ) . '" alt="' . esc_attr__( 'Thumbnail', 'hostim-core' ) . '"/>';
		}

		public static function hostim_hex_to_rgb($hex, $alpha = false) {
			$hex      = str_replace('#', '', $hex);
			$length   = strlen($hex);
			$rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
			$rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
			$rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
			if ( $alpha ) {
				$rgb['a'] = $alpha;
			}
			return $rgb;
		}


		static function api_data( $limit = 10 ) {
            $result = get_transient( 'tt_currency_results' );
			if ( false === $result ) {

				$apiUrl = "https://api.coinstats.app/public/v1/coins?skip=0";
				$response = wp_remote_get($apiUrl);
				$responseBody = wp_remote_retrieve_body( $response );
				$result = json_decode( $responseBody, true );

				set_transient( 'tt_currency_results', $result,  10 );
			}

            return is_array($result) ? array_slice( $result['coins'], 0, $limit ) : [];
		}





	}

	Hostim_Helper::instance()->initialize();
}
