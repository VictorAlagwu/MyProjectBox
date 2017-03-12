<?php if ($this->session->userdata('logged_in')): ?>
	<h3 class="text-center">Welcome to MyProjectBox</h3>


	<?php if ($this->session->userdata('username')): ?>
	<div class="jumbotron">
		<h4><marquee>Welcome  to <?php echo $this->session->userdata('username'); ?> ProjectBox</marquee></h4>
	</div>
	<?php endif;?>
<?php else: ?>

<h2 class="text-center">Request Reset Password Form</h2>

<?php $attributes = array('id' => 'login_form', 'class' => 'login-form');?>
 <!-- Validation Area -->
	<?php if ($this->session->flashdata('errors')): ?>
	<?php	echo $this->session->flashdata('errors'); ?>
	<?php endif?>

<center>
<!-- Start form -->

<div class="login-wrap">

  <?php echo form_open('users/resetRequest', $attributes); ?>



	<div class="input-group">
		<?php
//Input for Username
echo form_label('Email: ');
$data = array(
	'class' => 'form-control',
	'name' => 'email',
	'placeholder' => 'Enter email',
);
echo form_input($data);
?>
	</div>
	<hr>
	<div class="form-group">
        <?php
$data = array(
	'class' => 'btn btn-primary',
	'name' => 'submit',
	'value' => 'Request for New Password',
);
echo form_submit($data);
?>
    </div>

 <?php echo form_close(); ?>

<?php endif;?>
</div>

</center>
