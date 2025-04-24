<?php
//Add Image Size
add_image_size('hostim_40x40', 40, 40, true);
add_image_size('blog_580x340', 580, 340, true);
add_image_size('blog_175x150', 175, 150, true);
add_image_size('blog_420x250', 420, 250, true);
add_image_size('blog_746x500', 746, 500, true);
add_image_size('blog_155x134', 155, 134, true);
add_image_size('pricing_60x60', 60, 60, true);
add_image_size('gproduct_210x160', 210, 160, true);
add_image_size('blog_425x300', 425, 300, true);
add_image_size('hostim_545x545', 545, 545, true); //Team Member Image Size
add_image_size('hostim_560x330', 560, 330, true); //Blog 07 Image Size
add_image_size('hostim_70x50', 70, 50, true); //Service Faqs Tabs Image size


function wdes_get_currency_symbol()
{
    $symbols = [
        'AED' => 'د.إ',
        'Albanian lek' => 'L',
        'Afghanistan Afghani' => '&#1547;',
        'Argentine Peso' => '&#36;',
        'Aruban florin' => '&#402;',
        'Australian Dollar' => '&#65;&#36;',
        'Azerbaijani Manat' => '&#8380;',
        'Bahamas Dollar' => '&#66;&#36;',
        'Barbados Dollar' => '&#66;&#100;&#115;&#36;',
        'Bangladeshi taka' => '&#2547;',
        'Belarus Ruble' => '&#66;&#114;',
        'Belize Dollar' => '&#66;&#90;&#36;',
        'Bermudian Dollar' => '&#66;&#68;&#36;',
        'Boliviano' => '&#66;&#115;',
        'Bosnia-Herzegovina Convertible Marka' => '&#75;&#77;',
        'Botswana pula' => '&#80;',
        'Bulgarian lev' => '&#1083;&#1074;',
        'Brazilian real' => '&#82;&#36;',
        'Brunei dollar' => '&#66;&#36;',
        'Cambodian riel' => '&#6107;',
        'Canadian dollar' => '&#67;&#36;',
        'Cayman Islands dollar' => '&#36;',
        'Chilean peso' => '&#36;',
        'Chinese Yuan Renminbi' => '&#165;',
        'Colombian peso' => '&#36;',
        'Costa Rican colón' => '&#8353;',
        'Croatian kuna' => '&#107;&#110;',
        'Cuban peso' => '&#8369;',
        'Czech koruna' => '&#75;&#269;',
        'Danish krone' => '&#107;&#114;',
        'Dominican peso' => '&#82;&#68;&#36;',
        'Eastern Caribbean dollar' => '&#36;',
        'Egyptian pound' => '&#163;',
        'Salvadoran colón' => '&#36;',
        'Estonian kroon' => '&#75;&#114;',
        'Euro' => '&euro;',
        'Falkland Islands (Malvinas) Pound' => '&#70;&#75;&#163;',
        'Fijian dollar' => '&#70;&#74;&#36;',
        'Ghanaian cedi' => '&#71;&#72;&#162;',
        'Gibraltar pound' => '&#163;',
        'Guatemalan quetzal' => '&#81;',
        'Guernsey pound' => '&#81;',
        'Guyanese dollar' => '&#71;&#89;&#36;',
        'Honduran lempira' => '&#76;',
        'Hong Kong dollar' => '&#72;&#75;&#36;',
        'Hungarian forint' => '&#70;&#116;',
        'Icelandic króna' => '&#237;&#107;&#114;',
        'Indian rupee' => '&#8377;',
        'Indonesian rupiah' => '&#82;&#112;',
        'Iranian rial' => '&#65020;',
        'Manx pound' => '&#163;',
        'Israeli Shekel' => '&#8362;',
        'Jamaican dollar' => '&#74;&#36;',
        'Japanese yen' => '&#165;',
        'Jersey pound' => '&#163;',
        'Kazakhstani tenge' => '&#8376;',
        'North Korean won' => '&#8361;',
        'South Korean won' => '&#8361;',
        'Kyrgyzstani som' => '&#1083;&#1074;',
        'Lao kip' => '&#8365;',
        'Latvian lats' => '&#8364;',
        'Lebanese pound' => '&#76;&#163;',
        'Liberian dollar' => '&#76;&#68;&#36;',
        'Lithuanian litas' => '&#8364;',
        'Macedonian denar' => '&#1076;&#1077;&#1085;',
        'Malaysian ringgit' => '&#82;&#77;',
        'Mauritian rupee' => '&#82;&#115;',
        'Mexican peso' => '&#77;&#101;&#120;&#36;',
        'Mongolian tögrög' => '&#8366;',
        'Mozambican metical' => '&#77;&#84;',
        'Namibian dollar' => '&#78;&#36;',
        'Nepalese rupee' => '&#82;&#115;&#46;',
        'Netherlands Antillean guilder' => '&#402;',
        'New Zealand dollar' => '&#36;',
        'Nicaraguan córdoba' => '&#67;&#36;',
        'Nigerian naira' => '&#8358;',
        'Norwegian krone' => '&#107;&#114;',
        'Omani rial' => '&#65020;',
        'Pakistani rupee' => '&#82;&#115;',
        'Panamanian balboa' => '&#66;&#47;&#46;',
        'Paraguayan Guaraní' => '&#8370;',
        'Philippine peso' => '&#8369;',
        'Polish złoty' => '&#122;&#322;',
        'Pound sterling' => '&#163;',
        'Qatari Riyal' => '&#65020;',
        'Romanian leu (Leu românesc)' => '&#76;',
        'Russian ruble' => '&#8381;',
        'Saint Helena pound' => '&#163;',
        'Saudi riyal' => '&#65020;',
        'Serbian dinar' => '&#100;&#105;&#110;',
        'Seychellois rupee' => '&#82;&#115;',
        'Singapore dollar' => '&#83;&#36;',
        'Sol' => '&#83;&#47;&#46;',
        'Solomon Islands dollar' => '&#83;&#73;&#36;',
        'Somali shilling' => '&#83;&#104;&#46;&#83;&#111;',
        'South African rand' => '&#82;',
        'Sri Lankan rupee' => '&#82;&#115;',
        'Swedish krona' => '&#107;&#114;',
        'Swiss franc' => '&#67;&#72;&#102;',
        'Suriname Dollar' => '&#83;&#114;&#36;',
        'Syrian pound' => '&#163;&#83;',
        'New Taiwan dollar' => '&#78;&#84;&#36;',
        'Thai baht' => '&#3647;',
        'Trinidad and Tobago dollar' => '&#84;&#84;&#36;',
        'Turkey Lira' => '&#8378;',
        'Tuvaluan dollar' => '&#84;&#86;&#36;',
        'Ukrainian hryvnia' => '&#8372;',
        'Ugandan shilling' => '&#85;&#83;&#104;',
        'United States dollar' => '&#36;',
        'Peso Uruguayolar' => '&#36;&#85;',
        'Uzbekistani soʻm' => '&#1083;&#1074;',
        'Venezuelan bolívar' => '&#66;&#115;',
        'Vietnamese dong (Đồng)' => '&#8363;',
        'Yemeni rial' => '&#65020;',
        'Zimbabwean dollar' => '&#90;&#36;',
    ];
    ksort($symbols);

    return $symbols;
}


