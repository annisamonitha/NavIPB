 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>  
 <head>
	 <meta charset="UTF-8">
	 <title>
		Halaman Login | NavIPB
	 </title>
	 <style type="text/css">
	
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
	background: #456;
	font-family: 'Open Sans', Sans-serif;
}
.login {
	width: 400px;
	margin: 16px auto;
	font-size: 16px;
}
.login-header,
.login p {
	margin-top: 0;
	margin-bottom: 0;
}
.login-header {
	background: #28d;
	padding: 20px;
	font-size: 1.4em;
	font-weight: normal;
	text-align: center;
	text-transform: uppercase;
	color: #fff;
}
.login-container {
	background: #ebebeb;
	padding: 12px;
}
.login p{
	padding: 12px;
}
.login input {
	box-sizing: border-box;
	display: block;
	width: 100%;
	border-width: 1px;
	border-style: solid;
	padding: 16px;
	outline: 0;
	font-family: inherit;
	font-size: 0.95em;
}
.login input [type="email"],
.login input[type="password"]{
	background: #fff;
	border-color: #bbb;
	color: #555;
}
.login input [type="email"]:focus,
.login input[type="password"]:focus{
	border-color: #888;
}
.login input[type="submit"]{
	background: #28d;
	border-color: transparent;
	color: #fff;
	cursor: pointer;
}
.login input[type="submit"]:hover{
	background: #17c;
}
.login input[type="submit"]:focus{
	border-color: : #05a;
}
	
	</style>
 </head>
 <body bgcolor="#999999">
 <div class="header">
 	<h1><font face="Times New Roman, Times, serif" size="50"><center>NAVIGASI IPB</center></font></h1>
 </div>
 <div class="login">
			<h2 class="login-header" >Login Akun Navigasi IPB</h2>
             		<form class="login-container" action="login/index" method="post" onSubmit="return validasi()">

			<?php
	 // Cetak jika ada notifikasi
			if($this->session->flashdata('sukses')) {
					 echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
			}
			?>

			<?php echo form_open('login');?>
            <table><tr>
			<td>Username</td><td>:</td>
            <td><input type="text" name="username" value="<?php echo set_value('username'); ?>"/> 
			 <?php echo form_error('username'); ?>
 			</td></tr>
            <tr>
			<td>Password</td><td>:</td>
			<td><input type="password" name="password" value="<?php echo set_value('password'); ?>"/> 
			<?php echo form_error('password'); ?>
 			</td></tr>
			<tr>
			<td><input type="submit" name="btnSubmit" value="Login as Mahasiswa" /></td>
            <td> </td>
            <td><input type="submit" name="btnSubmit" value="Login as Dosen" /></td></tr>
 
			<?php echo form_close();?>
 </table></form>
					 Kembali ke beranda, Silakan klik <?php echo anchor(site_url().'/beranda','di sini >>'); ?>
 </div>
 </body>
 
 <script type="text/javascript">
	function validasi(){
		var username=document.getElementByPlaceholder("Masukkan Username").value;
		var password=document.getElementByPlaceholder("Password").value;
		if(username!="" && password!=""){
		return true;
		} else {
		alert('Username dan Password harus di isi !');
		return false;
		}
	}
 
 </html>
