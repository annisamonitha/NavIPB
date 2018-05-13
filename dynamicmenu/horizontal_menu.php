<html>
<meta charset="utf-8">

<!-- prevent cache js -->
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>

<!-- src -->
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dynamic-menu-1.0.0/css/dynamic-menu.css" rel="stylesheet">
<script src="dynamic-menu-1.0.0/js/jquery-2.1.1.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="dynamic-menu-1.0.0/js/jquery-sortable.js"></script>

<?php include "Connect.php";
	$conn = new Connect();
	$k = $conn->connect();
	
	$select = mysqli_query($k, "SELECT * FROM dynamic_menu where active = 1");
	$fetch = mysqli_fetch_array($select, MYSQLI_ASSOC);
?>

<script>
$(function  () {

	/**
	* ===========================================================
	* CHOOSE NAVBAR POSITION (static, default, fixed, scrolldown)
	* ===========================================================
	*/
	$('#choose_navbar_position').on('change', function(){
		
		// remove class nav
		$('nav').removeAttr('class');
		// hide zero paragraph
		$('.zero-paragraph').hide();
		// scroll to top
		$(".sample_scroll").animate({ scrollTop: 0 }, "fast");
		
		if(this.value == 'navbar-static-top'){
		
			// remove temporary style
			$('#nav').removeAttr('style');
			// activate class navbar-static-top
			$('nav').addClass('navbar navbar-inverse navbar-static-top');
			
		}else if(this.value == 'navbar-default'){
			
			// remove temporary style
			$('#nav').removeAttr('style');
			// activate class navbar-default
			$('nav').addClass('navbar navbar-inverse navbar-default');
			// show zero paragraph
			$('.zero-paragraph').show();
			
		}else if(this.value == 'navbar-fixed-top'){
			
			// remove temporary style
			$('#nav').removeAttr('style');
			// activate class navbar-static-top		
			$('nav').addClass('navbar navbar-inverse navbar-fixed-top');
			
		}else if(this.value == 'navbar-fixed-scrolldown'){
		
			// remove temporary style
			$('#nav').removeAttr('style');
			// activate class navbar-static-top			
			$('nav').addClass('navbar navbar-inverse navbar-static-top navbar-fixed-scrolldown');
			// show zero paragraph
			$('.zero-paragraph').show();
		
		}
	});

	/**
	* ====================================
	* CHOOSE TITLE POSITION (LEFT - RIGHT)
	* ====================================
	*/
	$('#choose_title_position').on('change', function(){
		if(this.value == 'navbar-left'){
			// title to left
			$('.navbar-header').removeClass('navbar-right').addClass('navbar-left');
		}else if(this.value == 'navbar-right'){
			// title to right
			$('.navbar-header').removeClass('navbar-left').addClass('navbar-right');
		}
	});
	
	/**
	* ===================================
	* CHOOSE MENU POSITION (LEFT - RIGHT)
	* ===================================
	*/
	$('#choose_menu_position').on('change', function(){
		if(this.value == 'navbar-left'){
			$('ol.dynamic_menu').removeClass('navbar-right');
			$('ol.dynamic_menu').addClass('navbar-left');
		}else if(this.value == 'navbar-right'){
			$('ol.dynamic_menu').removeClass('navbar-left');
			$('ol.dynamic_menu').addClass('navbar-right');		
		}
	});

	// id navigation
	var float_nav_offset_top = $('#nav').position().top;	
	/**
	* ==============================================
	* FIXED NAVBAR SCROLLDOWN - GET (x, y coordinate)
	* ==============================================
	*/	
	var float_nav = function(){
		var scroll_top = $('.sample_scroll').scrollTop(); // our current vertical position from the top
		var post_top = $('.sample_scroll').offset().top;
		
		// if not have class navbar-fixed-scrolldown, then die()
		if( !$('.navbar-fixed-scrolldown').length )
			return false; // die() here
			
			
		// navigasi ketika scroll tetap fix di top & have class <navbar-fixed-scrolldown>
		if (scroll_top >= float_nav_offset_top) {
		
			// live change navigation width
			var navWidth = $('nav').width();

			// resolusi 800, scrolling navigasi diperkecil
			if($('.sample_scroll').width() <= 800){		
				$('#nav').css({ 'position': 'fixed', 'top': post_top, 'width': navWidth, 'z-index':'2000'});
			// resolusi >= 800
			}else{
				$('#nav').css({ 'position': 'fixed', 'top': post_top, 'width': navWidth, 'z-index':'2000'});
			}
		} 
		// scroll balik ke atas lagi
		else {
			$('#nav').css({ 'position': 'relative', 'width': navWidth, 'top': 'auto'});
		}
	};
	
	/**
	* ============================================
	* FIXED NAVBAR SCROLLDOWN - RUN
	* ============================================
	*/
	$('.sample_scroll').scroll(function() {
		float_nav(); // function above
	});
	
	/**
	* =================================
	* OPEN MODAL - CHANGE TITLE WEBSITE
	* =================================
	*/
	$('.navbar-header').click(function(){
		// @get val()
		titleWeb = $('.navbar-header .navbar-brand').text().trim();
		urlWebsite = $('.navbar-header .navbar-brand').attr('href');
		
		// show to input
		$('#titleWebsite_input').val(titleWeb);
		$('#urlWebsite_input').val(urlWebsite);
		
		$('#titleWebsiteModal').modal('show');
	});
	
	/**
	* =====================================
	* OPEN MODAL - SAVE TITLE & URL WEBSITE
	* =====================================
	*/
	$(document).on('click', '.save_titleWebsite', save_titleWebsite); // button save menu clicked
	$(document).on('submit', '#form_titleWebsite', function(e){ e.preventDefault(); }); // prevent form submitted
	$(document).on('keypress', '#form_titleWebsite', function(e) { if (e.which == '13') {save_titleWebsite();} }); // form enter	
	function save_titleWebsite(){
		// @get val()
		titleWeb = $('#titleWebsite_input').val();
		urlWebsite = $('#urlWebsite_input').val();
		
		// changed
		$('.navbar-header .navbar-brand').html(titleWeb);
		$('.navbar-header .navbar-brand').attr('href', urlWebsite);
		
		// hide modal
		$('#titleWebsiteModal').modal('hide');	
	}
	
	/**
	* ================
	* DRAG N DROP MENU
	* using sortable()
	* ================
	*/
	function liveSortable(){
		$("ol.nav").sortable({
			group: 'nav',
			delay: 100,
			nested: false,
			vertical: false,
			exclude: '.divider-vertical',		
			onDragStart: function($item, container, _super) {

				// backup id & position <li>
				var data_id = $($item).attr('data-id');
				var items = $('ol.nav li');
				var lastItem = $('ol.nav li[data-id='+data_id+']');
				var index_li = items.index(lastItem);

				// $item have submenu				
				if($($item).find('ol').length > 0){
					backupItem = $($item).clone();
					$('ol.nav li:eq('+ index_li +')').after( backupItem.addClass('backup-menu hidden') );
				}
				
				$item.find('ol.dropdown-menu').sortable('disable');
				_super($item, container);
			},
			onDrag: function($item, position){
				$item.css({
					display: 'none',
					//left: (position.left - offset.left),
					//top : position.top,
				});				
			},
			onDrop: function($item, container, _super) {
				
				// parent $item is dropdown menu
				parent_have_dropdown = $item.parent('ol.dropdown-menu').length;
				
				// parent have dropdown
				// then, can't append dropdown into dropdown
				if(parent_have_dropdown > 0){
					// $item have submenu				
					if($($item).find('ol').length > 0){
						alert('You can\'t append dropdown into dropdown');
						
						// show $item backup
						$('li.backup-menu.hidden').removeClass('backup-menu hidden');
						
						// delete again $item when already dropped
						$($item).remove();
						
						// refresh sortable()
						liveSortable();
						
						// refresh new dropdown
						dropdown_keep_on();
					}
					
				}else{
					$('li.backup-menu.hidden').remove();
				}
			
				// refresh prevent a href clicked
				preventClick();
				
				$item.find('ol.dropdown-menu').sortable('enable');
				_super($item, container);
			},		
		});
		
		$("ol.dropdown-menu").sortable({
			group: 'nav'
		});	
	}
	liveSortable();
  
	/**
	* ==========================
	* CLICK BUTTON "Create Menu"
	* ==========================
	*/
	$('.createmenu_btn').click(function(){ 

		// reset input form FIRST, ON MODAL CREATE MENU
		reset_form_createmenu();
		
		// title modal
		$('#createMenuModal h4#myModalLabel').html('CREATE MENU');
		
		// set action(create/edit_menu) and data-id ON MODAL CREATE MENU
		$('#hidden_action_menu').val('create_menu');
		$('#hidden_data_id').val('');

		// showing submenu input ON MODAL CREATE MENU
		$('#create_menu_dropdown').val('no');
		$('#create_menu_dropdown').removeAttr('disabled');
		$('.table_submenu').hide();			
	});
	
	/**
	* ====================
	* CREATE/EDIT the MENU
	* ====================
	* @event click & enter
	*/	
	$(document).on('click', '.create_menu_save', create_new_menu); // button save menu clicked
	$(document).on('submit', '#form_create_menu', function(e){ e.preventDefault(); }); // prevent form submitted
	$(document).on('keypress', '#form_create_menu', function(e) { if (e.which == '13') {create_new_menu();} }); // form enter
	function create_new_menu(action){
	
		// @get val()
		menu_name 		= $('#create_menu_name').val();
		make_dropdown 	= $('#create_menu_dropdown').val();
		show_menu_at 	= $('#create_menu_show').val();			
		url_menu		= $('#create_urlmenu').val().trim();
		if(url_menu == '') url_menu = '#';
		
		// menu name cannot empty
		if(menu_name.trim() != '')
		{
			// @new var
			var new_li = '';
			var new_submenu = '';

			// insert text to input form
			// @return new <li>
			new_li = value_to_form(make_dropdown, new_li, new_submenu, menu_name, url_menu);
			
			// new_li have no error
			if(new_li != 'false')
			{
				// get data menu (edit/create & data-id)
				action = $('#hidden_action_menu').val();
				data_id = $('#hidden_data_id').val();
				
				// append new <li> to menu
				if(action == 'create_menu'){
					$('ol.dynamic_menu').append(new_li);
					
				}else if(action == 'edit_menu'){
					li_target = $('ol.nav li[data-id='+data_id+']');
					li_target.replaceWith(new_li);
				}
				
				// hide modal after success create a new menu
				$('#createMenuModal').modal('hide');	

				// refresh sortable()
				liveSortable();
				
				// refresh new dropdown
				dropdown_keep_on();
		
				// refresh prevent a href clicked
				preventClick();			
				
			}else{
				alert('submenu must be filled');
				return false;
			}
			
		}else{
			alert('menu name cannot empty!');
			return false;
		}
	}
	
	/** 
	* ===================================================
	* (CREATE MENU ON MODAL) : MOVE VALUE() TO INPUT FORM
	* ===================================================
	*/
	function value_to_form(make_dropdown, new_li, new_submenu, menu_name, url_menu){
		
		// @var
		var err_submenu = 0;
		var max_id = 0;
				
		// GET MAX ID		
		$('ol.dynamic_menu li').each(function(i, v){

			// get attribute id
			attr_id = $(v).attr('data-id');
			
			if(i == 0){
				// eval() is convert str to int
				max_id = eval( attr_id );
			}else{
				now_id = eval( attr_id );
				if(max_id < now_id) max_id = now_id;
			}
		});
		
		// GET THE NEXT ID
		next_id = (eval(max_id) + 1);

		// @user choose 'make dropdown YES'
		if(make_dropdown == 'yes')
		{
			// create root menu
			new_li = "<li data-id=\""+ next_id +"\" data-name=\"" + menu_name + "\" data-url=\""+url_menu+"\" class='dropdown menu_click'><a class=\"dropdown-toggle\" href=\""+url_menu+"\" data-toggle='dropdown'>" + menu_name + " <span class='caret'></span></a>";
			
			// LOOPING SUBMENU
			// check whether submenu have been filled?
			$('.content_submenu').each(function(i, v){
				// @input val()
				submenu_name = $(v).find('#submenu_name').val();
				url_submenu = $(v).find('#url_submenu').val();
				
				// submenu must be filled
				if(submenu_name.trim() != '' && url_submenu.trim() != ''){
					next_id += 1;
					// create submenu
					new_submenu += '<li data-id="'+ next_id +'" data-name="'+submenu_name+' data-url="'+url_menu+'"><a href="'+url_submenu+'">'+submenu_name+'</a></li>';
				}else{					
					err_submenu += 1;
				}
			});
		
			// found blank of input submenu
			if(err_submenu > 0){				
				// die() here
				return 'false';
			}
			
			// create dropdown menu
			new_li += "<ol class='dropdown-menu'>"+new_submenu+"</ol></li>";
		}else{
			// create default menu
			new_li = "<li data-id=\""+ next_id +"\" data-name=\""+ menu_name +"\" data-url=\""+url_menu+"\" class='menu_click'><a href='"+url_menu+"'>" + menu_name + "</a></li>";
		}
		
		return new_li;
	}
	
	/**
	* ============================================
	* (CREATE MENU ON MODAL) : RESET INPUT SUBMENU  
	* ============================================
	*/
	function reset_form_createmenu(){
		var reset_submenu = $('.content_submenu:last').clone();
		$('.tbody_submenu').html(reset_submenu);
		$('.content_submenu:last').find('#url_submenu').val('');
		$('.content_submenu:last').find('#submenu_name').val('');
		
		// hide input submenu ON MODAL CREATE MENU
		$('.table_submenu').hide();		

		// reset 'form' create menu
		$('#form_create_menu')[0].reset();
	}
	
	/**
	* ======================================================
	* (CREATE MENU ON MODAL) : USER CHOOSE DROPDOWN OR NOT!! 
	* ======================================================
	*/
	$(document).on('change', '#create_menu_dropdown', function(){
		choosen = $(this).val();
		
		if(choosen == 'yes'){
			$('#createMenuModal .table_submenu').show();
		}else{
			$('#createMenuModal .table_submenu').hide();
		}
	});
	
	/**
	* ====================================================
	* (CREATE MENU ON MODAL) : TAMBAH SUBMENU BY CLICK (+)
	* ====================================================
	*/
	$(document).on('click', '.tambah_submenu', function(){
		// clone content_submenu
		$('.content_submenu:last').clone().appendTo('.tbody_submenu');
		
		// reset input
		$('.content_submenu:last').find('#url_submenu').val('');
		$('.content_submenu:last').find('#submenu_name').val('');
	});

	/**
	* ======================================================
	* (CREATE MENU ON MODAL) : KURANGIN SUBMENU BY CLICK (-)
	* ======================================================
	*/
	$(document).on('click', '.kurang_submenu', function(){
		// length submenu
		length_submenu = $('.content_submenu').length;
		
		// <tr> minimal harus ada satu
		if(length_submenu > 1){
			// remove <tr>
			$(this).parent().parent().remove();
		}
	});
	
	/**
	* =====================================================
	* (CREATE MENU ON MODAL) : AUTOFOCUS TO THE INPUT FIRST
	* =====================================================
	*/
	$('.modal').on('shown.bs.modal', function() {
		$(this).find('[autofocus]').focus();
	});	

	/**
	* ===================================================================
	* (NAVBAR) : KEEP-ON DROPDOWN WHEN USER CLICK THE OUTSIDE OF DROPDOWN
	* ===================================================================
	*/
	function dropdown_keep_on(){
		$('.dropdown').off().on({
			"shown.bs.dropdown": function() { this.closable = false; },
			"click" :             function(evt) { this.closable = true; },
			"hide.bs.dropdown":  function() { return this.closable; }
		});
	};
	dropdown_keep_on();

	/**
	* ======================
	* PREVENT A HREF CLICKED
	* ======================
	*/
	function preventClick(){
		$(  "ol.nav a, div.navbar-header a" ).off().click(function( event ) {
			event.preventDefault();
			console.log('click are disabled');
		});
	}
	preventClick();
	
	/**
	* ==========
	* RIGHT MENU
	* ==========
	*/
	// Trigger action when the contexmenu is about to be shown
	$(document).on("contextmenu", 'ol.nav li', function (event) {
		
		// Show contextmenu
		$(".custom-menu").finish().toggle(100).
    
		// In the right position (the mouse)
		css({
			top: event.pageY + "px",
			left: event.pageX + "px"
		});
		
		// Avoid the real one
		event.stopPropagation();
		event.preventDefault();

		// Update data-action
		$('.right_menu_edit').attr('li-target', $(this).attr('data-id'));
		$('.right_menu_delete').attr('li-target', $(this).attr('data-id'));
	});
	
	/**
	* ================
	*  RIGHT MENU (1)
	* ================
	*/
	// If the document is clicked somewhere
	$(document).bind("mousedown", function (e) {
		
		// If the clicked element is not the menu
		if (!$(e.target).parents(".custom-menu").length > 0) {
			
			// Hide it
			$(".custom-menu").hide(100);
			
			// Update data-action
			$('.right_menu_edit').attr('li-target', '-');
			$('.right_menu_delete').attr('li-target', '-');
		}
	});

	/**
	* ================
	*  RIGHT MENU (2)
	* ================
	*/	
	// If the menu element is clicked
	$(".custom-menu li").click(function(event){
		
		// @get value
		li_id = $(this).attr('li-target');
		li_target = $('ol.nav li[data-id='+li_id+']');
		menu_name = li_target.children('a:first').text();
		url_menu  = li_target.find('a:first').attr('href');
		
		// This is the triggered action name		
		if($(this).attr("data-action") == 'edit'){
			edit_menu();
		}else if($(this).attr("data-action") == 'delete'){
			delete_menu();
		}
		
		// edit existing menu //
		function edit_menu(){

			// reset form input
			reset_form_createmenu();

			// set the modal
			$('h4#myModalLabel').html('EDIT MENU');
			$('#createMenuModal').modal('show');
			$('input#create_menu_name').val(menu_name.trim());
			$('input#create_urlmenu').val(url_menu);
			
			// set action(create/edit menu) and data-id ON MODAL CREATE MENU
			$('#hidden_action_menu').val('edit_menu');
			$('#hidden_data_id').val(li_id);
			
			// menu with dropdown
			// update val() into input Modal
			if(li_target.find('ol').length > 0){
				
				// showing submenu input
				$('#create_menu_dropdown').val('yes');
				$('#create_menu_dropdown').removeAttr('disabled');
				$('.table_submenu').show();
				
				$(li_target.find('ol li')).each(function(i, v){
				
					// @get val()
					submenux = $(v).find('a:first').text().trim();
					urlx = $(v).find('a:first').attr('href').trim();
					
					if(i == 0){
						// update input submenu
						$('#submenu_name').val( submenux );
						$('#url_submenu').val( urlx );
					}else{
						// clone content_submenu
						$('.content_submenu:last').clone().appendTo('.tbody_submenu');
						
						// update input submenu
						$('.content_submenu:last').find('#submenu_name').val(submenux);
						$('.content_submenu:last').find('#url_submenu').val(urlx);
					}
				});
			}
			// menu without dropdown
			else{
				// parent menu is dropdown
				if(li_target.parent('ol .dropdown-menu').length > 0){
					// showing submenu input
					$('#create_menu_dropdown').val('no');
					$('#create_menu_dropdown').attr('disabled', 'disabled');
					$('.table_submenu').hide();			
				}
				// have no parent menu, this menu is single!
				else{
					// showing submenu input
					$('#create_menu_dropdown').val('no');
					$('#create_menu_dropdown').removeAttr('disabled');
					$('.table_submenu').hide();	
				}
			}
		}
		
		// delete existing menu //
		function delete_menu()
		{			
			// check have submenu
			if(li_target.find('ol').length > 0){
				// @new var
				var submenu_name = "";
				
				// get submenu name
				$(li_target.find('ol li')).each(function(i, v){
					submenu_name +=  "\n(" + (i+1) + ")    " + $(v).find('a').text().trim();
				});
				
				text_confirm = "Are you sure to delete dropdown : " + menu_name.trim() + " ?\nThis dropdown contain : " + submenu_name;
			}else{
				text_confirm = "Delete menu " + menu_name.trim() + " ?";
			}
			
			// dialog confirm
			c = confirm(text_confirm);			
			if(c == true){
				$(li_target).remove();
			}
		}
		// Hide it (right menu) AFTER the action was triggered
		$(".custom-menu").hide(100);
	});	
	
	/**
	* =====================
	* SAVE MENU TO DATABASE
	* FORMAT : HTML & JSON
	* =====================
	*/
	$('.save_menu_to_db').click(function(){
		
		// @val from <select> option
		var nav_post = $('#choose_navbar_position').val();
		var title_post = $('#choose_title_position').val();
		var menu_post = $('#choose_menu_position').val();
		
		// SAVE ALL JSON HERE
		var data = {};
		
		// JSON SELECT OPTION <CONFIGURATION>
		var conf = {};
		conf.navbar_position = nav_post;
		conf.title_position = title_post;
		conf.menu_position = menu_post;
		data.config = conf;
		
		// JSON TITLE WEBSITE
		var titleWeb = $('.sample_scroll .navbar-brand').text();
		var urlWeb = $('.sample_scroll .navbar-brand').attr('href');
		var idWeb = 0; // 0 is default
		data.title_web = {url: urlWeb, name: titleWeb, id: idWeb};
		
		// JSON MENU
		serialize_menu = $('ol.nav').sortable("serialize").get();
		// get inner bracket []
		menu = serialize_menu[0];
		data.menu = menu;

		// HTML MENU
		var html_menu = $('#nav').html();

		// jadi
		jadi_data = JSON.stringify(data);
		jadi_html = "<div id='nav'>" + html_menu + "</div>";
		
		// send to AJAX
		$.ajax({
			url: 'save.php',
			method: 'POST',
			data: { json_menu: jadi_data, html_menu: jadi_html },
			beforeSend: function(){
				$('.save_menu_to_db').text('Saving...');
				$('.save_menu_to_db').attr('disabled', 'disabled');
			}
		}).done(function(msg){
			alert('Saved!');
			$('.save_menu_to_db').text('Save');
			$('.save_menu_to_db').removeAttr('disabled');			
		}).fail(function(msg){
			//console.log(msg);
			alert('Error! ' + JSON.parse(JSON.stringify(msg.responseText)));
			$('.save_menu_to_db').text('Save');
			$('.save_menu_to_db').removeAttr('disabled');				
		});
	});
	
	/**
	* ==================================
	* LOAD JSON {"config": ...} FROM DB
	* TO CONFIGURATION - SELECT <OPTION> *HTML
	* ==================================
	*/
	function loadJSONFromDB(){
		// load JSON from DB
		var load_json_menu = <?= $fetch['backend_json']; ?>;
		
		// GET JSON CONFIGURATION
		navbar_position = load_json_menu.config.navbar_position;
		title_position = load_json_menu.config.title_position;
		menu_position = load_json_menu.config.menu_position;
		
		// SELECTED THE OPTION - NAVBAR POSITION
		$('#choose_navbar_position > option').each(function(i, v){
			if($(v).attr('value') == navbar_position){
				$(v).attr('selected', 'selected');
			}
		});
		// show zero paragraph if the navbar position choose 'navbar-fixed-scrolldown'
		if(navbar_position == 'navbar-fixed-scrolldown'){
			$('.zero-paragraph').show();
		}		
		
		// SELECTED THE OPTION - TITLE POSITION
		$('#choose_title_position > option').each(function(i,v){
			if($(v).attr('value') == title_position){
				$(v).attr('selected', 'selected');
			}
		});
		
		// SELECTED THE OPTION - MENU POSITION
		$('#choose_menu_position > option').each(function(i,v){
			if($(v).attr('value') == menu_position){
				$(v).attr('selected', 'selected');
			}
		});
	}
	loadJSONFromDB();
	
});
</script>

