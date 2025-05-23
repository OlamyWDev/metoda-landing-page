<?php
/**
 * Hostimg theme helper functions and resources
 */

class Hostimg_Core_Helper {
    /**
     * Hold an instance of Helper_Core_Helper_Class class.
     * @var Hostimg_Core_Helper
     */
    protected static $instance = null;

    /**
     * Main Helper_Core_Helper_Class instance.
     * @return Hostimg_Core_Helper - Main instance.
     */
    public static function instance() {

        if (null == self::$instance) {
            self::$instance = new Hostimg_Core_Helper();
        }

        return self::$instance;
    }



    /**
     * Elementor Button
     *
     * Check if the url is external or nofollow
     * @param $settings_key
     * @return string
     */
    public static function the_button( $settings_key, $is_echo = true ) {

        if ( $is_echo == true ) {
            echo !empty($settings_key['url']) ? 'href="'. esc_url($settings_key['url']).'"' : '';
            echo $settings_key['is_external'] == true ? 'target="_blank"' : '';
            echo $settings_key['nofollow'] == true ? 'rel="nofollow"' : '';

            if ( !empty($settings_key['custom_attributes']) ) {
                $attrs = explode(',', $settings_key['custom_attributes']);

                if(is_array($attrs)){
                    foreach($attrs as $data) {
                        $data_attrs = explode('|', $data);
                        echo esc_attr( $data_attrs[0].'='.$data_attrs[1] );
                    }
                }
            }
        }
        elseif( $is_echo == false ){
            $link_attr  = !empty($settings_key['url']) ? " href={$settings_key['url']}" : '';
            $link_attr .= $settings_key['is_external'] == true ? ' target=_blank' : '';
            $link_attr .= $settings_key['nofollow'] == true ? ' rel=nofollow' : '';

            return $link_attr;
        }

    }


    /**
     * Get post excerpt length
     * @param $settings
     * @param $settings_key
     * @param int $default
     * @return string
     */
    public function get_the_excerpt_length ( $settings, $settings_key, $default = 10 ) {

        $excerpt_length = !empty($settings[$settings_key]) ? $settings[$settings_key] : $default;
        $excerpt = get_the_excerpt() ? wp_trim_words(get_the_excerpt(), $excerpt_length, '...') : wp_trim_words(get_the_content(), $excerpt_length, '...');

        return $excerpt;

    }


    /**
     * Get title excerpt length
     * @param $settings
     * @param $settings_key
     * @param int $default
     * @return string|void
     */
    public function get_the_title_length ( $settings, $settings_key, $default = 10 ) {

        $title_length = !empty($settings[$settings_key]) ? $settings[$settings_key] : $default;
        $title = get_the_title() ? wp_trim_words(get_the_title(), $title_length, '') : the_title();
        return $title;
    }


    /**
     * Get the first category name
     * @param string $term
     * @return string
     */
    public function get_the_first_taxonomy( $term = 'category' ) {
        $cats = get_the_terms(get_the_ID(), $term);
        $cat  = is_array($cats) ? $cats[0]->name : '';
        return esc_html($cat);
    }


    /**
     * Get the first category link
     * @param string $term
     * @return string
     */
    public function get_the_first_taxonomy_link( $term = 'category' ) {
        $cats = get_the_terms(get_the_ID(), $term);
        $cat  = is_array($cats) ? get_category_link($cats[0]->term_id) : '';
        return esc_url($cat);
    }


    /**
     * Day link's to archive page
     **/
    public function get_the_day_links() {
        $archive_year   = get_the_time( 'Y' );
        $archive_month  = get_the_time( 'm' );
        $archive_day    = get_the_time( 'd' );

        return get_day_link( $archive_year, $archive_month, $archive_day);
    }


    /**
     * Get categories array
     * @param string $term
     * @return array
     */
    public function get_the_categories ( $term = 'category' ) {

        $cats = get_terms( array(
            'taxonomy' => $term,
            'hide_empty' => true
        ));

        $cat_array = [];
        $cat_array['all'] = esc_html__('All', 'hostimg-core');

        foreach ($cats as $cat) {
            $cat_array[$cat->term_id] = $cat->name;
        }

        return $cat_array;
    }


    /**
     * Get the limit latter
     * @param $string
     * @param $limit_length
     * @param string $suffix
     */
    public function get_the_limit_latter($string, $limit_length, $suffix = '...' ) {

        if (strlen($string) > $limit_length) {
            return strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
        }
        else {
            return strip_shortcodes(esc_html($string));
        }
    }


    /**
     * @param $post_author_id
     * @param int $size
     * @param string $args
     * @return false|mixed|void
     */
    public function get_the_author_avatar( $post_author_id, $size = '', $args = '' ) {

        $post_author_id = get_the_author_meta( 'user_email' );
        $post_author = get_avatar( $post_author_id, $size, '', '', $args );

        return $post_author;
    }


    /**
     * @param $html_data
     * @return mixed
     */
    public function html_return($html_data) {
        return $html_data;
    }


    /**
     * @param string  $content Text content to filter.
     * @return string Filtered content containing only the allowed HTML.
     */
    public function kses_post($content) {
        $allowed_tag = array(
            'strong' => [],
            'br' => [],
            'p' => [
                'class' => [],
                'style' => [],
            ],
            'i' => [
                'class' => [],
                'style' => [],
            ],
            'ul' => [
                'class' => [],
                'style' => [],
            ],
            'li' => [
                'class' => [],
                'style' => [],
            ],
            'span' => [
                'class' => [],
                'style' => [],
            ],
            'a' => [
                'href' => [],
                'class' => [],
                'title' => []
            ],
            'div' => [
                'class' => [],
                'style' => [],
            ],
            'h1' => [
                'class' => [],
                'style' => []
            ],
            'h2' => [
                'class' => [],
                'style' => []
            ],
            'h3' => [
                'class' => [],
                'style' => []
            ],
            'h4' => [
                'class' => [],
                'style' => []
            ],
            'h5' => [
                'class' => [],
                'style' => []
            ],
            'h6' => [
                'class' => [],
                'style' => []
            ],
            'img' => [
                'class' => [],
                'style' => [],
                'height' => [],
                'width' => [],
                'src' => [],
                'srcset' => [],
                'alt' => [],
            ],

        );
        return wp_kses($content, $allowed_tag);
    }




    /**
     * Event Tab data
     * @param $getCats
     * @param $event_schedule_cats
     * @return array
     */
    public function return_tab_data( $getCats, $event_schedule_cats ) {
        $y = [];
        foreach ( $getCats as $val ) {

            $t = [];
            foreach( $event_schedule_cats as $data ) {
                if( $data['tab_title'] == $val ) {
                    $t[] = $data;
                }
            }
            $y[$val] = $t;
        }

        return $y;
    }


    public function get_percentage_sale_price ($original_price = 100, $sale_price = 50) {

        $old_price = $original_price;
        $current_price = $sale_price;
        $percent  = ($old_price - $current_price ) * 100 / $old_price;

        return $percent;

    }


}


/**
 * Instance of Helper_Core_Helper_Class class
 */
function Hostimg_Core_Helper() {
    return Hostimg_Core_Helper::instance();
}