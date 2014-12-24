<?php

MvcConfiguration::set(array(
	'Debug' => false
));

MvcConfiguration::append(array(
	'AdminPages' => array(
		'Projects' => array(
			'add',
			'delete',
			'edit'
		),
		'Tasks' => array(
			'add',
			'delete',
			'edit'
		)
	)
));

add_action('mvc_admin_init', 'wptodo_on_mvc_admin_init');

function wptodo_on_mvc_admin_init($options) {
	wp_register_style('mvc_admin', mvc_css_url('wptodo', 'admin'));
	wp_enqueue_style('mvc_admin');
}
