<h2 class="text-center">Create New Task</h2>


<?php echo validation_errors("<p class='bng-danger'>");
?>

  <?php echo form_open('tasks/create/' . $this->uri->segment(3) . ''); ?>

  <div id="projectname" class="form-group">
  	<?php

echo form_label('Task Name: ');
$data = array(
	'class' => 'form-control',
	'name' => 'taskname',
	'placeholder' => 'Enter Task Name',
);
echo form_input($data);
?>
  </div>
  <div id="taskbody" class="form-group">
  	<?php
echo form_label('Task Body: ');
$data = array(
	'class' => 'form-control',
	'name' => 'taskbody',
	'placeholder' => 'Enter Message',
);
echo form_textarea($data);
?>
  </div>

   <div id="taskduedate" class="form-group">
  	<?php
echo form_label('Task Due Date: ');
$data = array(
	'class' => 'form-control',
	'name' => 'due_date',
	'type' => 'date',
);
echo form_input($data);
?>
  </div>
	<div class="form-group">
        <?php
$data = array(
	'class' => 'btn btn-primary',
	'name' => 'submit',
	'value' => 'Create',
);
echo form_submit($data);
?>
    </div>
	<?php echo form_close(); ?>
