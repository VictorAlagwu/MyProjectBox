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
<form method="POST" action="">
	<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="1">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm Password" tabindex="1">
							</div>
						</div>
					</div>

					<hr>
					<div class="row">
						<div class="col-xs-12 col-md-12"><input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-block btn-lg" tabindex="1"></div>
					</div>
</form>
<?php endif;?>
</div>
</center>

