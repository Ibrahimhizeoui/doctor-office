<?php 
session_start();
if(isset($_SESSION["user"])&&isset($_SESSION["user"])){
	$pass=$_SESSION["pass"]; $user=$_SESSION["user"];
require_once('connect.php');
 
  
  if(isset($_GET['id'])){
	  $idm=$_GET['id'];
	 
	  $s=$bdd->query("SELECT * FROM patiant WHERE id=$idm");
	  $mod=$s->fetch();
	  $s2=$bdd->query("SELECT * FROM statp WHERE idp=$idm");
	  $mod2=$s2->fetch();
	
	  ?>
	  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Modifier le Patient | Doctor Park</title>

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
<link rel='stylesheet' href='style.css'>

  <script src='assets/js/jquery.js'></script>
<script src='assets/js/app.js'></script>
  <script>
    jQuery(window).load(function () {
      $('.piluku-preloader').addClass('hidden');
    });
  </script>
   <script>
  
	
		  function onFailure(err) {
          alert("The following error occured: " + err.name);
      }
      jQuery(document).ready(function () {
          var video = document.querySelector('#webcam');
          navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);
         
		   $("#bo").click(function(){
			   
			    if (navigator.getUserMedia) {
              navigator.getUserMedia
                            (
                             { video: true,sound:true },
                           function (localMediaStream) { video.src = window.URL.createObjectURL(localMediaStream); }, onFailure);
          }
          else {
              alert('OOPS No browser Support');
          }
		   });
		  
		  var button = document.querySelector('#screenshot-button');

		  
var canvas = document.querySelector('#screenshot-canvas');
var ctx = canvas.getContext('2d');
 
button.addEventListener('click',snapshot, false);
 
function snapshot() {
canvas.width = video.videoWidth;
canvas.height = video.videoHeight;
ctx.drawImage(video, 0, 0);
 var dataURL = canvas.toDataURL("image/png");
                document.getElementById('hidden_data').value = dataURL;
}
      
	  $("#c9").click(function(){ 
	  var t=false;
	   
	  if( t==false && $("input[id='c9']:checked")){
		  alert( $("#ass").css('display','initial'));
		  t=true;}
	  
	 
	  
	  
	  
	  });
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
		<div class="panel panel-piluku">
			<div class="panel-heading">
				<h3 class="panel-title">
					Modifier 
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
				<form id="" role="form" class="form form-horizontal" method="post" action="enre.php?id=<?php echo $idm;?>" enctype="multipart/form-data">
					
					<div class="form-group">
						<label class="col-sm-2 control-label" name="sex">Sex:</label>
						<div class="col-sm-8">
							<select class="name_search form-control" name="sex" data-validation="required" data-validation-error-msg="Please make a choice">
								<option value="<?php echo $mod['sex'];?>"> - -  Le sex Actuel <?php echo $mod['sex'];?>  - - </option>
								<option value="homme"> Homme </option>
								<option value="famme"> Femme </option>
								
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="inline-suggestions">Nom:</label>
						<div class="col-sm-8">
							<input name="nom" type="text" value="<?php echo $mod['nom'];?>" id="inline-suggestions" class="form-control" data-suggestions="Monkey, Horse, Hound, Fox, Tiger, Elephant, Alligator, Ant, Bat, Banana, Cat, Cell Phone, Dog, Deer, Goat, George, India,Ireland, Jug, Jackle, Kite, King, Leapord, Lion, Moon,Mentor, Night, Notes, Oxford, Parrot, Queen, Rat, Square, Tiger, Umbrella, Van, Watch, Xenon, Zebra" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="prenom">Prenom:</label>
						<div class="col-sm-8">
							<input name="prenom" value="<?php echo $mod['prenom'];?>" type="text" id="" class="form-control" />
						</div>
					</div>

					
					<div class="form-group">
						<label class="col-sm-2 control-label">Date de naissance:</label>
						<div class="col-sm-8">
							<input name="datenaissance" value="<?php echo $mod['datenaissance'];?>" type="date" class="form-control"  />
						</div>
						<span class="help-block"><?php echo $mod['datenaissance'];?></span>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Lieu de naissance:</label>
						<div class="col-sm-8">
							<input name="lieu"  value="<?php echo $mod['lieu'];?>"type="text" id="" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Poids:</label>
						<div class="col-sm-8">
							<input name="poids"  value="<?php echo $mod2['poids'];?>" type="text" id="" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Taille:</label>
						<div class="col-sm-8">
							<input name="taille"  type="text" value="<?php echo $mod2['taille'];?>" id="" class="form-control" />
						</div>
					</div>
						<div class="form-group">
						<label class="col-sm-2 control-label" name="sex">Groupe sanguin:</label>
						<div class="col-sm-8">
							<select class="name_search form-control" name="sang" data-validation="required" data-validation-error-msg="Please make a choice">
								<option value="<?php echo $mod['sang'];?>">  - -  Le sang Actuel <?php echo $mod['sang'];?>  - - </option>
								<option value="A+"> A+ </option>
								<option value="A-"> A- </option>
								<option value="B+"> B+ </option>
								<option value="B-"> B- </option>
								<option value="AB+"> AB+ </option>
								<option value="AB-"> AB- </option>
								<option value="O+"> O+ </option>
								<option value="O-"> O- </option>
								
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">telechqrger une photo:</label>
						<div class="col-sm-8">
							<input type="file" class="filestyle" data-icon="false" name="img" data-validation="size mime required"
							data-validation-error-msg-size="The file cant be larger than 400kb"
							data-validation-error-msg="You must upload an image file (max 400 kb)"
							data-validation-allowing="jpg, png, ico"
							data-validation-max-size="400kb" >
						</div>
					</div>
					<div class="form-group" id="bo">
						<label class="col-sm-2 control-label">Photo :</label>
						<div class="col-sm-8">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultmodal" style="float: right;">
									Prendre une photo
								</button>
						</div>
					</div>
					
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Adress :</label>
						<div class="col-sm-8">
							<textarea id="" name="adress"  class="form-control text-area" cols="30" rows="10" placeholder="Address Form"><?php echo $mod['adress'];?></textarea>
						</div>
						
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="inline-suggestions">Ville:</label>
						<div class="col-sm-8">
							<input name="ville" value="<?php echo $mod['ville'];?>" type="text" id="inline-suggestions" class="form-control" data-suggestions="Monkey, Horse, Hound, Fox, Tiger, Elephant, Alligator, Ant, Bat, Banana, Cat, Cell Phone, Dog, Deer, Goat, George, India,Ireland, Jug, Jackle, Kite, King, Leapord, Lion, Moon,Mentor, Night, Notes, Oxford, Parrot, Queen, Rat, Square, Tiger, Umbrella, Van, Watch, Xenon, Zebra" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Pays:</label>
						<div class="col-sm-8">
							<input name="pays" value="<?php echo $mod['pays'];?>" type="text" id="" class="form-control" />
						</div>
					</div>
					
					<div class="form-group">
				         <label class="col-sm-2 control-label">Telephone</label>
				         <div class="col-sm-8">
				         	<input type="text" class="form-control" required="required" maxlength="8"  value="<?php echo $mod['tel'];?>" name="tel" />
				        </div>
			         </div>
					 
					  	
					  
					  <div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Email:</label>
						<div class="col-sm-8">
							<input name="email"  type="email" value="<?php echo $mod['email'];?>" id="country-suggestions" class="form-control" />
						</div>
					</div>
					
					<?php 
					if(isset($_GET['err'])){
						if($_GET['err']==1){echo "<div style='color:red;font-size:16px;margin:10px;'>Il y'a un probleme veuillez retapper les données</div>";}
						elseif($_GET['err']==2){echo "<div style='color:red;font-size:16px;margin:10px;'>Verifier l ' image .</div>";}
						
						
						}
					?>
					
					
					<div class="form-group" >
						
						<div class="col-sm-8" style="float:right;">
							<input type="submit" class="btn btn-primary btn-lg" data-icon="false" name="modifier" value="Modifier"  data-validation="size mime required"
							>
						</div>
					</div>
					
					
					
					<div class="modal fade" id="defaultmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel">Default Modal</h4>
				</div>
				<div class="modal-body">
				<ul style="display: -webkit-box; list-style-type:none;"><li>
				
				              <div id="photo">
                              <video id="webcam" autoplay></video><br  />
                              <p id="screenshot-button" class="btn btn-primary btn-lg"  onclick="uploadEx()" >Capture</p>
                              </div></li>
							  <li>
                              <div id="f1">
                              <div id="shot" >
                              <canvas id="screenshot-canvas" ></canvas>
                               </div>
                              <input name="hidden_data" id='hidden_data' type="hidden"/>
                              </div></li>
					        </div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>
					 <div class="modal fade" id="defaultmodal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel1">Tapez les informations puis tapez </h4>
				</div>
				<div class="modal-body" style="display:inline-block;width:100%">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Nom d'assurence :</label>
						<div class="col-sm-8">
							<input name="nomass"  type="text" id="" class="form-control" />
						</div>
					   </div>
					   
					   <div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Type d'assurence :</label>
						<div class="col-sm-8">
							<input name="typeass"  type="text" id="" class="form-control" />
						</div>
					   </div>
					   
					   <div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Date de validité d'assurence :</label>
						<div class="col-sm-8">
							<input name="datevalid"  type="date" id="" class="form-control" />
						</div>
					   </div>
					
					 
		
					
				</div>
				
				<div class="modal-footer" style="  margin-top: 40px;">
				
					
					
					
					
					<button type="button"  class="btn btn-primary" data-dismiss="modal">Ok</button>
					
				</div>
			</div>
		</div>
		</div>
			
						</form>
		
		</div>
</div>
<!-- /panel -->
</div>
<!-- /main content -->				

</div>  

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
	  
	  <?php
  }else{ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Modifier les Patients | Doctor Park</title>

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
				
				<!-- /col-md-12 -->
				
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
										<td style="margin-left: 30px;"><a href="modpatiant.php?id=<?php echo $s1['id'];?>"><button class="btn btn-primary">Modifier</button></a></td>
											
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
 }
else {header("Location: signin.php");} ?>