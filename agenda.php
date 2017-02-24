 <?php 
session_start();
if(isset($_SESSION["user"])&&isset($_SESSION["user"])){
	$pass=$_SESSION["pass"]; $user=$_SESSION["user"];
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Agenda | Doctor Park</title>

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
<link href='assets/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='assets/js/jquery.js'></script>
<script src='assets/js/app.js'></script>

<script src='assets/lib/moment.min.js'></script>
<script src='assets/lib/jquery.min.js'></script>
<script src='assets/fullcalendar.min.js'></script>
<script src='assets/fr.js'></script>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay',
				},
				
			defaultDate: '<?php $date = date("Y-m-d");echo $date;?>',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
            <?php $sel=$bdd->query("select *,DATE_FORMAT(date, '%Y-%m-%dT%H:%i:%s') AS d from rdv");
			while($show=$sel->fetch()){
				$idp=$show['idp'];
				$sel2=$bdd->query("select * from patiant where id=$idp ");
				$p=$sel2->fetch();
				?>
				{
					title: '<?php echo $show['nature'].' : '.$p['nom'].'  '.$p['prenom'];?>',
					start: '<?php echo $show['d'];?>'
					
					},
				
			<?php
			}?>
				
				
				]
		});
		
	});

</script>
<style>

	
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
	<div class="main-content">
		<!-- panel -->
		<!-- /main content -->				
    
	 
	 <div class="row">
			<!--                   col-md-12-->
			<div class="col-md-12">
				<!--                        *** Modal ***-->
				<div class="panel panel-piluku">
					<div class="panel-heading">
						<h3 class="panel-title">
							Agenda
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
						 <div id='calendar'></div>
					</div>
				</div>
				<!--                        *** /Modals ***-->
				<!-- /panel -->
			</div>
			<!--                    /col-md-12-->
		</div>
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
<?php }
else {header("Location: signin.php");} ?>