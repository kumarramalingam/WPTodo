<h2><?php echo MvcInflector::titleize($this->action); ?> <?php echo MvcInflector::titleize($model->name); ?></h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->belongs_to_dropdown('Project', $projects, array('label' => 'Project Name', 'style' => 'width: 200px;', 'empty' => true)); ?>
<?php echo $this->form->input('task_name'); ?>
<?php echo $this->form->input('state'); ?>
<?php echo $this->form->input('due_date'); ?>
<?php echo $this->form->input('created'); ?>
<?php echo $this->form->end('Add'); ?>
