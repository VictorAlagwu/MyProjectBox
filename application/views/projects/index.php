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
	<th>Delete</th>
	<th>Edit</th>
</tr>

</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
	<tr>
		<?php echo "<td> <a href='" . base_url() . "projects/display/" . $project->id . "'>" . $project->pro_name . "</a></td>"; ?>
		<?php echo "<td>" . $project->pro_body . "</td>"; ?>
		<?php echo "<td><a href=" . base_url() . "projects/delete/" . $project->id . "><span class='glyphicon glyphicon-remove' style='color:red'></span></a></td>"; ?>
		<?php echo "<td><a href=" . base_url() . "projects/edit/" . $project->id . "><span class='glyphicon glyphicon-edit' style='color:green'></span></a></td>"; ?>
	</tr>


	<?php endforeach;?>
	</tbody>
</table>