<?php

class AdminController extends MvcAdminController {
	
	public $_redirect_action = '';
	
	public function __construct() {
		if(empty($this->_redirect_action)) {
			$this->_redirect_action = 'index';
		}
		parent::__construct();
	}	

	public function create_or_save() {
		if (!empty($this->params['data'][$this->model->name])) {
		//	echo "Hello"; exit;
			$object = $this->params['data'][$this->model->name];
			if (empty($object['id'])) {
				$this->model->create($this->params['data']);
				$id = $this->model->insert_id;
				$url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => $this->_redirect_action, 'id' => $id));
				$this->flash('notice', 'Successfully created!');
				$this->redirect($url);
			} else {
				if ($this->model->save($this->params['data'])) {
					$this->flash('notice', 'Successfully saved!');
					$url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => $this->_redirect_action, 'id' => $id));
					$this->redirect($url);
					//$this->refresh();
				} else {
					$this->flash('error', $this->model->validation_error_html);
				}
			}
		}
	}
	
}
