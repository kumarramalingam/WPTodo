<?php

class WptodoLoader extends MvcPluginLoader {

	var $db_version = '1.0';
	
	function init() {
	
		// Include any code here that needs to be called when this class is instantiated
	
		global $wpdb;
	
		$this->tables = array(
			'wptodo_tasks' => $wpdb->prefix.'wptodo_tasks',
			'wptodo_projects' => $wpdb->prefix.'wptodo_projects'
		);
	
	}

	function activate() {
	
		// This call needs to be made to activate this app within WP MVC
		
		$this->activate_app(__FILE__);
		
		// Perform any databases modifications related to plugin activation here, if necessary

		require_once ABSPATH.'wp-admin/includes/upgrade.php';
	
		add_option('wptodo_db_version', $this->db_version);
	
		$sql = '
		      CREATE TABLE '.$this->tables['wptodo_projects'].' (
		      id int(11) NOT NULL auto_increment,
		      user_id int(11) default NULL,
		      project_name varchar(255) default NULL,
		      state tinyint(2) default NULL,
		      created datetime NOT NULL,
			  modified datetime NOT NULL,
			  post_id BIGINT(20),
			  PRIMARY KEY (id)		      
		      )';		
			
		dbDelta($sql);
		
		$sql = '
			  CREATE TABLE '.$this->tables['wptodo_tasks'].' (
			  id int(11) NOT NULL auto_increment,
			  user_id int(11) default NULL,
			  task_name varchar(255) default NULL,
			  state tinyint(2) default NULL,
			  project_id int(11) default NULL,
			  ordering int(11) default NULL,
			  due_date date NOT NULL,
			  created datetime NOT NULL,
			  modified datetime NOT NULL,
			  post_id BIGINT(20),
			  PRIMARY KEY  (id),			  
			  FOREIGN KEY (project_id) REFERENCES '.$this->tables['wptodo_projects'].'(id),
			)';
			
		dbDelta($sql);	
		
		$sql = 'ALTER TABLE '.$this->tables['wptodo_projects'].' ADD COLUMN post_id BIGINT(20)';
		dbDelta($sql);
		
		$sql = 'ALTER TABLE '.$this->tables['wptodo_tasks'].' ADD INDEX (post_id)';
		dbDelta($sql);          
						
	}

	function deactivate() {
	
		// This call needs to be made to deactivate this app within WP MVC
		
		$this->deactivate_app(__FILE__);
		
		// Perform any databases modifications related to plugin deactivation here, if necessary
	
	}
}
