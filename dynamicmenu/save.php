<?php
if( isset($_POST['json_menu'], $_POST['html_menu']) ){
		
	include "Connect.php";	
	$conn = new Connect();
	$k = $conn->connect();
	
	$json = mysqli_real_escape_string($k, $_POST['json_menu']);
	$html = mysqli_real_escape_string($k, $_POST['html_menu']);
	$script = mysqli_real_escape_string($k, "
	<script>
	var float_nav_offset_top = $('#nav').offset().top;	
	var float_nav = function(){
		var scroll_top = $(window).scrollTop();

		if( !$('.navbar-fixed-scrolldown').length ){
			return false;
		}
		
		if (scroll_top >= float_nav_offset_top) {		
			var navWidth = $('nav').width();

			if($(window).width() <= 800){		
				$('#nav').css({ 'position': 'fixed', 'top': 0, 'width': '100%', 'z-index':'2000'});
			}else{
				$('#nav').css({ 'position': 'fixed', 'top': 0, 'width': '100%', 'z-index':'2000'});
			}
		} 
		else {
			$('#nav').css({ 'position': 'relative', 'width': '100%', 'top': 'auto'});
		}
	};
	float_nav();
	
	$(window).scroll(function() {
		float_nav();
	});	
	</script>
	
	<style>
	.navbar-header.navbar-right ~ #navbar > ol.nav.navbar-right{margin-right:15px !Important;}
	</style>");
	
	// inactive another navbar in DB
	mysqli_query($k, "UPDATE dynamic_menu set active = 0");
	
	// insert to DB and activate the last navbar
	$insert = mysqli_query($k, "INSERT INTO dynamic_menu(id, backend_json, frontend_html, script, active) VALUES(NULL, '$json', '$html', '$script', 1)");
	
	if($insert)
		echo "succeed";
	else
		echo "failed";
}
?>