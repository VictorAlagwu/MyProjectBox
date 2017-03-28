
<h2 class="text-center">Registration Form</h2>

<?php $attributes = array('id' => 'register_form', 'class' => 'form_horizontal');?>
 <!-- Validation Area -->
	<?php echo validation_errors("<p class ='bng-danger'>");
?>

<center>
	<!-- Start form -->

<div class="login-wrap">

	  <?php echo form_open('users/register', $attributes); ?>
  <div id="firstname" class="input-group">
  	<?php
//Input for Username
echo form_label('Firstname: ');
$data = array(
	'class' => 'form-control',
	'name' => 'firstname',
	'placeholder' => 'Enter Firstname',
);
echo form_input($data);
?>
  </div>
  <div id="lastname" class="input-group">
  	<?php
echo form_label('Lastname: ');
$data = array(
	'class' => 'form-control',
	'name' => 'lastname',
	'placeholder' => 'Enter Lastname',
);
echo form_input($data);
?>
  </div>
  <div id="username" class="input-group">
  	<?php
echo form_label('Username: ');
$data = array(
	'class' => 'form-control',
	'name' => 'username',
	'placeholder' => 'Enter Username',
);
echo form_input($data);
?>
  </div>
  <div id="email" class="input-group">
<?php
echo form_label('Email: ');
$data = array(
	'class' => 'form-control',
	'name' => 'email',
	'placeholder' => 'Enter Email',
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

	<div class="input-group">
        <?php
//Input for confirm password
echo form_label('Confirm Password:');
$data = array(
	'class' => 'form-control',
	'name' => 'confirm_password',
	'placeholder' => 'Enter Password',
);
echo form_password($data);
?>
	</div>
	<div class="input-group">
        <button type="submit" class="btn btn-default" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button>
	 </div>
	 <?php echo form_close(); ?>
</div>
</center>
