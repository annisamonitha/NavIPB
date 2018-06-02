<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
  <title>Maps | NavIPB</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/home1/assets/vendor/bootstrap/css/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/home1/assets/vendor/font-awesome/css/font-awesome.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/home1/assets/vendor/linearicons/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/home1/assets/vendor/chartist/css/chartist-custom.css');?>">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/home1/assets/css/main.css');?>">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="<?php echo base_url('assets/home1/assets/css/demo.css');?>">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/home1/assets/img/apple-icon.png');?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/home1/assets/img/favicon.png');?>">
</head>

<body>
  <!-- WRAPPER -->
  <div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href="#">NavIPB</a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-left">
          <div class="input-group">
            <input type="text" value="" class="form-control" placeholder="Search...">
            <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
          </div>
        </form>
        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Hi, Guest!</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo ('login');?>"><span>Log In </span></a></li>
                <li><a href="<?php echo ('register');?>"><span>Sign Up</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="<?php echo ('homeguest');?>" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
            <li>
              <a href="#subPages" data-toggle="collapse" class="active"><i class="lnr lnr-map"></i> <span>Maps</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li>
                    <a href="<?php echo ('ipb1');?>" class="">
                      <h4> IPB 1 </h4>
                      <p><h6> FAPERTA - FAHUTAN - FATETA - FMIPA - FEM - FEMA </h6></p>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo ('ipb2');?>" class="">
                      <h4> IPB 2 </h4>
                      <p><h6> FKH - FPIK - FAPET - FMIPA Baru - FEM Baru </h6></p>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo ('ipb3');?>" class="">
                      <h4> IPB 3 </h4>
                      <p><h6> CCR - TL </h6></p>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo ('parkir');?>" class="">
                      <h4> Parking Lot </h4>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li><a href="<?php echo ('login');?>" class=""><i class="lnr lnr-list"></i> <span>Schedule</span></a></li>
            <li><a href="<?php echo ('login');?>" class=""><i class="lnr lnr-list"></i> <span>Activity</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <h3 class="page-title">Maps</h3>
            <div class="col-lg-11">

              <!-- PANEL HEADLINE -->
              <div class="panel panel-headline">
                <div class="carousel-inner" role="listbox" style="text-align: center;">
                  <img class="d-block img-fluid" src="<?php echo base_url('assets/maps/ipb1.png');?>">
                </div>
                <div class="panel-body" align="center">
                  <h3>IPB 1</h3>
                  <h4>FAPERTA - FAHUTAN - FATETA - FMIPA - FEM - FEMA</h4>
                </div>
              </div>
              <!-- END PANEL HEADLINE -->
            </div>

            <p><div class="input-group">
                    <input class="form-control" type="text" placeholder="Search...">
                    <span class="input-group-btn"><button class="btn btn-primary" type="button">Go!</button></span>
                  </div>
                </p>


          <div class="row">
            <div class="col-md-4">
              <!-- GKA -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">GKA (Gedung Kuliah A)</h3>
                </div>
                <div class="carousel-inner" style="text-align: center;">
                  <img class="card-img-top" src="<?php echo base_url('assets/maps/gkafix.png');?>">
                </div>
                <div class="panel-body" align="center">
              <a class="btn btn-primary" href="<?php echo ('gka');?>" title="See More"><span>See More</span></a>
                </div>
              </div>
              <!-- END GKA -->
            </div>
            <div class="col-md-4">
              <!-- PANEL pinus 1 -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">R. Pinus 1</h3>
                </div>
                <div class="carousel-inner" style="text-align: center;">
                  <img class="card-img-top" src="<?php echo base_url('assets/maps/pinus1.png');?>">
                </div>
                <div class="panel-body" align="center">
              <a class="btn btn-primary" href="<?php echo ('pinus1');?>" title="See More"><span>See More</span></a>
                </div>
              </div>
              <!-- END pinus 1 -->
            </div>
            <div class="col-md-4">
              <!-- PANEL pinus 2 -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Auditorium Toyib</h3>
                </div>
                <div class="carousel-inner" style="text-align: center;">
                  <img class="card-img-top" src="https://lh5.googleusercontent.com/-sMU5YVSJrnQ/TyivjqFKShI/AAAAAAAAJoQ/jSDYfQXO3Z0/s980/IPB3.jpg" width="300" height="200">
                </div>
                <div class="panel-body" align="center">
              <a class="btn btn-primary" href="<?php echo ('toyib');?>" title="See More"><span>See More</span></a>
                </div>
              </div>
              <!-- END pinus 2 -->
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
      <div class="container-fluid">
        <p class="copyright">&copy; 2018. NavIPB</p>
      </div>
    </footer>
  </div>
  <!-- END WRAPPER -->
  <!-- Javascript -->
  <script src="<?php echo base_url('assets/home1/assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/vendor/chartist/js/chartist.min.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/scripts/klorofil-common.js');?>"></script>
</body>

</html>
