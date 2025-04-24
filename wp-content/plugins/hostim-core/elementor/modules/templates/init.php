<?php
namespace HOSTIM_ELEMENTOR\Templates;

defined('ABSPATH') || die();

class DL_Templates {
    private static $instance = null;

    public static function url(){

        if (defined('TT_ELEMENTOR_ADDONS_FILE')) {
            $file = trailingslashit(plugin_dir_url( TT_ELEMENTOR_ADDONS_FILE )). 'modules/templates/';
        } else {
            $file = trailingslashit(plugin_dir_url( __FILE__ ));
        }
        
        return $file;
    }

    public static function dir(){
        if (defined('TT_ELEMENTOR_ADDONS_FILE')) {
            $file = trailingslashit(plugin_dir_path( TT_ELEMENTOR_ADDONS_FILE )). 'modules/templates/';
        } else {
            $file = trailingslashit(plugin_dir_path( __FILE__ ));
        }
        return $file;
    }

    public static function version(){
        if( defined('HOSTIM_ADDONS_VERSION_') ){
            return HOSTIM_ADDONS_VERSION_;
        }
        
    }

    public function init() {
        
        add_action( 'wp_enqueue_scripts', function() {       
            wp_enqueue_style( "tt-el-template-front", self::url() . 'assets/css/template-frontend.min.css' , ['elementor-frontend'], self::version() );  
            
        });
        
        add_action( 'elementor/editor/after_enqueue_scripts', function() { 
            wp_enqueue_style( "hostim-template-editor", self::url() . 'assets/css/template-library.min.css' , ['elementor-editor'], self::version() );  
            wp_enqueue_script("hostim-template-editor", self::url() . 'assets/js/template-library.min.js', ['elementor-editor'], self::version(), true); 
            
            
            $localize_data = [
                'templateLogo'                    => self::url() . 'assets/template_logo.svg',
                'i18n' => [
                    'templatesEmptyTitle'       => esc_html__( 'No Templates Found', 'hostim-core' ),
                    'templatesEmptyMessage'     => esc_html__( 'Try different category or sync for new templates.', 'hostim-core' ),
                    'templatesNoResultsTitle'   => esc_html__( 'No Results Found', 'hostim-core' ),
                    'templatesNoResultsMessage' => esc_html__( 'Please make sure your search is spelled correctly or try a different words.', 'hostim-core' ),
                ],
                'tab_style' => json_encode(self::get_tabs()),
                'default_tab' => 'section'
            ];
            wp_localize_script(
                'hostim-template-editor',
                'hostimEditor',
                $localize_data
            );

        } );

        add_action( 'elementor/preview/enqueue_styles', function(){
            $data = '.elementor-add-new-section .dl_templates_add_button {
                background: linear-gradient(45deg, #0082F8, #00C0FD);
                display: flex;
                justify-content: center;
            }
            ';
            wp_add_inline_style( 'tt-el-template-front', $data );
        } );
    }

    public static function get_tabs(){
        return apply_filters('dl_editor/templates_tabs', [
            'section' => [ 'title' => 'Blocks'],
            'page' => [ 'title' => 'Ready Pages'],
        ]);
    }
    public static function instance(){
        if( is_null(self::$instance) ){
            self::$instance = new self();
        }
        return self::$instance;
    }
}

