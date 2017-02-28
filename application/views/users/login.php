<?php if ($this->session->userdata('logged_in')): ?>
	<h3 class="text-center">Welcome to MyProjectBox</h3>


	<?php if ($this->session->userdata('username')): ?>
	<div class="jumbotron">
		<h4><marquee>Welcome  to <?php echo $this->session->userdata('username'); ?> ProjectBox</marquee></h4>
	</div>
	<?php endif;?>
<?php else: ?>

<h2 class="text-center">Login Form</h2>

<?php $attributes = array('id' => 'login_form', 'class' => 'login-form');?>
 <!-- Validation Area -->
	<?php if ($this->session->flashdata('errors')): ?>
	<?php	echo $this->session->flashdata('errors'); ?>
	<?php endif?>


<!-- Start form -->

<div class="login-wrap">

  <?php echo form_open('users/login', $attributes); ?>



	<div class="input-group">
		<?php
//Input for Username
echo form_label('Username: ');
$data = array(
	'class' => 'form-control',
	'name' => 'username',
	'placeholder' => 'Enter Username',
);
echo form_input($data);
?>
	</div>

	<div class="input-group">
		<?php
//Input for password
echo form_label('Password: ');
$data = array(
	'class' => 'form-control',
	'name' => 'password',
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
	'value' => 'Login',
);
echo form_submit($data);
?>
    </div>

 <?php echo form_close(); ?>

<?php endif;?>
</div>
