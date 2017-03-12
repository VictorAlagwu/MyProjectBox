
<div class="col-xs-7">
<h2>Project Name: </h2><h4><?php echo $project_data->pro_name ?></h4>
<p>Date Created: <?php echo $project_data->date_created ?></p>

<p><?php echo 'Hello ' . $this->session->userdata('username'); ?></p>
<h2>Description: </h2>
<p><?php echo $project_data->pro_body; ?></p>
<h3>Tasks</h3>
<?php if ($completed_tasks): ?>
	<?php foreach ($completed_tasks as $task): ?>
		<li><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id; ?>">
		<?php echo $task->task_name; ?>
		</a></li>

	<?php endforeach;?>
<?php else: ?>
	<p>You have no pending task</p>
<?php endif;?>
</div>
<div class="col-xs-5 pull-right">
	<h4>Project Actions</h4>
<ul class="list-group">
<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/create/<?php echo $project_data->id ?>">Create Task</a></li>
    <li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project_data->id ?>">Edit Project</a></li>
    <li class="list-group-item"><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project_data->id ?>">Delete Project</a></li>

</ul>
</div>
<!-- <div class="row">
	<div>
		<h4>Tasks:</h4><p><?php ?></p>
		<p><h2>Task Description: </h2><br>
		</p>
	</div>
</div> -->