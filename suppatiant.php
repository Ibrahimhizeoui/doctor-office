  <?php 
session_start();
if(isset($_SESSION["user"])&&isset($_SESSION["user"])){
	$pass=$_SESSION["pass"]; $user=$_SESSION["user"];
require_once('connect.php');

if(isset($_GET['id'])){
					 $ids=$_GET['id'];
					 echo $ids;
					 $bdd->query("DELETE FROM `patiant` WHERE `id` = $ids");
					 header('Location: listpat.php');
					 
					 
				 }
				 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Supprimer les Patients | Doctor Park</title>

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
	<!-- main content -->
	<div class="main-content">
		<!-- panel -->
		<div class="row grid">
			<div class="col-md-12">
				<!-- *** Responsive Tables *** -->
				<!-- panel -->
				<?php 
				
					 ?>
					 <div class="panel panel-piluku">
					<div class="panel-heading">
						<h3 class="panel-title">
							Supprimer
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
						<div class="bs-example">
							<div class="table-responsive">
								<table class="table">
									<thead>
									<tr>
										
										<th  class="text-center">Nom</th>
										<th  class="text-center">Prenom</th>
										<th  class="text-center">Sex</th>
										<th  class="text-center">Adress</th>
										
										<th  class="text-center">photo</th>
										<th  class="text-center">Telephone</th>
										<th  class="text-center">Action</th>
										
										
											
									</tr>
								</thead>
								<tbody>
								<?php 
								 $select=$bdd->prepare("SELECT * FROM `patiant`");
								 $select->execute();
								 while($s1=$select->fetch()){
									 
									 ?>
									 <tr class="table-row" data-toggle="modal" data-target="#largemodal<?php echo $s1['id'];?>" >
										
										<td ><?php echo $s1['nom'];?></td>
										<td><?php echo $s1['prenom'];?></td>
										<td><?php echo $s1['sex'];?></td>
										
										<td><a href="<?php echo $s1['email'];?>"><?php echo $s1['email'];?></a></td>
										<td>
						                <div class="col-md-3" style="margin-left: 30px;">
								        <span class="avatar-holder"><img src="assets/patient/<?php echo $s1['id'];?>.jpg" alt="" height="50" width="50">
							            </div>		
										</td>
										<td style="margin-left: 30px;"><?php echo $s1['tel']?></td>
										<td style="margin-left: 30px;"><a href="suppatiant.php?id=<?php echo $s1['id'];?>"><button class="btn btn-danger">Supprimer</button></a></td>
											
									</tr> <?php
								 }

								?>
									
									</tbody>
							</table>
							<!-- /.table-responsive -->

							<!-- /.table-responsive -->
						</div>
					</div>
					<!-- /panel -->
				</div>
				<!-- /col-md-12 -->
			</div>
			<!-- /row -->

		</div>  
		
					 
				
		
		
		<!-- /panel -->
</div>
<!-- /main content -->				

 

	<!-- /Right-bar -->
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
<script src='assets/js/bootstrap-filestyle.js'></script>
<script src='assets/js/form-validation/jquery.form-validator.js'></script>
<script src='assets/js/form-validation.js'></script>

<script src="assets/js/jquery.countTo.js"></script>
</body>
</html>
<?php }
else {header("Location: signin.php");} ?>