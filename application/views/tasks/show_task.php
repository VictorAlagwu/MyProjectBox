<h1>Task Page</h1>
<table class="table">
	<thead>
		<th>Name</th>
		<th>Details</th>
	</thead>
	<tbody>

		<?php foreach ($tasks as $task): ?>
			<tr>
		<?php echo "<td> <a href='" . base_url() . "tasks/display/" . $task->id . "'>" . $task->task_name . "</a></td>"; ?>
		<?php echo "<td>" . $task->task_body . "</td>"; ?>
		<?php echo "<td><a href=" . base_url() . "tasks/delete/" . $task->id . "><span class='glyphicon glyphicon-remove' style='color:red'></span></a></td>"; ?>
		<?php echo "<td><a href=" . base_url() . "tasks/edit/" . $task->id . "><span class='glyphicon glyphicon-edit' style='color:green'></span></a></td>"; ?>
	</tr>

	<?php endforeach;?>
	</tbody>
</table>