function hostim_addons_get_contact_form7_forms()
{
    $forms = get_posts('post_type=wpcf7_contact_form&posts_per_page=-1');

    $results = array();
    if ($forms) {
        $results[] = __('Select A Form', 'hostim-core');
        foreach ($forms as $form) {
            $results[$form->ID] = $form->post_title;
        }
        // array_unshift( $results, __( 'Select A Form', 'hostim-core' ) );
        // $results[] = __( 'Select A Form', 'hostim-core' );
    } else {
        $results[] =  __('No contact forms found', 'hostim-core');
    }

    return $results;
}

//Add extra profile information
add_action('show_user_profile', 'plugin_name_extra_user_profile_fields');
add_action('edit_user_profile', 'plugin_name_extra_user_profile_fields');

function plugin_name_extra_user_profile_fields($user)
{ ?>
    <h3><?php esc_html_e("Extra profile information", 'hostim-core'); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="facebook"><?php esc_html_e("Facebook", 'hostim-core'); ?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e("Please enter your facebook url.", 'hostim-core'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter"><?php esc_html_e("Twitter", 'hostim-core'); ?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e("Please enter your twitter url.", 'hostim-core'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="linkedin"><?php esc_html_e("Linkedin", 'hostim-core'); ?></label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e("Please enter your linkedin url.", 'hostim-core'); ?></span>
            </td>
        </tr>

        <tr>
            <th><label for="instagram"><?php esc_html_e("Instagram", 'hostim-core'); ?></label></th>
            <td>
                <input type="text" name="instagram" id="instagram" value="<?php echo esc_attr(get_the_author_meta('instagram', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e("Please enter your instagram url.", 'hostim-core'); ?></span>
            </td>
        </tr>
    </table>
    <?php }

add_action('personal_options_update', 'plugin_name_save_extra_user_profile_fields');
add_action('edit_user_profile_update', 'plugin_name_save_extra_user_profile_fields');

function plugin_name_save_extra_user_profile_fields($user_id)
{
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    update_user_meta($user_id, 'instagram', $_POST['instagram']);
    update_user_meta($user_id, 'facebook', $_POST['facebook']);
    update_user_meta($user_id, 'linkedin', $_POST['linkedin']);
    update_user_meta($user_id, 'twitter', $_POST['twitter']);
}

/** Hostim Kses Post */
if (!function_exists('hostim_kses_post')) {
    function hostim_kses_post($content)
    {
        $allowed_tag = array(
            'strong' => [],
            'p'      => [],
            'span'   => [
                'class' => [],
                'style' => []
            ],
            'br'     => [],
            'a'      => [
                'href'  => [],
                'class' => [],
                'id'    => [],
                'target' => [],
            ],
            'img'      => [
                'src'   => [],
                'srcset' => [],
                'width' => [],
                'height' => [],
                'class' => [],
                'alt'   => [],
            ],
            'div'   => [
                'class' => [],
                'style' => []
            ],
            'h1'    => [
                'class' => [],
                'style' => []
            ],
            'h2'    => [
                'class' => [],
                'style' => []
            ],
            'h3'    => [
                'class' => [],
                'style' => []
            ],
            'h4'    => [
                'class' => [],
                'style' => []
            ],
            'h5'    => [
                'class' => [],
                'style' => []
            ],
            'h6'    => [
                'class' => [],
                'style' => []
            ],
            'mark'    => [
                'class' => [],
                'style' => []
            ],
            'sup'    => [
                'class' => [],
                'style' => []
            ],
            'sub'    => [
                'class' => [],
                'style' => []
            ],
            'ul'    => [
                'class' => [],
                'style' => []
            ],
            'li'    => [
                'class' => [],
                'style' => []
            ],
            's'    => [
                'class' => [],
                'style' => []
            ],
            'del'    => [
                'class' => [],
                'style' => []
            ],
        );
        return wp_kses($content, $allowed_tag);
    }
}

add_action('wp_ajax_nopriv_pt_like_it', 'pt_like_it');
add_action('wp_ajax_pt_like_it', 'pt_like_it');
function pt_like_it()
{

    if (!wp_verify_nonce($_REQUEST['nonce'], 'pt_like_it_nonce') || !isset($_REQUEST['nonce'])) {
        exit("No naughty business please");
    }

    $likes = get_post_meta($_REQUEST['post_id'], '_pt_likes', true);
    $likes = (empty($likes)) ? 0 : $likes;
    $new_likes = $likes + 1;

    update_post_meta($_REQUEST['post_id'], '_pt_likes', $new_likes);

    if (defined('DOING_AJAX') && DOING_AJAX) {
        echo $new_likes;
        die();
    } else {
        wp_redirect(get_permalink($_REQUEST['post_id']));
        exit();
    }
}

// Post Like
function like_it_button_html($post_id)
{

    $like_text = '';

    $nonce = wp_create_nonce('pt_like_it_nonce');
    $link = admin_url('admin-ajax.php?action=pt_like_it&post_id=' . $post_id . '&nonce=' . $nonce);
    $likes = get_post_meta($post_id, '_pt_likes', true);
    $likes = (empty($likes)) ? 0 : $likes;
    $like_text = '
                    <div class="pt-like-it">
                        <a class="like-button" href="' . $link . '" data-id="' . $post_id . '" data-nonce="' . $nonce . '"><i class="fa-solid fa-heart"></i><span id="like-count-' . $post_id . '" class="like-count">' . $likes . '</span>' .
        __(' Likes') .
        '</a>
                        
                    </div>';

    return $like_text;
}

// Tab Return Data
function return_tab_data($getCats, $event_schedule_cats, $tab_title)
{
    $y = [];
    foreach ($getCats as $val) {

        $t = [];
        foreach ($event_schedule_cats as $data) {
            if ($data[$tab_title] == $val) {
                $t[] = $data;
            }
        }
        $y[str_replace(' ', '_', $val)] = $t;
    }

    return $y;
}

// Category array
function hostim_cat_array($term = 'category')
{
    $cats = get_terms(array(
        'taxonomy' => $term,
        'hide_empty' => false
    ));

    $cat_array = [];
    foreach ($cats as $cat) {
        $cat_array[$cat->term_id] = $cat->name;
    }
    return $cat_array;
}

// Post Time Ago
function hostim_get_post_time_ago()
{
    return human_time_diff(get_the_time('U'), current_time('timestamp')) . esc_html__(' ago', 'hostim-core');
}

/**
 * Add Post ID to Post Row Action
 */

function custom_post_action_links($actions, $post)
{

    if ($post->post_type == 'services') {

        $actions['custom'] = '<span>Post ID: ' . $post->ID . '</span>';
    }

    return $actions;
}
add_filter('post_row_actions', 'custom_post_action_links', 100, 2);


/* Contact Form Content Filter */
add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});


