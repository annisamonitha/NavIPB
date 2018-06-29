 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
 <head>
   <meta charset="UTF-8">
    <title>
      Notification | NavIPB
    </title>

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ;?>">

   <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ;?>"></script>

   <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>

   <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>

   <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>

 </head>
 <body>

   <p><?php echo $message; ?></p>
    <p> Silahkan <?php echo anchor('Login','Login'); ?></p>
 </body>
 </html>

<style>
 body {
   margin: 0;
   padding: 0;
   width: 100%;
   position: absolute;
   background-image: url('http://icanbecreative.com/resources/files/articles/40-high-resolution-wallpapers-for-minimalist-lovers/sources/everest-minimalist-wallpaper-blue.png');
   background-size: cover;
 }

 p {
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
     background:rgba(12,12,70,0.8);
     color: #fff;
     border-radius: 20px;
     }
