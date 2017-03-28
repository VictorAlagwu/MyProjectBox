<h3  class="text-center">My Projects</h3>
<p class="bg-success">
<?php if ($this->session->flashdata('pro_updated')): ?>
<?php echo $this->session->flashdata('pro_updated'); ?>
<?php endif;?>
<?php if ($this->session->flashdata('pro_success')): ?>
<?php echo $this->session->flashdata('pro_success'); ?>
<?php endif;?>

</p>
<p class="bg-danger">
<?php if ($this->session->flashdata('pro_deleted')): ?>
	<?php echo $this->session->flashdata('pro_deleted'); ?>
<?php endif;?>
</p>
<a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>projects/create">Create Project</a>
<table class="table">
<thead>

<tr>
	<th>Project Name</th>
	<th>Project Body</th>
	<th>Edit</th>
	<th>Delete</th>
	<th></th>
	<th></th>
</tr>

</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
	<tr>
		<?php echo "<td> <a href='" . base_url() . "projects/display/" . $project->id . "'>" . $project->pro_name . "</a></td>"; ?>
		<?php echo "<td>" . $project->pro_body . "</td>"; ?>
		 <?php echo "<td><a href=" . base_url() . "projects/edit/" . $project->id . "><span class='glyphicon glyphicon-edit' style='color:green'></span></a></td>"; ?>
		<td>
            <a class="delete_product" data-id="<?php echo $project->id; ?>" href="javascript:void(0)">
            <i class="glyphicon glyphicon-trash" style='color:red'></i>
            </a>
         </td>
	</tr>
	<?php endforeach;?>
	</tbody>
</table>

<script>
	$(document).ready(function(){

		$('.delete_product').click(function(e){

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
						  url: 'projects/delete/' + pid,


					  })
					  .done(function(){
						swal('Ok','Project Deleted','warning');
						  // bootbox.alert(response);
						  parent.fadeOut('slow');

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