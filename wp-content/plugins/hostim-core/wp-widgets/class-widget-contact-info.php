<?php
namespace HostimCore\WpWidgets;
use WP_Widget;

/**
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Categories widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Widget_Contact_Info extends WP_Widget {

    /**
     * Sets up a new Categories widget instance.
     *
     * @since 2.8.0
     */
    public function __construct() {
        $widget_ops = array(
            'classname'                   => 'banner-widget',
            'description'                 => __( 'Contact information' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'widgets_contact_info', esc_html__( 'Contact Info (Theme)', 'hostim-core' ), $widget_ops );

    }

    /**
     * Outputs the content for the current Categories widget instance.
     *
     * @since 2.8.0
     * @since 4.2.0 Creates a unique HTML ID for the `<select>` element
     *              if more than one instance is displayed on the page.
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Categories widget instance.
     */
    public function widget( $args, $instance ) {

        $default_title = '';
        $title         = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;
        $contact_title = ! empty( $instance['contact_title'] ) ? $instance['contact_title'] : '';
        $contact_subtitle= ! empty( $instance['contact_subtitle'] ) ? $instance['contact_subtitle'] : '';
        $btn_label     = ! empty( $instance['btn_label'] ) ? $instance['btn_label'] : '';
        $btn_url       = ! empty( $instance['btn_url'] ) ? $instance['btn_url'] : '';
        $phone_number  = ! empty( $instance['phone_number'] ) ? $instance['phone_number'] : '';
        $background_image = ! empty($instance['bg_image'] ) ? 'url('. esc_url( $instance['bg_image'] ) .')' : 'linear-gradient(278.54deg, #001DAC 15.93%, #000F57 98.7%)';

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        ?>
        <div class="banner-content bg-primary-gradient rounded-2 text-center position-relative zindex-1 overflow-hidden" style="background: <?php echo esc_attr( $background_image ) ?>">
            <?php
            if( $contact_subtitle ){
                echo '<h6 class="text-white">'. esc_html( $contact_subtitle ) .'</h6>';
            }

            if( $contact_title ){
                echo '<h3 class="text-white mt-3">'. esc_html( $contact_title ) .'</h3>';
            }
            
            if( $btn_label ){
                echo '<a href="'. esc_url( $btn_url ) .'" class="template-btn primary-btn rounded-pill mt-20">'. esc_html( $btn_label ) .'</a>';
            }

            if( $phone_number ){ ?>
                <div class="banner-contact-info mt-30">
                    <span class="icon-wrapper rounded-circle text-white d-inline-flex align-items-center justify-content-center"><i class="fa-solid fa-phone"></i></span>
                    <h4><a href="tel:<?php echo esc_attr( $phone_number ) ?>" class="text-white mt-20 d-block">Call:<?php echo esc_html( $phone_number ) ?></a></h4>
                </div>
                <?php
            }
            ?>
        </div>

        <?php

        echo $args['after_widget'];
    }

    /**
     * Handles updating settings for the current Categories' widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field( $new_instance['title'] );
        $instance['contact_title']= ! empty( $new_instance['contact_title'] ) ? $new_instance['contact_title'] : '';
        $instance['contact_subtitle']= ! empty( $new_instance['contact_subtitle'] ) ? $new_instance['contact_subtitle'] : '';
        $instance['btn_label']    = ! empty( $new_instance['btn_label'] ) ? $new_instance['btn_label'] : '';
        $instance['btn_url']      = ! empty( $new_instance['btn_url'] ) ? $new_instance['btn_url'] : '#';
        $instance['phone_number'] = ! empty( $new_instance['phone_number'] ) ? $new_instance['phone_number'] : '';
        $instance['bg_image'] = ! empty( $new_instance['bg_image'] ) ? $new_instance['bg_image'] : '';
        
        return $instance;
    }

    /**
     * Outputs the settings form for the Categories widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {

        // Defaults.
        $instance     = wp_parse_args( (array) $instance, array(
            'title'             => '',
            'contact_title'     => '',
            'contact_subtitle'  => '',
            'btn_label'         => '',
            'btn_url'           => '',
            'phone_number'      => '',
            'bg_image'          => ''
        ) );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'contact_title' ); ?>"><?php _e( 'Contact Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'contact_title' ); ?>" name="<?php echo $this->get_field_name( 'contact_title' ); ?>" type="text" value="<?php echo esc_attr( $instance['contact_title'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'contact_subtitle' ); ?>"><?php _e( 'Contact SubTitle:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'contact_subtitle' ); ?>" name="<?php echo $this->get_field_name( 'contact_subtitle' ); ?>" type="text" value="<?php echo esc_attr( $instance['contact_subtitle'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'btn_label' ); ?>"><?php _e( 'Button Label:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'btn_label' ); ?>" name="<?php echo $this->get_field_name( 'btn_label' ); ?>" type="text" value="<?php echo esc_attr( $instance['btn_label'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'btn_url' ); ?>"><?php _e( 'Button URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'btn_url' ); ?>" name="<?php echo $this->get_field_name( 'btn_url' ); ?>" type="text" value="<?php echo esc_attr( $instance['btn_url'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'phone_number' ); ?>"><?php _e( 'Phone Number:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'phone_number' ); ?>" name="<?php echo $this->get_field_name( 'phone_number' ); ?>" type="text" value="<?php echo esc_attr( $instance['phone_number'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'bg_image' ); ?>"><?php _e( 'Background Image URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('bg_image' ); ?>" name="<?php echo $this->get_field_name('bg_image' ); ?>" type="url" value="<?php echo esc_attr( $instance['bg_image'] ); ?>" />
        </p>
   
        <?php
    }

}
