<h2 class="text-center">Edit Project</h2>


<?php echo validation_errors("<p class='bng-danger'>");
?>
  <?php echo form_open('projects/edit/' . $project_data->id . ''); ?>
  <div id="projectname" class="form-group">
  	<?php
//Input for Username
echo form_label('Project Name: ');
$data = array(
	'class' => 'form-control',
	'name' => 'projectname',
	'value' => $project_data->pro_name,

);
echo form_input($data);
?>
  </div>
  <div id="projectbody" class="form-group">
  	<?php
echo form_label('Project Body: ');
$data = array(
	'class' => 'form-control',
	'name' => 'projectbody',
	'value' => $project_data->pro_body,
);
echo form_textarea($data);
?>
  </div>
	<div class="form-group">
        <?php
$data = array(
	'class' => 'btn btn-primary',
	'name' => 'submit',
	'value' => 'Update',
);
echo form_submit($data);
?>
    </div>
	<?php echo form_close(); ?>