/**
 * Remove extra p tag from Contact form 7
 */
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * @return string[]
 * Render html Title Tag
 */
function hostim_el_get_title_tag()
{

    $tag = [
        'h1' => 'H1',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6',
        'div' => 'div',
        'span' => 'span',
        'p' => 'p',
    ];

    return $tag;
}


/**
 * Add additional shape dividers to Elementor.
 *
 * @since 1.0.0
 * @param array $additional_shapes Additional Elementor shape dividers.
 */
function hostim_elementor_shape_dividers($additional_shapes)
{

    $additional_shapes['shape-divider-triangle'] = [
        'title'        => esc_html__('Triangle (Theme)', 'hostim-core'),
        'url'          => HOSTIM_PLUGIN_ASSETS_URL . 'el-shapes-divider/triangle.svg',
        'path'         => HOSTIM_CORE_DIR . 'assets/el-shapes-divider/triangle.svg',
        'has_flip'     => true,
        'has_negative' => true,
    ];
    $additional_shapes['shape-divider-cloud'] = [
        'title'        => esc_html__('Cloud (Theme)', 'hostim-core'),
        'url'          => HOSTIM_PLUGIN_ASSETS_URL . 'el-shapes-divider/cloud.svg',
        'path'         => HOSTIM_CORE_DIR . 'assets/el-shapes-divider/cloud.svg',
        'has_flip'     => true,
        'has_negative' => false,
    ];

    return $additional_shapes;
}

