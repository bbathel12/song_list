<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="<?= base_url() ?>css/font_awesome/css/font-awesome.min.css">
</head>
<body class="container-fluid">
<?php $this->load->view('nav'); echo getcwd();?>
<br><br>
<br><br>
<br><br>
<?php if($this->session->flashdata('success')){?>
	<h1 class="bg-success"><?= $this->session->flashdata('success') ?></h1>
<?php }?>
<?php if($this->session->flashdata('error')){?>
	<h1 class="bg-danger"><?= $this->session->flashdata('error') ?></h1>
<?php }?>
<span id='user_id' class='hidden' data-id="<?= $_SESSION['user_id']?>"></span> 