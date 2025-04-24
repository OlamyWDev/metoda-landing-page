<?php
// Require widget files
require plugin_dir_path(__FILE__) . 'class-widget-recent-post.php';
require plugin_dir_path(__FILE__) . 'class-widget-contact-info.php';

// Register Widgets
add_action( 'widgets_init', function() {
    register_widget( 'HostimCore\WpWidgets\Widget_Recent_Posts');
    register_widget( 'HostimCore\WpWidgets\Widget_Contact_Info');
});