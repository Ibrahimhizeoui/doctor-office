<?php 
session_start();
if(isset($_SESSION["user"])&&isset($_SESSION["user"])){
	$pass=$_SESSION["pass"]; $user=$_SESSION["user"];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Ajouter un rendez vous | Doctor Park</title>

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
<link href='assets/fullcalendar.css' rel='stylesheet' />
<link rel="stylesheet" href="assets/css/click-trigger.css" type="text/css" />
<link href='assets/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='assets/js/jquery.js'></script>
<script src='assets/js/app.js'></script>

<script type="application/javascript" src="assets/js/ajaxTrigger.js"></script>
<script type="application/javascript" src="assets/js/jquery.js"></script>

	
</style>
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
<!-- main content -->
	<div class="main-content">
		<!-- panel -->
		<div class="panel panel-piluku">
			<div class="panel-heading">
				<h3 class="panel-title">
					Ajouter un Rendez-vous
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
				<form  role="form" class="form form-horizontal" id="searchForm" name="moteurSubmit" method="GET" action="" enctype="multipart/form-data">
					
					
					
					
					
					<div class="">
				<!-- xselectize form   -->
				
					<div class="form-group">
						<label class=" col-sm-2 control-label">Select:</label>
						<div class="col-sm-8">
						   
					     	<select class="name_search form-control sel" name="q">
							<option  > Recherche ... </option>
							
							
							
							
							<?php 
							require_once('connect.php');
							$select=$bdd->prepare("SELECT DISTINCT nom,prenom FROM `patiant`");
								 $select->execute();
								 
								 while($s1=$select->fetch()){
							?>
								<option value="<?php echo $s1['nom']." ".$s1['prenom'];?>"> <?php echo $s1['nom']." ".$s1['prenom'];?> </option><?php }?>
							
							
						</select>
							
						</div>
					</div>
					<div class="form-group" >
						
						<div class="col-sm-8" style="float:right;">
							<input type="submit"  class="btn btn-primary btn-lg" data-icon="false"  value="Valider"  data-validation="size mime required">
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#defaultmodal2" style="display: none;">
								Nouveau patient
								</button>
						</div>
					</div>
					
		</form>
		
		 <?php
include_once("class.inc/BDD.class-inc.php");
include_once("class.inc/stopwords.php");
include_once("class.inc/moteur-php5.class-inc.php");
if(isset($_GET) && !empty($_GET['q'])) {
	
    $moteur = new moteurRecherche(stripslashes($_GET['q']), 'patiant', 'regexp', $stopwords);
    $colonnesWhere = array('nom', 'prenom');
    $moteur->moteurRequetes($colonnesWhere);
}

if(isset($moteur)) {
    // Affichage de la requête avec $moteur->requete
	?>
	<div class="page_header">
		<div class="pull-left">
			<i class="icon fa fa-search page_header_icon"></i>
			<span class="main-text">Résultats de la recherche</span>
			<p class="text">
				 
			</p>
		</div>
		
	</div>
	<?php
    
	
	// Fonction d'affichage des résultats (callback appelé ensuite)	
	function display($requete, $nbResults, $mots) {

		if($nbResults == 0) { // Si aucun résultat n'est retourné
			echo "<p>Aucun résultat, veuillez effectuer une autre recherche !</p>";    
		} else {



		// Sinon on affiche les résultats en boucle
	 
			// Affichage du nombre de résultats (optionnel)
			// N.B. : important pour l'affichage de résultats suivants (class "numR") !!!
			$affichageResultats = new affichageResultats();
			echo $affichageResultats->nbResultats(true);
			?>
		<!-- panel -->
				<div class="panel panel-piluku">
					
					<div class="panel-body">
						<!-- Table -->
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom</th>
									<th>Prenom</th>
									<th>Telephne</th>
									<th>prochain RVD</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								
				<!-- /panel -->
		
		
		
		<?php
			// Instanciation des ID (et du numéro de résultat si besoin)
			$nb = 0;
			while(($key = mysql_fetch_assoc($requete))) {
				$nb++; // Incrémentation de l'ID
				
				// On encode chaque clé/valeur de résultats en UTF-8
				foreach($key as $k => $v) {
					 $key[$k] = utf8_encode($v);
				}

				// Résultats de recherche à afficher (à personnaliser)
				
				?>
				<tr class="gradeA even">
									<th scope="row"><?php echo $nb;?></th>
									<td><?php echo $key['nom'];?></td>
									<td><?php echo $key['prenom'];?></td>
									<td><?php echo $key['tel'];?></td>
									<td><?php

                                        
										 $i= $key['id'];
										 $base    = "docteur";
                                          
                                        // $bdd= new PDO('mysql:host=localhost;dbname=docteur','root','');
                                         include('connect.php');
									     $sel=$bdd->prepare("select DATE_FORMAT(date, '%Y-%m-%d à %H:%i') AS d from rdv where idp=$i AND date> NOW() ORDER BY date  LIMIT 1");
                                         $sel->execute();										
										$ss=$sel->fetch();
										 echo $ss['d'];
									?></td>
									<td>
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#defaultmodal<?php echo $i;?>">
									Modifier RDV
								</button>
								</td>
				</tr>
					<div class="modal fade" id="defaultmodal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel1">Ajouter un Rendez-vous </h4>
				</div>
				<div class="modal-body" style="display:inline-block;width:100%">
					
					 <form method="post" action="enre.php?idp=<?php echo $i;?>&amp;nom=<?php echo $_GET['q']?>" role="form" class="form form-vertical">
					 
					      
					 
					 
				 <div class="form-group">
						<label class="col-sm-2 control-label">infos du RDV:</label>
						<div class="col-sm-3">
							<input  name="date" type="text" class="form-control" id="date-popup" data-provide="datepicker">
						</div>
						<div class="col-sm-3">
							<input name="time" type="time" class="form-control" data-validation="date" data-validation-optional="true">
						</div>
						<div class="col-sm-3">
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
					<div class="form-group ">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-2">
							
						</div>
						
					</div>
					
				</div>
				
				<div class="modal-footer" style="  margin-top: 40px;">
				
					
					
					<input type="submit" name="rdv" class="btn btn-primary"  value="Ajouter"/>
					
					<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div></form>
			</div>
		</div>
		</div>
				
				<?php
				// Affichage du contenu après surlignage des mots recherchés
				// N.B. : optionnel --> possibilité de remplacer par echo $texte;
				$surlignage = new surlignageMot($mots, $texte);
				echo $surlignage->contenu;
			}
?>
                                
							</tbody>
						</table>
					</div>
				</div>
<?php			// Fin de la boucle while
		}
	} // Fin de la fonction display (callback)
	
	// Nombre de résultats par "tranche d'affichage"
	$limit = 10;
	
	// Lancement de la fonction d'affichage avec paramètres
	$moteur->moteurAffichage('display', '', array(true, 0, $limit, false));
	
	// Affichage de la zone de chargement
	echo '<div id="loadMore">Afficher plus de résultats...</div>';
}
?>
					
	</div>

				
			
<!-- /panel -->
</div>

<!-- /main content -->				
 <div class="modal fade" id="defaultmodal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
					<h4 class="modal-title" id="myModalLabel1">Ajouter un nouveau patient et un RDV </h4>
				</div>
				<div class="modal-body" style="display:inline-block;width:100%">
					
					 <form method="post" action="enre.php" role="form" class="form form-vertical">
					 
					      
					 
					 
				 <div class="form-group">
						<label class="col-sm-2 control-label">infos Personnels:</label>
						
						<div class="col-sm-3">
							<select class="form-control" name="sex" data-validation="required" data-validation-error-msg="Please make a choice">
								<option value=""> - - Sex - - </option>
								<option value="homme"> Homme </option>
								<option value="famme"> Femme </option>
								
							</select>
						</div>
						<div class="col-sm-3">
							<input  name="nom" type="text" class="form-control" placeholder="nom" >
						</div>
						<div class="col-sm-3">
							<input name="prenom" type="text" placeholder="prenom" class="form-control" >
						</div>
						
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
						
					</div> 
					
					
					
					
				</div>
				
				<div class="modal-footer" style="  margin-top: 40px;">
				
					
										<button type="submit"  class="btn btn-primary" name="rapide">Ajouter </button>
					<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div></form>
			</div>
		</div>
		</div>
				          
</div>  

<div class="panel panel-piluku">
			<div class="panel-heading">
				<h3 class="panel-title">
					Ajouter un patient
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
				<form id="f5" role="form" class="form form-horizontal" method="post" action="enre.php" enctype="multipart/form-data">
					
					<div class="form-group">
						<label class="col-sm-2 control-label" name="sex">Sex :</label>
						<div class="col-sm-8">
							<select class="form-control" name="sex" data-validation="required" data-validation-error-msg="Please make a choice">
								<option value=""> - - Choisir  - - </option>
								<option value="homme"> Homme </option>
								<option value="famme"> Femme </option>
								
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="inline-suggestions">Nom :</label>
						<div class="col-sm-8">
							<input name="nom" type="text" id="inline-suggestions" class="form-control" data-suggestions="Monkey, Horse, Hound, Fox, Tiger, Elephant, Alligator, Ant, Bat, Banana, Cat, Cell Phone, Dog, Deer, Goat, George, India,Ireland, Jug, Jackle, Kite, King, Leapord, Lion, Moon,Mentor, Night, Notes, Oxford, Parrot, Queen, Rat, Square, Tiger, Umbrella, Van, Watch, Xenon, Zebra" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Prenom :</label>
						<div class="col-sm-8">
							<input name="prenom"  type="text" id="" class="form-control" />
						</div>
					</div>

						<div class="form-group">
							<div class="col-md-2">
								<label class="control-label align-rt">Date de naissance :</label>
							</div>
							<div class="col-md-8">
								<input type="date" name="datenaissance" class="form-control" >

							</div>
						</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Lieu de naissance :</label>
						<div class="col-sm-8">
							<input name="lieu"  type="text" id="" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Poids :</label>
						<div class="col-sm-8">
							<input name="poids"  type="text" id="" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Taille :</label>
						<div class="col-sm-8">
							<input name="taille"  type="text" id="" class="form-control" />
						</div>
					</div>
						<div class="form-group">
						<label class="col-sm-2 control-label" name="sex">Groupe sanguin :</label>
						<div class="col-sm-8">
							<select class="form-control" name="sang" data-validation="required" data-validation-error-msg="Please make a choice">
								<option value=""> - - Choisir  - - </option>
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
					 
					
					</div>
                    
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label">telecharger une photo :</label>
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
						<label class="col-sm-2 control-label">Adresse :</label>
						<div class="col-sm-8">
							<textarea id="" name="adress" class="form-control text-area" cols="30" rows="10" placeholder="Address Form"></textarea>
						</div>
						
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="inline-suggestions">Ville :</label>
						<div class="col-sm-8">
							<input name="ville" type="text" id="inline-suggestions" class="form-control" data-suggestions="Monkey, Horse, Hound, Fox, Tiger, Elephant, Alligator, Ant, Bat, Banana, Cat, Cell Phone, Dog, Deer, Goat, George, India,Ireland, Jug, Jackle, Kite, King, Leapord, Lion, Moon,Mentor, Night, Notes, Oxford, Parrot, Queen, Rat, Square, Tiger, Umbrella, Van, Watch, Xenon, Zebra" />
						</div>
					</div>
                   
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Pays :</label>
						<div class="col-sm-8">
							<input name="pays"  type="text" id="" class="form-control" />
						</div>
					</div>
					
					<div class="form-group">
				         <label class="col-sm-2 control-label">Tel :</label>
				         <div class="col-sm-8">
				         	<input type="text" class="form-control"  maxlength="20" name="tel" />
				        </div>
			         </div>
					 
					
					 
					 <!--<div class="form-group ">
						<label class="col-sm-2 control-label">Assurance :</label>
						<div class="col-sm-8">
							<ul class="list-inline checkboxes-radio">
								<li class="ms-hover has-success">
									<input name="couverture" type="radio" data-validation="required" value="cnam" id="c5" class="valid">
									<label for="c5"><span></span>CNAM</label>
								</li>
								<li class="ms-hover">
									<input name="couverture" type="radio" value="CNSS" id="c7">
									<label for="c7"><span></span>CNSS</label>
								</li>
								<li>
									<input name="couverture" type="radio" value="cnrps" id="c8">
									<label for="c8"><span></span>CNRPS</label>
								</li>
								
							</ul>
						</div>
					</div>-->
					<div class="form-group">
						<label class="col-sm-2 control-label" for="country-suggestions">Email:</label>
						<div class="col-sm-8">
							<input name="email"  type="email" id="country-suggestions" class="form-control" />
						</div>
					</div>
					
					 <div class="form-group">
				         <label class="col-sm-2 control-label">Assurance :</label>
				         <div class="col-sm-8">
				         	<input type="checkbox" class="form-control"  name="couverture" />
						
									<input type="checkbox" id="c9" data-toggle="modal" data-target="#defaultmodal3">
									<label for="c9"><span></span>  Afficher la formulaire de l' Assurance :</label>
								
				        </div>
			         </div>
					 
					
					  <div  style="display:none" id="ass">
						
						
						
					</div> 
					
					<?php 
					if(isset($_GET['err'])){
						if($_GET['err']==1){echo "<div style='color:red;font-size:16px;margin:10px;'>Il y'a un probleme veuillez retapper les données</div>";}
						elseif($_GET['err']==2){echo "<div style='color:red;font-size:16px;margin:10px;'>Verifier l ' image .</div>";}
						
						
						}
					?>
					
					<div class="form-group" >
						
						<div class="col-sm-8" style="float:right;">
							<input type="submit" class="btn btn-primary btn-lg" data-icon="false" name="submit" value="enregister"  data-validation="size mime required"
							>
							<input  id="reset"type="reset" value="Réinitialiser le formulaire" class="btn btn-Default btn-lg"/>
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
					<h4 class="modal-title" id="myModalLabel1">Enregister l'assurance  </h4>
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
		
		<div>
</div>
<!-- /panel -->

</div>
<!-- /main content -->				

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
 <script type="application/javascript">
jQuery(document).ready(function () {
	
	
	// Tableau des arguments optionnels (ici les valeurs par défaut)
	var args = {
		target: 'queryAjax.php',					// Cible contenant le contenu à charger (boucle PHP/MySQL en général)
		limit: 5,									// Nombre de résultats à afficher par chargement
		nbResult: jQuery('.numR').text(),			// Nombre total de résultats (récupéré dynamiquement)
		duration: 300,								// Durée d'affichage de l'image de chargement (en ms) --> 0 pour annuler !
		classLast: '.results',						// Class des résultats affichés (obligatoire pour fonctionner !)
		loadImg: 'img/loadingBlue.gif',				// Image de chargement ('' pour ne pas afficher d'image)
		idImg: 'imgLoading',						// ID du bloc contenant l'image de chargement
		attrID: 'id',								// Attribut contenant le numéro du résultat affiché ('id' conseillé !)
		evt: 'click',								// Type d'événement Javascript pour lancer la fonction
	};
	
	// Options complémentaires (requête de recherche par exemple ici --> Totalement personnalisable !)
	var options = {
		q: '<?php if(isset($_GET['q'])) { echo $_GET['q']; } ?>'
	};
	
	// Lancement de la fonction sur l'élément "Afficher plus"
	jQuery('#loadMore').ajaxTrigger(args, options);
	
});
</script>

</body>
</html>
<?php }
else {header("Location: signin.php");} ?>