<h2><?php echo MvcInflector::titleize($this->action); ?> <?php echo MvcInflector::titleize($model->name); ?></h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('project_name'); ?>
<?php echo $this->form->input('state'); ?>
<?php echo $this->form->input('created'); ?>
<?php echo $this->form->end('Update'); ?>
