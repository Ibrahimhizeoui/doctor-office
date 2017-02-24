     <?php 

require_once('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Piluku Admin Template</title>

  <!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->
  <!-- Bootstrap CSS -->

  
        <!-- Hammer reload -->
          <script>
            setInterval(function(){
              try {
                if(typeof ws != 'undefined' && ws.readyState == 1){return true;}
                ws = new WebSocket('ws://'+(location.host || 'localhost').split(':')[0]+':35353')
                ws.onopen = function(){ws.onclose = function(){document.location.reload()}}
                ws.onmessage = function(){
                  var links = document.getElementsByTagName('link'); 
                    for (var i = 0; i < links.length;i++) { 
                    var link = links[i]; 
                    if (link.rel === 'stylesheet' && !link.href.match(/typekit/)) { 
                      href = link.href.replace(/((&|\?)hammer=)[^&]+/,''); 
                      link.href = href + (href.indexOf('?')>=0?'&':'?') + 'hammer='+(new Date().valueOf());
                    }
                  }
                }
              }catch(e){}
            }, 1000)
          </script>
        <!-- /Hammer reload -->
      

<link rel='stylesheet' href='assets/css/bootstrap.min.css'>
<link rel='stylesheet' href='assets/css/material.css'>
<link rel='stylesheet' href='assets/css/style.css'>

  <script src='assets/js/jquery.js'></script>
<script src='assets/js/app.js'></script>
  <script>
    jQuery(window).load(function () {
      $('.piluku-preloader').addClass('hidden');
    });
  </script>
</head>
<body class="" >
  <div class="piluku-preloader text-center">
  <!-- <div class="progress">
      <div class="indeterminate"></div>
  </div> -->
  <div class="loader">Loading...</div>
</div>
<div class="wrapper ">

  

<div class="left-bar ">
	<div class="admin-logo">
		<div class="logo-holder pull-left">
			<img class="logo" src="assets/images/example.png" alt="logo">	
		</div>
		<!-- logo-holder -->			
		<a href="#" class="menu-bar  pull-right"><i class="ti-menu"></i></a>
	</div>
	<!-- admin-logo -->
	<ul class="list-unstyled menu-parent" id="mainMenu">
		<li>
			<a href="index.html" class="waves-effect waves-light">
				<i class="icon ti-home"></i>
				<span class="text ">Dashboard</span>
			</a>
		</li>
		<li class="submenu">
			<a class="waves-effect waves-light" href="#layouts">
				<i class="icon ti-layout"></i>
				<span class="text">Unique Layouts</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled">
				<li><a href="collapsed-sidebar.html">Collapsed Sidebar</a></li>
				<li><a href="left-sidebar-version2.html">Menu with header</a></li>
				<li><a href="horizontal-menu.html">Horizontal Menu</a></li>					
				<li><a href="right-sidebar.html">Right Sidebar</a></li>
				<li><a href="boxed-layout.html">Boxed Layout</a></li>
				<li><a href="static-sidebar.html">Static Sidebar</a></li>
			</ul>
		</li>
		<li class="submenu">
			<a class="waves-effect waves-light" href="#piluku_premium">
				<i class="icon ti-gift"></i>
				<span class="text">Piluku Premium</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled" id="piluku_premium">
				<li><a href="widgets.html">Widgets</a></li>
				<li><a href="tasks.html">Tasks</a></li>
				<li><a href="mailbox.html">Mailbox</a></li>
				<li><a href="profile.html">Profile</a></li>
				<li><a href="invoice.html">Invoice</a></li>
				<li><a href="timeline.html">Timeline</a></li>
				<li><a href="pricing.html">Pricing</a></li>
				<li><a href="gallery.html">Gallery</a></li>
				<li><a href="masonry-gallery.html">Masonry Gallery</a></li>
				<li><a href="rotated-gallery.html">Rotated Gallery</a></li>
			</ul>
		</li>
		<li>
			<a href="typography.html">
				<i class="icon ti-smallcap"></i>
				<span class="text">Typography</span>
			</a>
		</li>				
		<li class="submenu">
			<a class="waves-effect waves-light" href="#components">
				<i class="icon ti-briefcase"></i>
				<span class="text">Components</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled" id="components">
				<li class="submenu">
					<a class="waves-effect waves-light" href="#alerts">
						Alerts
						<span class="pull-right drop-arrow">
							<i class="drop-indicator ti-angle-right chevron"></i>
						</span>
					</a>
					<ul class="list-unstyled" id="alerts">
						<li><a href="basic-alerts.html">Basic Alerts</a></li>
						<li><a href="sweet-alerts.html">Sweet Alerts</a></li>
					</ul>
				</li>
				<li><a href="progress-bars.html">Progress Bars</a></li>
				<li><a href="dropdowns.html">Dropdowns</a></li>
				<li><a href="info-boxes.html">Info Boxes</a></li>
				<li><a href="notifications.html">Notifications</a></li>
				<li><a href="buttons.html">Buttons</a></li>
				<li><a href="tree-view.html">Tree View</a></li>
				<li><a href="css3-animations.html">CSS3 Animations</a></li>
				<li><a href="sliders.html">Sliders</a></li>
				<li><a href="nestable-lists.html">Nestable Lists</a></li>
				<li><a href="carousel.html">Carousel</a></li>
				<li><a href="portlets.html">Portlets</a></li>
				<li class="submenu">
					<a class="waves-effect waves-light" href="#icons">
						Icons
						<span class="pull-right drop-arrow">
							<i class="drop-indicator ti-angle-right chevron"></i>
						</span>
					</a>
					<ul class="list-unstyled" id="icons">
						<li><a href="ion-icons.html">Ion Icons</a></li>
						<li><a href="font-awesome.html">Font Awesome</a></li>
						<li><a href="themify.html">Themify Icons</a></li>
					</ul>
				</li>
				<li><a href="tooltips.html">Tooltips</a></li>
				<li><a href="labels-badges.html">Labels Badges</a></li>
				<li><a href="list-groups.html">List Groups</a></li>
				<li><a href="breadcrumbs-wells.html">Breadcrumbs</a></li>
				<li><a href="tabs-accordions.html">Tabs Accordions</a></li>
				<li><a href="file-manager.html">File Manager</a></li>
				<li><a href="modals.html">Modals</a></li>
				<li><a href="pagination.html">Pagination</a></li>

			</ul>
		</li>
		<li class="submenu">
			<a class="waves-effect waves-light" href="#forms_elements">
				<i class="icon ti-book"></i>
				<span class="text">Forms</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled">
				<li><a href="dropzone-file-upload.html">Dropzone File Upload</a></li>
				<li><a href="form-validation.html">Form Validation</a></li>
				<li><a href="form-wizard.html">Form Wizard</a></li>
				<li><a href="input-groups.html">Input Groups</a></li>
				<li><a href="form-elements.html">Form Elements</a></li>
				<li><a href="multiple-file-upload.html">Multiple File Upload</a></li>
				<li><a href="image-crop-zoom.html">Image Crop Zoom</a></li>
				<li><a href="wysiwig.html">WYZIWIG &amp; Markdown</a></li>
			</ul>
		</li>
		<li class="submenu">
			<a class="waves-effect waves-light" href="#tables">
				<i class="icon ti-layout-grid2"></i>
				<span class="text">Tables</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled" id="tables">
				<li><a href="basic-tables.html">Basic Tables</a></li>
				<li class='current'><a class='current' href="dynamic-tables.html">Dynamic Tables</a></li>
				<li><a href="editable-tables.html">Editable Tables</a></li>
				<li><a href="users-table.html">Users Table</a></li>
			</ul>
		</li>
		<li class="submenu">
			<a class="waves-effect waves-light" href="#piluku_utility">
				<i class="icon ti-heart"></i>
				<span class="text">Piluku Utility</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled" id="piluku_utility">
				<li class="submenu">
					<a class="waves-effect waves-light" href="#register">
						Register
						<span class="pull-right drop-arrow">
							<i class="drop-indicator ti-angle-right chevron"></i>
						</span>
					</a>
					<ul class="list-unstyled" id="register">
						<li><a href="signup.html">Modal One</a></li>
						<li><a href="signup2.html">Modal Two</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a class="waves-effect waves-light" href="#login">
						Login
						<span class="pull-right drop-arrow">
							<i class="drop-indicator ti-angle-right chevron"></i>
						</span>
					</a>
					<ul class="list-unstyled" id="login">
						<li><a href="signin.html">Modal One</a></li>
						<li><a href="signin2.html">Modal Two</a></li>
					</ul>
				</li>
				<li><a href="forgot-password.html">Forgot Password</a></li>
				<li><a href="lock-screen.html">Lock Screen</a></li>
				<li><a href="lock-screen2.html">Lock Screen 2</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li><a href="404.html">404</a></li>
				<li><a href="505.html">505</a></li>
				<li><a href="template.html">Template</a></li>
			</ul>
		</li>
		<li class="submenu">
			<a class="waves-effect waves-light" href="#charts">
				<i class="icon ti-bar-chart-alt"></i>
				<span class="text">Charts</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled" id="charts">
				<li><a href="line-area-charts.html">Line &amp; Area Charts</a></li>
				<li><a href="bar-charts.html">Bar Charts</a></li>
				<li><a href="pie-charts.html">Pie Charts</a></li>
				<li><a href="nvd3-charts.html">NVD3 Charts</a></li>
			</ul>
		</li>
		<li class="submenu">
			<a class="waves-effect waves-light" href="#maps">
				<i class="icon ti-location-pin"></i>
				<span class="text">Maps</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled" id="maps">
				<li class="submenu">
					<a class="waves-effect waves-light" href="#google_maps">
						Google Maps
						<span class="pull-right drop-arrow">
							<i class="drop-indicator ti-angle-right chevron"></i>
						</span>
					</a>
					<ul class="list-unstyled" id="google_maps">
						<li><a href="google-maps.html">Basic Maps</a></li>
						<li><a href="markers-maps.html">Markers Maps</a></li>
						<li><a href="routes-maps.html">Routes Maps</a></li>
					</ul>
				</li>
				<li><a href="vector-maps.html">Vector Maps</a></li>
			</ul>
		</li>

		<li class="submenu">
			<a class="waves-effect waves-light" href="#menu_levels">
				<i class="icon ti-layout-list-thumb"></i>
				<span class="text">Menu Levels</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled" id="menu_levels">
				<li class="submenu">
					<a class="waves-effect waves-light" href="#menu_level_one">Menu Level 1.1
						<span class="pull-right drop-arrow">
							<i class="drop-indicator ti-angle-right chevron"></i>
						</span>
					</a>
					<ul class="list-unstyled" id="menu_level_one">
						<li><a href="#">Menu Level 2.1</a></li>
						<li><a href="#">Menu Level 2.2</a></li>
						<li><a href="#">Menu Level 2.3</a></li>
					</ul>
				</li>
				<li><a href="#">Menu Level 1.2</a></li>
				<li><a href="#">Menu Level 1.3</a></li>
			</ul>
		</li>
	</ul>
</div>
<!-- left-bar -->

<div class="content" id="content">
	
	<div class="overlay"></div>			
	
	<div class="top-bar">
	<nav class="navbar navbar-default top-bar">
		<div class="menu-bar-mobile" id="open-left"><i class="ti-menu"></i>
		</div>

		<form class="navbar-left" role="search">
			<div class="search">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav navbar-nav navbar-right top-elements">
			<li class="piluku-dropdown dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img class="flag_img" src="assets/images/flags/india-flag.jpg" alt=""> English<span class="drop-icon"><i class="ion ion-chevron-down"></i></span>
				</a>
				<ul class="dropdown-menu dropdown-piluku-menu  animated fadeInUp wow language-drop neat_drop" data-wow-duration="1500ms" role="menu">
					<li>
						<a href="#"><img class="flag_img" src="assets/images/flags/gm.gif" alt="flags"> German</a>
					</li>
					<li>
						<a href="#"><img class="flag_img" src="assets/images/flags/usa.png" alt="flags"> Spanish</a>
					</li>
					<li>
						<a href="#"><img class="flag_img" src="assets/images/flags/gm.gif" alt="flags"> german</a>
					</li>
					<li>
						<a href="#"><img class="flag_img" src="assets/images/flags/gm.gif" alt="flags"> german</a>
					</li>
				</ul>
			</li>
			<li class="piluku-dropdown dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="ion-ios-bell-outline icon-notification"></i><span class="badge info-number message">22</span></a>
				<ul class="dropdown-menu dropdown-piluku-menu  animated fadeInUp wow notification-drop neat_drop dropdown-right" data-wow-duration="1500ms" role="menu">
					<li>
						<a href="profile.html">
							<div class="hexagon danger">
								<span><i class="ion-ios-alarm-outline"></i></span>
							</div>
							<span class="text_info"> Privacy settings have been changed</span>
							<span class="time_info">3:30am</span>
						</a>
					</li>
					<li>
						<a href="profile.html">
							<div class="hexagon success">
								<span><i class="ion-ios-body-outline"></i></span>
							</div>
							<span class="text_info"> Tim has added you as friend</span>
							<span class="time_info">4:30am</span>
						</a>
					</li>
					<li>
						<a href="profile.html">
							<div class="hexagon warning">
								<span><i class="ion-ios-cart-outline"></i></span>
							</div>
							<span class="text_info"> New item added</span>
							<span class="time_info">6:07am</span>
						</a>
					</li>
					<li>
						<a href="profile.html">
							<div class="hexagon info">
								<span><i class="ion-ios-calendar-outline"></i></span>
							</div>
							<span class="text_info"> reminder please complete the task</span>
							<span class="time_info">3:30pm</span>
						</a>
					</li>
					<li>
						<a href="profile.html">
							<div class="outline-hexagon">
								<span><i class="ion-ios-checkmark-outline"></i></span>
							</div>
							<span class="text_info"> Marked as complete</span>
							<span class="time_info">1:30pm</span>
						</a>
					</li>
					<li>
						<a href="profile.html" class="last_info">See all notifications</a>
					</li>

				</ul>
			</li>
			<li class="piluku-dropdown dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="ion-ios-box-outline icon-notification"></i><span class="badge info-number bell">22</span></a>
				<ul class="dropdown-menu dropdown-piluku-menu  animated fadeInUp wow message_drop neat_drop dropdown-right" data-wow-duration="1500ms" role="menu">
					<li>
						<a href="mailbox.html">
							<div class="avatar_left"><img src="assets/images/avatar.jpeg" alt=""></div>
							<div class="info_right">
								<span class="text_head pull-left">Megan fox</span>
								<span class="time_info pull-right">3:30am <i class="online ion-record"></i></span>
								<div class="text_info"> Hi want to know about the company freelance for wizard</div>
							</div>							
						</a>
					</li>
					<li>
						<a href="mailbox.html">
							<div class="avatar_left"><img src="assets/images/avatar.jpeg" alt=""></div>
							<div class="info_right">
								<span class="text_head pull-left">Megan fox</span>
								<span class="time_info pull-right">3:30am <i class="online ion-record"></i></span>
								<div class="text_info"> Hi want to know about the company freelance for wizard</div>
							</div>							
						</a>
					</li>
					<li>
						<a href="mailbox.html">
							<div class="avatar_left"><img src="assets/images/avatar.jpeg" alt=""></div>
							<div class="info_right">
								<span class="text_head pull-left">Megan fox</span>
								<span class="time_info pull-right">3:30am <i class="online ion-record"></i></span>
								<div class="text_info"> Hi want to know about the company freelance for wizard</div>
							</div>	
						</a>
					</li>
					<li>
						<a href="mailbox.html">
							<div class="avatar_left"><img src="assets/images/avatar.jpeg" alt=""></div>
							<div class="info_right">
								<span class="text_head pull-left">Megan fox</span>
								<span class="time_info pull-right">3:30am <i class="online ion-record"></i></span>
								<div class="text_info"> Hi want to know about the company freelance for wizard</div>
							</div>	
						</a>
					</li>
				</ul>
			</li>
			<li class="piluku-dropdown dropdown">
				<!-- @todo Change design here, its bit of odd or not upto usable -->

				<a href="#" class="dropdown-toggle avatar_width" data-toggle="dropdown" role="button" aria-expanded="false"><span class="avatar-holder"><img src="assets/images/avatar.jpeg" alt=""></span><span class="avatar_info">Bootstrap</span><span class="drop-icon"><!-- <i class="ion ion-chevron-down"></i> --></span></a>
				<ul class="dropdown-menu dropdown-piluku-menu  animated fadeInUp wow avatar_drop neat_drop dropdown-right" data-wow-duration="1500ms" role="menu">
					<li>
						<a href="profile.html"> <i class="ion-android-settings"></i>Settings</a>
					</li>
					<li>
						<a href="mailbox.html"> <i class="ion-android-chat"></i>Messages</a>
					</li>
					<li>
						<a href="dropzone-file-upload.html"> <i class="ion-android-cloud-circle"></i>Upload</a>
					</li>
					<li>
						<a href="profile.html"> <i class="ion-android-create"></i>Edit profile</a>
					</li>
					<li>
						<a href="lock-screen.html" class="logout_button"><i class="ion-power"></i>Logout</a>
					</li>   
				</ul>
			</li>
			<li class="chat_btn">
				<a href="#" class="right-bar-toggle flatRed">
					<i class="ion-ios-people-outline"></i>                              
				</a>
			</li>
		</ul>

	</nav>

</div>
<!-- /top-bar -->
	

	<!-- Page Header -->
	<div class="page_header">
		<div class="pull-left">
			<i class="icon ti-widgetized page_header_icon"></i>
			<span class="main-text">Les Rendez Vous </span>
			<p class="text">
				Le tableau contient une recherche dinamique , l'alert en verte et en rouge indique la durée 
			</p>
		</div>
		<div class="right pull-right">
			<ul class="right_bar">
				<li class="list-unstyled"><a href="http://mindmup.github.io/editable-table/"><i class="icon ion-checkmark text-primary"></i> &nbsp;Mindup Editing</a>
				</li>
				<li class="list-unstyled"><i class="icon ion-checkmark text-primary"></i> &nbsp;sorting</li>
				<li class="list-unstyled"><i class="icon ion-checkmark text-primary"></i> &nbsp;Pagination</li>
				<li class="list-unstyled"><i class="icon ion-checkmark text-primary"></i> &nbsp;Recherche Dynamique </li>
			</ul>
		</div>
	</div>
	<!-- /pageheader -->

	<!-- main content -->
	<div class="main-content">

		<!-- *** Editable Tables *** -->
		<!-- /panel -->

		<!-- *** Editable Tables *** -->
		<div class="panel panel-piluku">
			<div class="panel-heading">
				<h3 class="panel-title">
					La liste Complete
					<span class="panel-options">
						<a href="#" class="panel-refresh">
							<i class="icon ti-reload"></i>
						</a>
						<a href="#" class="panel-minimize">
							<i class="icon ti-angle-up"></i>
						</a>
						<a href="#" class="panel-close">
							<i class="icon ti-close"></i>
						</a>
					</span>
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped display" id="example">
						<thead>
							<tr>
								<th>Nom et prenom</th>
								<th>Téléphone</th>
								<th>email</th>
								<th>photo</th>
								<th>date du consultation</th>
								<th style="display:none;"></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							 $select=$bdd->prepare("SELECT *,DATE_FORMAT(date, '%Y-%m-%dT%H:%i:%s') as d , Now() as dd FROM `consultation` order by date desc ");
								 $select->execute();
								 while($s=$select->fetch()){
									 $t=$s['idp'];
									 $x=$s['id'];
									 $n=$s['nature'];
									 $select2=$bdd->prepare("SELECT nom,prenom,tel,email FROM `patiant` where id=$t");
								     $select2->execute();
									 $s1=$select2->fetch();
									 ?>
							<tr class="odd gradeX">
								<td ><?php  $d=$s1['nom'].'  '.$s1['prenom'];echo $d;?></td>
										
								<td><span class="label bg-info"><?php echo $s1['tel']?></span></td>
								<td><?php echo $s1['email']?></td>
								<td class="center">
								<div class="col-md-3" style="margin-left: 30px;">
								        <span class="avatar-holder"><img src="assets/patient/<?php echo $s['idp'];?>.jpg" alt="" style=" width:100px;">
										
							            
							            </div>
								</td>
								<?php if($s['d']>$s['dd']) {?><td class="center"><span class="badge bg-success"><?php echo $s['d'];?></span><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#defaultmodal" style=" margin-left: 30px;">
									Modifier RDV
								</button></td><?php }?>
								<?php if($s['d']<$s['dd']) {?><td class="center"><span class="badge bg-danger"><?php echo $s['d'];?></span><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#defaultmodal" style=" margin-left: 30px;">
									Modifier RDV
								</button></td><?php }?>
								<div class="modal fade" id="defaultmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel1">Tapez les informations puis Metre à jours </h4>
				</div>
				<div class="modal-body" style="display:inline-block;width:100%">
					
					 <form method="post" action="enre.php?idp=<?php echo $x;?>" role="form" class="form form-vertical">
					 
					      
					 
					 
				 <div class="form-group">
						<label class="col-sm-2 control-label">infos du RDV:</label>
						<div class="col-sm-3">
							<input name="date" type="date" class="form-control" data-validation="date" data-validation-optional="true">
						</div>
						<div class="col-sm-3">
							<input name="time" type="time" class="form-control" data-validation="date" data-validation-optional="true">
						</div>
						<div class="col-sm-3">
							<select class="name_search form-control" name="nature" data-validation="required" data-validation-error-msg="Please make a choice">
								<option value="<?php echo $n;?>">Type du consultation  -</option>
								<option value="consultation"> Consultation </option>
								<option value="controle"> Controle </option>
								<option value="autre"> Autre </option>
								
							</select>
						</div>
						
					</div> 
					<div class="form-group ">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-2">
							
						</div>
						
					</div>
					
				</div>
				
				<div class="modal-footer" style="  margin-top: 40px;">
				
					
					
					<input type="submit" name="rdv" class="btn btn-primary"  value="mise a jour"/>
					
					<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div></form>
			</div>
		</div>
		</div>
				
														</tr>
								 <?php }?>
							
						</tbody>
						<tfoot>
							<tr>
								<th>Nom et prenom</th>
								<th>Téléphone</th>
								<th>email</th>
								<th>photo</th>
								<th>date du consultation</th>
								
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<!-- /panel -->

	</div>
	<!-- /main content -->

</div>  

	<div class="side-bar right-bar ">
		<div class="contacts">
			<div class="col col-md-12">
				<ul class="tabs">
					<li class="tab col-md-3"><a href="#test1" class="active">Chat</a></li>
					<li class="tab col-md-3"><a href="#test2">Settings</a></li>
					<li class="tab col-md-3"><a href="#test3">Messages</a></li>
				</ul>
			</div>
			<div class="content-holder">
				<div id="test1" class="col-md-12 no_padding">					
					<div class="panel-body no_padding">
						<div class="panel-group piluku-accordion piluku-accordion-two" id="accordionOne" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingModalOne">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordionOne" href="#collapseModalOne" aria-expanded="true" aria-controls="collapseOne">
											Online <i class="chevron ti-angle-down"></i>
										</a>
									</h4>
								</div>
								<div id="collapseModalOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body no_padding">
										<ul class="list-group contacts-list">
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/one.png" alt="">
													</div>
													<span class="name">Richards carlson</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/two.png" alt="">
													</div>
													<span class="name">Firing Arc</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/three.png" alt="">
													</div>
													<span class="name">strapzen</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/four.png" alt="">
													</div>
													<span class="name">Reeves</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/five.png" alt="">
													</div>
													<span class="name">Bootstrap Guru</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/six.png" alt="">
													</div>
													<span class="name">Carlson</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/seven.png" alt="">
													</div>
													<span class="name">Paris hilton</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/eight.png" alt="">
													</div>
													<span class="name">Henry Richards</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/nine.png" alt="">
													</div>
													<span class="name">Richie Rich</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>

										</ul>	
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingModalTwo">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordionOne" href="#collapseModalTwo" aria-expanded="false" aria-controls="collapseTwo">
											offline
										</a>
									</h4>
								</div>
								<div id="collapseModalTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo">
									
									<div class="panel-body no_padding">
										<ul class="list-group contacts-list">
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/one.png" alt="">
													</div>
													<span class="name">Richards carlson</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/two.png" alt="">
													</div>
													<span class="name">Firing Arc</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/three.png" alt="">
													</div>
													<span class="name">strapzen</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/four.png" alt="">
													</div>
													<span class="name">Reeves</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/five.png" alt="">
													</div>
													<span class="name">Bootstrap Guru</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/six.png" alt="">
													</div>
													<span class="name">Carlson</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/seven.png" alt="">
													</div>
													<span class="name">Paris hilton</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/eight.png" alt="">
													</div>
													<span class="name">Henry Richards</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/nine.png" alt="">
													</div>
													<span class="name">Richie Rich</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>

										</ul>	
									</div>
									
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingModalThree">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordionOne" href="#collapseModalThree" aria-expanded="false" aria-controls="collapseThree">
											Away
										</a>
									</h4>
								</div>
								<div id="collapseModalThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">									
									<div class="panel-body no_padding">
										<ul class="list-group contacts-list">
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/one.png" alt="">
													</div>
													<span class="name">Richards carlson</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/two.png" alt="">
													</div>
													<span class="name">Firing Arc</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/three.png" alt="">
													</div>
													<span class="name">strapzen</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/four.png" alt="">
													</div>
													<span class="name">Reeves</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/five.png" alt="">
													</div>
													<span class="name">Bootstrap Guru</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/six.png" alt="">
													</div>
													<span class="name">Carlson</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/seven.png" alt="">
													</div>
													<span class="name">Paris hilton</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/eight.png" alt="">
													</div>
													<span class="name">Henry Richards</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/nine.png" alt="">
													</div>
													<span class="name">Richie Rich</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
										</ul>	
									</div>
								</div>
							</div>
						</div>	
					</div> 
				</div>
				<div id="test2" class="col-md-12 no_padding">
				<br>										
					<div class="form-group">
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">Reminders</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch"><i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">theme options</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch1" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch1"><i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">dark / light theme</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch2" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch2"><i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">Email Updates</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch3" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch3"><i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">Notifications</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch4" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch4"><i></i>
									</label>
								</div>
							</div>
						</div>							

						<div class="form-group check-radio">
							<label class="col-sm-9 control-label">Loader animation</label>
							<div class="col-sm-3">
								<ul class="list-inline checkboxes-radio">
									<li class="ms-hover">
										<input type="checkbox" class="mark-complete" id="c1">
										<label for="c1"><span></span></label>
									</li>                                                                               
								</ul>
							</div>
						</div>
						<div class="form-group check-radio">
							<label class="col-sm-9 control-label">delay load</label>
							<div class="col-sm-3">
								<ul class="list-inline checkboxes-radio">
									<li class="ms-hover">
										<input type="checkbox" class="mark-complete" id="c2">
										<label for="c2"><span></span></label>
									</li>                                                                               
								</ul>
							</div>
						</div>
						<div class="form-group check-radio">
							<label class="col-sm-9 control-label">Graphs animations</label>
							<div class="col-sm-3">
								<ul class="list-inline checkboxes-radio">
									<li class="ms-hover">
										<input type="checkbox" class="mark-complete" id="c3" checked="">
										<label for="c3"><span></span></label>
									</li>                                                                               
								</ul>
							</div>
						</div>
					</div>						
				</div>
				<div id="test3" class="col-md-12 no_padding">
					<div class="heading no_border_bottom">
						Todays
						<div class="left"><a href="#"><i class="ion-android-refresh"></i></a></div>
						<div class="right"><a href="#"><i class="ion-gear-a"></i></a></div>						
					</div>
					<div class="list-group message-list">
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">henry richards</h4>
							<p class="list-group-item-text">has pushed all the code to github and saved some fixes too..</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">mary </h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto accusamus officiis vero magnam amet, quas corru</p>
						</a>							
					</div>	
					<div class="heading no_border_bottom">
						june 15 1990
						<div class="left"><a href="#"><i class="ion-android-refresh"></i></a></div>
						<div class="right"><a href="#"><i class="ion-gear-a"></i></a></div>						
					</div>
					<div class="list-group message-list">
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">henry richards</h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto accusamus officiis vero magnam amet, quas corru</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">mary </h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto accusamus officiis vero magnam amet, quas corru</p>
						</a>							
					</div>	
				</div>
			</div>
			<!-- content_holder -->
		</div>
	</div>
	<!-- /Right-bar -->
</div>
<!-- wrapper -->

<!-- Page Scripts -->
    
    <!-- Edited for search input -->


<script src='assets/js/jquery-ui-1.10.3.custom.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src='assets/js/jquery.nicescroll.min.js'></script>
<script src='assets/js/wow.min.js'></script>
<script src='assets/js/jquery.loadmask.min.js'></script>
<script src='assets/js/jquery.accordion.js'></script>
<script src='assets/js/materialize.js'></script>
<script src='assets/js/bic_calendar.js'></script>
<script src='assets/js/core.js'></script>
<script src='assets/js/jquery.dataTables.min.js'></script>
<script src='assets/js/bootstrap-datatables.js'></script>
<script src='assets/js/dataTables-custom.js'></script>
<script src='assets/js/mindmup-editabletable.js'></script>
<script src='assets/js/numeric-input-example.js'></script>
<script src='assets/js/dynamic-tables.js'></script>

<script src="assets/js/jquery.countTo.js"></script>
</body>
</html>