add_filter('elementor/shapes/additional_shapes', 'hostim_elementor_shape_dividers');



/**
 * @param $settings
 * @param $settings_key
 * @return string
 */
function hostim_el_ratting($settings, $settings_key)
{

    for ($i = 1; $i <= 5; $i++) {
        if ($i > $settings[$settings_key]) {
            echo '<li><i class="fa-regular fa-star"></i></li>';
        } else {
            echo '<li><i class="fa-solid fa-star"></i></li>';
        }
    }
}

/**
 * Text sanitizer for elements
 *
 * @param [type] $title
 * @return string
 */
function hostim_text_sanitizer($title)
{
    if ($title) {
        $strip_tags = strip_tags($title);
        $pattern = '/[-\s&]+/';
        $sanitized_title = preg_replace($pattern, '_', $strip_tags);

        return strtolower($sanitized_title);
    }
}

function animation_timing_function()
{
    $animation_name = array(
        'ease'      => __('Ease', 'hostim-core'),
        'ease-in'   => __('Ease In', 'hostim-core'),
        'ease-out'  => __('Ease Out', 'hostim-core'),
        'ease-in-out' => __('Ease In Out', 'hostim-core'),
        'linear'    => __('Linear', 'hostim-core'),
        'step-start' => __('Step Start', 'hostim-core'),
        'step-end'  => __('Step End', 'hostim-core'),
        'inherit'   => __('Inherit', 'hostim-core'),
        'initial'   => __('Initial', 'hostim-core'),
        'revert'    => __('Revert', 'hostim-core'),
        'revert-layer' => __('Revert Layer', 'hostim-core'),
        'unset'     => __('Unset', 'hostim-core'),
    );

    return $animation_name;
}