<body>

<br/>
<br/>

<div class="container">
	<div class="row">
		<!-- CONFIGURATION -->
		<div class="col-md-2 col-md-offset-1" style='background:#eee'> 		
			<h3 style='color:green'>Configuration</h3>
			<br/>
			<label for="choose_navbar_fixed">Navbar Position</label>
			<select class="form-control" id="choose_navbar_position">
				<option value="navbar-static-top">Static Top</option>
				<option value="navbar-default">Default</option>
				<option value="navbar-fixed-top">Fixed Top</option>
				<option value="navbar-fixed-scrolldown">Fixed When Scroll Down</option>
			</select>
			<br/>		
			<label for="choose_title_position">Title Position</label>
			<select class="form-control" id="choose_title_position">
				<option value="navbar-left">Left</option>
				<option value="navbar-right" class=''>Right</option>
			</select>
			<br/>		
			<label for="choose_menu_position">Menu Position</label>
			<select class="form-control" id="choose_menu_position">
				<option value="navbar-left">Left</option>
				<option value="navbar-right" class=''>Right</option>
			</select>
			<br/>	
		</div>
		
		<div class="col-md-8">	
			<!-- TOOLS above -->
			<a class="btn btn-primary btn-sm createmenu_btn" href="#" role="button" data-toggle="modal" data-target="#createMenuModal">
				<span class="glyphicon glyphicon-plus"></span>
				Add Menu
			</a>
			<a class="btn btn-success btn-sm save_menu_to_db" href="#" role="button">Save</a>
			<a class="btn btn-success btn-sm previewFullscreen hidden" href="#" role="button">Preview Fullscreen</a>
			<br/>&nbsp;
			
			<!-- SCROLL-Y -->
			<div class="sample_scroll" style="overflow-y:scroll; height:300px;">
				<span class="zero-paragraph" style="display: none; ">This is only example of content, the content will not appear when you apply this navbar on your website.<br/><br/></span>

				<!-- NAVBAR -->
				<?= $fetch['frontend_html']; ?>	
				
				<!-- CONTENT -->
				<div id='contentx'>
					<span class="first-paragraph" style='color:black'>This is only example of content, the content will not appear when you apply this navbar on your website.<br/><br/></span>			
					This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website.
					This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website.
					<br/>
					<br/>
					This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website.
					This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website.
					<br/>
					<br/>
					This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website.
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website. This is only example of content, the content will not appear when you apply this navbar on your website.
					<br/>
					<br/>
				</div>
			</div> <!-- /scroll-y -->
		</div>
	</div>
