<?php

class Project extends MvcModel {

	var $order = 'Project.project_name';
	var $display_field = 'project_name';
	var $table = '{prefix}wptodo_projects';
		
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
		$object->name = trim($object->project_name);
	}	
}
