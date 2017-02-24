 
<?php 
session_start();
if(isset($_SESSION["user"])&&isset($_SESSION["user"])){
	$pass=$_SESSION["pass"]; $user=$_SESSION["user"];
require_once('connect.php');

if(isset($_GET['idp']) ){
	$idp=$_GET['idp'];
	 $select=$bdd->prepare("SELECT * FROM `patiant` where id=$idp");
								 $select->execute();
								 $s1=$select->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Consulter | Doctor Park</title>

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
<link rel='stylesheet' href='assets/css/animated-masonry-gallery.css'>
<link rel='stylesheet' href='assets/css/rotated-gallery.css'>
<link rel='stylesheet' href='assets/css/sweet-alerts/sweetalert.css'>
<link rel='stylesheet' href='assets/css/jtree.css'>
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
          
			<!-- *** Headings Panel *** -->				
			<div class="col-md-8">
				<!-- panel -->
				<div class="panel panel-piluku">
					<div class="panel-heading">
						<h3 class="panel-title">
							Profil
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
						<ul style="    list-style: none;"><li>
								<img src="assets/patient/<?php echo $idp;?>.jpg" height="105" width="105"/></li>
								<li>
								 <div class="invoice-details" style="margin-top: 50px;">
								<span>Nom et Prenom:</span> <?php echo $s1["nom"].' '.$s1["prenom"];?>
								<br>
								<span>Assurance type:</span> <?php echo $s1["couverture"];?>
								<br>
								<span>Groupe sangain:</span> <?php echo $s1["sang"];?>
								<br>
								<span>Date de naissance</span><?php echo $s1["datenaissance"];?>
								<br>
								<span>Lieu:</span><?php echo $s1["lieu"];?>
								<br>
								<span>Adress :</span><?php echo $s1["adress"];?>
								<br>
								<span>Ville :</span><?php echo $s1["ville"];?>
								<br>
								<span>Pays :</span><?php echo $s1["pays"];?>
								<br>
								<span>Telephone :</span><?php echo $s1["tel"];?>
								<br>
								<span>Email :</span><?php echo $s1["email"];?>
								
								
							    </div>
								</li></ul> 
								
					</div>
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-6 -->

			<!-- *** Custom Headings Panel *** -->
			<div class="col-md-4">		
	<div class="panel panel-piluku" style="float:right;width:100%;">
			<div class="panel-heading">
				<h3 class="panel-title">
					ANTECEDENTS
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
				<div class="tree well">
					<ul>
					 <form method="post" action="enre.php?idp=<?php echo $idp;?>&id=<?php echo $_GET['id'];?>">
						<li>
							<span class="parent"><i class="fa fa-folder-open"></i> Personnels</span> <a href=""></a>
							<ul>
								
								<li>
									<span class="great-grandchild"><i class="fa fa-chevron-circle-up"></i> Medicaux</span> <a href=""></a>
									<ul>
										<li>
											<span class="greatgrand-grandchild"><input  id="c1" type="checkbox" style="display: inherit;">Uro-néphologiques <input  id="t1" style="display: none;"name="uronephologiques" type="text" id="inline-suggestions" class="form-control"></span> <a href=""></a>
											
										</li>
										<li>
											
											<span class="greatgrand-grandchild"><input    id="c2" type="checkbox" style="display: inherit;">Infectieux et parasitaires<input  id="t2" style="display: none;"name="infectieuxparasitaires" type="text" id="inline-suggestions" class="form-control"></span> <a href=""></a>
										    
										</li>
										<li>
											
											<span class="greatgrand-grandchild"><input   id="c3" type="checkbox" style="display: inherit;">Cardio-vasculaires<input  id="t3" style="display: none;" name="cardiovasculaires"  type="text"  class="form-control"></span> <a href=""></a>
											
										</li>
										<li>
											
											<span class="greatgrand-grandchild"><input  id="c4"  type="checkbox" style="display: inherit;">Digestifs<input  id="t4" style="display: none;" name="digestifs"   type="text"  class="form-control"></span> <a href=""></a>
											
										</li>
										<li>
											<span class="greatgrand-grandchild"><input    id="c5"  type="checkbox" style="display: inherit;">Rhumatologiques<input  id="t5" style="display: none;" name="rhumatologiques"   type="text" id="inline-suggestions" class="form-control"></span> <a href=""></a>
											
										</li>
										<li>
											<span class="greatgrand-grandchild"><input     id="c6" type="checkbox" style="display: inherit;">Autres<input  id="t6" style="display: none;" name="autres"   type="text" id="inline-suggestions" class="form-control"></span> <a href=""></a>
											
										</li>
										
									</ul>
								</li>
							<li>
									<span class="great-grandchild"><i class="fa fa-chevron-circle-up"></i> Chirurgicaux</span> <a href=""></a>
									<ul>
								
								<li>
								
						
					
							<textarea id="" name="chirurgicaux" class="form-control text-area" cols="30" rows="10" placeholder="Address Form"></textarea>
						
						
					
								</li>
							
							
							</ul>
									
								</li>
							<li>
									<span class="great-grandchild"><i class="fa fa-chevron-circle-up"></i> Gynéco-obstétricaux</span> <a href=""></a>
									<ul>
										<li>
											
											<span class="greatgrand-grandchild"><input     id="c7" type="checkbox" style="display: inherit;">Régles<input  id="t7" style="display: none;" name="regles"   type="text"  class="form-control"></span> <a href=""></a>
											
										</li>
										<li>
										
											<span class="greatgrand-grandchild"><input     id="c8" type="checkbox" style="display: inherit;">Groussesses<input  id="t8" style="display: none;" name="groussesses"   type="text"  class="form-control"></span> <a href=""></a>
											
										</li>
										<li>
										
											<span class="greatgrand-grandchild"><input  id="c9"  type="checkbox" style="display: inherit;">Avortements<input  id="t9" name="avortements"  style="display: none;" type="text"  class="form-control"></span> <a href=""></a>
											
										</li>
										<li>
											
											<span class="greatgrand-grandchild"><input  id="c10" type="checkbox" style="display: inherit;">Contraception<input  id="t10" name="contraception"  style="display: none;" type="text" name="contraception" class="form-control"></span> <a href=""></a>
											
										</li>
										
									</ul>
									</li>
							</ul>
						</li>
						
							<li>
							<span class="parent"><i class="fa fa-folder-open"></i> Habitudes</span> <a href=""></a>
							<ul>
								
								<li>
								
						
					
							<textarea id="" name="habitude" class="form-control text-area" cols="30" rows="10" placeholder="Address Form"></textarea>
						
						
					
								</li>
							
							
							</ul>
						</li>	
    
						
                        <li>
							<span class="parent"><i class="fa fa-folder-open"></i> Traitements</span> <a href=""></a>
							<ul>
								
								<li>
								
						
					
							<textarea id="" name="traitement" class="form-control text-area" cols="30" rows="10" placeholder="Address Form"></textarea>
						
						
					
								</li>
							
							
							</ul>
						</li>
					
                     <li>
							<span class="parent"><i class="fa fa-folder-open"></i> Familiaux</span> <a href=""></a>
							<ul>
								
								<li>
									
									<span class="great-grandchild"><input  id="c12" type="checkbox" style="display: inherit;">Consanguinite-parental<input  id="t12"  style="display: none;" type="text" name="consanguiniteparental" class="form-control"></span> <a href=""></a>
											                      
											
									</li>
							<li>
									
									<span class="great-grandchild"><input  id="c13" type="checkbox" style="display: inherit;">Ascendants<input  id="t13"  style="display: none;" type="text" name="ascendants" class="form-control"></span> <a href=""></a>
								</li>
							<li>
									
									<span class="great-grandchild"><input  id="c14" type="checkbox" style="display: inherit;">Descendants<input  id="t14"  style="display: none;" type="text" name="descendants" class="form-control"></span> <a href=""></a>
									
									</li>
						    <li>
									
									<span class="great-grandchild"><input  id="c15" type="checkbox" style="display: inherit;">Collatéraux<input  id="t15" name="collateraux" style="display: none;" type="text"  class="form-control"></span> <a href=""></a>
										
									</li>
							</ul>
						</li>
						<input type="submit" name="anti" class="btn btn-default" value="Enregistrer" style="float:right;margin-top:-10px;"/>
						</form>	
					</ul>
				</div>
			</div>
			
			
			
			
		</div>
		
		
				<!-- panel -->
				<div class="panel panel-piluku" style="float:right;width:100%;">
					<div class="panel-heading">
						<h3 class="panel-title">
							Simple Line Area Chart
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
						<div id="line-area" class="ct-chart ct-golden-section"></div>
					</div>
				</div>
	</div>
	
		
		</div>
<div class="row grid">				
			<div class="col-md-12">
				<!-- panel -->
				<div class="panel panel-piluku">
					<div class="panel-heading">
						<h3 class="panel-title">
							Historique medical :
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
						<blockquote>
							<p>Les image en 3D</p>
						</blockquote>
						
					</div>
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-12 -->
		</div>
		
		<div class="row grid">				
			<div class="col-md-12">
				<!-- panel -->
				<div class="panel panel-piluku">
					<div class="panel-heading">
						<h3 class="panel-title">
							Nouvelle Consultation :
							<span class="panel-options">
								<a href="#" class="panel-refresh">
									<i class="icon ti-reload"></i>
								</a>
								<a href="#" class="panel-minimize">
									<i class="icon ti-angle-down"></i>
								</a>
								<a href="#" class="panel-close">
									<i class="icon ti-close"></i>
								</a>
							</span>
						</h3>
					</div>
					<div class="panel-body" style="display: none;">
						 <form method="post" action="enre.php?idp=<?php echo $idp;?>&id=<?php echo $_GET['id'];?>">
								<div class="form-group">
					        	<label class="col-sm-2 control-label" for="country-suggestions">Pouls</label>
						        <div >
						    	<input name="pouls" type="text" id="" class="form-control">
						        </div>
					            </div>
								<div class="form-group">
					        	<label class="col-sm-2 control-label" for="country-suggestions">Temperature</label>
						        <div >
						    	<input name="temperature" type="text" id="" class="form-control">
						        </div>
					            </div>
								<div class="form-group">
					        	<label class="col-sm-2 control-label" for="country-suggestions">Tensionarterielle</label>
						        <div >
						    	<input name="tensionarterielle" type="text" id="" class="form-control">
						        </div>
					            </div>
								
								<div class="form-group">
						            <label class="col-sm-2 control-label">Traitements actuels</label>
						                <div >
						                	<textarea id="" name="traitementsactuels" class="form-control text-area" cols="30" rows="10" placeholder="Observation"></textarea>
						                </div>
						
				             	</div>
								<div class="form-group">
						            <label class="col-sm-2 control-label">Ttraitements passés</label>
						                <div >
						                	<textarea id="" name="traitementspasses" class="form-control text-area" cols="30" rows="10" placeholder="Observation"></textarea>
						                </div>
						
				             	</div>
								<div class="form-group">
						            <label class="col-sm-2 control-label">Le/les symptôme(s)</label>
						                <div >
						                	<textarea id="" name="symptome" class="form-control text-area" cols="30" rows="10" placeholder="Observation"></textarea>
						                </div>
						
				             	</div>
								<div class="form-group">
						            <label class="col-sm-2 control-label">Le mode de vie </label>
						                <div >
						                	<textarea id="" name="modedevie" class="form-control text-area" cols="30" rows="10" placeholder="Observation"></textarea>
						                </div>
						
				             	</div>
								<div class="form-group">
					        	<label class="col-sm-2 control-label" for="country-suggestions">Poids</label>
						        <div >
						    	<input name="poids" type="text" id="" class="form-control">
						        </div>
					            </div>
								<div class="form-group">
					        	<label class="col-sm-2 control-label" >Maladie</label>
						        <div >
						    	<input name="maladie" type="text" id="" class="form-control">
						        </div>
					            </div>
								<div class="form-group">
						            <label class="col-sm-2 control-label">Observation</label>
						                <div >
						                	<textarea id="" name="observation" class="form-control text-area" cols="30" rows="10" placeholder="Observation"></textarea>
						                </div>
						
				             	</div>
								<div  style="float:right;">
						      	<input type="submit" class="btn btn-primary btn-lg" data-icon="false" name="consulter" value="enregister" ></form>
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#defaultmodal">
									Couverture sociale
								</button>

							    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#defaultmodal2">
									Prochain RDV
								</button>
						        </div>
								
						
					</div>
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-12 -->
		</div>
			

			


	<!-- /main content -->	
 <div class="modal fade" id="defaultmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel1">Ajouter un nouveau patient et un RDV </h4>
				</div>
				<div class="modal-body" style="display:inline-block;width:100%">
					
					 <form method="post" action="enre.php?idp=<?php echo $_GET['idp']?>" role="form" class="form form-vertical">
					 
					      <div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Code :</label>
						<div class="col-sm-8">
							<input name="code"  type="text" id="" class="form-control" />
						</div>
					   </div>
					   <br><br>
					   <div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Act :</label>
						<div class="col-sm-8">
						    <textarea name="act"  type="text" id="" class="form-control"></textarea>
							
						</div>
					   </div>
					   <br><br>
					   <br><br>
					   
					   <div class="form-group">
					   <div class="col-sm-8">
						<input type="checkbox"  name="priseencharge"id="c2a" >
									<label for="c2a"><span></span>Prise en charge</label>
					   </div></div>
					 
				 
					
					
					
					
				</div>
				
				<div class="modal-footer" style="  margin-top: 40px;">
				
					
										<button type="submit"  class="btn btn-primary" name="apm"> Ajouter </button>
					<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div></form>
			</div>
		</div>
		</div>
	
 <div class="modal fade" id="defaultmodal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel1">Ajouter un nouveau patient et un RDV </h4>
				</div>
				<div class="modal-body" style="display:inline-block;width:100%">
					
					 <form method="post" action="enre.php?idp=<?php echo $_GET['idp']?>" role="form" class="form form-vertical">
					 
					      
					 
					 
				 <div class="form-group">
						
						<label class="col-sm-2 control-label" style="margin-top:20px;">infos du RDV:</label>
						<div class="col-sm-3" style="margin-top:20px;">
							<input  name="date" placeholder="Date" type="text" class="form-control" id="date-popup" data-provide="datepicker">
						</div>
						<div class="col-sm-3" style="margin-top:20px;">
							<input name="time" type="time" class="form-control" data-validation="date" data-validation-optional="true">
						</div>
						<div class="col-sm-3" style="margin-top:20px;">
							<select class="form-control" name="nature" >
								<option value="">Type du consultation  -</option>
								<option value="consultation"> Consultation </option>
								<option value="controle"> Controle </option>
								<option value="autre"> Autre </option>
								
							</select>
						</div>
						<label class="col-sm-2 control-label" style="margin-top:20px;"style="visibility: hidden;margin-top:20px;"></label>
						<div class="col-sm-3" style="margin-top:20px;">
							<select class="form-control" name="type" >
								<option value="">La place du consultation  -</option>
								<option value="anterieure"> anterieure </option>
								<option value="exterieure"> exterieure </option>
								
							</select>
						</div>
					</div> 
					
					
					
				</div>
				
				<div class="modal-footer" style="  margin-top: 40px;">
				
				
										<input type="submit"  class="btn btn-primary" name="rdv" value="Ajouter+" />
					<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div></form>
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
<script src='assets/js/tree-view/tree.js'></script>




<script src='assets/js/chartist/chartist.js'></script>
<script src='assets/js/chartist.min.js'></script>
<script src='assets/js/chartist/chartist-guy.js'></script>
<script src='assets/js/chartist/simple-line-chart.js'></script>
<script src='assets/js/chartist/line-chart-tooltips.js'></script>
<script src='assets/js/chartist/line-area-chart.js'></script>

<script src='assets/js/chartist/smil-animations.js'></script>
<script src='assets/js/chartist/line-area-animation.js'></script>
<script src='assets/js/chartist/line-modify-drawings.js'></script>
<script src='assets/js/chartist/line-interpolation.js'></script>
<script src='assets/js/chartist/simple-svg-animation.js'></script>
<script src='assets/js/core.js'></script>
<script src='assets/js/bootstrap-datepicker.js'></script>
<script src="assets/js/jquery.countTo.js"></script>
						<script>
						
						<?php 
							mysql_connect("localhost","root","");
							mysql_select_db("docteur");
							$req = "SELECT * FROM statp where idp = '".$_GET["idp"]."'";
							$res = mysql_query($req) or die(mysql_error());
							$num_res = mysql_num_rows($res);
						?>
								new Chartist.Line('#line-area', {
  /*labels: [1, 2, 3, 4, 5, 6, 7, 8,9,10],*/
  labels: [<?php
	$labels = "";
	for ($i = 0 ; $i< $num_res ; $i++)
	{
		$labels.= $i." ,";
	}
	$labels =  substr($labels,0,strlen($labels)-1);
	echo $labels;
  ?>],
  series: [
    /*[10, 90, 70, 80, 50, 30, 50, 120]*/
	[<?php 
	$series = "";
		for ($i = 0 ; $i < $num_res ; $i++)
		{
			$azaz = mysql_fetch_assoc($res);
			$series.=  $azaz["poids"]." , ";
		}
		$series =  substr($series,0,strlen($series)-2);
		echo $series;
	
	?>]
  ]
}, {
  low: 0,
  showArea: true
});
						</script>

<script>
						$(function(){
						
						$("#c1").click(function(){$("#t1").toggle();});
						 $("#c2").click(function(){$("#t2").toggle();});
						 $("#c3").click(function(){$("#t3").toggle();});
 						 $("#c4").click(function(){$("#t4").toggle();});
					     $("#c5").click(function(){$("#t5").toggle();});
						 $("#c6").click(function(){$("#t6").toggle();});
						   $("#c7").click(function(){$("#t7").toggle();});
						  $("#c8").click(function(){$("#t8").toggle();});
						 $("#c9").click(function(){$("#t9").toggle();});
						 $("#c10").click(function(){$("#t10").toggle();});
 						 $("#c11").click(function(){$("#t11").toggle();});
					     $("#c12").click(function(){$("#t12").toggle();});
						 $("#c13").click(function(){$("#t13").toggle();});
						 $("#c14").click(function(){$("#t14").toggle();});
						  $("#c15").click(function(){$("#t15").toggle();});
						   $("#c16").click(function(){$("#t16").toggle();});
						 
						 $(".great-grandchild").click();
						 $(".parent").click()
						
						 
						
						});
						 
						
						</script>



</body>
</html>
<?php 
}
else{echo "brz";}
 }
else {header("Location: signin.php");} ?>