</div>

<!-- Right Menu {CONTEXTMENU} -->
<ul class='custom-menu'>
  <li data-action="edit" li-target="-" class="right_menu_edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</li>
  <li data-action="delete" li-target="-" class="right_menu_delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</li>
</ul>

<!-- Modal create & edit menu @ALL -->
<div class="modal fade modal_multifunction" id="createMenuModal" tabindex="-1" role="dialog" aria-labelledby="createMenuModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Create Menu</h4>
			</div>
		<div class="modal-body">
			<form id="form_create_menu" role="form">
			<div class="form-group">
				<label for="create_menu_name">Menu Name</label>
				<input type="text" id="create_menu_name" class="form-control" placeholder="Article" autofocus>
				<input type="text" id="hidden_action_menu" class="form-control hidden">
				<input type="text" id="hidden_data_id" class="form-control hidden">
			</div>
			<div class="form-group">
				<label for="create_urlmenu">Url</label>
				<input type="text" id="create_urlmenu" class="form-control" placeholder="url">
			</div>			
			<div class="form-group">
				<label for="create_menu_dropdown">Make Dropdown</label>
				<select class="form-control" id="create_menu_dropdown">
					<option value="no">No</option>
					<option value="yes" class=''>Yes</option>
				</select>
			</div>
			<div class="form-group" style='overflow:hidden'>
				<table class="table table_submenu">
					<thead style='font-size:10pt'>
						<tr>
							<td style='width:20%'><label class="tb_submenu">Submenu</label></td>
							<td><label class="tb_submenu">Url</label></td>
							<td>&nbsp;</td>
						</tr>
					</thead>
					<tbody class='tbody_submenu'>
						<tr class='content_submenu'>
							<td><input type="text" id="submenu_name" class="form-control" placeholder="game"></td>
							<td><input type="text" id="url_submenu" class="form-control" placeholder="url"></td>
							<td style='width:16%'>
								<span class="glyphicon glyphicon-plus-sign tambah_submenu" aria-hidden="true"></span>
								<span class="glyphicon glyphicon-minus-sign kurang_submenu" aria-hidden="true"></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary create_menu_save">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal create & edit menu @without dropdown -->
<div class="modal fade" id="titleWebsiteModal" tabindex="-1" role="dialog" aria-labelledby="titleWebsiteModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="titleWebsite_h4">TITLE WEBSITE</h4>
			</div>
		<div class="modal-body">
			<form id="form_titleWebsite" role="form">
			<div class="form-group">
				<label for="titleWebsite_input">Title</label>
				<input type="text" id="titleWebsite_input" class="form-control" placeholder="your website" autofocus>
			</div>
			<div class="form-group">
				<label for="urlWebsite_input">Url Website</label>
				<input type="text" id="urlWebsite_input" class="form-control" placeholder="url website">
			</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary save_titleWebsite">Save</button>
      </div>
    </div>
  </div>
</div>
</body></html>