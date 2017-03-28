
<p class="bg-danger">
<?php if ($this->session->flashdata('task_deleted')): ?>
	<?php echo $this->session->flashdata('task_deleted'); ?>
<?php endif;?>
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
	<th>Edit</th>
	<th>Delete</th>

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
		<td>
		<?php
// date_default_timezone_set('');
// Time ago feature
echo task_time_ago($tasks->date_created);
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
</td>

		<?php echo "<td><a href=" . base_url() . 'tasks/edit/' . $tasks->id . "><span class='glyphicon glyphicon-edit' style='color:green'></span></td></a>" ?>
			<td>
            <a class="delete_task" id='delete_task' data-id="<?php echo $tasks->id; ?>" href="javascript:void(0)">
            <i class="glyphicon glyphicon-trash" style='color:red'></i>
            </a>
            </td>
            <?php echo "<td><a href=" . base_url() . 'tasks/delete/' . $tasks->id . "><span class='glyphicon glyphicon-remove' style='color:red'></span></td></a>" ?>
	</tr>

	<?php
// endforeach;
?>
	</tbody>
</table>
<script>
	$(document).ready(function(){

		$('.delete_task').click(function(e){

			e.preventDefault();

			var pid = $(this).attr('data-id');
			var parent = $(this).parent("td").parent("tr");

			bootbox.dialog({
			  message: "<i style='color:black;'>Are you sure you want to Delete this project?</i>",
			  title: "<i style='color:black;' class='glyphicon glyphicon-trash'></i> Delete !",
			  buttons: {
			  success: {
			  label: "No",
			  className: "btn-success",
			  callback: function() {
					 $('.bootbox').modal('hide');
				  }
				},
					danger: {
				  		label: "Delete!",
				  		className: "btn-danger",
				  		callback: function() {
					 		 $.ajax({
								  type: 'POST',
								  url: 'delete/' + pid
							  })
					  		.done(function(){
								  swal('Ok','Project Deleted','warning');
						  		// bootbox.alert(response);
						  		// parent.fadeOut('slow');
					  			})
					  		.fail(function(){

						 		swal('Oops','Something went wrong','error');

					  			})
				  }
				}
			  }
			});


		});

	});
</script>