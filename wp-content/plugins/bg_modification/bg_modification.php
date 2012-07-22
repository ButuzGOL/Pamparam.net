<?php
/*
Plugin Name: BG Modification
Plugin URI: http://www.pamparam.net
Description: Make some modification
Version: 1.0
Author: ButuzGOL
Author URI: http://www.pamparam.net
License: GPLv2
*/

function bgm_my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".plugin_dir_url( __FILE__ )."/images/logo-login.png') no-repeat scroll center top transparent;
		height: 128px;
		width: 320px;
	}
	</style>
	";
}
add_action("login_head", "bgm_my_login_head");

add_filter( 'login_headerurl', 'bgm_login_headerurl');
function bgm_login_headerurl(){
	return home_url('/');
}

register_activation_hook( __FILE__, 'bgm_activate' );
function bgm_activate() {
	bgm_login_url_rewrite();
	flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'bgm_deactivate' );
function bgm_deactivate() {
	flush_rewrite_rules();
}

// Create new rewrite rule
add_action( 'init', 'bgm_login_url_rewrite' );
function bgm_login_url_rewrite() {
	add_rewrite_rule( 'hellosyava/?$', 'wp-login.php', 'top' );
}