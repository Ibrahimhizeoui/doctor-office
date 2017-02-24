<?php 

if(isset($_SESSION["user"])&&isset($_SESSION["user"]))
{$pass=$_SESSION["pass"]; $user=$_SESSION["user"];

?>
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
		<li class='current'>
			<a href="index.php" class="current waves-effect waves-light">
				<i class="icon ti-home"></i>
				<span class="text ">Acceuil</span>
			</a>
		</li>
		
		<!-- mon menu -->
			<li class="submenu">
			<a href="agenda.php" class="waves-effect waves-light" href="#layouts">
				<i class="fa fa-calendar"></i>
				<span class="text">Calendrier</span>
				
			</a>
		</li>
			<li class="submenu">
			<a class="waves-effect waves-light" href="#layouts">
				<i class="fa fa-calendar"></i>
				<span class="text">Gestion des RDVs</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled">
			   
				
				<li><a href="nrdv.php">Ajouter un rendez-vous</a></li>
				<li><a href="listrdv.php">Gestion de rendez-vous</a></li>
									
				
			</ul>
		</li>
		<li class="submenu">
			<a class="waves-effect waves-light" href="#layouts">
				<i class="icon ti-user"></i>
				<span class="text">Gestion des patients</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled">
			    <li><a href="listpat.php">La liste complete</a></li>
				<li><a href="ajoutpatiant.php">Ajouter un patient</a></li>
								
				
			</ul>
		</li>
		
		<li class="submenu">
			<a class="waves-effect waves-light" href="#layouts">
				<i class="icon ti-pencil-alt"></i>
				<span class="text">Gestion des consultations</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled">
				<li><a href="listcons.php">Liste des consultation</a></li>
             </ul>
		</li>
		
		<li class="submenu">
			<a class="waves-effect waves-light" href="#layouts">
				<i class="icon ti-shopping-cart"></i>
				<span class="text">Gestion de payment</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled">
				<li><a href="">Liste</a></li>
				
			</ul>
		</li>
	
		<li class="submenu">
			<a class="waves-effect waves-light" href="#layouts">
				<i class="icon ti-shopping-cart"></i>
				<span class="text">Gestion d'assurance</span>
				<i class="chevron ti-angle-right"></i>
			</a>
			<ul class="list-unstyled">
				<li><a href="rdv.php">Ajouter une assurance</a></li>
				<li><a href="listass.php">Toutes les assurances</a></li>
				
			</ul>
		</li>
			<!--
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
				<li><a href="dynamic-tables.html">Dynamic Tables</a></li>
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
	 end mon menu-->
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
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img class="flag_img" src="assets/images/flags/fr.jpg" alt=""> Français<span class="drop-icon"><i class="ion ion-chevron-down"></i></span>
				</a>
				<ul class="dropdown-menu dropdown-piluku-menu  animated fadeInUp wow language-drop neat_drop" data-wow-duration="1500ms" role="menu">
					<li>
						<a href="#"><img class="flag_img" src="assets/images/flags/uk.jpg" alt="flags"> Anglais</a>
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

				<a href="#" class="dropdown-toggle avatar_width" data-toggle="dropdown" role="button" aria-expanded="false"><span class="avatar-holder"><img src="assets/images/avatar.jpeg" alt=""></span><span class="avatar_info"><?php echo 'Dr.'.$user;?></span><span class="drop-icon"><!-- <i class="ion ion-chevron-down"></i> --></span></a>
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
						<a href="logout.php" class="logout_button"><i class="ion-power"></i>Logout</a>
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
<?php }
else {header("Location: signin.php");} ?>
<!-- /top-bar -->