/**
 * Swiper Slider attrebutes
 */
if (!function_exists('hostim_swiper_attrebutes')) {
    function hostim_swiper_attrebutes( $perpage, $loop, $autoplay, $slidedelay, $slidespeed, $itemspace, $tablet_items="2", $show_items_mobile="1" )
    {
        
        $carousel_loop = $loop == 'yes' ? 'true' : 'false';
        $dataAutoplay  = $autoplay == 'yes' ? 'true' : 'false';
        $dataDelay     = $autoplay == 'yes' ? 'data-delay="'. esc_attr($slidedelay) .'" ' : '';

        $attributes = 'data-perpage="' . esc_attr($perpage) . '" data-loop="' . esc_attr($carousel_loop) . '" 
            data-autoplay="' . esc_attr($dataAutoplay) . '" ' . $dataDelay . ' data-speed="'. esc_attr($slidespeed) .'" data-space="'. esc_attr($itemspace) .'"
            data-breakpoints="{"1440": {"slidesPerView": '.esc_attr($perpage) .'},"1024": {"slidesPerView":'. esc_attr($perpage) .'}, "768": {"slidesPerView": '. esc_attr($tablet_items) .'}, "360": {"slidesPerView": '.esc_attr($show_items_mobile) .'}}';

        return $attributes;
    }
}


/**
 * Get Percentage
 * @param $regular_price
 * @param $sale_price
 * @return string
 */
if (!function_exists('hostim_get_percentage')) {
    function hostim_get_percentage($regular_price, $sale_price, $after_dot = 2)
    {
        if (!empty($regular_price) && !empty($sale_price)) {
            $save = $regular_price - $sale_price;
            $perecntagesaved = ($save / $regular_price) * 100;

            $customExplode = customExplode($perecntagesaved, '.', 1, $after_dot);
            return  $customExplode . '%';
        }
    }
}


/**
 * Custom Explode
 * @param $originalValue
 * @param $explodeWith
 * @param $indexNo
 * @param $afterDot
 * @return array
 */
if (!function_exists('customExplode')) {
    function customExplode($originalValue, $explodeWith = '.', $indexNo = null, $afterDot = null)
    {
        // Explode the original value by the specified delimiter
        $explodeValue = explode($explodeWith, $originalValue);

        // If the exploded value has more than one part (i.e., it was split)
        if (count($explodeValue) > 1) {
            // If afterDot is not specified, we handle number formatting based on indexNo
            if (is_null($afterDot)) {
                // Default indexNo to 0 if not specified
                $indexNo = is_null($indexNo) ? 0 : $indexNo;

                // Get the value at the specified index
                $afterDotValue = $explodeValue[$indexNo];

                // If the value after the dot is 0, return the integer part
                if ($afterDotValue == 0) {
                    return $explodeValue[0];
                }

                // Format the number with default or specified decimal places
                $afterDot = is_null($afterDot) ? 2 : $afterDot;

                return number_format($originalValue, $afterDot);
            }

            // If afterDot is specified, format the number accordingly
            if (!is_null($afterDot)) {
                return number_format((float)$originalValue, $afterDot);
            }
        }

        // If the exploded value doesn't have more than one part or no special handling is needed
        return $originalValue;
    }
}

/**
 * WHMCS URL build
 */
if( !function_exists('hostim_whmcs_url_build') ){
    function hostim_whmcs_url_build($domain) {
        $theme_option     = get_option('hostim_cs_options');
        $whmcs_portal_url = !empty($theme_option['whmcs_portal_url']) ? $theme_option['whmcs_portal_url'] : '';
        $portal_url       = esc_url($whmcs_portal_url) . '/cart.php?systpl=hostim&carttpl=themetags_cart&a=add&domain=register&query=' . $domain;
        return $portal_url;
    }
}