<?php 
session_start();
if(isset($_SESSION["user"])&&isset($_SESSION["user"])){
	$pass=$_SESSION["pass"]; $user=$_SESSION["user"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Ajouter un Patiant | Doctor Park</title>

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
                           function (localMediaStream) {alert("dddd"); video.src = window.URL.createObjectURL(localMediaStream); }, onFailure);
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
					Ajouter un patient
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
				<form id="f5" role="form" class="form form-horizontal" method="post" action="enre.php" enctype="multipart/form-data">
					
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
							
							<input name="datevalid" type="date" class="form-control" >
						</div>
					   </div>
				
				
					
					
					
					<div class="form-group" >
						
						<div class="col-sm-8" style="float:right;">
							<input type="submit" class="btn btn-primary btn-lg" data-icon="false" name="assurance" value="enregister"  data-validation="size mime required"
							>
							<input  id="reset"type="reset" value="Réinitialiser le formulaire" class="btn btn-Default btn-lg"/>
						</div>
					</div>
					</form>
		<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					
						
		
		            			
		</div>
		
		<div>
</div>
<!-- /panel -->

</div>
<!-- /main content -->				

</div>  

	<!-- /Right-bar -->
</div>
<!-- wrapper -->
</div>
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
<script src='assets/js/select2.js'></script>
<script src='assets/js/jquery.multi-select.js'></script>
<script src='assets/js/bootstrap-filestyle.js'></script>
<script src='assets/js/bootstrap-datepicker.js'></script>
<script src='assets/js/bootstrap-colorpicker.js'></script>
<script src='assets/js/jquery.maskedinput.js'></script>
<script src='assets/js/form-elements.js'></script>

<script src="assets/js/jquery.countTo.js"></script>
<script></script>
</body>
</html>
<?php }
else {header("Location: signin.php");} ?>