<?php if ($this->session->userdata('logged_in')): ?>
	<h3 class="text-center">Welcome to MyProjectBox</h3>


	<?php if ($this->session->userdata('username')): ?>
	<div class="jumbotron">
		<h4><marquee>Welcome  to <?php echo $this->session->userdata('username'); ?> ProjectBox</marquee></h4>
	</div>
	<?php endif;?>
<?php else: ?>

<h2 class="text-center">Change Password</h2>

<?php $attributes = array('id' => 'login_form', 'class' => 'login-form');?>
 <!-- Validation Area -->
	<?php if ($this->session->flashdata('errors')): ?>
	<?php	echo $this->session->flashdata('errors'); ?>
	<?php endif?>

<center>
	<!-- Start form -->

<div class="login-wrap">

  <?php echo form_open('users/resetPassword', $attributes); ?>



	<div class="input-group">
		<?php
//Input for password
echo form_label('New Password: ');
$data = array(
	'class' => 'form-control',
	'name' => 'password',
	'placeholder' => 'Enter Password',
);
echo form_password($data);
?>
	</div>
	<div class="input-group">
		<?php
//Input for password
echo form_label('Confirm Password: ');
$data = array(
	'class' => 'form-control',
	'name' => 'confirm_password',
	'placeholder' => 'Enter Password',
);
echo form_password($data);
?>
	</div>
	<div class="form-group">
        <?php
$data = array(
	'class' => 'btn btn-primary',
	'name' => 'submit',
	'value' => 'Change Password',
);
echo form_submit($data);
?>
    </div>

 <?php echo form_close(); ?>

<?php endif;?>
</div>
</center>

