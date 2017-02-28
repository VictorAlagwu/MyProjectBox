<h2 class="text-center">Edit Task</h2>


<?php echo validation_errors("<p class='bng-danger'>");
?>

  <?php echo form_open('tasks/edit/' . $this->uri->segment(3) . ''); ?>

  <div id="projectname" class="form-group">
  	<?php

echo form_label('Task Name: ');
$data = array(
	'class' => 'form-control',
	'name' => 'taskname',
	'value' => $task_view->task_name,
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
	'value' => $task_view->task_body,
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
	'value' => $task_view->due_date,
);
echo form_input($data);
?>
  </div>
	<div class="form-group">
        <?php
$data = array(
	'class' => 'btn btn-primary',
	'name' => 'submit',
	'value' => 'Edit',
);
echo form_submit($data);
?>
    </div>
	<?php echo form_close(); ?>
