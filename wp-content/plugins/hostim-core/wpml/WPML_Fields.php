<?php
if (!defined('ABSPATH'))
    die('-1');


/**
 * Include WPML Widgets file path
 */
require_once __DIR__ . '/widgets/About.php';
require_once __DIR__ . '/widgets/Button.php';
require_once __DIR__ . '/widgets/Domain_Form.php';
require_once __DIR__ . '/widgets/Domain_Price.php';
require_once __DIR__ . '/widgets/Dual_Tab_Pricing.php';
require_once __DIR__ . '/widgets/Games.php';
require_once __DIR__ . '/widgets/Heading.php';
require_once __DIR__ . '/widgets/Hero_Static.php';
require_once __DIR__ . '/widgets/Menu_Item.php';
require_once __DIR__ . '/widgets/Newsletter.php';
require_once __DIR__ . '/widgets/Pricing.php';
require_once __DIR__ . '/widgets/Pricing_Single.php';
require_once __DIR__ . '/widgets/Pricing_Slider.php';
require_once __DIR__ . '/widgets/Registration_Form.php';
require_once __DIR__ . '/widgets/Service.php';
require_once __DIR__ . '/widgets/Table_Features.php';
require_once __DIR__ . '/widgets/Table_Title.php';
require_once __DIR__ . '/widgets/Testimonials.php';
require_once __DIR__ . '/widgets/Upcoming_Match.php';


/**
 * Register WPML Widgets fields
 */
$widgets_map = [

    /**
     * Name: About Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-about' => [
        'fields' => [
            [
                'field' => 'title_text',
                'type' => __('Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\About',
    ],


    /**
     * Name: Button Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-button' => [
        'fields' => [
            [
                'field' => 'btn_label',
                'type' => __('Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Button',
    ],


    /**
     * Name: Domain Form Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-domain-form' => [
        'fields' => [
            [
                'field' => 'title',
                'type' => __('Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'placeholder_input',
                'type' => __('Placeholder Input Text', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Domain_Form',
    ],


    /**
     * Name: Domain Price Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-domain-price' => [
        'fields' => [
            [
                'field' => 'extension_text',
                'type' => __('Extension Text', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'priod_text',
                'type' => __('Duration Text', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'btn_label',
                'type' => __('Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Domain_Price',
    ],


    /**
     * Name: Dual Tab Pricing Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-dual-tab-pricing' => [
        'fields' => [
            [
                'field' => 'pricing_heading',
                'type' => __('Heading Text', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'pricing_subtitle',
                'type' => __('Heading Subtitle', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Dual_Tab_Pricing',
    ],


    /**
     * Name: Games Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-games' => [
        'fields' => [
            [
                'field' => 'game_title',
                'type' => __('Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'game_desc',
                'type' => __('Description', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Games',
    ],


    /**
     * Name: Heading Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-heading' => [
        'fields' => [
            [
                'field' => 'heading',
                'type' => __('Heading Text', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Heading',
    ],


    /**
     * Name: Hero Static Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-hero-static' => [
        'fields' => [
            [
                'field' => 'title',
                'type' => __('Title', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'description',
                'type' => __('Description', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'btn_text',
                'type' => __('Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'btn_2_text',
                'type' => __('Button Two Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'sec_btn_text',
                'type' => __('Secondary Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'uc_title',
                'type' => __('User Count Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'uc_title_sufix',
                'type' => __('Title Suffix', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'uc_subtitle',
                'type' => __('User Count Subtitle', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'bf_btn_text',
                'type' => __('Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Hero_Static',
    ],


    /**
     * Name: Menu Item Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-menu-item' => [
        'fields' => [
            [
                'field' => 'serial_number',
                'type' => __('Number', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'box_title',
                'type' => __('Menu Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'description',
                'type' => __('Description', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Menu_Item',
    ],


    /**
     * Name: Newsletter Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-newsletter' => [
        'fields' => [
            [
                'field' => 'input_placeholder',
                'type' => __('Input Placeholder', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'subscribe_text',
                'type' => __('Button Text', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Newsletter',
    ],


    /**
     * Name: Pricing Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-pricing' => [
        'fields' => [
            [
                'field' => 'pricing_heading',
                'type' => __('Heading Text', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'pricing_subtitle',
                'type' => __('Heading Subtitle', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'monthly_title',
                'type' => __('Title Month', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'anual_title',
                'type' => __('Title Annual', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Pricing',
    ],


    /**
     * Name: Pricing Single Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-pricing-single' => [
        'fields' => [
            [
                'field' => 'plan_title',
                'type' => __('Plan Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'sub_title',
                'type' => __('Sub Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'saved_badge',
                'type' => __('Package Saved', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'currency',
                'type' => __('Currency', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'period',
                'type' => __('Period', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'plan_desc',
                'type' => __('Short Description', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'purchase_btn_label',
                'type' => __('Purchase Button Monthly Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Pricing_Single',
    ],


    /**
     * Name: Pricing Slider Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-pricing-slider' => [
        'fields' => [
            [
                'field' => 'section_title',
                'type' => __('Section Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'btn_label',
                'type' => __('Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Pricing_Slider',
    ],



    /**
     * Name: Registration Form Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-registation-form' => [
        'fields' => [
            [
                'field' => 'email_placeholder',
                'type' => __('Email Placeholder', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'email_name',
                'type' => __('Email Name', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'password_placeholder',
                'type' => __('Password Placeholder', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'pass_name',
                'type' => __('Password Name', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'submit_label',
                'type' => __('Submit Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Registration_Form',
    ],


    /**
     * Name: Service Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-services' => [
        'fields' => [
            [
                'field' => 'view_more',
                'type' => __('View More Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Service',
    ],


    /**
     * Name: Table Features Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim_table_features' => [
        'fields' => [
            [
                'field' => 'features_title',
                'type' => __('Features Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
            [
                'field' => 'tab_title',
                'type' => __('Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Table_Features',
    ],


    /**
     * Name: Table Title Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim_table_title' => [
        'fields' => [
            [
                'field' => 'features_title',
                'type' => __('Features Title', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Table_Title',
    ],


    /**
     * Name: Testimonials Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-testimonial' => [
        'fields' => [
            [
                'field' => 'sec_heading',
                'type' => __('Heading Text', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'sec_short_desc',
                'type' => __('Short Description', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'btn_label',
                'type' => __('Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Testimonials',
    ],


    /**
     * Name: Upcoming Match Widget
     * Desc: Register wpml fields for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    'hostim-upcoming-match' => [
        'fields' => [
            [
                'field' => 'sec_heading',
                'type' => __('Heading', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'sub_heading',
                'type' => __('Sub Heading', 'hostim-core'),
                'editor_type' => 'AREA'
            ],
            [
                'field' => 'btn_label',
                'type' => __('Button Label', 'hostim-core'),
                'editor_type' => 'LINE'
            ],
        ],
        'integration-class' => 'HostimCore\WPML\Upcoming_Match',
    ],
    

];

/**
 * Widgets Loop
 */
foreach ( $widgets_map as $widget_name => $data ) {
    $entry = [
        'conditions' => [
            'widgetType' => $widget_name
        ],
        'fields' => $data['fields'],
    ];

    if ( isset( $data['integration-class'] ) ) {
        $entry['integration-class'] = $data['integration-class'];
    }

    $widgets[ $widget_name ] = $entry;
}
