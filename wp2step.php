<?php
/*
Plugin Name: WP 2 Step Authentication
Plugin URI: http://www.whereyoursolutionis.com
Description: Simple two step authentication for your wordpress site.   
Author: Innovative Solutions
Contributors:Scriptonite
Version:1.5
Author URI: http://www.whereyoursolutionis.com
*/
 


require(plugin_dir_path(__FILE__).'includes/functions.php');

add_action('admin_menu','CreateAnAdminMenu');

function CreateAnAdminMenu(){
add_options_page('WP 2 Step','WP 2 Step','manage_options','wp2step-settings','TheWP2StepSettings');
}
 

add_action('login_form','GetTheRequestLoginCode');
add_action( 'authenticate', 'pin_check', 10, 3 );
add_action('wp_footer','after_login_error');
add_action('admin_footer','after_login_error');
add_action( 'login_enqueue_scripts', 'wp2step_loginscripts', 1 );
add_action( 'init', 'wp2step_ispinrequest'); 
add_shortcode('wp2step_badge','WP2Step_badge');