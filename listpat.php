  <?php 
session_start();
if(isset($_SESSION["user"])&&isset($_SESSION["user"])){
	$pass=$_SESSION["pass"]; $user=$_SESSION["user"];
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Liste des patients</title>

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

  

<?php require_once('header.php');?>

	<div class="main-content">
		<!--row-->
		
	<!-- /main-content -->

	
	
	<div class="row grid">
			<div class="col-md-12">
			
				<!-- *** Responsive Tables *** -->
				<!-- panel -->
				<?php 
				
					 ?>
					 <div class="panel panel-piluku">
					<div class="panel-heading">
						<h3 class="panel-title">
							Les consultations
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
								
								
							</tr>
						</thead>
						<tbody>
							<?php 
							 $select=$bdd->prepare("SELECT * FROM `patiant`");
								 $select->execute();
								 while($s1=$select->fetch()){
									 
									 $d=$s1['nom']." ".$s1['prenom'];
									 ?>
							<tr class="odd gradeX" data-toggle="modal" data-target="#largemodal<?php echo $s1['id'];?>">
								<td ><?php echo $d;?></td>
										
								<td><span class="label bg-info"><?php echo $s1['tel']?></span></td>
								<td><?php echo $s1['email']?></td>
								<td class="center">
								<div class="col-md-3" style="margin-left: 30px;">
								        <span class="avatar-holder">
										<?php 
					if($s1['typeimg']=='jpg'){echo '<img height="100" width="110" src=assets/patient/'.$s1['id'].'.jpg />';}else{echo '<img  height="100" width="110" src=assets/patient/'.$s1['id'].'.png />';}

					
					
					?>
										
										
										</span>
										
							            
							            </div>
								</td>
								
								
								
								<td><?php echo $s1['ville']?></td>
								
										
								
								
														</tr>
	<div class="modal fade" id="largemodal<?php echo $s1['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel1"><?php echo $s1['nom'];?> <?php echo $s1['prenom'];?> </h4>
				</div>
				<div class="modal-body" style="display:inline-block;width:100%">
					<div style="float:left;">
					<img  height="250" width="270" src="assets/patient/<?php echo $s1['id'];?>.jpg" alt="">
					</div>
					
                     <div class="profile-sidebar" style="width: 60%;argin-left: 100px;float: right;margin-left: 30px;">
										<div class="profile-sidebar-heading">
											<h4>Information Personnele
											
											<a href="modpatiant.php?id=<?php echo $s1['id'];?>"><i class="ion ion-edit"></i></a>
											<a href="suppatiant.php?id=<?php echo $s1['id'];?>"><i class="icon ti-close"></i></i></a>
										 </h4>   
										 </div>
										<!--                        *** Profile Personal ***-->
										<ul class="">
											<li><span style="font-size: 17.5px;">Date de naissance   :</span><?php echo $s1['datenaissance'];?></li>
											
											<li> <span style="font-size: 17.5px;">Sex  :</span>  <?php echo $s1['sex'];?></li>
										
											<li><span style="font-size: 17.5px;">Telephone  :</span><?php echo $s1['tel'];?></li>
											<li><span style="font-size: 17.5px;">Address email   :</span><?php echo $s1['email'];?></li>
											
											<li><span style="font-size: 17.5px;">Address   :</span> <p><?php echo $s1['adress'];?></p></li>
											
										</ul>
										<!--                        *** /Profile Personal ***-->
					  </div>					
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div>
			</div>
		</div>
	</div>
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
			<!-- /row -->

		             </div>  
		
					 
		     </div>		
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
	<div class="modal fade" id="defaultmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel">Default Modal</h4>
				</div>
				<div class="modal-body">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar, ante faucibus facilisis convallis, sem nibh tempus nibh, non tristique est nunc ut erat. Curabitur eget lorem ornare, elementum enim a, ultricies odio.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			
			
		</div>
	</div>
	
</div>
<!-- wrapper -->

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
<?php }
else {header("Location: signin.php");} ?>
