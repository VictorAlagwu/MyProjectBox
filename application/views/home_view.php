<p class="bg-success">
	<?php if ($this->session->flashdata('login_success')): ?>
	<?php echo $this->session->flashdata('login_success'); ?>
<?php endif;?>

	<?php if ($this->session->flashdata('task_deleted')): ?>
	<?php echo $this->session->flashdata('task_deleted'); ?>
<?php endif;?>
<?php if ($this->session->flashdata('reg_success')): ?>
<?php echo $this->session->flashdata('reg_success'); ?>
<?php endif;?>
</p>
<p class="bg-danger">
	<?php if ($this->session->flashdata('login_fail')): ?>
	<?php echo $this->session->flashdata('login_fail'); ?>
<?php endif;?>

<?php if ($this->session->flashdata('project_message')): ?>
<?php echo $this->session->flashdata('project_message'); ?>
<?php endif;?>

</p>

<?php if ($this->session->userdata('logged_in')): ?>

<table class="table">
<thead>

<tr>
	<th>Project Name</th>
	<th>Project Body</th>
	<th></th>

</tr>

</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
	<tr>
		<td><?php echo $project->pro_name; ?></td>
		<td><?php echo $project->pro_body; ?></td>
		<?php echo "<td> <a href='" . base_url() . "projects/display/" . $project->id . "'> View Project</a></td>"; ?>
	</tr>

	<?php endforeach;?>
	</tbody>
</table>
 <?php endif;?>