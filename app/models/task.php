<?php

class Task extends MvcModel {

	var $order = 'Task.task_name';
	var $display_field = 'task_name';
	var $table = '{prefix}wptodo_tasks';
	var $includes = array('Project');
	var $belongs_to = array('Project');
		
	/*var $wp_post = array(
		'post_type' => array(
			'fields' => array(
				'post_content' => 'task_name'
			)
		)
	);*/
	
	var $validate = array(
		// Use a custom regex for the validation
		'task_name' => 'not_empty',
		
		// Use a predefined rule (which includes a generalized message)
		'state' => 'not_empty',
		
		'due_date' => 'not_empty',
		
		'created' => 'not_empty'					
	);
	public function after_find($object) {
		$object->name = trim($object->task_name);
	}
	
}
