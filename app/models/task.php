<?php

class Task extends MvcModel {

	var $order = 'Task.task_name';
	var $display_field = 'task_name';
	/*var $wp_post = array(
		'post_type' => array(
			'fields' => array(
				'post_content' => 'task_name'
			)
		)
	);*/
	
	var $validate = array(
		// Use a custom regex for the validation
		'project_name' => 'not_empty',
		
		// Use a predefined rule (which includes a generalized message)
		'state' => 'not_empty',
		
		'created' => 'not_empty'					
	);
	public function after_find($object) {
		$object->name = trim($object->task_name);
	}
	
}
