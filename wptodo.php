<?php
/*
Plugin Name: WPTodo
Plugin URI: http://wordpress.org/extend/plugins/wp-mvc/
Description: An WPTodo application that uses the WP MVC plugin.
Author: Kumar Ramalingam
Version: 1.0
Author URI: 
*/

register_activation_hook(__FILE__, 'wptodo_activate');
register_deactivation_hook(__FILE__, 'wptodo_deactivate');

function wptodo_activate() {
    require_once dirname(__FILE__).'/wptodo_loader.php';
	$loader = new WptodoLoader();
	$loader->activate();
}

function wptodo_deactivate() {
	require_once dirname(__FILE__).'/wptodo_loader.php';
	$loader = new WptodoLoader();
	$loader->deactivate();
}

