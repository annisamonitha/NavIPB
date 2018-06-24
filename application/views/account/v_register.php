<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
 <head>
   <meta charset="UTF-8">
   <title> Pendaftaran Akun | NavIPB </title>

   <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ;?>">

	<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ;?>"></script>

	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>

	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>

	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>
  
 </head>

 	<h1> NavIPB </h1>
 	<div class="body">

 	<h2> Sign Up </h2>
 <body>

	<?php echo form_open('register');?>
	<p>Nama :</p>
	<input type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="Enter Your Name"/>
	<?php echo form_error('name'); ?> </p>

	<p>Username :</p>
	<input type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="Enter Your Username"/>
	<?php echo form_error('username'); ?> </p>

	<p>Email :</p>
	<input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter Your Email"/>
	<?php echo form_error('email'); ?> </p>

 	<p>Password :</p>
	<input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Enter Your Password"/>
	<?php echo form_error('password'); ?> </p>

	<p>Confirm Password  :</p>
	<input type="password" name="password_conf" value="<?php echo set_value('password_conf'); ?>" placeholder="Enter Your Password"/>
	<?php echo form_error('password_conf'); ?>

	<h4>
	<input type="submit" name="btnSubmit" value="Submit" class="btn btn-success btn-lg btn-block"/>
	<?php echo form_close();?>
 	</h4>
  
	<h3>
  Back to Front Page click <?php echo anchor(site_url().'/beranda','Here'); ?>
  </h3>
</body>

 <style>
  html {
    margin: 0;
    padding: 0;
    width: 100%;
    position: absolute;
    background-image: url('http://www.halhalal.com/wp-content/uploads/2016/02/IPB-Hadirkan-Mata-Kuliah-Pangan-Halal-dan-Manajemen-Halal.jpg');
    background-size: cover;
  }

    h1 {
      position: absolute;
      font-family: georgia;
      font-size: 50px;
      left: 75%;
      top: 500px;
      color: #000080 ;
      border: 5px solid #000080 ;
      background:rgba(0,0,0,0.1);
      border-radius: 10px;
    }

    .body {
        width: 420px;
        height: 780px;
        background: black;
        padding: 25px 35px;
        position: fixed;
        left: 35%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-style:solid;
        border-color: white;
        border-width: 3px;
        border-width: 3px;
        background:rgba(0,0,0,0.9);
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
      font-size: 16px;
      color: #fff;
    }

    input[type="submit"] {
      background:  #800000;
    }

    p {
      color:white;
      font-size: 15px;
      font-family: courier;
    }

    h3 {
      font-family: georgia;
      font-size: 18px;
      color: white;
      margin-top: 8%;
    }

    h4 {
      font-family: courier;
    }

 </style>
 </html>

