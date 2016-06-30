<?php
	$class="class='form-control'";
?>
<div class="row">
	<div class="col-xs-12 col-md-6 col-md-offset-3">
		<?= form_open('songlist/add_song')?>
			<div class="row">
			<?= form_label('Title',"title");?>
			<?= form_input('title',null,$class) ?>
			</div>
			<div class="row">
			<?= form_label('Artist',"artist");?>
			<?= form_input('artist',null,$class) ?>
			</div>
			<div class="row">
			<?= form_label('Youtube Link',"youtube_link");?>
			<?= form_input('youtube_link',null,$class) ?>
			</div>
			<br>
			<div class="row">
			<?= form_submit('add','Add Song','class="btn btn-success"'); ?>
			</div>
		<?= form_close();?>
	</div>
</div>