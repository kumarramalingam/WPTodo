<?php

class ProjectsController extends MvcPublicController {

	// Overwrite the default index() method to include the 'is_public' => true condition
	public function index() {
	
		$this->params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
		
		$this->params['conditions'] = array('is_public' => true);
		
		$collection = $this->model->paginate($this->params);
		
		$this->set('objects', $collection['objects']);
		$this->set_pagination($collection);
	
	}
		
	public function show() {
		$this->load_model('Project');
		$projects = $this->Project->find();
    }	
}
