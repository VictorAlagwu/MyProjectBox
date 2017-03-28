<style type="text/css">

label{
	font-family: Arial;
	color:black;
}
</style>
<?php if ($this->session->userdata('logged_in')): ?>
	<h3 class="text-center">Welcome to MyProjectBox</h3>


	<?php if ($this->session->userdata('username')): ?>
	<div class="jumbotron">
		<h4><marquee>Welcome  to <?php echo $this->session->userdata('username'); ?> ProjectBox</marquee></h4>
	</div>
	<?php endif;?>
<?php else: ?>

<h2 class="text-center">Sent Request Password</h2>

<?php $attributes = array('id' => 'login_form', 'class' => 'login-form');?>
 <!-- Validation Area -->
	<?php if ($this->session->flashdata('errors')): ?>
	<?php	echo $this->session->flashdata('errors'); ?>
	<?php endif?>
<p>
	<center>
	<button type="button" data-toggle="modal" data-target="#userModal" class="btn btn-default btn-lg"><i class="fa fa-envelope"></i> &nbsp; Click to input email</button>
</center>
</p>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Write Email</h4>
				</div>
				<div class="modal-body">
					<label>Enter Email</label>
					<input type="email" name="email" id="email" class="form-control" />
					<br/>
				</div>
				<div class="modal-footer">
					<input type="submit" name="action" class="btn btn-success" value="Send Email" />
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
			var email = $('#email').val();
			if(email != '')
			{
				$.ajax({
					url:"<?php echo base_url(); ?>users/resetRequest>",
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
				alert("Field is required");
			}
		});
	});
</script>


<?php endif;?>


