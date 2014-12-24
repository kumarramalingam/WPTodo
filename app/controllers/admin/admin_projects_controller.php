<?php
class AdminProjectsController extends MvcAdminController {	
	var $default_columns = array(
		'id',
		'user_id',
		'project_name',
		'state',
		'created',
		'modified'				
	);
	var $default_searchable_fields = array('project_name');
}

