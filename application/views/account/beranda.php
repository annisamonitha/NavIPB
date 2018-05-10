<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
		<title> Beranda | NavIPB </title>

		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ;?>">

		<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ;?>"></script>
	
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>
	
		<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>
	
		<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>
	</head>

<body>
	<div class="header">
		<h1>Navigasi IPB</h1>
	</div>
	<div class="nav">
	<p>
		<?php echo anchor('','<button type="button" class="btn btn-danger btn-lg btn-block">HOME</button>'); ?>
	</p>
	<p>
		<?php echo anchor('login','<button type="button" class="btn btn-danger btn-lg btn-block">LOGIN</button>'); ?>
	</p>
	<p>
		<?php echo anchor('register','<button type="button" class="btn btn-danger btn-lg btn-block">SIGNUP</button>'); ?>
	</p>
	</div>
</body>


<style>
	@import url('https://fonts.googleapis.com/css?family=Oswald');
	html {
		margin: 0;
		padding: 0;
		width: 100%;
		background-image: url('https://images.wallpaperscraft.com/image/travel_map_tenderness_boat_86057_1280x720.jpg');
		background-size: cover;
	}

	body {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	background: #35A9DB;
	background-position: center;
	background-repeat: no-repeat;
	display: block;
	font-family: roboto;
	text-align: center;
	color: #fff;
	}	

	.nav {
		top: 40%;
		left: 47%;
		position: absolute;
		display: inline-block;
		padding: 10px 10px;
		font-family: 'Oswald', sans-serif;
		border: solid 3px;
	}

	.header {
		text-align: center;
		position: absolute;
		top: 10%;
		left: 30%;
	}

	.header h1 {
		color: #DC143C ;
		font-family: impact; 
		font-size: 130px;
		margin: 30px;
  		background-color: #FFE4C4 ;
  		opacity: 0.6;
  		filter: alpha(opacity=60);
	}

	</style>
</html>
