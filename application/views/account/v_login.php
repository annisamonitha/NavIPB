 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
 <head>
	 <meta charset="UTF-8">
	 <title>Login | NavIPB </title>

	 <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ;?>">

	<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ;?>"></script>

	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>

	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>

	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>
 </head>

 	<h1>NavIPB</h1>
 		<div class="body">

 	<h2> Log In </h2>

	<body>
		<img src="http://www.cpp.edu/~bap/cppbap/imgs/icons/person.png" class="avatar">
			<?php
	 // Cetak jika ada notifikasi
			if($this->session->flashdata('sukses')) {
					 echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>'; }?>

			<?php echo form_open('login');?>
			<p>Username:</p>
			<p> <input type="text" name="username" value="<?php echo set_value('username'); ?>"/> </p>
			<p> <?php echo form_error('username'); ?> </p>

			<p>Password:</p>
			<p> <input type="password" name="password" value="<?php echo set_value('password'); ?>"/></p>
			<p> <?php echo form_error('password'); ?> </p>

			<h4> <input type="submit" name="btnSubmit" value="Log in" class="btn btn-danger btn-lg btn-block"/> </h4>
			<?php echo form_close();?>

			<h3>
			Back to <?php echo anchor(site_url().'/beranda','Home'); ?>
			</h3>
			<h3>
			Don't have an account? Register in  <?php echo anchor(site_url().'/register','Here');?>
			</h3>
 </body>

 <style>
	html {
		margin: 0;
		padding: 0;
		width: 100%;
		position: absolute;
		background-image: url('https://images.wallpaperscraft.com/image/map_book_poppy_seeds_cup_113809_1280x720.jpg');
		background-size: cover;
	}

	h1 {
  		position: absolute;
  		font-family: georgia;
  		font-size: 30px;
  		left: 3%;
  		top: 20px;
  		color:  #FFEFD5;
  		border: 3px solid  #FFEFD5 ;
  		background:rgba(0,0,0,0.4);
  		border-radius: 10px;
  	}

    .body {
       	width: 400px;
       	height: 580px;
        background: black;
        padding: 60px 30px;
        position: fixed;
        left: 50%;
        top: 55%;
        transform: translate(-50%, -50%);
        border-style:solid;
        border-color: white;
		border-width: 3px;
        border-width: 3px;
        background:rgba(0,0,0,0.7);
        color: #fff;
        border-radius: 20px;
        }

    .body h2 {
     	text-align: center;
     	color: #fff;
     	font-size: 35px;
     	font-family: impact;
     	font-weight: normal;
     	margin-bottom: 30px;
     	margin-top: 0px;
     }

    .body input {
    	width: 100%;
    	background: none;
    	border: 1px solid #fff;
    	border-radius: 3px;
    	padding: 6px 15px;
    	box-sizing: border-box;
    	margin-bottom: 20px;
    	font-size: 18px;
    	color: #fff;
    }

    .avatar{
    	width: 110px;
    	height: 110px;
    	border-radius: 50%;
    	position: absolute;
    	top: -70px;
    	left: 145px;
    }

    input[type="submit"] {
    	background:#800000;
    }

   	p {
   		color:white;
   		font-size: 15px;
   		font-family: courier;
   	}

   	h3 {
    	font-family: georgia;
    	font-size: 17px;
    	color: white;
    	margin-top: 10%;
    }

    h4 {
    	font-family: courier;
    }

 </html>
