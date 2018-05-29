<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Schedule | NavIPB</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ;?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css') ;?>">
</head>
<body> 


	<div class="container">
		<button class="btn btn-success" onclick="add_schedule()"><i class="glyphicon glyphicon-plus"></i>Add Schedule</button>
		<br>
		<br>

		<table id="table_id" class="table table-stripped table-bordered">
			<thead>
			<tr>
				<th>Course ID</th>
				<th>Course Name</th>
				<th>Course Day</th>
				<th>Course Time</th>
				<th>Course Place</th>
				<th>Course Note</th>
				<th>Action</th>
			</tr>
			</thead>

			<tbody>
			<?php
			foreach($schedules as $schedule) {

			?>
			<tr>
				<td><?php echo $schedule->course_id ;?></td>
				<td><?php echo $schedule->course_name ;?></td>
				<td><?php echo $schedule->course_day ;?></td>
				<td><?php echo $schedule->course_time ;?></td>
				<td><?php echo $schedule->course_place ;?></td>
				<td><?php echo $schedule->course_note ;?></td>
				<td>
					<button class="btn btn-warning" onclick="edit_schedule(<?php echo $schedule->course_id; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>

					<button class="btn btn-danger" onclick="delete_schedule(<?php echo $schedule->course_id; ?>)"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
			</tr>

		<?php
		}
		?>
			</tbody>
		</table>
	</div>


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

		function add_schedule() {
			save_method = 'add';
			$('#form')[0].reset();
			$('#modal_form').modal('show');
		}

		function save() {
			var url;

			if(save_method == 'add') {
				url = '<?php echo site_url('index.php/Schedule/schedule_add') ;?>';
			} else {
				url = '<?php echo site_url('index.php/Schedule/schedule_update') ;?>';	
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

		function edit_schedule(id) {
			save_method = 'update';
			$('#form')[0].reset();

			//load data dari ajax
			$.ajax({
				url: "<?php echo site_url('index.php/schedule/ajax_edit/') ;?>/"+id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('[name="course_id"]').val(data.course_id);
					$('[name="course_name"]').val(data.course_name);
					$('[name="course_day"]').val(data.course_day);
					$('[name="course_time"]').val(data.course_time);
					$('[name="course_place"]').val(data.course_place);
					$('[name="course_note"]').val(data.course_note);
					
					$('#modal_form').modal('show');
					
					$('.modal_title').text('Edit Schedule');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error Get Data From Ajax');
				}
			});
		}

		function delete_schedule(id) {
			if(confirm('Are you sure delete this data?')) {
				// ajax delete data dari database

				$.ajax({
					url: "<?php echo site_url('index.php/schedule/schedule_delete') ;?>/"+id,
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

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body form">
      <form action="#" id="form" class="form-horizontal">
      	<input type="hidden" value="" name="course_id">

      	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Course Name</label>
      			<div class="col-md-9">
      				<input type="text" name="course_name" placeholder="‎ex: Bahasa Pemrograman" class="form-control">
      			</div>
     		 </div>
  		</div>

    	<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Course Day</label>
      			<div class="col-md-9">
      				<input type="text" name="course_day" placeholder="ex: Senin" class="form-control">
      			</div>
     		 </div>
  		</div>

  		<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Course Time</label>
      			<div class="col-md-9">
      				<input type="text" name="course_time" placeholder="ex: 10.00-12.00" class="form-control">
      			</div>
     		 </div>
  		</div>

  		<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Course Place</label>
      			<div class="col-md-9">
      				<input type="text" name="course_place" placeholder="ex: RK.U 201" class="form-control">
      			</div>
     		 </div>
  		</div>
  		<div class="form-body">
      		<div class="form-group">
      			<label class="control-label col-md-3">Note</label>
      			<div class="col-md-9">
      				<input type="text" name="course_note" placeholder="Your Note" class="form-control">
      			</div>
     		 </div>
  		</div>



      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">Submit</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>

