<?php if ($this->session->flashdata('task_active')): ?>
<?php echo $this->session->flashdata('task_active'); ?>
<?php endif;?>
<style type="text/css">
	.project_panel{
  background-color: #3c3c3c;
}
.panel-content{
	font-family: Arial;
	color:black;
}
</style>
<div class="col-xs-7 pull-left">
                      <section class="panel project_panel">
                        <div class="panel-heading">
                             <h2> Project Name:</h2>
                          </div>
                          <div class="panel-content"><p><h4><?php echo $project_data->pro_name ?></h4></p></div>
                      <div class="panel-body">
                        <div class="panel panel-success">
                          <div class="panel-heading">Date Created:</div>
                          <div class="panel-content"><p>
                          	<?php
// Time ago feature
echo task_time_ago($project_data->date_created);
function task_time_ago($timestamp) {
	$time_ago = strtotime($timestamp);
	$current_time = time();
	$time_difference = $current_time - $time_ago;
	$seconds = $time_difference;
	$minutes = round($seconds / 60);
	$hours = round($seconds / 3600);
	$days = round($seconds / 86400);
	$weeks = round($seconds / 604800);
	$months = round($seconds / 2629440);
	$years = round($seconds / 31553280);
	if ($seconds <= 60) {
		return "Just Now";
	} else if ($minutes == 1) {
		if ($minutes == 1) {
			return "One Minute ago";
		} else {
			return "$minutes minutes ago";
		}
	} else if ($hours <= 24) {
		if ($hours == 1) {
			return "an hour ago";
		} else {
			return "$hours hours ago";
		}

	} else if ($days <= 7) {
		if ($days == 1) {
			return "yesterday";
		} else {
			return "$days days ago";
		}

	} else if ($weeks <= 4.3) {
		if ($weeks == 1) {
			return "a week ago";
		} else {
			return "$weeks weeks ago";
		}

	} else if ($months <= 12) {
		if ($months == 1) {
			return "a month ago";
		} else {
			return "$months months ago";
		}

	} else {
		if ($years == 1) {
			return "One year ago";
		} else {
			return "$years years ago";
		}
	}
}
?>
						  </div>
                        </div>
                        <div class="panel panel-success">
                          <div class="panel-heading">Description: </div>
                          <div class="panel-content"><p><?php echo $project_data->pro_body; ?></p></div>
                        </div>
                        <div class="panel panel-danger">
                          <div class="panel-heading">Active Tasks</div>
                          <div class="panel-content">
                          		<?php if ($completed_tasks): ?>
                          			<ul class="list-group">
									<?php foreach ($completed_tasks as $task): ?>
								<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id; ?>">
								<?php echo $task->task_name; ?>
								</a></li>

								<?php endforeach;?>
								</ul>
								<?php else: ?>
								<p>You have no pending task</p>
								<?php endif;?></div>
                          </div>
                       	<div class="panel panel-warning">
                          <div class="panel-heading">Completed Tasks</div>
                          <div class="panel-content">
	                          <?php if ($not_completed_tasks): ?>
	                          	<ul class="list-group">
							  <?php foreach ($not_completed_tasks as $task): ?>
							  <li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id; ?>">
							  <?php echo $task->task_name; ?>
							  </a></li>

							  <?php endforeach;?>
							  </ul>
							  <?php else: ?>
							  <p>You have no pending task</p>
							  <?php endif;?>
						  </div>
                        </div>
                      </div>
                      </section>

</div>
<div class="col-xs-5 pull-right">
	<h4>Project Actions</h4>
<ul class="list-group">
<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/create/<?php echo $project_data->id ?>">Create Task</a></li>
    <li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project_data->id ?>">Edit Project</a></li>
    <li class="list-group-item" onclick="deleteProject()"><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project_data->id ?>">Delete Project</a></li>

</ul>
</div>

<script src="">

</script>