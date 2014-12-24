<?php
class AdminTasksController extends MvcAdminController {	
	var $default_columns = array(
		'id',
		'user_id',
		'task_name',
		'state',
		'ordering',
		'due_date',
		'created',
		'modified',				
	);
	var $default_searchable_fields = array('task_name');
}

