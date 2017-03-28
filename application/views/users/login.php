<?php if ($this->session->userdata('logged_in')): ?>
	<h3 class="text-center">Welcome to MyProjectBox</h3>


	<?php if ($this->session->userdata('username')): ?>
	<div class="jumbotron">
		<h4><marquee>Welcome  to <?php echo $this->session->userdata('username'); ?> ProjectBox</marquee></h4>
	</div>
	<?php endif;?>
<?php else: ?>
<!-- Modal -->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">

			</div>
		</div>

	</div>
</div>
<!-- End of Modal -->
  <p class="login-img"><i class="icon_lock_alt"></i></p>
<?php $attributes = array('id' => 'login_form', 'class' => 'login-form');?>
 <!-- Validation Area -->
	<?php if ($this->session->flashdata('errors')): ?>
	<?php	echo $this->session->flashdata('errors'); ?>
	<?php endif?>

<center>
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
	<p><span>Forgot Password<a href='<?php echo base_url(); ?>users/resetRequest'> Click here</a></span></p>
	<div class="form-group">


    </div>
<div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button>
</div>

 <?php echo form_close(); ?>

<?php endif;?>
</div>

</center>
