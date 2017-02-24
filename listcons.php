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

  <title>Liste des consultations | Doctor Park</title>

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
							 $select=$bdd->prepare("SELECT *,DATE_FORMAT(date, '%Y-%m-%dT%H:%i:%s') as d , Now() as dd FROM `rdv` WHERE effectue='non' AND DATE_FORMAT(date, '%Y-%m-%dT%H:%i:%s') >= Now() order by date desc");
								 $select->execute();
								 while($s=$select->fetch()){
									 $x=$s['id'];
									 $t=$s['idp'];
									 
									 $n=$s['nature'];
									 $select2=$bdd->prepare("SELECT nom,prenom,tel,email,typeimg,id FROM `patiant` where id=$t");
								     $select2->execute();
									 $s1=$select2->fetch();
									 $d=$s1['nom']." ".$s1['prenom'];
									 ?>
							<tr class="odd gradeX">
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
								
								
								
								<?php if($s['d']>$s['dd']) {?><td class="center"><span class="badge bg-success"><?php echo $s['d'];?></span><a href="consultation.php?idp=<?php echo $s['idp'];?>&id=<?php echo $s['id'];?>"><button class="btn btn-primary">consulter</button></a></td><?php }?>
								<?php if($s['d']<$s['dd']) {?><td class="center"><span class="badge bg-danger"><?php echo $s['d'];?></span><a href="consultation.php?idp=<?php echo $s['idp'];?>&id=<?php echo $s['id'];?>"><button class="btn btn-primary">consulter</button></a></td><?php }?>
								
								</td>
										
								
								
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
							<input  name="date" type="text" class="form-control" id="date-popup" data-provide="datepicker">
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
					<input type="submit" name="rdv" class="btn btn-primary"  value="Supprimer"/>
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
			<!-- /row -->

		             </div>  
		
					 
		     </div>		
		</div>
		
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
<script src='assets/js/jquery.dataTables.min.js'></script>
<script src='assets/js/bootstrap-datatables.js'></script>
<script src='assets/js/dataTables-custom.js'></script>
<script src='assets/js/mindmup-editabletable.js'></script>
<script src='assets/js/numeric-input-example.js'></script>
<script src='assets/js/dynamic-tables.js'></script>
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
</html>
<?php 

 }
else {header("Location: signin.php");} ?>