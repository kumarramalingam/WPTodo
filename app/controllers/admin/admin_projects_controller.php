<?php
class AdminProjectsController extends MvcAdminController {	
	var $default_columns = array(
		'id',
		'project_name',
		'state',
		'created',
		'modified'				
	);
	var $default_searchable_fields = array('project_name');
	//var $table = '{prefix}wptodo_projects';
	var $primary_key = 'id';
}

