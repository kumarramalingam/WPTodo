<?php
class AdminTasksController extends AdminController {	
	
	var $default_search_joins = array('Project');
	var $default_columns = array(
		'id',
		'project' => array('value_method' => 'project_edit_link'),
		'task_name',
		'state',
		'ordering',
		'due_date',
		'created',
		'modified'
	);
	var $default_searchable_fields = array('Project.project_name');
	var $table = '{prefix}wptodo_tasks';
	var $primary_key = 'id';
	
	/**
	 * Add new task in the projects.
	 */ 
	public function add() {			
		$this->set_projects();
		$this->create_or_save();	
	}

    /**
     * Edit task in the projects.
     */ 
	public function edit() {		
		$this->set_projects();
		$this->verify_id_param();
		$this->set_object();
		$this->create_or_save();
	}
	
	/**
	 * set the projects list in the task view.
	 */ 
	private function set_projects() {	
		$this->load_model('Project');
		$projects = $this->Project->find(array('selects' => array('id', 'project_name')));
		$this->set('projects', $projects);	
	}
	
	
	public function project_edit_link($object) {
		return empty($object->project) ? null : HtmlHelper::admin_object_link($object->project, array('action' => 'edit'));
	}	
}

