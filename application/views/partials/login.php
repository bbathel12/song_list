<?php
	$class="class='form-control'";
?>
<div class="row">
	
	<div class="col-xs-12 col-md-6 col-md-offset-3">
		<div class="row">
			<h1 class="col-xs-12">Login </h1>
		</div>
		<?= form_open('/user/login')?>
			<div class="row">
			<?= form_label('Username',"username");?>
			<?= form_input('username',null,$class) ?>
			</div>
			<div class="row">
			<?= form_label('Password',"password");?>
			<?= form_input('password',null,$class) ?>
			</div>
			<br>
			<div class="row">
			<?= form_submit('login','Login','class="btn btn-success"'); ?>
			</div>
		<?= form_close();?>
	</div>
</div>