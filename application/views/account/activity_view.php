<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Activity | NavIPB</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css') ;?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
      <li><a href="<?php echo ('dashboard');?>" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
      <li>
        <a href="#subPages" data-toggle="collapse" class=""><i class="lnr lnr-map"></i> <span>Maps</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        <div id="subPages" class="collapse ">
        <ul class="nav">
          <li>
          <a href="<?php echo ('ipb1user');?>" class="">
            <h4> IPB 1 </h4>
            <p><h6> FAPERTA - FAHUTAN - FATETA - FMIPA - FEM - FEMA </h6></p>
          </a>
          </li>
          <li>
          <a href="<?php echo ('ipb2user');?>" class="">
            <h4> IPB 2 </h4>
            <p><h6> FKH - FPIK - FAPET - FMIPA Baru - FEM Baru </h6></p>
          </a>
          </li>
          <li>
          <a href="<?php echo ('ipb3user');?>" class="">
            <h4> IPB 3 </h4>
            <p><h6> CCR - TL </h6></p>
          </a>
          </li>
          <li>
          <a href="<?php echo ('parkiruser');?>" class="">
            <h4> Parking Lot </h4>
          </a>
          </li>
        </ul>
        </div>
      </li>
      <li><a href="<?php echo ('schedule');?>" class=""><i class="lnr lnr-list"></i> <span>Schedule</span></a></li>
      <li><a href="<?php echo ('activity');?>" class="active"><i class="lnr lnr-list"></i> <span>Activity</span></a></li>
      </ul>
    </nav>
    </div>
  </div>
  <!-- END LEFT SIDEBAR -->
  <!-- MAIN -->
  <div class="main">
    <p>
  <div class="container">
    <button class="btn btn-success" onClick="add_activity()"><i class="glyphicon glyphicon-plus"></i>Add Activity</button>
    <br>
    <br>

    <table id="table_id" class="table table-stripped table-bordered">
      <thead>
      <tr>
        <th>Activity ID</th>
        <th>Activity Name</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
      </thead>

      <tbody>
      <?php
      foreach($activities as $activitie) {

      ?>
      <tr>
        <td><?php echo $activitie->activity_id ;?></td>
        <td><?php echo $activitie->activity_name ;?></td>
        <td><?php echo $activitie->activity_explanation ;?></td>
        <td>
          <button class="btn btn-warning" onClick="edit_activity(<?php echo $activitie->activity_id; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>

          <button class="btn btn-danger" onClick="delete_activity(<?php echo $activitie->activity_id; ?>)"><i class="glyphicon glyphicon-remove"></i></button>
        </td>
      </tr>

    <?php
    }
    ?>
      </tbody>
    </table>
  </div>
  <p>
    
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

  <!-- link to js -->
  <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ;?>"></script>
  
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>
  
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>
  
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>

  <!-- js -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#table_id').DataTable();
    });

    var save_method;
    var table;

    function add_activity() {
      save_method = 'add';
      $('#form')[0].reset();
      $('#modal_form').modal('show');
    }

    function save() {
      var url;

      if(save_method == 'add') {
        url = '<?php echo site_url('Activity/activity_add') ;?>';
      } else {
        url = '<?php echo site_url('Activity/activity_update') ;?>';  
      }

      $.ajax({
        url: url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data) {
          $('#modal_form').modal('hide'); 
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error adding / Update data');
        }
      });
    } 

    function edit_activity(id) {
      save_method = 'update';
      $('#form')[0].reset();

      //load data dari ajax
      $.ajax({
        url: "<?php echo site_url('activity/ajax_edit/') ;?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="activity_id"]').val(data.activity_id);
          $('[name="activity_name"]').val(data.activity_name);
          $('[name="activity_explanation"]').val(data.activity_explanation);
          
          $('#modal_form').modal('show');
          
          $('.modal_title').text('Edit Activity');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error Get Data From Ajax');
        }
      });
    }

    function delete_activity(id) {
      if(confirm('Are you sure delete this data?')) {
        // ajax delete data dari database

        $.ajax({
          url: "<?php echo site_url('activity/activity_delete') ;?>/"+id,
          type: "POST",
          dataType:"JSON",
          success: function(data) {
            location.reload();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error Deleting Data');
          }
        })
      }
    }

  </script>
   <script src="<?php echo base_url('assets/home1/assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/vendor/chartist/js/chartist.min.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/scripts/klorofil-common.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
  <script src="<?php echo base_url('assets/home1/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js');?>"></script>
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Add Your Activity Here</h4>
    </div>
    <div class="modal-body form">
    <form action="#" id="form" class="form-horizontal">
    <input type="hidden" value="" name="activity_id">

    <div class="form-body">
      <div class="form-group">
        <label class="control-label col-md-3">Activity Name</label>
        <div class="col-md-9">
          <input type="text" name="activity_name" placeholder="‎ex: Hari-H Pesta Sains Nasional" class="form-control">
        </div>
       </div>
    </div>

    <div class="form-body">
      <div class="form-group">
        <label class="control-label col-md-3">Description</label>
        <div class="col-md-9">
          <input type="text" name="activity_explanation" placeholder="ex: write your description about your activity here" class="form-control">
        </div>
       </div>
    </div>

    </form>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onClick="save()" class="btn btn-primary">Submit</button>
    </div>
  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>

