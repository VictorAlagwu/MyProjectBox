<?php

echo "<center>" . validation_errors("<p class ='alert alert-danger'>") . "</center>";

?>

<!--Using Normal PHP Forms{Codes Below are for normal forms without the use of modals}-->
			  <?php //echo form_open('projects/create'); ?>

			  <!-- <div id="projectname" class="form-group"> -->
			  	<?php
//Input for Username
// echo form_label('Project Name: ');
// $data = array(
// 	'class' => 'form-control',
// 	'name' => 'projectname',
// 	'placeholder' => 'Enter Project Name',
// );
// echo form_input($data);
?>
			  <!-- </div>
			  <div id="projectbody" class="form-group"> -->
			  	<?php
// echo form_label('Project Body: ');
// $data = array(
// 	'class' => 'form-control',
// 	'name' => 'projectbody',
// 	'placeholder' => 'Enter Message',
// );
// echo form_textarea($data);
?>
			<!--   </div>
				<div class="////form-group"> -->
			        <?php
//$data = array(
// 'class' => 'btn btn-primary',
// 'name' => 'submit',
// 'value' => 'Create',
// );
//echo form_submit($data);
?>
			    <!-- </div> -->
				<?php //echo form_close(); ?>
<!--End of Comment-->

<!--Using Normal PHP Forms{Codes Below are for use of Bootstrap Modals}-->
<center>
	<button type="button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Click to add a new Project</button>
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
					<label>Enter Project Name</label>
					<input type="text" name="projectname" id="projectname" placeholder="Project Name" class="form-control" />
					<br/>
					<label>Enter Project Body</label>
					<textarea id="projectbody" name="projectbody" class="form-control" placeholder="Project Body"></textarea>
					<br/>

				</div>
				<div class="modal-footer">
					<input type="submit" name="action" class="btn btn-success" value="Add" />
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
			var projectname = $('#projectname').val();
			var projectBody = $('#projectbody').val();
			if(ProjectName != '' && ProjectBody != '')
			{
				$.ajax({
					url:"<?php echo base_url(); ?>projects/create>",
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