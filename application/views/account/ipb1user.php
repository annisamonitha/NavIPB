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
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/maps/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="<?php echo base_url('assets/home1/assets/css/demo.css');?>">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/home1/assets/img/apple-icon.png');?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/home1/assets/img/favicon.png');?>">

  

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/maps/css/shop-homepage.css');?>" rel="stylesheet">
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Hi! <?php echo ucfirst($this->session->userdata('username')); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo ('profile');?>"><span>My Profile</span></a></li>
                <li><a href="<?php echo ('login/logout');?>"><span>Log Out</span></a></li>
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
            <li><a href="<?php echo ('schedule');?>" class=""><i class="lnr lnr-list"></i> <span>Schedule</span></a></li>
            <li><a href="<?php echo ('activity');?>" class=""><i class="lnr lnr-list"></i> <span>Activity</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">

      <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item One</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Two</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Three</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Four</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Five</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Six</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->
      
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

  <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('assets/maps/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/maps/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
</body>

</html>
