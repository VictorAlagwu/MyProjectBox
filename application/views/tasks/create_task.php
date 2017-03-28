<style type="text/css">

label{
	font-family: Arial;
	color:black;
}
</style>
<h2 class="text-center">Create New Task</h2>
<?php echo validation_errors("<p class='bng-danger'>");
?>
<center>
	<button type="button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Click to Create Task</button>
</center>
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Task</h4>
				</div>
				<div class="modal-body">
					<label>Enter Task Name</label>
					<input type="text" name="taskname" id="taskname" placeholder ='Enter Task Name' class="form-control" />
					<br/>
					<label>Enter Task Body</label>
					<textarea id="taskbody" name="taskbody" placeholder="Enter Message" class="form-control"></textarea>
					<br/>
					<label>Enter Task Due Date</label>
					<input type="date" name="due_date" id="due_date"  class="form-control" />
					<br/>

				</div>
				<div class="modal-footer">
					<input type="submit" name="action" class="btn btn-success" value="Add Task" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		$(document).on('submit','#user_form',function(event){
			event.preventDefault();
			var TaskName = $('#taskname').val();
			var TaskBody = $('#taskbody').val();
			var due_date = $('#due_date').val();
			if(TaskName != '' && TaskBody != '' && due_date != '')
			{
				$.ajax({
					url:"<?php echo base_url(); ?>tasks/create>",
					method: 'POST',
					data: new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert(data);
						$('#user_form')[0].reset();
						$('#userModal').modal('hide');
						dataTable.ajax.reload();
					}
				});

			}else{
				alert("All fields are required");
			}
		});
	});
</script>