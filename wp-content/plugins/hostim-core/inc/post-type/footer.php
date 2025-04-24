<?php
if(!function_exists('hostim_create_type_footer')  ){
    function hostim_create_type_footer(){
		register_post_type( 'hostim_footer',
		array(
			  'labels' => array(
				'name' => __( 'Footer','hostim-core' ),
				'singular_name' => __( 'Footer','hostim-core' )
			  ),
			  'public' => true,
			  'has_archive' => true,
			  'rewrite' => array('slug' => 'footers'),
			  'menu_position' => 20,
			  'show_in_menu' => true,
			  'supports' => ['title', 'elementor']
		)
		);

		if($tt_js_content_types = get_option('tt_js_content_types')){
			if(!in_array('hostim_footer',$tt_js_content_types)){
			  $tt_js_content_types[] = 'hostim_footer';


			}
			$options[] = 'hostim_footer';
			update_option( 'tt_js_content_types',$tt_js_content_types );
		}else{
			$options = array('page','hostim_footer');
		}
	}
	add_action( 'init','hostim_create_type_footer',2 );
}
