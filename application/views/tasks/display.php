<?php
echo "Welcome to task page<hr>";
?>

<div class="jumbotron">
	<h4>TaskBox</h4>
</div>


<table class="table">
<thead>

<tr>
	<th>Task Name</th>
	<th>Task Body</th>
	<th>Still Active</th>
	<th>Completed</th>
	<th>Date Created</th>
	<th></th>
	<th></th>

</tr>

</thead>
	<tbody>
	<?php
// foreach ($tasks as $task):
?>

	<tr>
		<td><?php echo $tasks->task_name; ?></td>
		<td><?php echo $tasks->task_body; ?></td>
		<?php echo "<td><a href=" . base_url() . 'tasks/active/' . $tasks->id . "><span class='fa fa-spinner fa-2x' style='color:green'></span></td></a>" ?>
		<?php echo "<td><a href=" . base_url() . 'tasks/completed/' . $tasks->id . "><span class='fa fa-thumbs-up fa-2x' style='color:green'></span></td></a>" ?>
		<td><?php echo $tasks->date_created; ?></td>
		<?php echo "<td><a href=" . base_url() . 'tasks/edit/' . $tasks->id . "><span class='glyphicon glyphicon-edit' style='color:green'></span></td></a>" ?>		<?php echo "<td><a href=" . base_url() . 'tasks/delete/' . $tasks->id . "><span class='glyphicon glyphicon-remove' style='color:red'></span></td></a>" ?>
	</tr>

	<?php
// endforeach;
?>
	</tbody>
</table>