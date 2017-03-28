<h2 class="text-center">Edit Project</h2>


<?php echo validation_errors("<p class='bng-danger'>");
?>
<center>
	<button type="button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Click to edit project</button>
</center>
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Project</h4>
				</div>
				<div class="modal-body">

					<input type="hidden" data-id="<?php echo $project_data->id; ?>" name="projectname" id="projectname" class="form-control" />
					<br/>
					<label>Enter Project Name</label>
					<input type="text" name="projectname" id="projectname" value="<?php echo $project_data->pro_name; ?>" class="form-control" />
					<br/>
					<label>Enter Project Body</label>
					<textarea id="projectbody" name="projectbody" placeholder="<?php echo $project_data->pro_body; ?>" value="<?php echo $project_data->pro_body; ?>" class="form-control"></textarea>
					<br/>

				</div>
				<div class="modal-footer">
					<input type="submit" name="action" class="btn btn-success" value="Update" />
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
			var pid = $(this).attr('data-id');
			var projectname = $('#projectname').val();
			var projectBody = $('#projectbody').val();
			if(ProjectName != '' && ProjectBody != '')
			{
				$.ajax({

					url:"<?php echo base_url(); ?>projects/create/>" + pid,
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
				alert("Both fields are required");
			}
		});
	});
</script>
<!--End of Comment-->